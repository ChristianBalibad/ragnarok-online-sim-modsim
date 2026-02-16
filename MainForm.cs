using System.Text.Json;
using System.Text.Json.Serialization;
using RagnarokOnlineSimulator.Models;
using RagnarokOnlineSimulator.Services;

namespace RagnarokOnlineSimulator;

public partial class MainForm : Form
{
    public MainForm()
    {
        InitializeComponent();
        Load += OnLoad;
    }

    private async void OnLoad(object? sender, EventArgs e)
    {
        await webView21.EnsureCoreWebView2Async();
        webView21.CoreWebView2.WebMessageReceived += OnWebMessage;

        var path = Path.Combine(Application.StartupPath, "www", "stat.html");
        if (File.Exists(path))
            webView21.Source = new Uri(path);
        else
            webView21.NavigateToString("<p>stat.html not found in www folder.</p>");
    }

    private void OnWebMessage(object? sender, Microsoft.Web.WebView2.Core.CoreWebView2WebMessageReceivedEventArgs e)
    {
        try
        {
            string messageJson;
            try
            {
                messageJson = e.TryGetWebMessageAsString();
            }
            catch (ArgumentException)
            {
                messageJson = e.WebMessageAsJson;
            }
            using var messageDocument = JsonDocument.Parse(messageJson);
            var messageRoot = messageDocument.RootElement;
            if (messageRoot.TryGetProperty("type", out var typeProperty) && typeProperty.GetString() != "calc")
                return;

            var payloadElement = messageRoot.GetProperty("data");
            var jsonOptions = new JsonSerializerOptions
            {
                PropertyNameCaseInsensitive = true,
                NumberHandling = JsonNumberHandling.AllowReadingFromString
            };
            var calcRequest = JsonSerializer.Deserialize<CalcRequest>(payloadElement.GetRawText(), jsonOptions);
            if (calcRequest == null) return;

            var stats = new CharacterStats
            {
                Str = calcRequest.Str, Agi = calcRequest.Agi, Vit = calcRequest.Vit,
                Int = calcRequest.IntStat, Dex = calcRequest.Dex, Luk = calcRequest.Luk
            };

            var config = new CharacterConfig
            {
                JobId = calcRequest.JobId, BaseLevel = Math.Clamp(calcRequest.BaseLevel, 1, 150),
                JobLevel = Math.Clamp(calcRequest.JobLevel, 1, 10),
                WeaponTypeRight = calcRequest.WeaponTypeRight,
                MaxAspd = calcRequest.MaxAspd, MaxHpCap = calcRequest.MaxHpCap
            };

            var buffs = new CharacterBuffs
            {
                BlessingLevel = calcRequest.BlessingLevel,
                IncreaseAgiLevel = calcRequest.IncreaseAgiLevel,
                AngelusLevel = calcRequest.AngelusLevel,
                ImpositioManusLevel = calcRequest.ImpositioLevel,
                WindWalkLevel = calcRequest.WindWalkLevel,
                Gloria = calcRequest.Gloria,
                AspdPotion = (AspdPotionType)Math.Clamp(calcRequest.AspdPotion, 0, 3)
            };

            var result = StatCalculator.Calculate(stats, config, buffs, calcRequest.LastModifiedStat);
            var jobBonuses = new[] { 0, stats.StrBonus, stats.AgiBonus, stats.VitBonus, stats.IntBonus, stats.DexBonus, stats.LukBonus };

            var response = new CalcResponse
            {
                StatusInfo = new StatusInfoDto
                {
                    Weight = result.StatusInfo.Weight,
                    MaxHp = result.StatusInfo.MaxHp,
                    HpRegen = result.StatusInfo.HpRegen,
                    MaxSp = result.StatusInfo.MaxSp,
                    SpRegen = result.StatusInfo.SpRegen,
                    BaseAtk = result.StatusInfo.BaseAtk,
                    AtkPlus = result.StatusInfo.AtkPlus,
                    MatkMin = result.StatusInfo.MatkMin,
                    MatkMax = result.StatusInfo.MatkMax,
                    DefPlus = result.StatusInfo.DefPlus,
                    MdefPlus = result.StatusInfo.MdefPlus,
                    Hit = result.StatusInfo.Hit,
                    Flee = result.StatusInfo.Flee,
                    FleePlus = result.StatusInfo.FleePlus,
                    Critical = result.StatusInfo.Critical,
                    Aspd = result.StatusInfo.Aspd,
                    StatPointsLeft = result.StatusInfo.StatPointsLeft
                },
                Resistances = new ResistancesDto
                {
                    Stun = result.Resistances.Stun,
                    Poison = result.Resistances.Poison,
                    Silence = result.Resistances.Silence,
                    Bleeding = result.Resistances.Bleeding,
                    Sleep = result.Resistances.Sleep,
                    StoneCurse = result.Resistances.StoneCurse,
                    Freeze = result.Resistances.Freeze,
                    Curse = result.Resistances.Curse,
                    Blind = result.Resistances.Blind,
                    Confusion = result.Resistances.Confusion
                },
                PointsRequired = new PointsRequiredDto
                {
                    Str = result.PointsRequired.Str,
                    Agi = result.PointsRequired.Agi,
                    Vit = result.PointsRequired.Vit,
                    IntStat = result.PointsRequired.Int,
                    Dex = result.PointsRequired.Dex,
                    Luk = result.PointsRequired.Luk
                },
                JobBonuses = jobBonuses,
                Overcapped = result.Overcapped,
                ClampedStat = result.ClampedStat,
                ClampedValue = result.ClampedValue
            };

            var serializerOptions = new JsonSerializerOptions { PropertyNamingPolicy = JsonNamingPolicy.CamelCase };
            var responseJson = JsonSerializer.Serialize(response, serializerOptions);
            webView21.CoreWebView2.PostWebMessageAsString(responseJson);
        }
        catch (Exception ex)
        {
            System.Diagnostics.Debug.WriteLine(ex.ToString());
        }
    }
}

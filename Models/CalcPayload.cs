using System.Text.Json.Serialization;

namespace RagnarokOnlineSimulator.Models;

public class CalcRequest
{
    [JsonPropertyName("jobId")] public int JobId { get; set; }
    [JsonPropertyName("baseLevel")] public int BaseLevel { get; set; }
    [JsonPropertyName("jobLevel")] public int JobLevel { get; set; }
    [JsonPropertyName("str")] public int Str { get; set; }
    [JsonPropertyName("agi")] public int Agi { get; set; }
    [JsonPropertyName("vit")] public int Vit { get; set; }
    [JsonPropertyName("intStat")] public int IntStat { get; set; }
    [JsonPropertyName("dex")] public int Dex { get; set; }
    [JsonPropertyName("luk")] public int Luk { get; set; }
    [JsonPropertyName("weaponTypeRight")] public int WeaponTypeRight { get; set; }
    [JsonPropertyName("maxAspd")] public int MaxAspd { get; set; }
    [JsonPropertyName("maxHpCap")] public int MaxHpCap { get; set; }
    [JsonPropertyName("blessingLevel")] public int BlessingLevel { get; set; }
    [JsonPropertyName("increaseAgiLevel")] public int IncreaseAgiLevel { get; set; }
    [JsonPropertyName("angelusLevel")] public int AngelusLevel { get; set; }
    [JsonPropertyName("impositioLevel")] public int ImpositioLevel { get; set; }
    [JsonPropertyName("windWalkLevel")] public int WindWalkLevel { get; set; }
    [JsonPropertyName("gloria")] public bool Gloria { get; set; }
    [JsonPropertyName("aspdPotion")] public int AspdPotion { get; set; }
    [JsonPropertyName("lastModifiedStat")] public string? LastModifiedStat { get; set; }
}

public class CalcResponse
{
    [JsonPropertyName("statusInfo")] public StatusInfoDto StatusInfo { get; set; } = new();
    [JsonPropertyName("resistances")] public ResistancesDto Resistances { get; set; } = new();
    [JsonPropertyName("pointsRequired")] public PointsRequiredDto PointsRequired { get; set; } = new();
    [JsonPropertyName("jobBonuses")] public int[] JobBonuses { get; set; } = [];
    [JsonPropertyName("overcapped")] public bool Overcapped { get; set; }
    [JsonPropertyName("clampedStat")] public string? ClampedStat { get; set; }
    [JsonPropertyName("clampedValue")] public int ClampedValue { get; set; }
}

public class StatusInfoDto
{
    [JsonPropertyName("weight")] public int Weight { get; set; }
    [JsonPropertyName("maxHp")] public int MaxHp { get; set; }
    [JsonPropertyName("hpRegen")] public string HpRegen { get; set; } = "";
    [JsonPropertyName("maxSp")] public int MaxSp { get; set; }
    [JsonPropertyName("spRegen")] public string SpRegen { get; set; } = "";
    [JsonPropertyName("baseAtk")] public int BaseAtk { get; set; }
    [JsonPropertyName("atkPlus")] public int AtkPlus { get; set; }
    [JsonPropertyName("matkMin")] public int MatkMin { get; set; }
    [JsonPropertyName("matkMax")] public int MatkMax { get; set; }
    [JsonPropertyName("defPlus")] public int DefPlus { get; set; }
    [JsonPropertyName("mdefPlus")] public int MdefPlus { get; set; }
    [JsonPropertyName("hit")] public int Hit { get; set; }
    [JsonPropertyName("flee")] public int Flee { get; set; }
    [JsonPropertyName("fleePlus")] public int FleePlus { get; set; }
    [JsonPropertyName("critical")] public int Critical { get; set; }
    [JsonPropertyName("aspd")] public int Aspd { get; set; }
    [JsonPropertyName("statPointsLeft")] public int StatPointsLeft { get; set; }
}

public class ResistancesDto
{
    [JsonPropertyName("stun")] public int Stun { get; set; }
    [JsonPropertyName("poison")] public int Poison { get; set; }
    [JsonPropertyName("silence")] public int Silence { get; set; }
    [JsonPropertyName("bleeding")] public int Bleeding { get; set; }
    [JsonPropertyName("sleep")] public int Sleep { get; set; }
    [JsonPropertyName("stoneCurse")] public int StoneCurse { get; set; }
    [JsonPropertyName("freeze")] public int Freeze { get; set; }
    [JsonPropertyName("curse")] public int Curse { get; set; }
    [JsonPropertyName("blind")] public int Blind { get; set; }
    [JsonPropertyName("confusion")] public int Confusion { get; set; }
}

public class PointsRequiredDto
{
    [JsonPropertyName("str")] public int Str { get; set; }
    [JsonPropertyName("agi")] public int Agi { get; set; }
    [JsonPropertyName("vit")] public int Vit { get; set; }
    [JsonPropertyName("intStat")] public int IntStat { get; set; }
    [JsonPropertyName("dex")] public int Dex { get; set; }
    [JsonPropertyName("luk")] public int Luk { get; set; }
}

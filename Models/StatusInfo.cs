namespace RagnarokOnlineSimulator.Models;

public class StatusInfo
{
    public int BaseAtk { get; set; }
    public int AtkPlus { get; set; }
    public int MatkMin { get; set; }
    public int MatkMax { get; set; }
    public int BaseDef { get; set; }
    public int DefPlus { get; set; }
    public int BaseMdef { get; set; }
    public int MdefPlus { get; set; }
    public int Hit { get; set; }
    public int Flee { get; set; }
    public int FleePlus { get; set; }
    public int Critical { get; set; }
    public int Aspd { get; set; }
    public int StatPointsLeft { get; set; }
    public int MaxHp { get; set; }
    public int MaxSp { get; set; }
    public int Weight { get; set; }
    public string HpRegen { get; set; } = string.Empty;
    public string SpRegen { get; set; } = string.Empty;
}

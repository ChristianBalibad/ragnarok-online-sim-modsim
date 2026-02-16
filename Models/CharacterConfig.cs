namespace RagnarokOnlineSimulator.Models;

public class CharacterConfig
{
    public int JobId { get; set; }
    public int BaseLevel { get; set; } = 1;
    public int JobLevel { get; set; } = 1;
    public bool IsBaby { get; set; }
    public bool IsTkRanker { get; set; }
    public int MaxAspd { get; set; } = 190;
    public int MaxHpCap { get; set; }
    public int WeaponTypeRight { get; set; }
}

namespace RagnarokOnlineSimulator.Models;

public class CharacterStats
{
    public int Str { get; set; } = 1;
    public int Agi { get; set; } = 1;
    public int Vit { get; set; } = 1;
    public int Int { get; set; } = 1;
    public int Dex { get; set; } = 1;
    public int Luk { get; set; } = 1;

    public int StrBonus { get; set; }
    public int AgiBonus { get; set; }
    public int VitBonus { get; set; }
    public int IntBonus { get; set; }
    public int DexBonus { get; set; }
    public int LukBonus { get; set; }

    public int StrTotal => Str + StrBonus;
    public int AgiTotal => Agi + AgiBonus;
    public int VitTotal => Vit + VitBonus;
    public int IntTotal => Int + IntBonus;
    public int DexTotal => Dex + DexBonus;
    public int LukTotal => Luk + LukBonus;
}

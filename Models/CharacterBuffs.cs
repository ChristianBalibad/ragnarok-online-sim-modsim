namespace RagnarokOnlineSimulator.Models;

public class CharacterBuffs
{
    public int BlessingLevel { get; set; }
    public int IncreaseAgiLevel { get; set; }
    public int AngelusLevel { get; set; }
    public int ImpositioManusLevel { get; set; }
    public int WindWalkLevel { get; set; }
    public bool Gloria { get; set; }
    public AspdPotionType AspdPotion { get; set; }
}

public enum AspdPotionType
{
    None = 0,
    Concentration = 1,
    Awakening = 2,
    Berserk = 3
}

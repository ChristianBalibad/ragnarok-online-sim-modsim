using RagnarokOnlineSimulator.Data;
using RagnarokOnlineSimulator.Models;

namespace RagnarokOnlineSimulator.Services;

public static class StatCalculator
{
    private static readonly int[] HpSigmaVal = new int[1001];

    public static CalculationResult Calculate(CharacterStats stats, CharacterConfig config, CharacterBuffs buffs, string? lastModifiedStat = null)
    {
        var jobBonuses = JobData.GetJobBonuses(config.JobId, config.JobLevel);
        stats.StrBonus = jobBonuses[1];
        stats.AgiBonus = jobBonuses[2];
        stats.VitBonus = jobBonuses[3];
        stats.IntBonus = jobBonuses[4];
        stats.DexBonus = jobBonuses[5];
        stats.LukBonus = jobBonuses[6];
        ApplyBuffs(stats, buffs);

        var (overcapped, clampedStat, clampedValue) = ClampStatsIfOvercapped(stats, config, jobBonuses, lastModifiedStat);

        var result = new CalculationResult
        {
            StatusInfo = CalcStatusInfo(stats, config, buffs),
            Resistances = CalcResistances(stats, config),
            PointsRequired = CalcPointsRequired(stats, jobBonuses),
            Overcapped = overcapped,
            ClampedStat = clampedStat,
            ClampedValue = clampedValue
        };

        result.StatusInfo.StatPointsLeft = CalcStatPointsLeft(stats, config, jobBonuses);
        return result;
    }

    private static (bool overcapped, string? clampedStat, int clampedValue) ClampStatsIfOvercapped(CharacterStats stats, CharacterConfig config, int[] jobBonuses, string? lastModifiedStat)
    {
        var statPointsRemaining = CalcStatPointsLeft(stats, config, jobBonuses);
        if (statPointsRemaining >= 0) return (false, null, 0);

        var statToReduce = lastModifiedStat ?? GetHighestBaseStat(stats, jobBonuses);
        if (string.IsNullOrEmpty(statToReduce)) return (false, null, 0);

        var minimumStatValues = new[] { 1 + jobBonuses[1], 1 + jobBonuses[2], 1 + jobBonuses[3], 1 + jobBonuses[4], 1 + jobBonuses[5], 1 + jobBonuses[6] };
        var setStatValue = GetStatSetter(stats, statToReduce);
        var getStatValue = GetStatGetter(stats, statToReduce);
        var minimumAllowedValue = GetMinimumStatForJob(minimumStatValues, statToReduce);
        if (setStatValue == null || getStatValue == null) return (false, null, 0);

        while (statPointsRemaining < 0 && getStatValue() > minimumAllowedValue)
        {
            setStatValue(getStatValue() - 1);
            statPointsRemaining = CalcStatPointsLeft(stats, config, jobBonuses);
        }

        return (true, statToReduce, getStatValue());
    }

    private static string? GetHighestBaseStat(CharacterStats stats, int[] jobBonuses)
    {
        var statNameToBaseValue = new[] { (stats.Str - jobBonuses[1], "str"), (stats.Agi - jobBonuses[2], "agi"), (stats.Vit - jobBonuses[3], "vit"), (stats.Int - jobBonuses[4], "intStat"), (stats.Dex - jobBonuses[5], "dex"), (stats.Luk - jobBonuses[6], "luk") };
        return statNameToBaseValue.OrderByDescending(entry => entry.Item1).FirstOrDefault(entry => entry.Item1 > 1).Item2;
    }

    private static Action<int>? GetStatSetter(CharacterStats characterStats, string statName) => statName switch
    {
        "str" => newValue => characterStats.Str = newValue,
        "agi" => newValue => characterStats.Agi = newValue,
        "vit" => newValue => characterStats.Vit = newValue,
        "intStat" => newValue => characterStats.Int = newValue,
        "dex" => newValue => characterStats.Dex = newValue,
        "luk" => newValue => characterStats.Luk = newValue,
        _ => null
    };

    private static Func<int>? GetStatGetter(CharacterStats characterStats, string statName) => statName switch
    {
        "str" => () => characterStats.Str,
        "agi" => () => characterStats.Agi,
        "vit" => () => characterStats.Vit,
        "intStat" => () => characterStats.Int,
        "dex" => () => characterStats.Dex,
        "luk" => () => characterStats.Luk,
        _ => null
    };

    private static int GetMinimumStatForJob(int[] minimumStatValues, string statName) => statName switch
    {
        "str" => minimumStatValues[0], "agi" => minimumStatValues[1], "vit" => minimumStatValues[2],
        "intStat" => minimumStatValues[3], "dex" => minimumStatValues[4], "luk" => minimumStatValues[5],
        _ => 1
    };

    private static void ApplyBuffs(CharacterStats stats, CharacterBuffs buffs)
    {
        stats.StrBonus += buffs.BlessingLevel;
        stats.IntBonus += buffs.BlessingLevel;
        stats.DexBonus += buffs.BlessingLevel;
        stats.AgiBonus += GetIncreaseAgiBonus(buffs.IncreaseAgiLevel);
        if (buffs.Gloria)
            stats.LukBonus += 30;
    }

    private static int GetIncreaseAgiBonus(int level) => level == 0 ? 0 : level + 2;

    private static StatusInfo CalcStatusInfo(CharacterStats stats, CharacterConfig config, CharacterBuffs buffs)
    {
        var statusInfo = new StatusInfo();

        statusInfo.MaxHp = CalcMaxHp(stats, config);
        statusInfo.MaxSp = CalcMaxSp(stats, config);
        statusInfo.HpRegen = CalcHpRegen(stats.VitTotal, statusInfo.MaxHp);
        statusInfo.SpRegen = CalcSpRegen(stats.IntTotal, statusInfo.MaxSp);

        var baseAttack = CalcBaseAtk(stats, config, buffs);
        statusInfo.BaseAtk = baseAttack;
        statusInfo.AtkPlus = 0;

        statusInfo.MatkMin = stats.IntTotal + (stats.IntTotal / 7) * (stats.IntTotal / 7);
        statusInfo.MatkMax = stats.IntTotal + (stats.IntTotal / 5) * (stats.IntTotal / 5);

        statusInfo.Hit = config.BaseLevel + stats.DexTotal;
        statusInfo.Flee = config.BaseLevel + stats.AgiTotal + GetWindWalkBonus(buffs.WindWalkLevel);
        statusInfo.FleePlus = (stats.LukTotal + 10) * 10 / 100;

        statusInfo.BaseDef = 0;
        statusInfo.DefPlus = CalcDefPlus(stats, buffs);
        statusInfo.BaseMdef = 0;
        statusInfo.MdefPlus = stats.IntTotal;

        statusInfo.Critical = (stats.LukTotal * 3 + 10) * 10 / 100;
        statusInfo.Aspd = CalcAspd(stats, config, buffs);
        statusInfo.Weight = CalcWeight(stats, config);

        return statusInfo;
    }

    private static int CalcMaxHp(CharacterStats stats, CharacterConfig config)
    {
        var hpSigmaBonus = config.BaseLevel < HpSigmaVal.Length ? HpSigmaVal[config.BaseLevel] : 0;
        var baseHp = 35 + config.BaseLevel * JobData.GetJobCoe(JobData.HpCoe2Index) / 100 + hpSigmaBonus;
        baseHp += baseHp * stats.VitTotal / 100;

        if (config.MaxHpCap > 0 && baseHp > config.MaxHpCap)
            baseHp = config.MaxHpCap;

        return (int)baseHp;
    }

    private static int CalcMaxSp(CharacterStats stats, CharacterConfig config)
    {
        var baseSp = 10 + config.BaseLevel * JobData.GetJobCoe(JobData.SpCoeIndex) / 100;
        baseSp += baseSp * stats.IntTotal / 100;
        return (int)baseSp;
    }

    private static string CalcHpRegen(int vit, int maxHp) =>
        $"{1 + vit / 5 + maxHp / 200} per 6s standing (per 3s sitting)";

    private static string CalcSpRegen(int intelligence, int maxSp)
    {
        var regenPerTick = 1 + intelligence / 6 + maxSp / 100;
        if (intelligence >= 120)
            regenPerTick += (intelligence - 120) / 2 + 4;
        return $"{regenPerTick} per 8s standing (per 4s sitting)";
    }

    private static int CalcBaseAtk(CharacterStats stats, CharacterConfig config, CharacterBuffs buffs)
    {
        var dexBasedWeaponTypes = new[] { 11, 13, 14, 17, 18, 19, 20, 21 };
        var isDexWeapon = Array.IndexOf(dexBasedWeaponTypes, config.WeaponTypeRight) >= 0;
        var primaryStatForAttack = isDexWeapon ? stats.DexTotal : stats.StrTotal;
        var secondaryStatForAttack = isDexWeapon ? stats.StrTotal : stats.DexTotal;

        var primaryStatTier = primaryStatForAttack / 10;
        primaryStatForAttack += primaryStatTier * primaryStatTier;
        primaryStatForAttack += secondaryStatForAttack / 5 + stats.LukTotal / 5;
        primaryStatForAttack += GetImpositioBonus(buffs.ImpositioManusLevel);
        return primaryStatForAttack;
    }

    private static int GetImpositioBonus(int level) => level switch { 1 => 5, 2 => 10, 3 => 15, 4 => 20, 5 => 25, _ => 0 };

    private static int GetWindWalkBonus(int level) => level switch { 1 => 1, 2 => 1, 3 => 2, 4 => 2, 5 => 3, 6 => 3, 7 => 4, 8 => 4, 9 => 5, 10 => 5, _ => 0 };

    private static int CalcDefPlus(CharacterStats stats, CharacterBuffs buffs)
    {
        var baseDefense = stats.VitTotal;
        var angelusMultiplier = GetAngelusMultiplier(buffs.AngelusLevel);
        return (int)(baseDefense * angelusMultiplier);
    }

    private static float GetAngelusMultiplier(int level) => level switch
    {
        1 => 1.05f,
        2 => 1.10f,
        3 => 1.15f,
        4 => 1.20f,
        5 => 1.25f,
        6 => 1.30f,
        7 => 1.35f,
        8 => 1.40f,
        9 => 1.45f,
        10 => 1.50f,
        _ => 1f
    };

    private static int CalcAspd(CharacterStats stats, CharacterConfig config, CharacterBuffs buffs)
    {
        var weaponDelayIndex = config.WeaponTypeRight + JobData.WidToJCoe;
        var attackMotionDelay = JobData.GetJobCoe(weaponDelayIndex);
        attackMotionDelay -= (int)(attackMotionDelay * (4 * stats.AgiTotal + stats.DexTotal) / 1000.0);
        var attackSpeed = (2000 - attackMotionDelay) / 10.0;
        const int maxAttackSpeed = 200;

        var potionBonus = (maxAttackSpeed - attackSpeed) * GetAspdPotionBonus(buffs.AspdPotion);
        attackSpeed += potionBonus;

        if (attackSpeed > config.MaxAspd)
            attackSpeed = config.MaxAspd;

        return (int)attackSpeed;
    }

    private static double GetAspdPotionBonus(AspdPotionType type) => type switch
    {
        AspdPotionType.Concentration => 0.10,
        AspdPotionType.Awakening => 0.15,
        AspdPotionType.Berserk => 0.20,
        _ => 0
    };

    private static int CalcWeight(CharacterStats stats, CharacterConfig config)
    {
        return (JobData.GetJobCoe(JobData.WeightCoeIndex) + stats.Str * 300) / 10;
    }

    private static StatPointsRequired CalcPointsRequired(CharacterStats stats, int[] jobBonuses)
    {
        return new StatPointsRequired
        {
            Str = Math.Max(2, (stats.Str - 1) / 10 + 2),
            Agi = Math.Max(2, (stats.Agi - 1) / 10 + 2),
            Vit = Math.Max(2, (stats.Vit - 1) / 10 + 2),
            Int = Math.Max(2, (stats.Int - 1) / 10 + 2),
            Dex = Math.Max(2, (stats.Dex - 1) / 10 + 2),
            Luk = Math.Max(2, (stats.Luk - 1) / 10 + 2)
        };
    }

    private static int CalcStatPointsLeft(CharacterStats stats, CharacterConfig config, int[] jobBonuses)
    {
        var totalPointsSpent = CalcTotalStatUsed(stats, jobBonuses);
        return JobData.GetStatPoints(config.BaseLevel) - totalPointsSpent;
    }

    private static int CalcTotalStatUsed(CharacterStats stats, int[] jobBonuses)
    {
        var baseStatsWithoutJobBonus = new[] { stats.Str - jobBonuses[1], stats.Agi - jobBonuses[2], stats.Vit - jobBonuses[3], stats.Int - jobBonuses[4], stats.Dex - jobBonuses[5], stats.Luk - jobBonuses[6] };
        var totalPointsUsed = 0;
        foreach (var baseStatValue in baseStatsWithoutJobBonus)
        {
            var pointsCostPerLevel = (baseStatValue - 1) / 10 + 2;
            totalPointsUsed += CalcPointsUsedForSingleStat(baseStatValue, pointsCostPerLevel);
        }
        return totalPointsUsed;
    }

    private static int CalcPointsUsedForSingleStat(int baseStatValue, int pointsCostPerLevel)
    {
        if (baseStatValue <= 1) return 0;
        if (baseStatValue <= 11) return baseStatValue * 2 - 2;

        var remainderInCurrentTier = baseStatValue % 10;
        var pointsUsed = 0;
        for (var costTier = pointsCostPerLevel - 1; costTier >= 2; costTier--)
            pointsUsed += costTier * 10;
        if (remainderInCurrentTier > 1)
            pointsUsed += (remainderInCurrentTier - 1) * pointsCostPerLevel;
        else if (remainderInCurrentTier == 0)
            pointsUsed += pointsCostPerLevel * 9;
        return pointsUsed;
    }

    private static StatusChangeResistances CalcResistances(CharacterStats stats, CharacterConfig config)
    {
        var stun = 3 + stats.VitTotal;
        var sleep = 3 + stats.IntTotal;
        var stoneFreeze = 3 + stats.IntTotal;
        var curse = stats.LukTotal > config.BaseLevel ? 100 : 3 + stats.LukTotal;
        return new StatusChangeResistances
        {
            Stun = Math.Min(100, stun),
            Poison = Math.Min(100, stun),
            Silence = Math.Min(100, stun),
            Bleeding = Math.Min(100, stun),
            Sleep = Math.Min(100, sleep),
            StoneCurse = Math.Min(100, stoneFreeze),
            Freeze = Math.Min(100, stoneFreeze),
            Curse = Math.Min(100, curse),
            Blind = Math.Min(100, 3 + (stats.VitTotal + stats.IntTotal) / 2),
            Confusion = Math.Min(100, 3 + (stats.StrTotal + stats.IntTotal) / 2)
        };
    }
}

public class CalculationResult
{
    public StatusInfo StatusInfo { get; set; } = new();
    public StatusChangeResistances Resistances { get; set; } = new();
    public StatPointsRequired PointsRequired { get; set; } = new();
    public bool Overcapped { get; set; }
    public string? ClampedStat { get; set; }
    public int ClampedValue { get; set; }
}

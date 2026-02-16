
// set the value of base lvl and stat point left conrespond to each other
function calc_base_lvl_chg(base_obj){

	if(!is_acceptable(base_obj.value))
		return;

	// get stat point available for that base level
	total_stat = stat_pt[base_obj.value];
	
	// trans get 100-48=52 points more initially (normal classes get 48 pts @ char screen or when reset)
	if (JOB_ID >= JOB_ID_MIN_TRANS && JOB_ID <= JOB_ID_MAX_TRANS)
		total_stat += 52;
	// is base lvl locked? 

	// minus the stats used
	stat_left = total_stat;
	
	document.getElementById('disp_statpt').innerHTML = stat_left;

	// recal all others to reflect base level change
	base_calc();
}

function calc_job_lvl_chg(job_obj){

	cur_jlvl = job_obj.options[job_obj.selectedIndex].value;

	bonus = new Array (0, 0, 0, 0, 0, 0, 0);	// for the stat bonuses, 0 is for no bonus

	for(var j = 0; j < cur_jlvl; j++){
		bonus[job_bonus[j]]++;
	}
	
	document.getElementById('str_bonus').innerHTML = bonus[1];
	document.getElementById('agi_bonus').innerHTML = bonus[2];
	document.getElementById('vit_bonus').innerHTML = bonus[3];
	document.getElementById('int_bonus').innerHTML = bonus[4];
	document.getElementById('dex_bonus').innerHTML = bonus[5];
	document.getElementById('luk_bonus').innerHTML = bonus[6];

	base_stat_bonus = bonus;	// universal

	// recal all others to reflect job level change
	base_calc();
}

function calc_statpts(){

	// stat pts used to add to each stat calc = floor((BaseOfStat - 1)/ 10) + 2
	base_stat = new Array();
	base_stat[0] = parseInt(cur_str) - parseInt(document.getElementById('str_bonus').innerHTML);
	base_stat[1] = parseInt(cur_agi) - parseInt(document.getElementById('agi_bonus').innerHTML);
	base_stat[2] = parseInt(cur_vit) - parseInt(document.getElementById('vit_bonus').innerHTML);
	base_stat[3] = parseInt(cur_int) - parseInt(document.getElementById('int_bonus').innerHTML);
	base_stat[4] = parseInt(cur_dex) - parseInt(document.getElementById('dex_bonus').innerHTML);
	base_stat[5] = parseInt(cur_luk) - parseInt(document.getElementById('luk_bonus').innerHTML);
	
	stat_req = new Array (2, 2, 2, 2, 2, 2);	// base for stat required

	total_stat_used = 0;

	for(var i = 0; i < base_stat.length; i++){
		
		stat_req[i] = Math.floor( (parseInt(base_stat[i]) - 1) / 10 ) + 2;
		total_stat_used += subcalc_total_stat(base_stat[i], stat_req[i]);
	}

	document.getElementById('str_pt_req').innerHTML = stat_req[0];
	document.getElementById('agi_pt_req').innerHTML = stat_req[1];
	document.getElementById('vit_pt_req').innerHTML = stat_req[2];
	document.getElementById('int_pt_req').innerHTML = stat_req[3];
	document.getElementById('dex_pt_req').innerHTML = stat_req[4];
	document.getElementById('luk_pt_req').innerHTML = stat_req[5];

	trans_stat = 0;

	// trans get 100-48=52 points more initially (normal classes get 48 pts @ char screen or when reset)
	if (JOB_ID >= JOB_ID_MIN_TRANS && JOB_ID <= JOB_ID_MAX_TRANS)
		trans_stat = 52;

	stat_pt_left = stat_pt[cur_baselvl] + trans_stat - total_stat_used;

	if(stat_pt_left >= 0){
		document.getElementById('disp_statpt').innerHTML = stat_pt_left;
	}else{
		document.getElementById('disp_statpt').innerHTML = '<font color="red"><b>' + stat_pt_left + '<b></font>';	
	}
}

// helper to calc_statpts()
function subcalc_total_stat(base_stat, stat_req){

	if(base_stat == 1)	// nothing is used
		return 0;

	if(base_stat <= 11) // basic case
		return base_stat * 2 - 2;

	quotient_stat = base_stat % 10;	// ex. 64 % 10 = 4

	total_used_pts = 0;

	// handle the stat used up to the tenth (ex. 60 in this case)
	for(i = stat_req - 1; i >= 2; i--){
		total_used_pts += i * 10;	// ex. 7x10 + 6x10 + 5x10 + 4x10 + 3x10 + 2x10
	}
	
	if(quotient_stat > 1)	
		total_used_pts += (quotient_stat - 1) * stat_req; // ex. (4 - 1) * 8 = 24

	if(quotient_stat == 0)	// a whole 9 * stat_req is missing
		total_used_pts += stat_req * 9;

	return total_used_pts;
}

function calc_aspd(){

	if( (left_hand_sel = document.getElementById('lefthand_sel')) ){	// left hand menu exists (sin/sinx)

		wid_left = left_hand_sel.options[left_hand_sel.selectedIndex].value;

		// enable both menu
		left_hand_sel.disabled = '';
		right_hand_menu = document.getElementById('aspd_sel');
		right_hand_menu.disabled = '';

		if(weap_id == 16){	// using katar on right-hand, disable left-hand
			left_hand_sel.options[0].selected = 1;
			left_hand_sel.disabled = 'disabled';
			wid_left = 0;
		}else if(wid_left == 16){	// using katar on left-hand, disable right-hand
			right_hand_menu.options[0].selected = 1;
			right_hand_menu.disabled = 'disabled';
			weap_id = 0;
		}
	}

	jcoe_index = parseInt(weap_id) + parseInt(WID_TO_JCOE);

	// special case for sin and sinx dual weapon
	if( (JOB_ID == SIN_JOB_ID || JOB_ID == SINX_JOB_ID) 
		&& weap_id != 16 /* not using a katar on the right hand */
		&& wid_left != 16 /* not using a katar on the left hand */
		&& (weap_id > 0 && wid_left > 0) /* both hand has a weapon */ ){ 

		jcoe_index_right = jcoe_index;
		jcoe_index_left =  parseInt(wid_left) + parseInt(WID_TO_JCOE);

		aMotion = (parseInt(job_coe[jcoe_index_right]) + parseInt(job_coe[jcoe_index_left])) * 7/10;
	
	}else if( (JOB_ID == SIN_JOB_ID || JOB_ID == SINX_JOB_ID)
		&& weap_id == 0 && wid_left != 0 /* sin/sinx has 1 weapon on left hand */ ){	 

		jcoe_index = parseInt(wid_left) + parseInt(WID_TO_JCOE);
		aMotion = job_coe[jcoe_index];

	}else{	// normal single weapon on right hand
		
		aMotion = job_coe[jcoe_index];
	}

	aMotion-= aMotion * (4 * cur_agi + cur_dex) / 1000;

	ASPD = (2000 - aMotion) / 10;
	
	ASPD_LIMIT = 200;

	// Aspd UP Potions 10%, 15%, 20%
	aspdpot_ = document.getElementById('aspd_potion');
	aspdpot_bonus = parseFloat(aspdpot_.options[aspdpot_.selectedIndex].value);
	
	// all bonus use base aspd, need to keep ASPD unchanged
	pot_bonus = ( (ASPD_LIMIT - ASPD) * aspdpot_bonus ); 

	skill_bonus = 0;

	// Knight/LK , One/Two hq
	if(document.getElementById('kn_quicken') && document.getElementById('kn_quicken').checked == true){
		kn_hq_bonus = parseFloat(document.getElementById('kn_quicken').value);
		skill_bonus += ( (ASPD_LIMIT - ASPD) * kn_hq_bonus );
	}

	// sader/pala, spear quicken
	if(document.getElementById('cs_quicken') && document.getElementById('cs_quicken').checked == true){
		cs_shq_bonus = parseFloat(document.getElementById('cs_quicken').value);
		skill_bonus += ( (ASPD_LIMIT - ASPD) * cs_shq_bonus );
	}
	
	// smith, adrenaline rush (axe & mace)
	if(document.getElementById('bs_adrenaline_rush') && 
		document.getElementById('bs_adrenaline_rush').checked == true){
		bs_ar_bonus = parseFloat(document.getElementById('bs_adrenaline_rush').value);
		skill_bonus += ( (ASPD_LIMIT - ASPD) * bs_ar_bonus );
	}

	// Star Gladiator: Comfort of the star
	if(document.getElementById('sg_comfort_star') &&
		document.getElementById('sg_comfort_star').checked == true){ 
		cstar_bonus = ((parseInt(cur_baselvl) + cur_dex + cur_luk) / 10) / 100;
		skill_bonus += ( (ASPD_LIMIT - ASPD) * cstar_bonus);
	}

	// Star Gladiator: Demon of the Sun, Moon and Stars
	if(document.getElementById('sg_demon_lv') && cur_joblvl >= 50){
		sgdemon_ = document.getElementById('sg_demon_lv');
		sgdemon_bonus = parseInt(sgdemon_.options[sgdemon_.selectedIndex].value) * 0.03;	
		skill_bonus += ( (ASPD_LIMIT - ASPD) * sgdemon_bonus);
	}

	// Gunslinger: Madness Canceller (part 2) (cancels adjustment done on form)
	if(document.getElementById('gs_madness') &&
		document.getElementById('gs_madness').checked == true){ 
		madness_bonus = parseFloat(document.getElementById('gs_madness').value);
		skill_bonus += ( (ASPD_LIMIT - ASPD) * madness_bonus);
	}

	// Gunslinger: Single Action
	if(document.getElementById('gs_singleaction_lv')){
		gssingle_ = document.getElementById('gs_singleaction_lv');
		gssingle_bonus = Math.floor((parseInt(gssingle_.options[gssingle_.selectedIndex].value) + 1) / 2) / 100;	
		skill_bonus += ( (ASPD_LIMIT - ASPD) * gssingle_bonus);
	}

	ASPD += pot_bonus + skill_bonus;

	if(ASPD > MAX_ASPD)	// cap by user selected max
		ASPD = MAX_ASPD;

	document.getElementById('disp_aspd').innerHTML = Math.floor(ASPD);
}

function status_base_atk(){

	flag = 0;

	switch(weap_id){	// these weapon types use dex as str and str as dex
		case '11': // BOW
		case '13': // MUSICAL 
		case '14': // WHIP
		case '17': // REVOLVER
		case '18': // RIFLE
		case '19': // GATLING
		case '20': // SHOTGUN
		case '21': // GRENADE
			flag = 1; 
	}

	if (flag) {
		batk = cur_dex;
		temp_dex = cur_str;
	} else {
		batk = cur_str;
		temp_dex = cur_dex;
	}
	dstr = Math.floor( batk / 10);	// bonus for (Str/10)^2
	batk += dstr * dstr;
	batk += Math.floor(temp_dex / 5) + Math.floor(cur_luk / 5);

	// Impositio Manus bonus +5 atk per level
	im_ = document.getElementById('atk_impositio_lv');
	batk += parseInt(im_.options[im_.selectedIndex].value);

	// Smith: Hilt Binding (part 2)
	if(document.getElementById('bs_hiltbinding') &&
		document.getElementById('bs_hiltbinding').checked == true){ 
		batk += 4; 
	}

	// Gunslinger: Madness Canceller (part 1)
	if(document.getElementById('gs_madness') &&
		document.getElementById('gs_madness').checked == true){ 
		batk += 100;
	}
	document.getElementById('disp_atk').innerHTML = batk;
}

// calc max hp value and natural hp regen
function status_max_hp(){
	
	val = Math.floor( 35 + parseInt(cur_baselvl) * parseInt(job_coe[HP_COE2_INDEX]) / 100
		+ parseInt(hp_sigma_val[cur_baselvl]) );

	// ninja & gunslinger, eA: Since their HP can't be approximated well enough without this.
	if(JOB_ID == 24 /* gunslinger */ || JOB_ID == 25 /* ninja */)
		val += 100; 
	
	if(IS_TK_RANKER && JOB_ID == 4046 /* Taekwon */ && cur_baselvl >= 90)
		val *= 3;	// eA: Triple max HP for top ranking Taekwons over level 90.
	
	// eA: Supernovice lvl99 hp bonus.
	if(JOB_ID == 23 /* super novice, no super baby? */ && cur_baselvl >= 99)
		val += 2000; 

	// eA: +1% per each point of VIT
	val += Math.floor(val * cur_vit / 100); 

	// eA: Trans classes get a 25% hp bonus
	if (JOB_ID >= JOB_ID_MIN_TRANS && JOB_ID <= JOB_ID_MAX_TRANS)
		val += Math.floor(val * 25 / 100); 
		
	if (IS_BABY)
		val -= Math.floor(val * 30/100); // eA: Baby classes get a 30% hp penalty

	if(MAX_HP_CAP != 0 && val > MAX_HP_CAP)	// cap by user
		val = MAX_HP_CAP;

	// faith inc 200hp per lvl
	if(document.getElementById('cs_faith_lv')){
		faith_ = document.getElementById('cs_faith_lv');
		faith_lv =parseInt(faith_.options[faith_.selectedIndex].value);
		val += faith_lv * 200;
	}
	max_hp = Math.floor(val);		// eA has val as integer
	document.getElementById('disp_max_hp').innerHTML = max_hp;

	// natural hp regen
	base_hp_regen = 1 + Math.floor(cur_vit / 5) + Math.floor(max_hp / 200);
	document.getElementById('disp_hp_regen').innerHTML = base_hp_regen + " <small>per 6s standing (per 3s sitting)</small>";
}

// calc max sp and natural sp regen
function status_max_sp(){

	val = Math.floor( 10 + parseInt(cur_baselvl) *  parseInt(job_coe[SP_COE_INDEX]) / 100 );
	val += Math.floor(val * cur_int / 100);

	// eA: Trans classes get a 25% sp bonus
	if (JOB_ID >= JOB_ID_MIN_TRANS && JOB_ID <= JOB_ID_MAX_TRANS)
		val += Math.floor(val * 25 / 100); 

	if (IS_BABY)
		val -= Math.floor(val * 30/100); // eA: Baby classes get a 30% hp penalty
		
	if(IS_TK_RANKER && JOB_ID == 4046 /* Taekwon */ && cur_baselvl >= 90)
		val *= 3;	// eA: Triple max HP for top ranking Taekwons over level 90.

	// soul drain (HW), +2% max sp per level
	if(document.getElementById('hw_souldrain_lv')){
		souldrain_ = document.getElementById('hw_souldrain_lv');
		souldrain_per =parseInt(souldrain_.options[souldrain_.selectedIndex].value);
		val = val + souldrain_per * val / 100;
	}

	// Meditatio (part 1), +1% / lvl
	meditatio_per = 0
	if(document.getElementById('hp_meditatio_lv')){
		meditatio_ = document.getElementById('hp_meditatio_lv');
		meditatio_per =parseInt(meditatio_.options[meditatio_.selectedIndex].value);
		val = val + val * meditatio_per / 100;
	}
	// Soul Linker: Kaina, +30/lvl
	if(document.getElementById('sl_kaina_lv')){
		kaina_ = document.getElementById('sl_kaina_lv');
		kaina_lv = parseInt(kaina_.options[kaina_.selectedIndex].value);
		val += 30 * kaina_lv;
	}

	max_sp = Math.floor(val);	// eA has val as integer
	document.getElementById('disp_max_sp').innerHTML = Math.floor(max_sp);	// eA has val as integer that's why

	// natural sp regen
	base_sp_regen = 1 + Math.floor(cur_int / 6) + Math.floor(max_sp/100);

	// Meditatio (part 2), +3% / lvl
	;
	if(meditatio_per > 0){
		base_sp_regen += Math.floor(base_sp_regen * meditatio_per * 3 / 100);
	}

	if(cur_int >= 120)	// extra bonus ...
		base_sp_regen += ((cur_int - 120)>>1) + 4;

	document.getElementById('disp_sp_regen').innerHTML = base_sp_regen + " <small>per 8s standing (per 4s sitting)</small>";
}

//Fills in the misc data that can be calculated from the other status info
function status_calc_misc(){

	matk_min = cur_int + ( Math.floor(cur_int / 7) ) * ( Math.floor(cur_int / 7) );
	matk_max = cur_int + ( Math.floor(cur_int / 5) ) * ( Math.floor(cur_int / 5) );
	
	hit = parseInt(cur_baselvl) + parseInt(cur_dex);
	// Archer/Rogue: Vulture's Eye
	if(document.getElementById('ac_vultures_lv')){
		vultures_ = document.getElementById('ac_vultures_lv');
		vultures_bonus = parseInt(vultures_.options[vultures_.selectedIndex].value);
		hit += vultures_bonus;
	}
	// Sniper: True Sight (part 1)
	truesight_bonus = 0;
	if(document.getElementById('sp_truesight_lv')){ 
		truesight_ = document.getElementById('sp_truesight_lv');
		truesight_bonus = parseInt(truesight_.options[truesight_.selectedIndex].value);
		hit += truesight_bonus * 3;
	}
	// Smith: Weaponry Research
	if(document.getElementById('bs_wpresearch_lv')){ 
		wpres_ = document.getElementById('bs_wpresearch_lv');
		wpresearch_bonus = parseInt(wpres_.options[wpres_.selectedIndex].value);
		hit += wpresearch_bonus * 2;
	}
	// Gunslinger: increase accurary (part 1)
	if(document.getElementById('gs_inc_accuracy') &&
		document.getElementById('gs_inc_accuracy').checked == true){
		hit += 20;
	}
	// Gunslinger: Single Action
	if(document.getElementById('gs_singleaction_lv')){
		gssingle_ = document.getElementById('gs_singleaction_lv');
		gssingle_bonus = parseInt(gssingle_.options[gssingle_.selectedIndex].value) * 2;	
		hit += gssingle_bonus;
	}
	// Gunslinger: Snake's Eye
	if(document.getElementById('gs_snakeseye_lv')){
		gssnake_ = document.getElementById('gs_snakeseye_lv');
		gssnake_bonus = parseInt(gssnake_.options[gssnake_.selectedIndex].value);	
		hit += gssnake_bonus;
	}
	// Gunslinger: gs_adjustment (part 1), goes last since lowest to get to is 1
	adjust_bonus = 0;
	if(document.getElementById('gs_adjustment') &&
		document.getElementById('gs_adjustment').checked == true){
		adjust_bonus = parseInt(document.getElementById('gs_adjustment').value);
		hit -= adjust_bonus;
		if(hit < 0.0) hit = 1;
	}


	flee = parseInt(cur_baselvl) + parseInt(cur_agi);
	// wind walk bonus
	windwalk_ = document.getElementById('flee_windwalk_lv');
	flee += parseInt(windwalk_.options[windwalk_.selectedIndex].value);
	// monk: dodge
	if(document.getElementById('mo_dodge_lv')){ 
		dodge_ = document.getElementById('mo_dodge_lv');
		dodge_bonus = Math.floor(parseInt(dodge_.options[dodge_.selectedIndex].value) * 1.5);
		flee += dodge_bonus;
	}
	// thief: inc dodge
	if(document.getElementById('tf_incdodge_lv')){ 
		incdodge_ = document.getElementById('tf_incdodge_lv');
		incdodge_bonus = parseInt(incdodge_.options[incdodge_.selectedIndex].value) * 3;
		flee += incdodge_bonus;
	}
	// Star Gladiator: Comfort of the moon
	if(document.getElementById('sg_comfort_moon') &&
		document.getElementById('sg_comfort_moon').checked == true){ 
		flee += Math.floor( (parseInt(cur_baselvl) + cur_dex + cur_luk) / 10);
	}
	// Gunslinger: gs_adjustment (part 2)
	if(adjust_bonus > 0){
		flee += adjust_bonus;
	}

	def2 = cur_vit;
	// angelus bonus on vit def
	angelus_ = document.getElementById('defplus_angelus_lv');
	def2 = Math.floor(def2 * parseFloat(angelus_.options[angelus_.selectedIndex].value));
	// Star Gladiator: Comfort of the Sun
	if(document.getElementById('sg_comfort_sun') &&
		document.getElementById('sg_comfort_sun').checked == true){ 
		def2 += Math.floor( (parseInt(cur_baselvl) + cur_dex + cur_luk) / 2);
	}

	mdef2 = cur_int;	// + (status->vit>>1) ??? ignored

	critical = Math.floor( (cur_luk * 3 + 10) * 10 / 100 );
	// Sniper: True Sight (part 2)
	if(truesight_bonus > 0){ 
		critical += truesight_bonus;
	}
	// monk: fury
	if(document.getElementById('mo_fury_lv')){ 
		fury_ = document.getElementById('mo_fury_lv');
		fury_bonus = Math.floor(parseFloat(fury_.options[fury_.selectedIndex].value));
		critical += fury_bonus;
	}

	flee2 = Math.floor( (cur_luk + 10) * 10 / 100 );

	// eA don't count bonus str for weight?
	real_str = parseInt(cur_str) - parseInt(document.getElementById('str_bonus').innerHTML);

	weight =  Math.floor( (parseInt(job_coe[WEIGHT_COE_INDEX]) + real_str * 300) / 10 );
	// merchant: enlarge weight limit
	if(document.getElementById('mc_enlargeweight_lv')){ 
		enl_ = document.getElementById('mc_enlargeweight_lv');
		enl_bonus = parseInt(enl_.options[enl_.selectedIndex].value) * 200;
		weight += enl_bonus;
	}
	// star gladiator: Knowledge of the Sun, Moon and Stars
	if(document.getElementById('sg_knowledge_lv')){ 
		sgknow_ = document.getElementById('sg_knowledge_lv');
		sgknow_bonus = 1 + parseInt(sgknow_.options[sgknow_.selectedIndex].value) * 0.1;
		weight *= sgknow_bonus;
	}

	document.getElementById('disp_matk_min').innerHTML = matk_min;
	document.getElementById('disp_matk_max').innerHTML = matk_max;

	document.getElementById('disp_hit').innerHTML = hit;
	document.getElementById('disp_flee').innerHTML = flee;
	
	document.getElementById('disp_def_plus').innerHTML = def2;
	document.getElementById('disp_mdef_plus').innerHTML = mdef2;

	document.getElementById('disp_crit').innerHTML = critical;
	document.getElementById('disp_flee_plus').innerHTML = flee2;

	document.getElementById('disp_weight').innerHTML = weight;

}

// calculate status resistances
function sc_resist(){

	sc_def_stun = sc_def_poison = sc_def_silence = sc_def_bleeding = 3 + cur_vit;
	sc_def_sleep = 3 + cur_int;
	sc_def_stone = sc_def_freeze = 3 + parseInt(document.getElementById('disp_mdef').innerHTML);

	if(cur_luk > cur_baselvl){
		sc_def_curse = 100;
	}else{
		sc_def_curse = 3 + cur_luk;
	}

	sc_def_blind = 3 + Math.floor( (cur_vit + cur_int)/2 ); 
	sc_def_confusion = 3 + Math.floor( (cur_str + cur_int)/2 );

	sc_name_array = new Array('sc_stun', 'sc_poison', 'sc_silence', 'sc_bleeding', 'sc_sleep', 
		'sc_stone', 'sc_freeze', 'sc_curse', 'sc_blind', 'sc_confusion');

	sc_array = new Array(sc_def_stun, sc_def_poison, sc_def_silence, sc_def_bleeding, sc_def_sleep, 
		sc_def_stone, sc_def_freeze, sc_def_curse, sc_def_blind, sc_def_confusion);

	for(var i = 0; i < sc_array.length; i++){
		
		if(sc_array[i] > 100.0){
			document.getElementById(sc_name_array[i]).innerHTML = '100%';
		}else{
			document.getElementById(sc_name_array[i]).innerHTML = sc_array[i] + '%';
		}
	}

}


function calc_buff_stat(){

	// array of buff add on to stats
	buff_stat_array = new Array();
	buff_stat_array['str'] = buff_stat_array['agi'] = buff_stat_array['vit'] =
		buff_stat_array['int'] = buff_stat_array['dex'] = buff_stat_array['luk'] = 0;

	// blessing - add to str/dex/int
	bless_ = document.getElementById('buff_bless_lv');
	bless_bonus = parseInt(bless_.options[bless_.selectedIndex].value);
	buff_stat_array['str'] += bless_bonus;
	buff_stat_array['int'] += bless_bonus;
	buff_stat_array['dex'] += bless_bonus;

	// agi up
	agiup_ = document.getElementById('buff_agiup_lv');
	agiup_bonus = parseInt(agiup_.options[agiup_.selectedIndex].value);
	buff_stat_array['agi'] += agiup_bonus;

	// gloria
	if(document.getElementById('buff_gloria_lv').checked == true){
		gloria_bonus = parseInt(document.getElementById('buff_gloria_lv').value);
		buff_stat_array['luk'] += gloria_bonus;
	}
	
	// Sage: Dragonology
	if(document.getElementById('sg_dragon_lv')){
		dragon_ = document.getElementById('sg_dragon_lv');
		dragon_bonus = parseInt(dragon_.options[dragon_.selectedIndex].value);
		buff_stat_array['int'] += dragon_bonus;
	}

	// Archer: Owl's Eye
	if(document.getElementById('ac_owlseye_lv')){
		owlseye_ = document.getElementById('ac_owlseye_lv');
		owlseye_bonus = parseInt(owlseye_.options[owlseye_.selectedIndex].value);
		buff_stat_array['dex'] += owlseye_bonus;
	}

	// Archer: Improve Concentration [GOES LAST, multiple all base/job/armor/owl's eye agi&dex by 2+sk_lvl%]
	if(document.getElementById('ac_improvecon_lv')){
		improvecon_ = document.getElementById('ac_improvecon_lv');
		improvecon_per = parseInt(improvecon_.options[improvecon_.selectedIndex].value);
	
		// (base stat + job bonus + owl's eyes bonus) * (2 + skil_lvl) / 100
		buff_stat_array['agi'] += Math.floor( ( parseInt
			(document.getElementById('agi_sel').value) + base_stat_bonus[2] + buff_stat_array['agi'] ) 
			* improvecon_per / 100 );
		
		buff_stat_array['dex'] += Math.floor( ( parseInt
			(document.getElementById('dex_sel').value) + base_stat_bonus[5] + buff_stat_array['dex'] ) 
			* improvecon_per / 100 );
	}

	// Sniper: True Sight (part 3)
	if(document.getElementById('sp_truesight_lv')){ 
		truesight_ = document.getElementById('sp_truesight_lv');
		
		if(parseInt(truesight_.options[truesight_.selectedIndex].value) > 0){	// all stats +5 @ any lvl
			buff_stat_array['str'] +=5;	buff_stat_array['agi'] +=5; buff_stat_array['vit'] +=5; 
			buff_stat_array['int'] +=5;	buff_stat_array['dex'] +=5;	buff_stat_array['luk'] +=5;
		}
	}

	// Smith: Hilt Binding (part 1)
	if(document.getElementById('bs_hiltbinding') &&
		document.getElementById('bs_hiltbinding').checked == true){ 
		buff_stat_array['str'] += 1; 
	}

	// Gunslinger: increase accurary (part 2 & 3)
	if(document.getElementById('gs_inc_accuracy') &&
		document.getElementById('gs_inc_accuracy').checked == true){
		buff_stat_array['agi'] +=4;	
		buff_stat_array['dex'] +=4;
	}

	// Ninja: Soul
	if(document.getElementById('nj_soul_lv')){ 
		njsoul_ = document.getElementById('nj_soul_lv');
		njsoul_bonus = parseInt(njsoul_.options[njsoul_.selectedIndex].value);
		buff_stat_array['str'] += njsoul_bonus;	
		buff_stat_array['int'] += njsoul_bonus;
	}
	
	// results
	document.getElementById('str_bonus').innerHTML = base_stat_bonus[1] + buff_stat_array['str'];
	document.getElementById('agi_bonus').innerHTML = base_stat_bonus[2] + buff_stat_array['agi'];
	document.getElementById('vit_bonus').innerHTML = base_stat_bonus[3] + buff_stat_array['vit'];
	document.getElementById('int_bonus').innerHTML = base_stat_bonus[4] + buff_stat_array['int'];
	document.getElementById('dex_bonus').innerHTML = base_stat_bonus[5] + buff_stat_array['dex'];
	document.getElementById('luk_bonus').innerHTML = base_stat_bonus[6] + buff_stat_array['luk'];
	
}


// class subfunction for each class according to their skills
function class_control(){

	// swordsman branch
	if(JOB_ID == 1 || JOB_ID == 7 || JOB_ID == 14 || JOB_ID == 4008 || JOB_ID == 4015){

		sw_hp_recovery();
		
		if(JOB_ID == 7 || JOB_ID == 4008){	// knight / LK
			ONE_HAND_SW = 2;	
			TWO_HAND_SW = 3;
			weapon_type_check('kn_quicken', new Array (ONE_HAND_SW, TWO_HAND_SW));	// 1 or 2-hq
		}

		if(JOB_ID == 14 || JOB_ID == 4015){
			arr = new Array();
			TWO_HAND_SP = arr[0] = 5;
			weapon_type_check('cs_quicken', arr);	// 2h-spear quicken
			heal_calc("heal", 10);
		}

		if(JOB_ID == 4015){
			pal_sacrifice();
		}
		return;	// exit swordsman branch
	
	// mage branch
	}else if(JOB_ID == 2 || JOB_ID == 9 || JOB_ID == 16 || JOB_ID == 4010 || JOB_ID == 4017){

		mg_sp_recovery();
		
		if(JOB_ID == 4017){
			pf_health_conversion();
		}
		return; // exit mage branch
	
	// archer branch
	}else if(JOB_ID == 3 || JOB_ID == 11 || JOB_ID == 19 || JOB_ID == 20 || JOB_ID == 4012 
		|| JOB_ID == 4020 || JOB_ID == 4021){

		if(JOB_ID == 11 || JOB_ID == 4012){
			ht_falcon_skills();	// blitz beat & falcon assult included
		}
		return; // exit archer branch

	// acolyte branch
	}else if(JOB_ID == 4 || JOB_ID == 8 || JOB_ID == 15 || JOB_ID == 4009 || JOB_ID == 4016){

		heal_calc("heal", 10);

		if(JOB_ID == 8 || JOB_ID == 4009){
			mg_sp_recovery();
			pt_turn_undead();
		}

		if(JOB_ID == 15 || JOB_ID == 4016){
			mo_spirit_recovery();
			mo_asura_strike();
		}
		return;

	// merchant branch
	}else if(JOB_ID == 5 || JOB_ID == 10 || JOB_ID == 18 || JOB_ID == 4011 || JOB_ID == 4019){
	
		if(JOB_ID == 10 || JOB_ID == 4011){
			ONE_HAND_AXE = 6;	TWO_HAND_AXE = 7;
			ONE_HAND_MACE = 8;	TWO_HAND_MACE = 9;
			weapon_type_check('bs_adrenaline_rush', 
				new Array (ONE_HAND_AXE, TWO_HAND_AXE, ONE_HAND_MACE, TWO_HAND_MACE));
		}

		if(JOB_ID == 4019){
			cr_acid_demonstration();
		}
		return;
	
	// super novice
	}else if(JOB_ID == 23){

		sw_hp_recovery();
		mg_sp_recovery();
		heal_calc("heal", 10);

	// gunslinger
	}else if(JOB_ID == 24){
		Revolver = 17;	Rifle = 18;				Gatling_Gun = 19;
		Shotgun = 20;	Grenade_Launcher = 21;
		
		weapon_type_select_check('gs_singleaction_lv', 
				new Array (Revolver, Rifle, Gatling_Gun, Shotgun, Grenade_Launcher));

		weapon_type_select_check('gs_snakeseye_lv', 
				new Array (Revolver, Rifle, Gatling_Gun, Shotgun, Grenade_Launcher));
	
	// ninja
	}else if(JOB_ID == 25){
		mg_sp_recovery();
	}


}

// control checkbox status depending weapon type used 
function weapon_type_check(check_box, weapon_id_arr){
	
	w_ = document.getElementById('aspd_sel');
	w_type = parseInt(w_.options[w_.selectedIndex].value);

	for(i = 0; i < weapon_id_arr.length; i++){
		if(w_type == weapon_id_arr[i]){	// only enable checkbox when the weapon type is correct
			document.getElementById(check_box).disable = '';
			return;	// only one has to match
		}
	}
	// not using the correct weapon
	document.getElementById(check_box).checked = '';
	document.getElementById(check_box).disable = 'disabled';
	
	// recalc aspd
	calc_aspd();
}

// control drop down menu status depending weapon type used 
function weapon_type_select_check(select_menu, weapon_id_arr){
	
	w_ = document.getElementById('aspd_sel');
	w_type = parseInt(w_.options[w_.selectedIndex].value);

	for(i = 0; i < weapon_id_arr.length; i++){
		if(w_type == weapon_id_arr[i]){	// only enable menu when the weapon type is correct
			document.getElementById(select_menu).disabled = '';
			return;	// only one has to match
		}
	}
	// not using the correct weapon
	document.getElementById(select_menu).options[0].selected = 1;
	document.getElementById(select_menu).disabled = 'disabled';
	
	// recalc aspd
	calc_aspd();
}

function sw_hp_recovery(){

	max_hp = parseInt(document.getElementById('disp_max_hp').innerHTML);

	for(skill_lv = 1; skill_lv <= 10; skill_lv++){
		regen = Math.floor(skill_lv * 5 + skill_lv * max_hp * 0.002);
		document.getElementById('hp_regen_' + skill_lv).innerHTML = regen;
	}
}

// both mage and ninja uses this
function mg_sp_recovery(){

	max_sp = parseInt(document.getElementById('disp_max_sp').innerHTML);

	for(skill_lv = 1; skill_lv <= 10; skill_lv++){
		regen = Math.floor(skill_lv * 3 + skill_lv * max_sp * 0.002);
		document.getElementById('sp_regen_' + skill_lv).innerHTML = regen;
	}

}

function heal_calc(id_label, max_lvl){

	// Meditatio (part 3),  +2% / lvl heal += heal * meditatio_lv * 2 / 100;
	meditatio_per = 0;
	if(document.getElementById('hp_meditatio_lv')){
		meditatio_ = document.getElementById('hp_meditatio_lv');
		meditatio_per = parseInt(meditatio_.options[meditatio_.selectedIndex].value) * 2;
	}

	for(skill_lv = 1; skill_lv <= max_lvl; skill_lv++){
		heal = Math.floor( ( parseInt(cur_baselvl) + parseInt(cur_int) ) / 8 ) * ( 4 + parseInt(skill_lv) * 8);
		heal += Math.floor(heal * meditatio_per / 100);
		document.getElementById(id_label + "_" + skill_lv).innerHTML = heal;
	}
}

function pal_sacrifice(){

	max_hp = document.getElementById('disp_max_hp').innerHTML;

	self_penalty = Math.floor(max_hp * 9/100);
	document.getElementById('pal_sac_self').innerHTML = self_penalty;

	for(i = 0; i <= 4; i++){	// 100%, 110%, 120%, 130%, 140%
		damage = self_penalty + Math.floor( self_penalty * i / 10 );
		document.getElementById('pal_sac_' + i).innerHTML = damage;
	}
}

function pf_health_conversion(){

	max_hp = document.getElementById('disp_max_hp').innerHTML;

	self_penalty = Math.floor(max_hp * 10/100);
	document.getElementById('pf_hpconv_self').innerHTML = self_penalty;

	for(i = 1; i <= 5; i++){	// 10%, 20%, 30%, 40%, 50%
		damage = Math.floor( self_penalty * i / 10 );
		document.getElementById('pf_hpconv_' + i).innerHTML = damage;
	}
}

// shows damage for blitz beat & falcon assult (since they damage are related)
function ht_falcon_skills(){
	
	steelcrow_ = document.getElementById('ht_steelcrow_lv');
	steelcrow_lv = parseInt(steelcrow_.options[steelcrow_.selectedIndex].value);

	blitz_damage = ( Math.floor(cur_dex / 10) + Math.floor(cur_int / 2) + (steelcrow_lv * 3) + 40 ) * 2;

	for(i = 1; i <= 5; i++){	// # of hits
		document.getElementById('ht_blitz_' + i).innerHTML = blitz_damage * i;
	}

	// falcon auto chance
	document.getElementById('ht_falcon_chance').innerHTML = (cur_luk / 3 + 1).toFixed(2) + "%";
	// falcon auto number of hits
	falcon_hits = Math.floor( (parseInt(cur_joblvl) + 9) / 10 )
	
	if(falcon_hits > 5) falcon_hits = 5;
	document.getElementById('ht_falcon_hits').innerHTML = falcon_hits;
	
	if(JOB_ID == 4012){ // sniper
		for(i = 1; i <= 5; i++){
			document.getElementById('sp_falconassault_' + i).innerHTML = 
				Math.floor( (blitz_damage * 5) * (150 + 70 * i) / 100);
		}
	}
}

// 10 tries of a turn undead
function pt_turn_undead(){

	tu_ = document.getElementById('pr_turnundead_lv');
	tu_lv = parseInt(tu_.options[tu_.selectedIndex].value);
	
	mob_i_ = document.getElementById('pr_tu_mob');
	mob_i = mob_i_.options[mob_i_.selectedIndex].value;

	// get mob hp & element # 
	base_mob_hp = cur_mob_hp = mob_i.substr(0, mob_i.indexOf("#"));
	holy_num = mob_i.substr(mob_i.indexOf("#") + 1);
	holy_modifier = 1;

	// diff lvl of holy give diff holy vs undead percent damage boost
	if(holy_num == 1){	
		holy_modifier = 1.5;
	}else if(holy_num == 2){	
		holy_modifier = 1.75;
	}else{ 
		holy_modifier = 2;
	}
	
	damage = Math.floor((parseInt(cur_baselvl) + parseInt(cur_int) + parseInt(tu_lv * 10)) * holy_modifier);

	for(i = 1; i <= 10; i++){

		success = (20 * tu_lv + cur_luk + cur_int + parseInt(cur_baselvl) + 200 
			- 200 * parseInt(cur_mob_hp) / parseInt(base_mob_hp) ) / 10;
		
		tries = i;
		last_cur_mob_hp = cur_mob_hp;
		cur_mob_hp -= parseInt(damage);

		if(success > 70){	// max allowed
			success = 70;
		}

		document.getElementById('pr_tu_try_' + i).innerHTML = tries;
		document.getElementById('pr_tu_mobhp_' + i).innerHTML = last_cur_mob_hp;
		document.getElementById('pr_tu_success_' + i).innerHTML = success.toFixed(1) + "%";
		document.getElementById('pr_tu_damage_' + i).innerHTML = damage;
	}
	
}

function mo_spirit_recovery(){

	max_hp = document.getElementById('disp_max_hp').innerHTML;
	max_sp = document.getElementById('disp_max_sp').innerHTML;

	for(i = 1; i <= 5; i++){
		regen_hp = Math.floor(i * 4 + i * max_hp / 500);
		regen_sp = Math.floor(i * 2 + i * max_sp / 500);
		document.getElementById('mo_recovery_' + i).innerHTML = regen_hp + " & " + regen_sp;
	}
}

function mo_asura_strike(){

	weapon_atk = parseInt(document.getElementById('mo_watk').value);
	addon_sp = parseInt(document.getElementById('mo_addon_sp').value);
	
	// ie 100 + 20 = 120 / 100 = 1.2
	damage_mod_plus = (100 + parseFloat(document.getElementById('mo_damage_mod_plus').value)) / 100;
	// ie 100 - 30 => 70 / 100 = 0.7
	damage_mod_minus = (100 - parseFloat(document.getElementById('mo_damage_mod_minus').value)) / 100;

	base_sp = parseInt(document.getElementById('disp_max_sp').innerHTML);
	base_atk = parseInt(document.getElementById('disp_atk').innerHTML);

	gvg_ = document.getElementById('mo_asura_gvg');
	gvgon = parseInt(gvg_.options[gvg_.selectedIndex].value);

	for(i = 1; i <= 5; i++){	// ceil cuz eA * 100
		damage = Math.floor( (base_atk + weapon_atk) * (8 + Math.ceil( (base_sp + addon_sp) / 10) ) 
			+ (250 + i * 150) );

		// damage modification
		damage = Math.floor(damage * damage_mod_plus * damage_mod_minus);

		// gvg reduction, 60% damage in gvg for weapon atk
		if(gvgon == 1)
			damage = Math.floor(damage * 0.6);

		document.getElementById('mo_asura_' + i).innerHTML = damage;
	}
}

function cr_acid_demonstration(){

	target_vit = parseInt(document.getElementById('cr_aciddemo_tvit').value);
	
	// ie 100 - 30 => 70 / 100 = 0.7
	damage_mod_minus = (100 - parseFloat(document.getElementById('cr_damage_mod_minus').value)) / 100;

	mode_ = document.getElementById('cr_aciddemo_mode');
	mode_sel = parseInt(mode_.options[mode_.selectedIndex].value);

	base_damage = Math.floor( (7 * target_vit * cur_int * cur_int) / (10 * (target_vit + cur_int)) );

	// 100% PvM, 50% PvP, 50% * 60% GvG
	if(mode_sel == 1 || mode_sel == 2)	// vs Human -50%
		base_damage = Math.floor(base_damage * 0.5);

	// damage modification
	//base_damage = Math.floor(base_damage * );

	for(i = 1; i <= 10; i++){
		if(mode_sel == 2)	// GvG additional -60%
			damage = Math.floor(base_damage * damage_mod_minus * 0.6 * i);
		else
			damage = Math.floor(base_damage * damage_mod_minus * i);

		document.getElementById('cr_aciddemo_' + i).innerHTML = damage;
	}

}

/*
battle.c
	case CR_ACIDDEMONSTRATION: // updated the formula based on a Japanese formula found to be exact [Reddozen]
		if(tstatus->vit+sstatus->int_) //crash fix
			md.damage = 7*tstatus->vit*sstatus->int_*sstatus->int_ / (10*(tstatus->vit+sstatus->int_));
		else
			md.damage = 0;
		if (tsd) md.damage>>=1;
		if (md.damage < 0 || md.damage > INT_MAX>>1)
	  	//Overflow prevention, will anyone whine if I cap it to a few billion?
		//Not capped to INT_MAX to give some room for further damage increase.
			md.damage = INT_MAX>>1;
		break;
*/
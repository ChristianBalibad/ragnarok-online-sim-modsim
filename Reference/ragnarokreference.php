<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>


	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-25VQYCGE3Q"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-25VQYCGE3Q');
	</script>
	
<title>Ragnarok Online - Character Stat Calculator</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="This page will tell you your character's stats in Ragnarok Online at different point in time.  By entering your desired stats.  It will tell you your attack, defend, magic attack magic defend, hit, flee, critical rate and a lot more." />
<meta name="keywords" content="ro, ragnarok, stat calc, ro stat calculator, Ragnarok Online Stat Simulator, asura, acid demo, asura strike calc, acid demonstration calc, job level, base level, str, vit, agi, int, dex luk, attack, defend, magic, hit, flee, critical rate, atk, matk, stat point, damage, skill, weight, pvp, woe, buff" />
<meta name="viewport" content="width=device-width">
<meta name="copyright" content="RateMyServer.Net 2005-2026">
<meta name="author" content="HY C.">
<link rel='stylesheet' type='text/css' href='https://ratemyserver.net/ratemyserver.css?new=2023-09-24d'>
<link rel='stylesheet' type='text/css' href='https://ratemyserver.net/ratemyserver_mobile_new.css?new=2024-08-29af'>
<!-- no flyout menu -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="favicon.ico">

<link rel='canonical' href='https://ratemyserver.net/stat_sim.php' />
	<script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
	<script>
	  var googletag = googletag || {};
	  googletag.cmd = googletag.cmd || [];
	</script>
	<script>
	  googletag.cmd.push(function() {
		googletag.defineSlot('/1024493/RMS-728x90-Main', [728, 90], 'div-gpt-ad-1535829750929-0').addService(googletag.pubads());
		googletag.defineSlot('/1024493/RMS-728x90', [728, 90], 'div-gpt-ad-1535830186786-0').addService(googletag.pubads());
		googletag.defineSlot('/1024493/RMS-468x60', [468, 60], 'div-gpt-ad-1535831787419-0').addService(googletag.pubads());
		googletag.defineSlot('/1024493/RMS-468x60-d2edff', [468, 60], 'div-gpt-ad-1535831908816-0').addService(googletag.pubads());
		googletag.defineSlot('/1024493/RMS-300x250-NewAdUnit', [300, 250], 'div-gpt-ad-1535831971302-0').addService(googletag.pubads());
		googletag.defineSlot('/1024493/RMS-300x250-d2edff', [300, 250], 'div-gpt-ad-1535832163246-0').addService(googletag.pubads());
		googletag.enableServices();
	  });
	</script>
	
</head>
<body class = "index">
<SCRIPT LANGUAGE="JavaScript" SRC="https://ratemyserver.net/ratemyserver.js?d=20230921i" > </SCRIPT>
<noscript>Your browser does not support script</noscript>
<!-- meta name="viewport" content="width=device-width, initial-scale=0.7" -->

<div id="top_navbar">
	<div class="top_navbar_container"> 
		<a href="index.php"><i class="fa fa-home fa-lg" style="font-size: 1.6em;"></i></a>
		<div class="top_dropdown">
			<button class="top_dropbtn"  onClick="ini_menu()"><i class="fa fa-user-circle-o fa-lg"></i>
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="top_dropdown-content">
				<a href='https://ratemyserver.net/index.php?page=login' class='link'>Login</a>
		<a href='https://ratemyserver.net/index.php?page=registration' class='link'>Register</a>
		<a href='https://ratemyserver.net/forgetpass.php' class='link'>Lost Password?</a>			</div>
		</div>
		<div class="top_dropdown">
			<button class="top_dropbtn"  onClick="ini_menu()">Servers
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="top_dropdown-content">
				<div id='top_dropdown_server'>
					<div><a href="index.php?page=listserver&rate=low&order_type=default_high" class='db'>Low Rate</a></div>
					<div><a href="index.php?page=more_latest_review"  class='db'>Latest Reviews</a></div>
					
					<div><a href="index.php?page=listserver&rate=mid&order_type=default_high" class='db'>Mid Rate</a></div>
					<div><a href="index.php?page=listserver&s_cat=-1&rate=all&order_type=date_New"  class='db'>New Servers</a></div>
					
					<div><a href="index.php?page=listserver&rate=high&order_type=default_high" class='db'>High Rate</a></div>
					<div><a href="index.php?page=listserver&rate=all&order_type=default_high" class='db'>All Servers</a></div>
					
					<div><a href="index.php?page=listserver&rate=superhigh&order_type=default_high" class='db'>Super High Rate</a></div>
					<div><a href="index.php?page=serversearch" class='db'>Search</a></div>
				</div>
			</div>
		</div>
		<div class="top_dropdown">
			<button class="top_dropbtn" onClick="ini_menu()">Databases 
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="top_dropdown-content" style='margin-left: -155px;'>
				<div id='top_dropdown_db'>
					<div class='db' style='border-left: 1px solid #ccc;'>Items</div>
						<div><a href="index.php?page=item_db" class='db'>Pre-Re</a></div>
						<div><a href="index.php?page=re_item_db" class='db'>Renewal</a></div>
						<div class='top_dropdown_db_bigcell vcenter' style='background-color:#ddd'>
							<!--input type='text' class='rms_input' name='iname' placeholder='Item Search..' maxlength=30 style='width: 80px;'-->
						</div>
						
					<div class='db' style='border-left: 1px solid #ccc;'>Monsters</div>
						<div><a href="index.php?page=mob_db" class='db'>Pre-Re</a></div>
						<div><a href="index.php?page=re_mob_db" class='db'>Renewal</a></div>
						<div class='top_dropdown_db_bigcell vcenter' style='background-color:#ddd'>
							<!--input type='text' class='rms_input' name='mob_name' placeholder='Monster Search..' maxlength=30 style='width: 80px;'-->
						</div>
						
					<div class='db' style='border-left: 1px solid #ccc;'>World</div>
						<div><a href="index.php?page=map_db" class='db'>Maps</a></div>
						<div><a href="index.php?page=nsw_npc_search" class='db'>NPCs</a></div>
						<div><a href="index.php?page=nsw_shop_search" class='db'>Shops</a></div>
						<div style='background-color:#ddd'></div>
						
					<div class='db' style='border-left: 1px solid #ccc;'>Character</div> 
						<div><a href="index.php?page=skill_db_class" class='db'>Skills</a></div>
						<div><a href="skill_sim.php" class='db' style='white-space: nowrap;'>Skill Sim</a></div>
						<div><a href="index.php?page=misc_db_list" class='db'>Tables</a></div>
						<div><a href="https://ro-character-simulator.ratemyserver.net/" class='db' style='white-space: nowrap;'>Char Sim</a></div>
					<div class='db' style='border-left: 1px solid #ccc;'></div>
						<div><a href="quest_db.php" class='db'>Quests</a></div>
						<div><a href="index.php?page=creation_db" class='db'>Creation</a></div>
						<div class='top_dropdown_db_bigcell'><a href="calc_main.php" class='db'>Calculators</a></div>
					</div>
			</div>
		</div>
		<div class="top_dropdown" style="float: right;">
			<button class="top_dropbtn" onClick="ini_menu()" style="font-size: 1em"><i class="fa fa-comments fa-lg" style="color: #fff"></i></button>
			<div class="top_dropdown-content" style="position: absolute; right: 0;">
				<a href="https://forum.ratemyserver.net/" target='_blank' class='link'>Forum</a>
				<a href="https://discord.gg/SbwzrFF" target='_blank' class='link'>Discord</a>
				<a href="privacy_policy.php#pp_contact" class='link'>Contact Us</a>
				<a href="advertise.php"  class='link'>Advertise</a>
			</div>
		</div>
	</div>
</div>

<SCRIPT LANGUAGE='JavaScript'>

var first = true; // do nothing on first click

function ini_menu(){

	ele_arr = document.getElementsByClassName("top_dropdown-content");

	for (var i=0; i < ele_arr.length; i++){
		 
		 if(ele_arr[i].style.display == '' && !first){
			ele_arr[i].style.display = 'none';
		 }else{
			ele_arr[i].style.display = '';
		 }
	}
	first = false;

}


</script>
<div class="wrapper">

	<div id="LR_container">
		<div id="L1_container"></div>
		<div id="R1_container"><a href='https://arkangelrosea.com/' target='_blank' rel='nofollow'><img src='https://ratemyserver.net/banner/arkangelro_R1-2026-02a.gif' class='slot_LR1_img'></a></div>
	</div>

	<a href='https://ratemyserver.net'><div class="logo"></div></a>

<div class="srchbar">
	<div id="srchbar-link">
		<ul>
			<li> &nbsp;&nbsp;&nbsp;  <a href = 'https://ratemyserver.net' class='indexA' style="margin: 0px 5px;">Home</a></li>
			<li><a href = 'https://ratemyserver.net/index.php?page=registration' title = 'join to review servers or add your server to our listings' class='indexA' style='margin: 0px 5px;'>Join Now</a>		
			</li>
			<li><a href = "http://forum.ratemyserver.net/" target = '_blank' title = 'visit our forums' class='indexA' style='margin: 0px 5px;'>Forum</a></li>
		</ul>
	</div>
	<div id="srchbar-srch">
				<SCRIPT LANGUAGE="JavaScript">
			qsb_index_url = "index.php?page=";
	
			qsb_item_page = "item_db";
			qsb_mob_page = "mob_db";

			qsb_re_item_page = "re_item_db";
			qsb_re_mob_page = "re_mob_db";
		
			qsb_btn_class = "srchbar-btn";
			qsb_re_btn_class = "srchbar-btn_re";

			function qsb_chg_srch(obj){
				if(obj.checked){	// checking
					document.getElementById("qsb_srch_btn_item").className = qsb_re_btn_class;
					document.getElementById("qsb_srch_link_item").href = qsb_index_url + qsb_re_item_page;
					document.getElementById("qsb_srch_form_item").action = qsb_index_url + qsb_re_item_page;
					document.getElementById("sqb_srch_page_item").value = qsb_re_item_page;

					document.getElementById("qsb_srch_btn_mob").className = qsb_re_btn_class;
					document.getElementById("qsb_srch_link_mob").href = qsb_index_url + qsb_re_mob_page;
					document.getElementById("qsb_srch_form_mob").action = qsb_index_url + qsb_re_mob_page;
					document.getElementById("sqb_srch_page_mob").value = qsb_re_mob_page;
				}else{	// unchecking
					document.getElementById("qsb_srch_btn_item").className = qsb_btn_class;
					document.getElementById("qsb_srch_link_item").href = qsb_index_url + qsb_item_page;
					document.getElementById("qsb_srch_form_item").action = qsb_index_url + qsb_item_page;
					document.getElementById("sqb_srch_page_item").value = qsb_item_page;

					document.getElementById("qsb_srch_btn_mob").className = qsb_btn_class;
					document.getElementById("qsb_srch_link_mob").href = qsb_index_url + qsb_mob_page;
					document.getElementById("qsb_srch_form_mob").action = qsb_index_url + qsb_mob_page;
					document.getElementById("sqb_srch_page_mob").value = qsb_mob_page;
				}
				return true;
			}
		</SCRIPT>

		<div id="srchbar-opt">
					<span style="line-height: 26px;">Renewal <input type='checkbox' name='qs_page' value='0' style="vertical-align: -2px"  Onclick="return qsb_chg_srch(this);"></span>
				</div>
				<div id="qsb_srch_btn_item" class="srchbar-btn">
					<span style="line-height: 26px;"><a href="index.php?page=item_db" id="qsb_srch_link_item" class="whnbu" title="advanced item search">Item</a></span>
				</div>
				<div id="qsb_srch_box_item">
					<form name='isearch_form' method='GET' action="index.php?page=item_db"  id="qsb_srch_form_item" style= "margin: 0px; padding: 0px;">
					<input class = 'bartxtbox' type='text' name='iname' maxlength='30' style="width: 95px">
					<input type = 'hidden' id="sqb_srch_page_item" name = 'page' value = 'item_db'> 
					<input type = 'hidden' name = 'quick' value = '1'> 
					<input type = 'hidden' name = 'isearch' value = 'Search'> 
					</form>
				</div>
				
				<div id="qsb_srch_btn_mob" class="srchbar-btn">
					<span style="line-height: 26px;"><a href = "index.php?page=mob_db" id="qsb_srch_link_mob" class="whnbu" title="advanced mob search">Monster</a></span>
				</div>
				<div id="qsb_srch_box_mob">
					<form name='mob_search_form' method='GET' action="index.php?page=mob_db" id="qsb_srch_form_mob" style= "margin: 0px; padding: 0px;">
						<input class = 'bartxtbox' type='text' name='mob_name' maxlength='30' style="width: 95px">
						<input type = 'hidden' id="sqb_srch_page_mob" name = 'page' value = 'mob_db'>
						<input type = 'hidden' name = 'quick' value = '1'> 
						<input type = 'hidden' name = 'f' value = '1'>
						<input type = 'hidden' name = 'mob_search' value = 'Search'>
					</form>
				</div>
				
				<div id="qsb_srch_skill">
					<div class="srchbar-btn" style="position:absolute; left:745px; top:13px;">
						<span style="line-height: 26px;"><a href = "index.php?page=skill_db_class" class="whnbu"  title="list skill by class">Skill</a></span>
					</div>
					<div style="position:absolute; left:825px; top:13px;">
						<form name='sk_search_form' method='GET' action="index.php?page=skill_db" style= "margin: 0px; padding: 0px;">
							<input class = 'bartxtbox' type='text' name='sk_name' maxlength='30' size = 15 style='margin:0;'>
							<input type = 'hidden' name = 'page' value = 'skill_db'>
							<input type = 'hidden' name = 'sk_search' value = 'Search'>
						</form>
					</div>
				</div>
			</div>
		</div>

<div class="contentwrap">
	<div class="content-div-full">

	<div class='main_block'>
		<div class='box_title'>.:Ragnarok Stat Calculator:.</div>

		<div style="text-align: center; margin: 10px;">
			<a href = 'index.php?page=item_db' class="sb_m" title = 'Browse Ragnarok item database'>Item</a> |
			<a href = 'index.php?page=re_item_db' class="sb_m" title = 'Browse RO renewal item database'>Renewal Item</a> |
			<a href = 'index.php?page=mob_db' class="sb_m" title = 'Browse Ragnarok monster database'>Monster</a> |
			<a href = 'index.php?page=re_mob_db' class="sb_m" title = 'Browse RO renewal monster database'>Renewal Monster</a> |
			<a href = 'index.php?page=skill_db_class' class="sb_m" title = 'Browse skill database'>Character Skills</a> |
			<a href = 'index.php?page=map_db' class="sb_m" title = 'Browse map database'>Map & World</a> |
			<a href = 'quest_db.php' class="sb_m" title = 'Browse ro quest database'>Quests</a>
			<br><br>
			<a href='set_rates.php' target = '_blank' title = 'Change item, monster and drop rate display' class="sb_m" onclick="return popWin('set_rates.php', 'Rate_Settings', rate_dim)">Rate Settings</a> | 
			<a href='settings_image.php' target = '_blank'  title = 'Change the graphical display settings on ratemyserver.net' class="sb_m" onclick="return popWin('settings_image.php', 'Graphical_Settings', rate_dim)">Graphic Settings</a>
		</div>
		<br>
<link rel="stylesheet" type="text/css" href="niftc.css">
<link rel="stylesheet" type="text/css" href="niftp.css" media="print">
<script type="text/javascript" src="nift.js"></script>

<SCRIPT LANGUAGE="JavaScript" SRC="stat_sim.js" > </SCRIPT>
<SCRIPT LANGUAGE="JavaScript" SRC="stat_sim_class.js" > </SCRIPT>

<SCRIPT LANGUAGE="JavaScript">

window.onload=function(){
	if(!NiftyCheck()) return;
	Rounded("div#jobinfo","#94C4EC","#D2EDFF");
	Rounded("div#buffinfo","#94C4EC","#D2EDFF");
	Rounded("div#statinfo","#94C4EC","#D2EDFF");
	Rounded("div#skillinfo","#94C4EC","#D2EDFF");
}

function check_option(sel_obj){
	// show checkbox for these job id for baby option
	var job_with_baby = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 14, 15, 16, 17, 18, 19, 20, 23);
	var TK_JOB_ID = 4046;	// ranker

	job = sel_obj.options[sel_obj.selectedIndex].value;

	baby_checkbox = document.getElementById("isBaby");
	ranker_checkbox = document.getElementById("isRanker");

	if(in_array(job, job_with_baby) >= 0){
		baby_checkbox.disabled = '';
	}else{
		baby_checkbox.checked = '';
		baby_checkbox.disabled = 'disabled';
	}

	if(job == TK_JOB_ID){
		ranker_checkbox.disabled = '';
	}else{
		ranker_checkbox.checked = '';
		ranker_checkbox.disabled = 'disabled';
	}
}

 //  ex: in_array('v', ['K', 'v', 'Z']); 
 // return index if found, otherwise returns -1
function in_array(findme, arr){
 
	if (arr == null || arr.length <= 0){
		return -1;
	}
    for(i = 0; i < arr.length; i++){
		if(arr[i] == findme){
			return i;
		}
	}
	return -1;
}
</SCRIPT>


<div  style='margin: 10px; width: 96%'> &laquo; <a href='calc_main.php' class='gen_m'>Select another Calculator</a></div>

<!-- div style='margin: 10px auto'>
</div -->

<div id='main_stat' style='margin: 10px auto; width: 90%; color: #00568a;'>

<form name='stat_sim' method='get' action='stat_sim.php'>
<table class='btext_m'>
	<tr>
		<td>
			Select Job: 
			<select id='jid' name='jid' onChange='check_option(this)'>
				<option value = '#'>-- Select Class --</option>
			<option value='0' selected='selected'>Novice</option><option value='1'>Swordman</option><option value='2'>Magician</option><option value='3'>Archer</option><option value='4'>Acolyte</option><option value='5'>Merchant</option><option value='6'>Thief</option><option value='7'>Knight</option><option value='8'>Priest</option><option value='9'>Wizard</option><option value='10'>Blacksmith</option><option value='11'>Hunter</option><option value='12'>Assassin</option><option value='14'>Crusader</option><option value='15'>Monk</option><option value='16'>Sage</option><option value='17'>Rogue</option><option value='18'>Alchemist</option><option value='19'>Bard</option><option value='20'>Dancer</option><option value='23'>Super Novice</option><option value='24'>Gunslinger</option><option value='25'>Ninja</option><option value='4008'>Lord Knight</option><option value='4009'>High Priest</option><option value='4010'>High Wizard</option><option value='4011'>Whitesmith</option><option value='4012'>Sniper</option><option value='4013'>Assassin Cross</option><option value='4015'>Paladin</option><option value='4016'>Champion</option><option value='4017'>Professor</option><option value='4018'>Stalker</option><option value='4019'>Creator</option><option value='4020'>Clown</option><option value='4021'>Gypsy</option><option value='4046'>Taekwon</option><option value='4047'>Star Gladiator</option><option value='4049'>Soul Linker</option>			</select> &nbsp;
			Baby?<input class='checkbox' type='checkbox' id='isBaby' name='isBaby' value=1 > &nbsp;
			Ranker?<input class='checkbox' type='checkbox' id='isRanker' name='isRanker' value=1 >
				
				
		</td>
		<td>Max Aspd:
			<select id='max_aspd' name='max_aspd'>
			<option value='190'>190</option><option value='191'>191</option><option value='192'>192</option><option value='193'>193</option><option value='194'>194</option><option value='195'>195</option><option value='196'>196</option><option value='197'>197</option><option value='198'>198</option><option value='199'>199</option>			</select> &nbsp;
		</td>
				<td>Max HP:
			<select id='maxhp_cap' name='maxhp_cap'>
			<option value='0' selected='selected'>None</option><option value='1000000'>1000000</option><option value='2000000'>2000000</option><option value='3000000'>3000000</option><option value='4000000'>4000000</option><option value='5000000'>5000000</option><option value='6000000'>6000000</option><option value='7000000'>7000000</option><option value='8000000'>8000000</option><option value='9000000'>9000000</option><option value='10000000'>10000000</option>			</select> &nbsp;
		</td>
		<td>
			&nbsp; <input class = 'button' type='submit' value='Go' name='go'>
		</td>
	</tr>
</table>
</form>

</div>



<SCRIPT LANGUAGE="JavaScript">

check_option(document.getElementById("jid"));

base_obj = document.getElementById('base_obj');
job_obj = document.getElementById('job_obj');

var base_stat_bonus; // starts from 1

function base_calc(){

	cur_baselvl = document.getElementById('lvl_sel').value;
	if(!is_acceptable(cur_baselvl))	return;

	joblvl_ =  document.getElementById('jlvl_sel');
	cur_joblvl =  joblvl_.options[joblvl_.selectedIndex].value;

	str_ = document.getElementById('str_sel').value;
	agi_ = document.getElementById('agi_sel').value;
	vit_ = document.getElementById('vit_sel').value;
	int_ = document.getElementById('int_sel').value;
	dex_ = document.getElementById('dex_sel').value;
	luk_ = document.getElementById('luk_sel').value;
	
	if(!is_acceptable(str_) || !is_acceptable(agi_) || !is_acceptable(vit_)
		|| !is_acceptable(int_) || !is_acceptable(dex_) || !is_acceptable(luk_))
		return;

	calc_buff_stat();	// add extra bonus to stats

	cur_str = parseInt(str_) + parseInt(document.getElementById('str_bonus').innerHTML);
	cur_agi = parseInt(agi_) + parseInt(document.getElementById('agi_bonus').innerHTML);
	cur_vit = parseInt(vit_) + parseInt(document.getElementById('vit_bonus').innerHTML);
	cur_int = parseInt(int_) + parseInt(document.getElementById('int_bonus').innerHTML);
	cur_dex = parseInt(dex_) + parseInt(document.getElementById('dex_bonus').innerHTML);
	cur_luk = parseInt(luk_) + parseInt(document.getElementById('luk_bonus').innerHTML);

	weap_id_ = document.getElementById('aspd_sel'); 
	weap_id = weap_id_.options[weap_id_.selectedIndex].value;

	calc_statpts();
	status_max_hp();
	status_max_sp();
	status_base_atk();
	calc_aspd();
	status_calc_misc();
	
	class_control();

	sc_resist();
	

	return false;
}

function is_acceptable(num){

	document.getElementById('input_error').style.display = "none";
	
	// check to see if input is numeric
	function isNumeric(val){
		if (val.match(/^[0-9]+$/)){
			return true;
		}else{
			return false;
		}
	}

	// check to see if input is whitespace only or empty
	function isEmpty(val){
		if (val.match(/^s+$/) || val == ""){
			return true;
		}else{
			return false;
		}	
	}

	if(!isNumeric(num) || isEmpty(num) || num > 999){
		document.getElementById('input_error').style.display = "inline";
		return false;
	}

	return true;
}

function reset_form(){
	document.forms[0].reset();
	return false;
}

</SCRIPT>

<SCRIPT LANGUAGE='JavaScript'>
var JOB_ID = 0;
var MAX_ASPD = 190;
var MAX_HP_CAP = 0;
var SIN_JOB_ID = 12;
var SINX_JOB_ID = 4013;
var JOB_ID_MIN_TRANS = 4001;
var JOB_ID_MAX_TRANS = 4021;
var WEIGHT_COE_INDEX = 0;
var HP_COE1_INDEX = 1;
var HP_COE2_INDEX = 2;
var SP_COE_INDEX = 3;
var WID_TO_JCOE = 4;
var IS_BABY = false;
var IS_TK_RANKER = false;
var job_coe = new Array(20000, 0, 500, 100, 500, 650, 700, 2000, 2000, 2000, 800, 2000, 700, 700, 650, 2000, 2000, 2000, 2000, 2000, 2000, 2000, 2000, 2000, 2000, 2000, 2000, 650);
var job_bonus = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
var stat_pt = new Array(0,48, 51, 54, 57, 60, 64, 68, 72, 76, 80, 85, 90, 95, 100, 105, 111, 117, 123, 129, 135, 142, 149, 156, 163, 170, 178, 186, 194, 202, 210, 219, 228, 237, 246, 255, 265, 275, 285, 295, 305, 316, 327, 338, 349, 360, 372, 384, 396, 408, 420, 433, 446, 459, 472, 485, 499, 513, 527, 541, 555, 570, 585, 600, 615, 630, 646, 662, 678, 694, 710, 727, 744, 761, 778, 795, 813, 831, 849, 867, 885, 904, 923, 942, 961, 980, 1000, 1020, 1040, 1060, 1080, 1101, 1122, 1143, 1164, 1185, 1207, 1229, 1251, 1273, 1295, 1318, 1341, 1364, 1387, 1410, 1434, 1458, 1482, 1506, 1530, 1555, 1580, 1605, 1630, 1655, 1681, 1707, 1733, 1759, 1785, 1812, 1839, 1866, 1893, 1920, 1948, 1976, 2004, 2032, 2060, 2089, 2118, 2147, 2176, 2205, 2235, 2265, 2295, 2325, 2355, 2386, 2417, 2448, 2479, 2510, 2542, 2574, 2606, 2638, 2670, 2703, 2736, 2769, 2802, 2835, 2869, 2903, 2937, 2971, 3005, 3040, 3075, 3110, 3145, 3180, 3216, 3252, 3288, 3324, 3360, 3397, 3434, 3471, 3508, 3545, 3583, 3621, 3659, 3697, 3735, 3774, 3813, 3852, 3891, 3930, 3970, 4010, 4050, 4090, 4130, 4171, 4212, 4253, 4294, 4335, 4377, 4419, 4461, 4503, 4545, 4588, 4631, 4674, 4717, 4760, 4804, 4848, 4892, 4936, 4980, 5025, 5070, 5115, 5160, 5205, 5251, 5297, 5343, 5389, 5435, 5482, 5529, 5576, 5623, 5670, 5718, 5766, 5814, 5862, 5910, 5959, 6008, 6057, 6106, 6155, 6205, 6255, 6305, 6355, 6405, 6456, 6507, 6558, 6609, 6660, 6712, 6764, 6816, 6868, 6920, 6973, 7026, 7079, 7132, 7185, 7239, 7293, 7347, 7401, 7455, 7510, 7565, 7620, 7675, 7730, 7786, 7842, 7898, 7954, 8010, 8067, 8124, 8181, 8238, 8295, 8353, 8411, 8469, 8527, 8585, 8644, 8703, 8762, 8821, 8880, 8940, 9000, 9060, 9120, 9180, 9241, 9302, 9363, 9424, 9485, 9547, 9609, 9671, 9733, 9795, 9858, 9921, 9984, 10047, 10110, 10174, 10238, 10302, 10366, 10430, 10495, 10560, 10625, 10690, 10755, 10821, 10887, 10953, 11019, 11085, 11152, 11219, 11286, 11353, 11420, 11488, 11556, 11624, 11692, 11760, 11829, 11898, 11967, 12036, 12105, 12175, 12245, 12315, 12385, 12455, 12526, 12597, 12668, 12739, 12810, 12882, 12954, 13026, 13098, 13170, 13243, 13316, 13389, 13462, 13535, 13609, 13683, 13757, 13831, 13905, 13980, 14055, 14130, 14205, 14280, 14356, 14432, 14508, 14584, 14660, 14737, 14814, 14891, 14968, 15045, 15123, 15201, 15279, 15357, 15435, 15514, 15593, 15672, 15751, 15830, 15910, 15990, 16070, 16150, 16230, 16311, 16392, 16473, 16554, 16635, 16717, 16799, 16881, 16963, 17045, 17128, 17211, 17294, 17377, 17460, 17544, 17628, 17712, 17796, 17880, 17965, 18050, 18135, 18220, 18305, 18391, 18477, 18563, 18649, 18735, 18822, 18909, 18996, 19083, 19170, 19258, 19346, 19434, 19522, 19610, 19699, 19788, 19877, 19966, 20055, 20145, 20235, 20325, 20415, 20505, 20596, 20687, 20778, 20869, 20960, 21052, 21144, 21236, 21328, 21420, 21513, 21606, 21699, 21792, 21885, 21979, 22073, 22167, 22261, 22355, 22450, 22545, 22640, 22735, 22830, 22926, 23022, 23118, 23214, 23310, 23407, 23504, 23601, 23698, 23795, 23893, 23991, 24089, 24187, 24285, 24384, 24483, 24582, 24681, 24780, 24880, 24980, 25080, 25180, 25280, 25381, 25482, 25583, 25684, 25785, 25887, 25989, 26091, 26193, 26295, 26398, 26501, 26604, 26707, 26810, 26914, 27018, 27122, 27226, 27330, 27435, 27540, 27645, 27750, 27855, 27961, 28067, 28173, 28279, 28385, 28492, 28599, 28706, 28813, 28920, 29028, 29136, 29244, 29352, 29460, 29569, 29678, 29787, 29896, 30005, 30115, 30225, 30335, 30445, 30555, 30666, 30777, 30888, 30999, 31110, 31222, 31334, 31446, 31558, 31670, 31783, 31896, 32009, 32122, 32235, 32349, 32463, 32577, 32691, 32805, 32920, 33035, 33150, 33265, 33380, 33496, 33612, 33728, 33844, 33960, 34077, 34194, 34311, 34428, 34545, 34663, 34781, 34899, 35017, 35135, 35254, 35373, 35492, 35611, 35730, 35850, 35970, 36090, 36210, 36330, 36451, 36572, 36693, 36814, 36935, 37057, 37179, 37301, 37423, 37545, 37668, 37791, 37914, 38037, 38160, 38284, 38408, 38532, 38656, 38780, 38905, 39030, 39155, 39280, 39405, 39531, 39657, 39783, 39909, 40035, 40162, 40289, 40416, 40543, 40670, 40798, 40926, 41054, 41182, 41310, 41439, 41568, 41697, 41826, 41955, 42085, 42215, 42345, 42475, 42605, 42736, 42867, 42998, 43129, 43260, 43392, 43524, 43656, 43788, 43920, 44053, 44186, 44319, 44452, 44585, 44719, 44853, 44987, 45121, 45255, 45390, 45525, 45660, 45795, 45930, 46066, 46202, 46338, 46474, 46610, 46747, 46884, 47021, 47158, 47295, 47433, 47571, 47709, 47847, 47985, 48124, 48263, 48402, 48541, 48680, 48820, 48960, 49100, 49240, 49380, 49521, 49662, 49803, 49944, 50085, 50227, 50369, 50511, 50653, 50795, 50938, 51081, 51224, 51367, 51510, 51654, 51798, 51942, 52086, 52230, 52375, 52520, 52665, 52810, 52955, 53101, 53247, 53393, 53539, 53685, 53832, 53979, 54126, 54273, 54420, 54568, 54716, 54864, 55012, 55160, 55309, 55458, 55607, 55756, 55905, 56055, 56205, 56355, 56505, 56655, 56806, 56957, 57108, 57259, 57410, 57562, 57714, 57866, 58018, 58170, 58323, 58476, 58629, 58782, 58935, 59089, 59243, 59397, 59551, 59705, 59860, 60015, 60170, 60325, 60480, 60636, 60792, 60948, 61104, 61260, 61417, 61574, 61731, 61888, 62045, 62203, 62361, 62519, 62677, 62835, 62994, 63153, 63312, 63471, 63630, 63790, 63950, 64110, 64270, 64430, 64591, 64752, 64913, 65074, 65235, 65397, 65559, 65721, 65883, 66045, 66208, 66371, 66534, 66697, 66860, 67024, 67188, 67352, 67516, 67680, 67845, 68010, 68175, 68340, 68505, 68671, 68837, 69003, 69169, 69335, 69502, 69669, 69836, 70003, 70170, 70338, 70506, 70674, 70842, 71010, 71179, 71348, 71517, 71686, 71855, 72025, 72195, 72365, 72535, 72705, 72876, 73047, 73218, 73389, 73560, 73732, 73904, 74076, 74248, 74420, 74593, 74766, 74939, 75112, 75285, 75459, 75633, 75807, 75981, 76155, 76330, 76505, 76680, 76855, 77030, 77206, 77382, 77558, 77734, 77910, 78087, 78264, 78441, 78618, 78795, 78973, 79151, 79329, 79507, 79685, 79864, 80043, 80222, 80401, 80580, 80760, 80940, 81120, 81300, 81480, 81661, 81842, 82023, 82204, 82385, 82567, 82749, 82931, 83113, 83295, 83478, 83661, 83844, 84027, 84210, 84394, 84578, 84762, 84946, 85130, 85315, 85500, 85685, 85870, 86055, 86241, 86427, 86613, 86799, 86985, 87172, 87359, 87546, 87733, 87920, 88108, 88296, 88484, 88672, 88860, 89049, 89238, 89427, 89616, 89805, 89995, 90185, 90375, 90565, 90755, 90946, 91137, 91328, 91519, 91710, 91902, 92094, 92286, 92478, 92670, 92863, 93056, 93249, 93442, 93635, 93829, 94023, 94217, 94411, 94605, 94800, 94995, 95190, 95385, 95580, 95776, 95972, 96168, 96364, 96560, 96757, 96954, 97151, 97348, 97545, 97743, 97941, 98139, 98337, 98535, 98734, 98933, 99132, 99331, 99530, 99730, 99930, 100130, 100330, 100530, 100731, 100932, 101133, 101334, 101535, 101737, 101939, 102141, 102343);
var hp_sigma_val = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
</SCRIPT>
<br>
<div id='jobinfo' style='margin: auto; width: 90%; min-width: 545px; color: #00568a; background-color: #D2EDFF;'>
	<table class='btext_m'>
		<tr>
			<td><b>Job: Novice			&nbsp;&nbsp;
			TK Ranker? <input class='checkbox' type='checkbox' id='ranker_checkbox'>			</b>
			</td>
			<td><b>Base Level:</b>
				<input id='lvl_sel' type='text' value=1 maxlength=3 size=3 onKeyUp='calc_base_lvl_chg(this);'>
			</td>
			<td><b>Job Level:</b>
				<select id='jlvl_sel' onChange='calc_job_lvl_chg(this)'>
					<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option>				</select>
			</td>
			<td align='right'><b>Weight:</b> </td><td id='disp_weight'></td>
		</tr>
		<tr>
			<td align='right'><b>HP:</b> </td><td id='disp_max_hp'></td>
			<td><b>Natural HP Regen:</b> </td><td colspan=2 id='disp_hp_regen'></td>
			
		</tr>
		<tr>
			<td align='right'><b>SP:</b> </td><td id='disp_max_sp'></td>
			<td><b>Natural SP Regen:</b> </td><td colspan=2 id='disp_sp_regen'></td>
		</tr>
	</table>
</div>
<br>
<div id='buffinfo' style='margin: auto; width: 90%; min-width: 545px; color: #00568a; background-color: #D2EDFF;'>
	<table class='btext_m'>
		<tr>
			<th align='left' colspan=6><u>Buffs</u></th>
			<th align='left'><u>Items:</u></th>
		</tr>
		<tr>
			<td width=100>Blessing: <br>
				<select id='buff_bless_lv' name='buff_bless_lv' onChange='base_calc();'>
					<option value=0>- Level -</option>
					<option value=1>Lv 1</option>
					<option value=2>Lv 2</option>
					<option value=3>Lv 3</option>
					<option value=4>Lv 4</option>
					<option value=5>Lv 5</option>
					<option value=6>Lv 6</option>
					<option value=7>Lv 7</option>
					<option value=8>Lv 8</option>
					<option value=9>Lv 9</option>
					<option value=10>Lv 10</option>
				</select>
			</td>
			<td width=100>Increase AGI: <br>
				<select id='buff_agiup_lv' name='buff_agiup_lv' onChange='base_calc();'>
					<option value=0>- Level -</option>
					<option value=3>Lv 1</option>
					<option value=4>Lv 2</option>
					<option value=5>Lv 3</option>
					<option value=6>Lv 4</option>
					<option value=7>Lv 5</option>
					<option value=8>Lv 6</option>
					<option value=9>Lv 7</option>
					<option value=10>Lv 8</option>
					<option value=11>Lv 9</option>
					<option value=12>Lv 10</option>
				</select>
			</td>
			<td width=100>Angelus: <br>
				<select id='defplus_angelus_lv' name='defplus_angelus_lv' onChange='base_calc();'>
					<option value=1>- Level -</option>
					<option value=1.05>Lv 1</option>
					<option value=1.10>Lv 2</option>
					<option value=1.15>Lv 3</option>
					<option value=1.20>Lv 4</option>
					<option value=1.25>Lv 5</option>
					<option value=1.30>Lv 6</option>
					<option value=1.35>Lv 7</option>
					<option value=1.40>Lv 8</option>
					<option value=1.45>Lv 9</option>
					<option value=1.50>Lv 10</option>
				</select>
			</td>
			<td width=140>Impositio Manus: <br>
				<select id='atk_impositio_lv' name='atk_impositio_lv' onChange='base_calc();'>
					<option value=0>- Level -</option>
					<option value=5>Lv 1</option>
					<option value=10>Lv 2</option>
					<option value=15>Lv 3</option>
					<option value=20>Lv 4</option>
					<option value=25>Lv 5</option>
				</select>
			</td>
			<td width=100>Wind Walk: <br>
				<select id='flee_windwalk_lv' name='flee_windwalk_lv' onChange='base_calc();'>
					<option value=0>- Level -</option>
					<option value=1>Lv 1</option>
					<option value=1>Lv 2</option>
					<option value=2>Lv 3</option>
					<option value=2>Lv 4</option>
					<option value=3>Lv 5</option>
					<option value=3>Lv 6</option>
					<option value=4>Lv 7</option>
					<option value=4>Lv 8</option>
					<option value=5>Lv 9</option>
					<option value=5>Lv 10</option>
				</select>
			</td>
			<td width=100>Gloria? <br> <input type='checkbox' id='buff_gloria_lv' name='buff_gloria_lv' value=30 onClick='base_calc();'></td>
			<td>Speed Potions: 
				<select id='aspd_potion' name='aspd_potion' onChange='base_calc();'>
					<option value=0>- Potion Type -</option>
					<option value=0.1>Concentration Potion</option>
					<option value=0.15>Awakening Potion</option>
					<option value=0.20>Berserk Potion</option>
				</select>
			</td>
		</tr>
	</table>
</div>
<br>
<div id='statinfo' style='margin: auto; width: 90%; min-width: 545px; color: #00568a; background-color: #D2EDFF;'>
	<div style='margin: 5px'>
		
	<table border=1 class='btext_m'>
		<tr>
			<th colspan=2 align='center'>Stats</th>
			<th colspan=2 align='center'>Job Bonus</th>
			<th align='center'>Pts Req</th>
			<th colspan=8 align='center'>Status Information</th>
		</tr>
		<tr>
			<td>Str</td>
			<td>
				<input id='str_sel' type='text' value=1 maxlength=3 size=3 onKeyUp='base_calc();'>
			</td>
			<td align='center'> + </td>
			<td id='str_bonus' align='right'>0</td>
			<td id='str_pt_req' align='center'>2</td>
			<td>Atk</td>
			<td id='disp_atk' align='right' width=40>1</td><td align='center'> + </td><td id='disp_atk_plus' width=40>0</td>
			<td>Def</td>
			<td id='disp_def' align='right' width=40>0</td><td align='center'> + </td><td id='disp_def_plus' width=40>0</td>
		</tr>
		<tr>
			<td>Agi</td>
			<td>
				<input id='agi_sel' type='text' value=1 maxlength=3 size=3 onKeyUp='base_calc();'>
			</td>
			<td align='center'> + </td>
			<td id='agi_bonus' align='right'>0</td>
			<td id='agi_pt_req' align='center'>2</td>
			<td>Matk</td>
			<td id='disp_matk_min' align='right' width=40>1</td><td align='center'> ~ </td><td id='disp_matk_max' width=40>1</td>
			<td>Mdef</td>
			<td id='disp_mdef' align='right' width=40>0</td><td align='center'> + </td><td id='disp_mdef_plus' width=40>0</td>
		</tr>
		<tr>
			<td>Vit</td>
			<td>
				<input id='vit_sel' type='text' value=1 maxlength=3 size=3 onKeyUp='base_calc();'>
			</td>
			<td align='center'> + </td>
			<td id='vit_bonus' align='right'>0</td>
			<td id='vit_pt_req' align='center'>2</td>
			<td>Hit</td>
			<td id='disp_hit' colspan=3 align='right'>1</td>
			<td>Flee</td>
			<td id='disp_flee' width=40>1</td><td> + </td><td id='disp_flee_plus' width=40>1</td>
		</tr>
		<tr>
			<td>Int</td>
			<td>
				<input id='int_sel' type='text' value=1 maxlength=3 size=3 onKeyUp='base_calc();'>
			</td>
			<td align='center'> + </td>
			<td id='int_bonus' align='right'>0</td>
			<td id='int_pt_req' align='center'>2</td>
			<td>Critical</td>
			<td id='disp_crit' colspan=3 align='right'>1</td>
			<td>Aspd</td>
			<td id='disp_aspd' colspan=3 align='right'>1</td>
		</tr>
			<tr>
			<td>Dex</td>
			<td>
				<input id='dex_sel' type='text' value=1 maxlength=3 size=3 onKeyUp='base_calc();'>
			</td>
			<td align='center'> + </td>
			<td id='dex_bonus' align='right'>0</td>
			<td id='dex_pt_req' align='center'>2</td>
			<td colspan=4>Status Point</td>
			<td id='disp_statpt' colspan=4 align='right'>1</td>
		</tr>
			</tr>
			<tr>
			<td>Luk</td>
			<td>
				<input id='luk_sel' type='text' value=1 maxlength=3 size=3 onKeyUp='base_calc();'>
			</td>
			<td align='center'> + </td>
			<td id='luk_bonus' align='right'>0</td>
			<td id='luk_pt_req' align='center'>2</td>
			<td colspan=4>Guild</td><td colspan=4 align='right'><a href="https://ratemyserver.net" target='_blank'>RMS</a></td>
		</tr>
	</table>
	<div id='weapoinfo'>
		<table class='btext_m'>
			<tr>
				<td align='center'><b>Weapon <br> Type</b></td>
				<td>Right:
					<select id='aspd_sel' name='aspd_sel'  width=50 onChange='base_calc();'>
					<option value=0>Hand</option><option value=1>Dagger</option><option value=2>One-handed Sword</option><option value=6>One-handed Axe</option><option value=8>One-handed Mace</option><option value=9>Two-handed Mace</option><option value=10>Rod & Staff</option><option value=23>Two-handed Staff</option>					</select>
				</td>		
						</tr>
		</table>
	</div>
	&nbsp; <div id='input_error' style='display:none; color: red;'><b>* One or more stat/level input is invalid.</b></div> 
<br><br>
		<div id='aligmentinfo'>
		<table border=1 class='btext_m'>
			<tr><th colspan = 10 align='center'>Status Change Resistances</th></tr>
			<tr>
				<td>Stun</td><td>Poison</td><td>Silence</td><td>Bleeding</td><td>Sleep</td>
				<td>Stone Curse</td><td>Freeze</td><td>Curse</td><td>Blind</td><td>Confusion</td>
			</tr>
			<tr>
				<td id='sc_stun' align='right'></td><td id='sc_poison' align='right'></td>
				<td id='sc_silence' align='right'></td><td id='sc_bleeding' align='right'></td>
				<td id='sc_sleep' align='right'></td><td id='sc_stone' align='right'></td>
				<td id='sc_freeze' align='right'></td><td id='sc_curse' align='right'></td>
				<td id='sc_blind' align='right'></td><td id='sc_confusion' align='right'></td>
			</tr>
		</table>
		</div>
	</div>
</div>
<br>

<div id='skillinfo' style='margin: auto; width: 90%; min-width: 545px; color: #00568a; background-color: #D2EDFF;'>
	<div style='margin: 5px'><b><u>Skills</u></b><br><br></div>
</div>
<SCRIPT LANGUAGE="JavaScript">

// call initial functions
calc_job_lvl_chg(document.getElementById('jlvl_sel')); // need to go first to initialize base_stat_bonus
calc_base_lvl_chg(document.getElementById('lvl_sel'));

</SCRIPT>

<div  style='margin: 10px; width: 96%'> &laquo; <a href='calc_main.php' class='gen_m'>Select another Calculator</a></div>

<div style='margin: 10px auto'>
	<style type='text/css'>
	.g_adslot_big { min-width:520px; max-width:728px; min-height: 90px; max-height: 300px; margin: auto; width:100%; }
	@media (max-width: 850px) { .g_adslot_big { max-width:525px; max-height: 525px; margin: auto; width:100%; } }
	</style>
	<script async src='https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8545002715011591'
     crossorigin='anonymous'></script>
	<!-- rms_big-responsive -->
	<ins class='adsbygoogle g_adslot_big'
		 style='display:block;'
		 data-ad-client='ca-pub-8545002715011591'
		 data-ad-slot='9409461515'
		 data-ad-format=' rectangle, horizontal'
		 data-full-width-responsive='false'></ins>
	<script>
		 (adsbygoogle = window.adsbygoogle || []).push({});
	</script>
	</div><div style='text-align:center;'><a href = '#' class='to_top' style='text-decoration:none'><div>back to top <i class='fa fa-level-up' aria-hidden='true'></i></div></a></div></div>
	</div><!-- close content-div-ext -->
	<div id='footer'>
		<div style='clear:both;' class='copyright'>
			<a href='review_guidelines.php' class='sm'>Review Guidelines</a> | 
			<a href='TOS_owner.html' class='sm'>ToS: Server Owner</a> |
			<a href='TOS_player.html' class='sm'>ToS: Reviewer</a> |
			<a href='privacy_policy.php' class='sm'>Privacy Policy</a>
			<br>
			<div class = 'copyright'>
				RateMyServer.Net Copyright &copy; 2005-2026 <br>
				All images and content on ratemyserver.net belong to their respective creators.
			</div>
		</div>
	</div>
	</div><!-- close contentwrap -->
	</div><!-- close wrapper -->
	<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9ce4a859df77abcb',t:'MTc3MTE1Njk2MA=='};var a=document.createElement('script');a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"3190068be8f5460488d437c097d23cdd","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
</body>
	</html>
	


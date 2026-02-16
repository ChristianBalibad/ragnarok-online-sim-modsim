// view another doc on the same page, user_page etc uses it
// Tabbed Document Viewer script- ?Dynamic Drive DHTML code library (www.dynamicdrive.com)
// Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code

var selectedtablink=""
var tcischecked=false

function handlelink(aobject){
selectedtablink=aobject.href
tcischecked=(document.tabcontrol && document.tabcontrol.tabcheck.checked)? true : false
if (document.getElementById && !tcischecked){
var tabobj=document.getElementById("tablist")
var tabobjlinks=tabobj.getElementsByTagName("A")
for (i=0; i<tabobjlinks.length; i++)
tabobjlinks[i].className=""
aobject.className="current"
document.getElementById("tabiframe").src=selectedtablink
return false
}
else
return true
}

function handleview(){
tcischecked=document.tabcontrol.tabcheck.checked
if (document.getElementById && tcischecked){
if (selectedtablink!="")
window.location=selectedtablink
}
}


// tooltip function (part 2, part 1 included on page's .js)
//Cool DHTML tooltip script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
// Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code

function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function ddrivetip(thetext, thecolor, thewidth){
if (ns6||ie){
if (typeof thewidth!="undefined") tipobj.style.width=thewidth+"px"
if (typeof thecolor!="undefined" && thecolor!="") tipobj.style.backgroundColor=thecolor
tipobj.innerHTML=thetext
enabletip=true
return false
}
}

// customized to use for image showing mouseover
function ddrivetip_image(thetext){
if (ns6||ie){
tipobj.innerHTML=thetext;
tipobj.style.border = 0;
tipobj.style.background = 0;
enabletip=true
return false
}
}


function positiontip(e){
if (enabletip){
var curX=(ns6)?e.pageX : event.clientX+ietruebody().scrollLeft;
var curY=(ns6)?e.pageY : event.clientY+ietruebody().scrollTop;
//Find out how close the mouse is to the corner of the window
var rightedge=ie&&!window.opera? ietruebody().clientWidth-event.clientX-offsetxpoint : window.innerWidth-e.clientX-offsetxpoint-20
var bottomedge=ie&&!window.opera? ietruebody().clientHeight-event.clientY-offsetypoint : window.innerHeight-e.clientY-offsetypoint-20

var leftedge=(offsetxpoint<0)? offsetxpoint*(-1) : -1000

//if the horizontal distance isn't enough to accomodate the width of the context menu
if (rightedge<tipobj.offsetWidth)
//move the horizontal position of the menu to the left by it's width
tipobj.style.left=ie? ietruebody().scrollLeft+event.clientX-tipobj.offsetWidth+"px" : window.pageXOffset+e.clientX-tipobj.offsetWidth+"px"
else if (curX<leftedge)
tipobj.style.left="5px"
else
//position the horizontal position of the menu where the mouse is positioned
tipobj.style.left=curX+offsetxpoint+"px"

//same concept with the vertical position
if (bottomedge<tipobj.offsetHeight)
tipobj.style.top=ie? ietruebody().scrollTop+event.clientY-tipobj.offsetHeight-offsetypoint+"px" : window.pageYOffset+e.clientY-tipobj.offsetHeight-offsetypoint+"px"
else
tipobj.style.top=curY+offsetypoint+"px"
tipobj.style.visibility="visible"
}
}


// customized for mapinfo.php for now (image on the right of cursor only so it wont go out of screen)
function positiontip_rightsideonly(e){
if (enabletip){
var curX=(ns6)?e.pageX : event.clientX+ietruebody().scrollLeft;
var curY=(ns6)?e.pageY : event.clientY+ietruebody().scrollTop;
//Find out how close the mouse is to the corner of the window
var rightedge=ie&&!window.opera? ietruebody().clientWidth-event.clientX-offsetxpoint : window.innerWidth-e.clientX-offsetxpoint-20
var bottomedge=ie&&!window.opera? ietruebody().clientHeight-event.clientY-offsetypoint : window.innerHeight-e.clientY-offsetypoint-20

var leftedge=(offsetxpoint<0)? offsetxpoint*(-1) : -1000

tipobj.style.left=curX+offsetxpoint+"px"

//same concept with the vertical position
if (bottomedge<tipobj.offsetHeight)
tipobj.style.top=ie? ietruebody().scrollTop+event.clientY-tipobj.offsetHeight-offsetypoint+"px" : window.pageYOffset+e.clientY-tipobj.offsetHeight-offsetypoint+"px"
else
tipobj.style.top=curY+offsetypoint+"px"
tipobj.style.visibility="visible"
}
}


function hideddrivetip(){
if (ns6||ie){
enabletip=false
tipobj.style.visibility="hidden"
tipobj.style.left="-1000px"
tipobj.style.backgroundColor=''
tipobj.style.width=''
}
}

// customized to use for image showing mouseover
function hideddrivetip_image(){
if (ns6||ie){
enabletip=false
tipobj.style.visibility="hidden"
tipobj.style.left="-1000px"
}
}

// function from http://www.mediacollege.com/internet/javascript/form/limit-characters.html
// count down text limit
function limitText(limitField, limitCount, limitNum) {

	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);

	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}


var item_dim = mob_dim = map_dim = sk_dim = spr_dim = 'top=20, left=100, height=620,width=780, scrollbars=yes,resizable=yes,toolbar=yes';
//var sk_dim = 'top=100, left=200, height=450,width=620, scrollbars=yes,resizable=yes';
var status_dim = 'top=200, left=400, height=320,width=250, resizable=yes';
var rate_dim = 'top=100, left=200, height=880,width=880, scrollbars=yes,resizable=yes';
//var spr_dim = 'top=20, left=100, height=620,width=780, scrollbars=yes,resizable=yes,toolbar=yes';

// note: name cannot have space and must be quoted when sent in
function popWin(url, name, dim){

	newwindow=window.open(url,name, dim);
	if (window.focus) {newwindow.focus()}
	try{
		event.returnValue=false; // for IE7
	} catch(exception) {
	}
	return false;
}

function popWin2(url, name, dim){

	cur_url = window.location.href;

	if(cur_url.match(/&small=1/)){	// in a small window, use current window/tab
		window.location.href=url;
	}else{	// open new window/tab
		newwindow=window.open(url);
		//newwindow=window.open(url,name, dim);
		if (window.focus) {newwindow.focus()}
		try{
			event.returnValue=false; // for IE7
		} catch(exception) {}
	}

	return false;
}


// pop win with link intergrated
function popItem(i_id, small, back){
	var item_url = 'item_db.php?item_id=' + i_id + '&small=' + small + '&back=' + back;
	return popWin2(item_url, 'name', item_dim);
}
function popMob(m_id, small, back){
	var mob_url = 'mob_db.php?mob_id=' + m_id + '&small=' + small + '&back=' + back;
	return popWin2(mob_url, 'name', mob_dim);
}
function popSkill(sk_id, small, back){
	var sk_url = 'skill_db.php?skid=' + sk_id + '&small=' + small + '&back=' + back;
	return popWin2(sk_url, 'name', sk_dim);
}


function popItem_re(i_id, small, back){
	var item_url = 're_item_db.php?item_id=' + i_id + '&small=' + small + '&back=' + back;
	return popWin2(item_url, 'name', item_dim);
}
function popMob_re(m_id, small, back){
	var mob_url = 're_mob_db.php?mob_id=' + m_id + '&small=' + small + '&back=' + back;
	return popWin2(mob_url, 'name', mob_dim);
}
function popSkill_re(sk_id, small, back){
	var sk_url = 'skill_db.php?skid=' + sk_id + '&re=1&small=' + small + '&back=' + back;
	return popWin2(sk_url, 'name', sk_dim);
}

// http://www.dustindiaz.com/top-ten-javascript/
// Simply add a class name to the beginning of the funciton and the 2nd and 3rd arguments are optional
// return an array of elements matching the class name (and tag name if given)
function getElementsByClass(searchClass,node,tag) {
	var classElements = new Array();
	if ( node == null )
		node = document;
	if ( tag == null )
		tag = '*';
	var els = node.getElementsByTagName(tag);
	var elsLen = els.length;
	var pattern = new RegExp("(^|\s)"+searchClass+"(\s|$)");
	for (i = 0, j = 0; i < elsLen; i++) {
		if ( pattern.test(els[i].className) ) {
			classElements[j] = els[i];
			j++;
		}
	}
	return classElements;
}

// functions to show a div and change the img_obj's src to new_img_src, taken from npc_shop_warp.js
function show_div(div_id, img_obj, new_img_src, cur_img_src){
	
	show = document.getElementById(div_id);
	show.style.display = "block";
	
	if(img_obj != null){
		img_obj.onclick = function () { hide_div(div_id, img_obj, cur_img_src, new_img_src); }
		img_obj.src = new_img_src; // up arrow
	}
	return return_false();
}

function hide_div(div_id, img_obj, new_img_src, cur_img_src){

	hide = document.getElementById(div_id);
	hide.style.display = "none";
	
	if(img_obj != null){
		img_obj.onclick =  function () { show_div(div_id, img_obj, cur_img_src, new_img_src); }
		img_obj.src = new_img_src; // down arrow
	}
	return return_false();
}

var fa_double_up = "Hide <i class='fa fa-angle-double-up fa-lg' aria-hidden='true'></i>";
var fa_double_down = "Expand <i class='fa fa-angle-double-down fa-lg' aria-hidden='true'></i>";
var fa_double_arrow = new Array(fa_double_down, fa_double_up);	// 0 is down, 1 is up

function show_div_noimg(div_id, this_obj, toggle_display){
	
	show = document.getElementById(div_id);
	show.style.display = "block";
	
	if(this_obj != null){
		this_obj.onclick = function () { hide_div_noimg(div_id, this_obj, toggle_display); }
		this_obj.innerHTML = toggle_display[1];
	}
	return return_false();
}

function hide_div_noimg(div_id, this_obj, toggle_display){

	hide = document.getElementById(div_id);
	hide.style.display = "none";
	
	if(this_obj != null){
		this_obj.onclick =  function () { show_div_noimg(div_id, this_obj, toggle_display); }
		this_obj.innerHTML = toggle_display[0];
	}
	return return_false();
}


// IE 7 needs special treatment with return false;
function return_false(){

	try{	
		event.returnValue=false; // for IE7 
	} catch(exception) {}
	
	return false;
}

// 2023-08 mobile optimize
function toggle_summary(detail, summary_ele, view_what){

	//console.log(summary_ele.style.backgroundColor);
	//console.log(document.getElementById(detail).open);

	if(!document.getElementById(detail).open){
		summary_ele.innerHTML='<i class="fa fa-angle-double-up fa-lg" aria-hidden="true"></i> click to hide <i class="fa fa-angle-double-up fa-lg" aria-hidden="true"></i>';
	}else{
		summary_ele.innerHTML='<i class="fa fa-angle-double-down fa-lg" aria-hidden="true"></i> expand to view ' + view_what + ' <i class="fa fa-angle-double-down fa-lg" aria-hidden="true"></i>';
	}
}

// with top round corners on summary element (tab style), for search form
function toggle_details(detail, summary_ele, bg_color){

	//console.log(summary_ele.style.backgroundColor);
	//console.log(document.getElementById(detail).open);

	if(!document.getElementById(detail).open){
		summary_ele.style.borderRadius='5px 5px 0px 0px';
		summary_ele.style.backgroundColor= bg_color;
	}else{
		summary_ele.style.borderRadius='5px';
		summary_ele.style.backgroundColor= '';
	}
}

function toggle_sort(text_change, word, asc_ele, desc_ele){

	var asc = "";
	var des = "";

	if(word){
		asc = "Ascending";
		des = "Descending";
	}

	asc_select = document.getElementById(asc_ele);
	desc_select = document.getElementById(desc_ele);
	
	// 0 for ascending, default, 1 for des
	if(asc_select.checked){	// switch to des
		asc_select.checked = false;
		desc_select.checked = true;
		text_change.innerHTML = des + ' <i class="fa fa-sort-amount-desc" aria-hidden="true"></i>';
	}else{
		desc_select.checked = false;
		asc_select.checked = true;
		text_change.innerHTML = asc + ' <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>';
	}

}

/* ----------- 2025 clickable share icon --------------- */

function open_share_box(btn, i_id) {
    const popup = document.getElementById("linkshare-Popup");
    const shareLinkBox = document.getElementById("linkshare-url");
	
   if (!popup || !shareLinkBox) return;

    // Put URL into the box
    shareLinkBox.textContent = btn.dataset.sharelink;

    // show popup display and overlay
    popup.style.display = "block";
	
}

function copy_share_link() {
	const popup = document.getElementById("linkshare-Popup");
    const shareLinkBox = document.getElementById("linkshare-url");
	const copyBtn = document.getElementById("linkshare-copyBtn");

    if (!popup || !shareLinkBox) return;

    navigator.clipboard.writeText(shareLinkBox.textContent)
        .then(() => {
            copyBtn.textContent = "Copied!";
			copyBtn.style.background = "green";
            setTimeout(() => {
				popup.style.display = "none";
                copyBtn.textContent = "Copy";
				copyBtn.style.background = "#0c68b5";

            }, 2000);
        });
}


function close_share_box() {
    const popup = document.getElementById("linkshare-Popup");
    if (popup) popup.style.display = "none";
}


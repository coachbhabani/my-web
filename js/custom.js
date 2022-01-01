jQuery(function($){
	window.vw_wellness_coach_currentfocus=null;
  	vw_wellness_coach_checkfocusdElement();
	var vw_wellness_coach_body = document.querySelector('body');
	vw_wellness_coach_body.addEventListener('keyup', vw_wellness_coach_check_tab_press);
	var vw_wellness_coach_gotoHome = false;
	var vw_wellness_coach_gotoClose = false;
	window.responsiveMenu=false;
 	function vw_wellness_coach_checkfocusdElement(){
	 	if(window.vw_wellness_coach_currentfocus=document.activeElement.className){
		 	window.vw_wellness_coach_currentfocus=document.activeElement.className;
	 	}
 	}
 	function vw_wellness_coach_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.responsiveMenu){
			if (!e.shiftKey) {
				if(vw_wellness_coach_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				vw_wellness_coach_gotoHome = true;
			} else {
				vw_wellness_coach_gotoHome = false;
			}

		}else{

			if(window.vw_wellness_coach_currentfocus=="mobiletoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.vw_wellness_coach_currentfocus=="header-search"){
				jQuery(".mobiletoggle").focus();
			}else{
				if(window.responsiveMenu){
				if(vw_wellness_coach_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					vw_wellness_coach_gotoClose = true;
				} else {
					vw_wellness_coach_gotoClose = false;
				}

				if (e.target.parentNode.previousElementSibling.childElementCount == 2) {
					if(e.target.parentNode.previousElementSibling.children[1].className === "sub-menu"){
						e.target.parentNode.previousElementSibling.children[1].style.display = "block";
					}
				}
			
			}else{

			if(window.responsiveMenu){
			}}}}
		}
	 	vw_wellness_coach_checkfocusdElement();
	}
});
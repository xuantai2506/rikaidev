function $$$(id) {

	return document.getElementById(id);

}

function	Forward(url) {

	window.location.href = url;

}

function	_postback() {

	return void(1);

}



//----------------------------------------------------------------------------------------------------------------------

function ajaxFunction() {

	var xmlHttp=null;

	try {

		// Firefox, Internet Explorer 7. Opera 8.0+, Safari.

		xmlHttp = new XMLHttpRequest();

	}

	catch (e) {

		// Internet Explorer 6.

		try {

			xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");

		}

		catch (e) {

			try{

				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");

			}

			catch (e) {

				return false;

			}

		}

	}

}



//----------------------------------------------------------------------------------------------------------------------

/**

 *

 * @param obj

 * @returns {string}

 */

function $query(obj) {

	var query = "";

	$(obj).find("input").each(function(i){

		if (($(obj).find("input").eq(i).attr("type") != "checkbox") && ($(obj).find("input").eq(i).attr("type") != "button") && ($(obj).find("input").eq(i).attr("type") != "submit") && ($(obj).find("input").eq(i).attr("type") != "radio") ) {

			var t = $(obj).find("input").eq(i);

			if ($(obj).find("input").eq(i).attr("type") != "password") {

				query += "&"+t.attr("name")+"="+encodeURIComponent(t.val());

			} else {

				query += "&"+t.attr("name")+"="+document.getElementById(t.attr("name")).value;

			}

		}

		else {

			if ($(obj).find("input").eq(i).attr("type") == "checkbox") {

				var t = $(obj).find("input").eq(i);

				if (t.is(":checked"))

					query += "&"+t.attr("name")+"="+t.attr("value");

			}

			else if ($(obj).find("input").eq(i).attr("type") == "radio") {

				var t = $(obj).find("input").eq(i);

				if (t.is(":checked"))

					query += "&"+t.attr("name")+"="+t.attr("value");

			}

		}

	});

	$(obj).find("textarea").each(function(i) {

		var t = $(obj).find("textarea").eq(i);

		query += "&"+t.attr("name")+"="+encodeURIComponent(t.val());

	});



	$(obj).find("select").each(function(i) {

		var t = $(obj).find("select").eq(i);

		query += "&"+t.attr("name")+"="+encodeURIComponent(t.attr("value"));

	});



	return query.substring(1);

}



//----------------------------------------------------------------------------------------------------------------------

function showLoader() {

	$("#loadingPopup").html("<div class=\"loading-body\"><div style=\"position: fixed; top: 50%; right: 50%; text-align: center; background: transparent; z-index: 999999999;\"><div class=\"windows8\"> <div class=\"wBall\" id=\"wBall_1\"> <div class=\"wInnerBall\"> </div> </div> <div class=\"wBall\" id=\"wBall_2\"> <div class=\"wInnerBall\"> </div> </div> <div class=\"wBall\" id=\"wBall_3\"> <div class=\"wInnerBall\"> </div> </div> <div class=\"wBall\" id=\"wBall_4\"> <div class=\"wInnerBall\"> </div> </div> <div class=\"wBall\" id=\"wBall_5\"> <div class=\"wInnerBall\"> </div> </div> </div></div></div>").hide().fadeIn(10);

	block = true;

}



//----------------------------------------------------------------------------------------------------------------------

function closeLoader() {

	$("#loadingPopup").html("").hide().fadeOut(100);

	block = false;

}



//----------------------------------------------------------------------------------------------------------------------

function showResult(type,data) {

	closeLoader();

	$("#"+type+"").html(data).hide().fadeIn(100);

	block = false;

}



//----------------------------------------------------------------------------------------------------------------------

function getSlug(table) {

	var name  = $('#name').val();

	showLoader();

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=get_slug&id='+table+'&name='+name,

		dataType: "html",

		success: function(data){

			$('#slug').val(data);

			closeLoader();

		}

	});

	return false;

}

function getSlug2(id) {

	showLoader();

	var name  = $('#name').val();

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=get_link&id='+id+'&name='+name,

		dataType: "html",

		success: function(data){

			$('#slug').val(data);

			closeLoader();

		}

	});

	return false;

}



//----------------------------------------------------------------------------------------------------------------------

function getSlugOther() {

	var name  = $('#name').val();

	showLoader();

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=get_slug_other&name='+name,

		dataType: "html",

		success: function(data){

			$('#slug').val(data);

			closeLoader();

		}

	});

	return false;

}





//----------------------------------------------------------------------------------------------------------------------

function sendLostForgot(id) {

	var dataList = $query('#'+id);

	showLoader();

	$.ajax({

		url:'reset_password.php',

		type: 'POST',

		data: dataList,

		dataType: "html",

		success: function(data){

			closeLoader();

			alert(data, function() {

				alert(this.data);

				window.location.reload();

			});

		}

	});

	return false;

}



//----------------------------------------------------------------------------------------------------------------------

function performSort(id, sort, table) {

	showLoader();

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=performsort&q='+id+'&sort='+sort+'&type='+table,

		dataType: "html",

		success: function(data){

			window.location.reload();

		}

	});

	return false;

}

//----------------------------------------------------------------------------------------------------------------------

function performSortUser(id, sort, table) {

	showLoader();

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=performsort_user&q='+id+'&sort='+sort+'&type='+table,

		dataType: "html",

		success: function(data){

			window.location.reload();

		}

	});

	return false;

}



//----------------------------------------------------------------------------------------------------------------------

function edit_status(el, id, type, table) {

	var status = el.attr("rel");

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=edit_status&id='+id+'&type='+type+'&table='+table+'&status='+status,

		dataType: "html",

		success: function(data){

			if(status==1) {

				el.removeClass("btn-event-close").addClass("btn-event-open");

				el.attr("rel","0");

				el.html(1);

				el.attr("data-original-title","????ng");

			} else {

				el.removeClass("btn-event-open").addClass("btn-event-close");

				el.attr("rel","1");

				el.html(0);

				el.attr("data-original-title","M???");

			}

		}

	});

	return false;

}



//----------------------------------------------------------------------------------------------------------------------

function edit_status_land(el, id, type, table) {

	var status = el.attr("rel");

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=edit_status_land&id='+id+'&type='+type+'&table='+table+'&status='+status,

		dataType: "html",

		success: function(data){

			if(status==1) {

				el.attr("rel","0");

				el.html(data).hide().fadeIn('show');

			} else {

				el.attr("rel","1");

				el.html(data).hide().fadeIn('show');

			}

		}

	});

	return false;

}



//----------------------------------------------------------------------------------------------------------------------

function edit_status_core(el, id, type, table, qr) {

	var status = el.attr("rel");

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=edit_status_core&id='+id+'&type='+type+'&table='+table+'&qr='+qr+'&status='+status,

		dataType: "html",

		success: function(data){

			if(status==1) {

				el.removeClass("btn-event-close").addClass("btn-event-open");

				el.attr("rel","0");

				el.attr("data-original-title","????ng");

			} else {

				el.removeClass("btn-event-open").addClass("btn-event-close");

				el.attr("rel","1");

				el.attr("data-original-title","M???");

			}

		}

	});

	return false;

}



//----------------------------------------------------------------------------------------------------------------------

function coreDashboard(id,type) {

		var dataList = $query('#'+id);

		showLoader();

		$.ajax({

			url:'/adminjet/action.php',

			type: 'POST',

			data: 'url=core_dashboard&'+dataList+'&type='+type,

			dataType: "html",

			success: function(data){

				showResult(id, data);

			}

		});

		return false;

}

//----------------------------------------------------------------------------------------------------------------------

function changeInformation(id) {

	var dataList = new FormData($('#'+id)[0]);

	showLoader();

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: dataList,

		dataType: "html",

		success: function(data){

			showResult(id, data);

		},

		cache: false,

		contentType: false,

		processData: false

	});

	return false;

}



//----------------------------------------------------------------------------------------------------------------------

function backupDatabase(id) {

	showLoader();

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=backup_data',

		dataType: "html",

		success: function(data){

			showResult(id,data);

		}

	});

	return false;

}



//----------------------------------------------------------------------------------------------------------------------

function getDistrict(value, id, id2, type) {

	showLoader();

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=get_location&parent='+value+'&type='+type,

		dataType: "html",

		success: function(data){

			showResult(id, data);

		}

	});

	showLoader();

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=get_location&parent='+value+'&type=3',

		dataType: "html",

		success: function(data){

			showResult(id2, data);

		}

	});

	return false;

}

function getLocation(value, id, type) {

	showLoader();

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=get_location&parent='+value+'&type='+type,

		dataType: "html",

		success: function(data){

			showResult(id, data);

		}

	});

	return false;

}



//----------------------------------------------------------------------------------------------------------------------

function status_view(el, id, type, table) {

	var status = el.attr("rel");

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=edit_status&id='+id+'&type='+type+'&table='+table+'&status='+status,

		dataType: "html",

		success: function(data){

			if(status==1) {

				el.removeClass("btn-success").addClass("btn-warning");

				el.attr("rel","0");

				el.html("Ch??a xem");

				el.attr("data-original-title","Chuy???n sang: ???? xem");

			} else {

				el.removeClass("btn-warning").addClass("btn-success");

				el.attr("rel","1");

				el.html("???? xem");

				el.attr("data-original-title","Chuy???n sang: Ch??a xem");

			}

		}

	});

	return false;

}



function open_modal_order(id) {

	showLoader();

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=open_order&id='+id,

		dataType: "html",

		success: function(data){

			showResult('_order', data);

		}

	});

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=edit_status&id='+id+'&type=is_active&table=order&status=0',

		dataType: "html",

		success: function(data){

			$('#_v_'+id).removeClass("btn-warning").addClass("btn-success");

			$('#_v_'+id).attr("rel","1");

			$('#_v_'+id).html("???? xem");

			$('#_v_'+id).attr("data-original-title","Chuy???n sang: Ch??a xem");

		}

	});

	return false;

}



function open_modal_contact(id) {

	showLoader();

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=open_contact&id='+id,

		dataType: "html",

		success: function(data){

			showResult('_contact', data);

		}

	});

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=edit_status&id='+id+'&type=is_active&table=contact&status=0',

		dataType: "html",

		success: function(data){

			$('#_v_'+id).removeClass("btn-warning").addClass("btn-success");

			$('#_v_'+id).attr("rel","1");

			$('#_v_'+id).html("???? xem");

			$('#_v_'+id).attr("data-original-title","Chuy???n sang: Ch??a xem");

		}

	});

	return false;

}


function open_modal_recuiment(id) {

	showLoader();

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=open_recuiment&id='+id,

		dataType: "html",

		success: function(data){

			showResult('_recuiment', data);

		}

	});

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=edit_status&id='+id+'&type=is_active&table=recuiment&status=0',

		dataType: "html",

		success: function(data){

			$('#_v_'+id).removeClass("btn-warning").addClass("btn-success");

			$('#_v_'+id).attr("rel","1");

			$('#_v_'+id).html("???? xem");

			$('#_v_'+id).attr("data-original-title","Chuy???n sang: Ch??a xem");

		}

	});

	return false;

}



function open_modal_question(id) {

	showLoader();

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=open_question&id='+id,

		dataType: "html",

		success: function(data){

			showResult('_question', data);

		}

	});

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=edit_status&id='+id+'&type=is_active&table=question&status=0',

		dataType: "html",

		success: function(data){

			$('#_v_'+id).removeClass("btn-warning").addClass("btn-success");

			$('#_v_'+id).attr("rel","1");

			$('#_v_'+id).html("???? xem");

			$('#_v_'+id).attr("data-original-title","Chuy???n sang: Ch??a xem");

		}

	});

	return false;

}



function open_notification(el, id, type) {

	showLoader();

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=open_'+type+'&id='+id,

		dataType: "html",

		success: function(data){

			showResult('_notification', data);

		}

	});

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=edit_status&id='+id+'&type=is_active&table='+type+'&status=0',

		dataType: "html",

		success: function(data){

			el.removeClass("btn-warning").addClass("btn-success");

		}

	});

	return false;

}



//----------------------------------------------------------------------------------------------------------------------

function roundVal(val){

	var result = Math.round(val);

	return result;

}



//----------------------------------------------------------------------------------------------------------------------

function checkAddUser(){

	var inputs = document.forms['member'].getElementsByTagName('input');

	var run_onchange = false;

	var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;

	var userfilter= /^[A-z0-9_-]+$/i;

	var pass ='';

	function valid(){

		var errors = false;

		for(var i=0; i<inputs.length; i++){

			var value = inputs[i].value;

			var id = inputs[i].getAttribute('id');



			// T???o ph???n t??? span l??u th??ng tin l???i

			var span = document.createElement('span');

			// N???u span ???? t???n t???i th?? remove

			var p = inputs[i].parentNode;

			if(p.lastChild.nodeName == 'SPAN') {p.removeChild(p.lastChild);}



			if(id == 'user_name' && value == ''){span.innerHTML ='T??n ????ng nh???p c???a th??nh vi??n?';}

			if(id == 'email' && value == ''){span.innerHTML ='Email ????? li??n l???c v???i th??nh vi??n?';}

			if(id == 'phone' && value == ''){span.innerHTML ='S??? ??i???n tho???i li??n l???c?';}

			if(id == 'password' && value == ''){span.innerHTML ='M???t kh???u c???a th??nh vi??n?';}

			if(id == 'full_name' && value == ''){span.innerHTML ='H??? v?? t??n c???a th??nh vi??n?';}

			if(id == 'email' && value != '') {

				var returnval=emailfilter.test(value);

				if(returnval==false){span.innerHTML ='?????a ch??? email kh??ng h???p l???!';}

			}

			if(id == 'user_name' && value != ''){

				if(value.length < 6 || value.length > 16 ){

					span.innerHTML ='T??n ????ng nh???p ph???i c?? t??? 6 ?????n 16 k?? t???!';

				} else {

					var returnval=userfilter.test(value);

					if(returnval==false){span.innerHTML ='T??n ????ng nh???p kh??ng h???p l???! (kh??ng ???????c ch???a c??c k?? t??? ?????c bi???t)';}

				}

			}

			if(id == 'password' && value != ''){

				if(value.length < 6 || value.length > 16 ){

					span.innerHTML ='M???t kh???u ph???i c?? t??? 6 ?????n 16 k?? t???!';

				}

				else pass = value;

			}

			if(id == 'rePassword' && pass!=value){span.innerHTML ='M???t kh???u nh???p l???i kh??ng kh???p!';}

			if(id == 'phone' && value != ''){

				if(isNaN(value) == true || value.indexOf('.')!=-1 || value < 0){span.innerHTML ='S??? ??i???n tho???i kh??ng h???p l???!';}

				if(isNaN(value) == false && value.length < 10){span.innerHTML ='S??? ??i???n tho???i kh??ng h???p l???!';}

			}



			if(span.innerHTML != ''){

				inputs[i].parentNode.appendChild(span);

				span.setAttribute('class', 'error');

				errors = true;

				run_onchange = true;

				inputs[i].style.border = '1px solid rgba(249, 180, 173, 0.7)';

				inputs[i].style.background = 'rgba(252, 204, 200, 0.5)';

			}

		}

		return !errors;

	}// end valid()



	// Ch???y h??m ki???m tra valid()

	var register = document.getElementById('user');

	register.onclick = function(){

		return valid();

	}



	// Ki???m tra l???i v???i s??? ki???n onchange -> g???i l???i h??m valid()

	for(var i=0; i<inputs.length; i++){

		var id = inputs[i].getAttribute('id');

		inputs[i].onchange = function(){

			if(run_onchange == true){

				this.style.border = '1px solid #cccccc';

				this.style.background = '#ffffff';

				valid();

			}

		}

	}// end for

}



//----------------------------------------------------------------------------------------------------------------------

function checkEditUser(){

	var inputs = document.forms['member'].getElementsByTagName('input');

	var run_onchange = false;

	var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;

	var pass ='';

	function valid(){

		var errors = false;

		for(var i=0; i<inputs.length; i++){

			var value = inputs[i].value;

			var id = inputs[i].getAttribute('id');



			// T???o ph???n t??? span l??u th??ng tin l???i

			var span = document.createElement('span');

			// N???u span ???? t???n t???i th?? remove

			var p = inputs[i].parentNode;

			if(p.lastChild.nodeName == 'SPAN') {p.removeChild(p.lastChild);}



			if(id == 'email' && value == ''){span.innerHTML ='Email ????? li??n l???c v???i th??nh vi??n?';}

			if(id == 'phone' && value == ''){span.innerHTML ='S??? ??i???n tho???i li??n l???c?';}

			if(id == 'full_name' && value == ''){span.innerHTML ='H??? v?? t??n c???a th??nh vi??n?';}

			if(id == 'email' && value != '') {

				var returnval=emailfilter.test(value);

				if(returnval==false){span.innerHTML ='?????a ch??? email b???n nh???p kh??ng h???p l???!';}

			}

			if(id == 'password' && value != ''){

				if(value.length < 6 || value.length > 16 ){

					span.innerHTML ='M???t kh???u ph???i c?? t??? 6 ?????n 16 k?? t???!';

				}

				else pass = value;

			}

			if(id == 'rePassword' && pass!=value){span.innerHTML ='M???t kh???u nh???p l???i kh??ng kh???p!';}

			if(id == 'phone' && value != ''){

				if(isNaN(value) == true || value.indexOf('.')!=-1 || value < 0){span.innerHTML ='S??? ??i???n tho???i kh??ng h???p l???!';}

				if(isNaN(value) == false && value.length < 10){span.innerHTML ='S??? ??i???n tho???i kh??ng h???p l???!';}

			}



			if(span.innerHTML != ''){

				inputs[i].parentNode.appendChild(span);

				span.setAttribute('class', 'error');

				errors = true;

				run_onchange = true;

				inputs[i].style.border = '1px solid rgba(249, 180, 173, 0.7)';

				inputs[i].style.background = 'rgba(252, 204, 200, 0.5)';

			}

		}

		return !errors;

	}// end valid()



	// Ch???y h??m ki???m tra valid()

	var register = document.getElementById('user');

	register.onclick = function(){

		return valid();

	}



	// Ki???m tra l???i v???i s??? ki???n onchange -> g???i l???i h??m valid()

	for(var i=0; i<inputs.length; i++){

		var id = inputs[i].getAttribute('id');

		inputs[i].onchange = function(){

			if(run_onchange == true){

				this.style.border = '1px solid #cccccc';

				this.style.background = '#ffffff';

				valid();

			}

		}

	}// end for

}



//----------------------------------------------------------------------------------------------------------------------

function userChangePassword(){

	var inputs = document.forms['changePass'].getElementsByTagName('input');

	var run_onchange = false;

	var pass ='';

	var passOld = '';

	function valid(){

		var errors = false;

		for(var i=0; i<inputs.length; i++){

			var value = inputs[i].value;

			var id = inputs[i].getAttribute('id');



			// T???o ph???n t??? span l??u th??ng tin l???i

			var span = document.createElement('span');

			// N???u span ???? t???n t???i th?? remove

			var p = inputs[i].parentNode;

			if(p.lastChild.nodeName == 'SPAN') {p.removeChild(p.lastChild);}





			if(id == 'password2old' && value == ''){span.innerHTML ='M???t kh???u hi???n t???i c???a b???n?';}

			if(id == 'password2old' && value != ''){passOld = value;}

			if(id == 'password' && value == ''){span.innerHTML ='M???t kh???u m???i m?? mu???n b???n ?????i?';}

			if(id == 'password' && value != ''){

				if(value.length < 6 || value.length > 16 ){

					span.innerHTML ='M???t kh???u ph???i c?? t??? 6 ?????n 16 k?? t???!';

				}

				else {

					pass = value;

					if(pass == passOld){span.innerHTML ='M???t kh???u m???i kh??ng ???????c tr??ng v???i m???t kh???u hi???n t???i!';}

				}

			}

			if(id == 'rePassword' && pass!=value){span.innerHTML ='M???t kh???u nh???p l???i kh??ng kh???p!';}



			if(span.innerHTML != ''){

				inputs[i].parentNode.appendChild(span);

				span.setAttribute('class', 'error');

				errors = true;

				run_onchange = true;

				inputs[i].style.border = '1px solid rgba(249, 180, 173, 0.7)';

				inputs[i].style.background = 'rgba(252, 204, 200, 0.5)';

			}

		}

		return !errors;

	}// end valid()



	// Ch???y h??m ki???m tra valid()

	var register = document.getElementById('btnChangePass');

	register.onclick = function(){

		return valid();

	}



	// Ki???m tra l???i v???i s??? ki???n onchange -> g???i l???i h??m valid()

	for(var i=0; i<inputs.length; i++){

		var id = inputs[i].getAttribute('id');

		inputs[i].onchange = function(){

			if(run_onchange == true){

				this.style.border = '1px solid #cccccc';

				this.style.background = '#ffffff';

				valid();

			}

		}

	}// end for

}



//----------------------------------------------------------------------------------------------------------------------

function userChangeInfo(){

	var inputs = document.forms['changeInfo'].getElementsByTagName('input');

	var run_onchange = false;

	var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;

	var pass ='';

	function valid(){

		var errors = false;

		for(var i=0; i<inputs.length; i++){

			var value = inputs[i].value;

			var id = inputs[i].getAttribute('id');



			// T???o ph???n t??? span l??u th??ng tin l???i

			var span = document.createElement('span');

			// N???u span ???? t???n t???i th?? remove

			var p = inputs[i].parentNode;

			if(p.lastChild.nodeName == 'SPAN') {p.removeChild(p.lastChild);}



			if(id == 'email' && value == ''){span.innerHTML ='Email ????? li??n l???c v???i b???n?';}

			if(id == 'full_name' && value == ''){span.innerHTML ='H??? v?? t??n c???a b???n?';}

			if(id == 'email' && value != '') {

				var returnval=emailfilter.test(value);

				if(returnval==false){span.innerHTML ='?????a ch??? email b???n nh???p kh??ng h???p l???!';}

			}

			if(id == 'phone' && value != ''){

				if(isNaN(value) == true || value.indexOf('.')!=-1 || value < 0){span.innerHTML ='S??? ??i???n tho???i kh??ng h???p l???!';}

				if(isNaN(value) == false && value.length < 10){span.innerHTML ='S??? ??i???n tho???i kh??ng h???p l???!';}

			}



			if(id == 'passwordold' && value == ''){span.innerHTML ='M???t kh???u hi???n t???i c???a b???n?';}



			if(span.innerHTML != ''){

				inputs[i].parentNode.appendChild(span);

				span.setAttribute('class', 'error');

				errors = true;

				run_onchange = true;

				inputs[i].style.border = '1px solid rgba(249, 180, 173, 0.7)';

				inputs[i].style.background = 'rgba(252, 204, 200, 0.5)';

			}

		}

		return !errors;

	}// end valid()



	// Ch???y h??m ki???m tra valid()

	var register = document.getElementById('btnChangeInfo');

	register.onclick = function(){

		return valid();

	}



	// Ki???m tra l???i v???i s??? ki???n onchange -> g???i l???i h??m valid()

	for(var i=0; i<inputs.length; i++){

		var id = inputs[i].getAttribute('id');

		inputs[i].onchange = function(){

			if(run_onchange == true){

				this.style.border = '1px solid #cccccc';

				this.style.background = '#ffffff';

				valid();

			}

		}

	}// end for

}



function listDistrict(value) {

	showLoader();

	$.ajax({

		url:'/adminjet/action.php',

		type: 'POST',

		data: 'url=get_location&city='+value,

		dataType: "html",

		success: function(data){

			showResult('_district', data);

			$('.selectpicker').selectpicker();

		}

	});

	return false;

}
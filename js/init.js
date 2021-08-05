function $$$(id) {
    return document.getElementById(id);
}

function Forward(url) {
    window.location.href = url;
}

function _postback() {
    return void(1);
}
//----------------------------------------------------------------------------------------------------------------------
function ajaxFunction() {
    var xmlHttp = null;
    try {
        // Firefox, Internet Explorer 7. Opera 8.0+, Safari.
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer 6.
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                return false;
            }
        }
    }
}



//----------------------------------------------------------------------------------------------------------------------
/** Code chạy send mail */
function $query(obj) {
    var query = "";
    $(obj).find("input").each(function(i) {
        var t = $(obj).find("input").eq(i);
        if ((t.attr("type") != "checkbox") && (t.attr("type") != "button") && (t.attr("type") != "radio")) {
            if (t.attr("type") != "password") {
                query += "&" + t.attr("name") + "=" + encodeURIComponent(t.val());
            } else {
                query += "&" + t.attr("name") + "=" + document.getElementById(t.attr("name")).value;
            }
        } else {
            if (t.attr("type") == "checkbox") {
                if (t.is(":checked"))
                    query += "&" + t.attr("name") + "=" + t.attr("value");
            } else if (t.attr("type") == "radio") {
                if (t.is(":checked"))
                    query += "&" + t.attr("name") + "=" + t.attr("value");
            }
        }
    });
    $(obj).find("textarea").each(function(i) {
        var t = $(obj).find("textarea").eq(i);
        query += "&" + t.attr("name") + "=" + encodeURIComponent(t.val());
    });
    $(obj).find("select").each(function(i) {
        var t = $(obj).find("select").eq(i);
        query += "&" + t.attr("name") + "=" + encodeURIComponent(t.val());
    });

    return query.substring(1);
}

function $query_unt(obj) {
    var query = "";
    $(obj).find("input").each(function(i) {
        var t = $(obj).find("input").eq(i);
        if ((t.attr("type") != "button") && (t.attr("type") != "submit") && (t.attr("type") != "reset") && (t.attr("type") != "hidden")) {
            if ((t.attr("type") != "checkbox") && (t.attr("type") != "radio")) {
                t.val('');
            } else {
                t.attr("checked", false);
            }
        } else {}
    });
    $(obj).find("textarea").each(function(i) {
        var t = $(obj).find("textarea").eq(i);
        t.val('');
    });
    return true;
}

function showLoader() {
    $("#_loading").html("<div style=\"position: fixed; top: 50%; width:100%; text-align: center; background: transparent; z-index: 999999999;\"><div class=\"windows8\"> <div class=\"wBall\" id=\"wBall_1\"> <div class=\"wInnerBall\"> </div> </div> <div class=\"wBall\" id=\"wBall_2\"> <div class=\"wInnerBall\"> </div> </div> <div class=\"wBall\" id=\"wBall_3\"> <div class=\"wInnerBall\"> </div> </div> <div class=\"wBall\" id=\"wBall_4\"> <div class=\"wInnerBall\"> </div> </div> </div></div>").hide().fadeIn(10);
    block = true;
}


function closeLoader() {
    $("#_loading").html("").hide().fadeOut(100);
    block = false;
}

function showResult(type, data) {
    closeLoader();
    $("#" + type + "").html(data).hide().fadeIn(100);
    block = false;
}
// End send mail 

//----------------------------------------------------------------------------------------------------------------------
function sendMail(type, id) {
    var dataList = $query('#' + id);
    showLoader();
    $.ajax({
        url: '/action.php',
        type: 'POST',
        data: 'url=' + type + '&' + dataList,
        dataType: "html",
        success: function(data) {
            closeLoader();
            $query_unt('#' + id);
            alert(data);
        }
    });
    return false;
}

function sendMailRecuiment(type, id) {
    var dataList = $query('#' + id);
    showLoader();
    $.ajax({
        url: '/action.php',
        type: 'POST',
        data: 'url=' + type + '&' + dataList,
        dataType: "html",
        success: function(data) {
            closeLoader();
            $query_unt('#' + id);
            alert(data);
        }
    });
    return false;
}

function sendRegEmail() {
    var email = document.forms['email_register']['email'].value;
    var email_filter = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
    var test = true;
    var lang = document.forms['email_register']['lang'].value;
    var thongbao = document.forms['email_register']['thongbao'].value;
    test = email_filter.test(email);
    if (test == false) {
        alert(thongbao);
        return false;
    } else {
        showLoader();
        $.ajax({
            url: '/action.php',
            type: 'POST',
            data: 'url=register_email&email=' + email + '&lang=' + lang,
            dataType: "html",
            success: function(data) {
                closeLoader();
                $('#_reg_email').val('');
                alert(data);
            }
        });
    }
    return false;
}
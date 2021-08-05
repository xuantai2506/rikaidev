$(function() {
    $('#side-menu').metisMenu();
	$('.btn-close').click(function (e) {
		e.preventDefault();
		$(this).parent().parent().parent().fadeOut();
	});
	$('.btn-minimize').click(function (e) {
		e.preventDefault();
		var $target = $(this).parent().parent().next('.panel-body');
		if ($target.is(':visible')) $('i', $(this)).removeClass('fa-chevron-up').addClass('fa-chevron-down');
		else                       $('i', $(this)).removeClass('fa-chevron-down').addClass('fa-chevron-up');
		$target.slideToggle();
	});
});
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = (this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    })

	$(document).ready(function() {
		var body, nav, nav_closed_width, nav_open, nav_toggler, nav_class;
		nav_toggler = $(".toggle-nav");
		nav = $("#side-menu");
		body = $("body");
		nav_closed_width = 50;

		nav_class = getCookie("mainNav");
		if(nav_class == "") nav_class = "main-nav-closed";
		if(nav_class == "main-nav-opened")
			$('i.fa-chevron-left').removeClass('fa-chevron-right');
		else
			$('i.fa-chevron-left').addClass('fa-chevron-right');
		body.addClass(nav_class);

		nav_open = body.hasClass("main-nav-opened") || nav.width() > nav_closed_width;
		nav_toggler.on("click", function() {
			if (nav_open) {
				$(document).trigger("nav-close");
				$('i.fa-chevron-left').addClass('fa-chevron-right');
				setCookie("mainNav", "main-nav-closed", 10);
			} else {
				$(document).trigger("nav-open");
				$('i.fa-chevron-left').removeClass('fa-chevron-right');
				setCookie("mainNav", "main-nav-opened", 10);
			}
			return false;
		});
		$(document).bind("nav-close", function(event, params) {
			body.removeClass("main-nav-opened").addClass("main-nav-closed");
			return nav_open = false;
		});
		return $(document).bind("nav-open", function(event, params) {
			body.addClass("main-nav-opened").removeClass("main-nav-closed");
			return nav_open = true;
		});
	});
});

function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires=" + d.toGMTString();
	document.cookie = cname+"="+cvalue+"; "+expires;
}

function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1);
		if (c.indexOf(name) != -1) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}

$.fn.shiftSelectable = function() {
	var lastChecked,
		$boxes = this;
	$boxes.click(function(evt) {
		if(!lastChecked) {
			lastChecked = this;
			return;
		}

		if(evt.shiftKey) {
			var start = $boxes.index(this),
				end = $boxes.index(lastChecked);
			$boxes.slice(Math.min(start, end), Math.max(start, end) + 1)
				.attr('checked', lastChecked.checked)
				.trigger('change');
		}

		lastChecked = this;
	});
};


//----------------------------------------------------------------------------------------------------------------------
$(function(){
	$(window).scroll(function(){
		if($(this).scrollTop()> 100){
			$('#btnGoTop').fadeIn();
		}
		else{
			$('#btnGoTop').fadeOut();
		}
	});
	$('#btnGoTop').click(function(){
		$('body,html').animate({scrollTop: 0},600);
	});
	$('.header-list-notification').slimscroll({
		height: '300px',
		wheelStep: 35
	});
});
$('.selectpicker').selectpicker();
$(document).ready(function() {
	$('.fileinput-remove-button').click(function(event) {
		$('#del-img').each(function() {
			this.checked = true;
		});
	});
	$('.btn-file').click(function(event) {
		$('#del-img').each(function() {
			this.checked = false;
		});
	});
});
jQuery(function($) {
	$('.auto-number').autoNumeric('init');
});

//----------------------------------------------------------------------------------------------------------------------

$(document).ready(function() {
	$(".fancy-box").fancybox({
		openEffect	: 'elastic',
		closeEffect	: 'elastic'
	});
	$(".fancybox").fancybox({
		openEffect	: 'elastic',
		closeEffect	: 'elastic',
		prevEffect	: 'none',
		nextEffect	: 'none',
		closeBtn	: false,
		helpers     : {
			title	: { type : 'inside' },
			thumbs	: {
				width	: 50,
				height	: 50
			},
			buttons	: {}
		}
	});
});
window.onscroll = function() {
	myFunction();
	scrollFunction()
};


var header = document.getElementById("header");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }

}

var btn_backtop = document.getElementById("icon-back-top");
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    btn_backtop.style.display = "block";
  } else {
    btn_backtop.style.display = "none";
  }
}

function fc_top() {
	$("html, body").animate({scrollTop: 0}, 1000);
}
// modal search
function openSearch() {
  document.getElementById("myOverlay").style.display = "block";
}

function closeSearch() {
  document.getElementById("myOverlay").style.display = "none";
}

// define all UI variable
const navToggler = document.querySelector('.nav-toggler');
const navMenu = document.querySelector('.sticker-menu');
const navLinks = document.querySelectorAll('.sticker-menu a');
const closeMenu = document.querySelectorAll('.sticker-menu .close-menu');

allEventListners();
function allEventListners() {
  	navToggler.addEventListener('click', togglerClick);
  	closeMenu.forEach( elem => elem.addEventListener('click', navLinkClick));
}
function togglerClick() {
  	navToggler.classList.toggle('toggler-open');
  	navMenu.classList.toggle('open');
}

function navLinkClick() {
  	if(navMenu.classList.contains('open')) {
    	navToggler.click();
  	}
}

navMenu.addEventListener('click', function (e) {
    if (e.offsetX > navMenu.offsetWidth) {
       	navToggler.click();
    }
});


// if(navMenu.classList.contains('open')) {
	// alert('ffff');
	$(window).scroll(function() { return false; });
// }


jQuery(document).ready(function($) {
  var m_nav = $('.sticker-menu');
  var nav = m_nav.children('ul');
  var i_menu = $('.change-down');
  i_menu.click(function(event) {
    $(this).toggleClass('fa-angle-down');

  });

  m_nav.find("ul li").each(function() {
    if($(this).find("ul li").length > 0){
      $(this).prepend('<i></i>');
    }
  });
  m_nav.find("li i").click(function(){
    var ul = $(this).nextAll("ul");
    if(ul.is(":hidden") === true){
      $(this).addClass('active');
      ul.slideDown(200);
    }
    else{
      $(this).removeClass("active");
      ul.slideUp();
    }
  });
});

$('.nav-tabs a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
	$('.slick2').slick('setPosition');
});

$(".slick0").slick({
	dots:false,
	infinite:true,
	speed:900,
	autoplaySpeed:3000,
	slidesToShow:1,
	slidesToScroll:1,
    pauseOnHover:true,
    // adaptiveHeight: true,
	autoplay:true,
	arrows:true,
	prevArrow:'<img src="public/frontend/images/icon/ic-prevPr.png" alt="" class="bn-prev"></i>',
	nextArrow:'<img src="public/frontend/images/icon/ic-nextPr.png" alt="" class="bn-next"></i>',

});


$(".slick1").slick({
	dots:false,
	infinite:true,
	speed:300,
	slidesToShow:5,
	slidesToScroll:5,
	pauseOnHover:true,
	autoplay:false,
	arrows:true,
	prevArrow:'<img src="public/frontend/images/icon/ic-prevPr.png" alt="" class="bn-prev"></i>',
	nextArrow:'<img src="public/frontend/images/icon/ic-nextPr.png" alt="" class="bn-next"></i>',
	responsive:[
		{
			breakpoint:1280,
			settings:{
				slidesToShow:4,
				slidesToScroll:1,
				infinite:true,
			}
		},
		{
			breakpoint:1024,
			settings:{
				slidesToShow:4,
				slidesToScroll:1,
				infinite:true,
			}
		},
		{
			breakpoint:800,
			settings:{
				slidesToShow:3,
				slidesToScroll:1
			}
		},
		{
			breakpoint:480,
			settings:{
				slidesToShow:2,
				slidesToScroll:1
			}
		}
	]}
);
$(".slick2").slick({
	dots:false,
	infinite:true,
	speed:300,
	slidesToShow:3,
	slidesToScroll:3,
	// pauseOnHover:true,
	autoplay:false,
	arrows:true,
	nextArrow:'<img src="public/frontend/images/icon/ic-nextPr.png" alt="" class="bn-next"></i>',
	responsive:[
		{
			breakpoint:1280,
			settings:{
				slidesToShow:3,
				slidesToScroll:1,
				infinite:true,
			}
		},
		{
			breakpoint:1024,
			settings:{
				slidesToShow:3,
				slidesToScroll:1,
				infinite:true,
			}
		},
		{
			breakpoint:800,
			settings:{
				slidesToShow:2,
				slidesToScroll:2
			}
		},
		{
			breakpoint:480,
			settings:{
				slidesToShow:1,
				slidesToScroll:1
			}
		}
	]}
);
$(".slick3").slick({
	dots:false,
	infinite:true,
	speed:300,
	slidesToShow:4,
	slidesToScroll:4,
	pauseOnHover:true,
	autoplay:false,
	arrows:true,
	prevArrow:'<img src="public/frontend/images/icon/ic-prevPr.png" alt="" class="bn-prev"></i>',
	nextArrow:'<img src="public/frontend/images/icon/ic-nextPr.png" alt="" class="bn-next"></i>',
	responsive:[
		{
			breakpoint:1280,
			settings:{
				slidesToShow:4,
				slidesToScroll:3,
				infinite:true,
			}
		},
		{
			breakpoint:1024,
			settings:{
				slidesToShow:3,
				slidesToScroll:3,
				infinite:true,
			}
		},
		{
			breakpoint:800,
			settings:{
				slidesToShow:3,
				slidesToScroll:2
			}
		},
		{
			breakpoint:480,
			settings:{
				slidesToShow:1,
				slidesToScroll:1
			}
		}
	]
});
$('.slick4').slick({
	dots:true,
	infinite:true,
	speed:2000,
	pause:5000,
	slidesToShow:1,
	slidesToScroll:1,
	rows:4,
	prevArrow:'',
	nextArrow:'',
	responsive:[{
		breakpoint:1280,
		settings:{
			slidesToShow:1,
			slidesToScroll:1,
			infinite:true,
			dots:true
		}
	},
	{
		breakpoint:800,
		settings:{
			slidesToShow:1,
			slidesToScroll:1
		}
	},
	{
		breakpoint:480,
		settings:{
			slidesToShow:1,
			slidesToScroll:1
		}
	}
	]
});
$('.slick5').slick({
	dots:true,
	infinite:true,
	speed:300,
	pause:1000,
	slidesToShow:6,
	slidesToScroll:1,
	prevArrow:'',
	nextArrow:'',
	responsive:[{
		breakpoint:1280,
		settings:{
			slidesToShow:6,
			slidesToScroll:1,
			infinite:true,
			dots:true
		}
	},
	{
		breakpoint:800,
		settings:{
			slidesToShow:4,
			slidesToScroll:1
		}
	},
	{
		breakpoint:480,
		settings:{
			slidesToShow:3,
			slidesToScroll:1
		}
	}
	]
});

$('.slick6').slick({
	dots:true,
	infinite:true,
	speed:2000,
	pause:5000,
	slidesToShow:1,
	slidesToScroll:1,
	rows:8,
	prevArrow:'',
	nextArrow:'',
	responsive:[{
		breakpoint:1280,
		settings:{
			slidesToShow:1,
			slidesToScroll:1,
			infinite:true,
			dots:true
		}
	},
	{
		breakpoint:800,
		settings:{
			slidesToShow:1,
			slidesToScroll:1,
			rows:6
		}
	},
	{
		breakpoint:480,
		settings:{
			slidesToShow:1,
			slidesToScroll:1,
			rows:5
		}
	}
	]
});


$(document).ready(function() {
  	$(".js-example-basic-single").select2();
});


// giỏ hàng

$('.cart-lap').hover(function() {
    $('.cart-hover').toggleClass('cart-hover-active');
});
$('.cart-hover').hover(function() {
    $(this).toggleClass('cart-hover-active');
});

// click cart
$('.cart-mobile').click(function() {
    $('.cart-hover').toggleClass('cart-hover-active');
});
$('.cart-mobile + .cart-hover').click(function() {
    $(this).toggleClass('cart-hover-active');
});


function onChangeQuantity(event) {
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    const total = Number(event.target.value) * document.getElementById('price-' + event.target.id).innerText.replace(/\,/g, '');
    $.ajax({type: "POST", url: "cart/update-cart/" + event.target.id,
    data: {"number": Number(event.target.value)},
    success: function(result){
            document.getElementById('total-' + event.target.id).innerText = formatNumber(total);
            let totalNumberPro = 0;
            let totalAmount = 0;
            const quantities = $('.qty');
            for(const element of quantities) {
                totalNumberPro += Number(element.value);
            }
            const prices = $('.totalForProduct');
            for(const element of prices) {
                totalAmount += Number(element.innerText.replace(/\,/g, ''));
            }
            document.getElementById('total-number-product').innerText = totalNumberPro;
            document.getElementById('total-amount').innerText = formatNumber(totalAmount);
    },
    fail: function(error) {
        console.log('error update cart');
    }});
}
function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}

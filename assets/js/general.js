var base_url = $("#base_url").data("base_url");
const phoneMQ = window.matchMedia("(max-width: 768px)");
const headerMQ = window.matchMedia("(max-width: 65em)");

//HEADER

let canCont = true;

$(document).on("click", ".mobile-nav-open", function () {
	if (canCont) {
		canCont = false;
		let header = $(this).parent();
		$(this).siblings("nav").css("display", "block");
		setTimeout(() => {
			$(this).siblings("nav").addClass("open");
			canCont = true;
		}, 30);
		$("body, html").addClass("disabledScroll");
	}
});

$(document).on("click", ".mobile-nav-close", function () {
	console.log(canCont);
	if (canCont) {
		canCont = false;
		let header = $(this).parent();
		$("nav").removeClass("open");
		setTimeout(() => {
			$(this).siblings("nav").css("display", "none");
			canCont = true;
		}, 300);
		$("body, html").removeClass("disabledScroll");
	}
});

$(document).click(function (e) {
	if ($("nav").hasClass("open") && !$(e.target).closest("nav").length) {
		console.log(canCont);
		if (canCont) {
			canCont = false;
			let header = $(this).parent();
			$("nav").removeClass("open");
			setTimeout(() => {
				$(this).siblings("nav").css("display", "none");
				canCont = true;
			}, 300);
			$("body, html").removeClass("disabledScroll");
		}
	}
});

//pridanie na hover sticky
window.addEventListener("scroll", function () {
	const header = document.querySelector(".header-scrolled");
	if (window.scrollY > 300) {
		header.classList.add("sticky");
		if ($(".header nav").hasClass("open") && window.scrollY > 600 && canCont) {
			canCont = false;
			$(".header nav").removeClass("open");
			if ($(".dropdown-content").hasClass("shown")) {
				$(".dropdown-content").fadeOut(300);
			}
			setTimeout(() => {
				canCont = true;
			}, 300);
		}
	} else {
		header.classList.remove("sticky");
	}

	/* 
    const primaryNav = document.querySelector('.primary-navigation');
    const navToggle = document.querySelector('.mobile-nav-toggle');

    const visibility = primaryNav.getAttribute("data-visible");
    if (visibility === "true") {
        primaryNav.setAttribute("data-visible", false);
        navToggle.setAttribute("aria-expanded", false);
    } */
});

//hover na sluzby na headri
/* var element = document.getElementsByClassName("nav-services");
var dropdown = document.getElementsByClassName("dropdown-content");

if (element.length > 0) {
  element[0].addEventListener("click", () => {
    if (dropdown[0].classList.contains("show")) {
      dropdown[0].classList.remove("show");
    } else {
      dropdown[0].classList.add("show");
    }
  });
  element[1].addEventListener("click", () => {
    if (dropdown[1].classList.contains("show")) {
      dropdown[1].classList.remove("show");
    } else {
      dropdown[1].classList.add("show");
    }
  });

  if (!headerMQ.matches) {
    element[0].addEventListener("mouseover", event => {
      dropdown[0].classList.remove("fadeout");
      dropdown[0].classList.add("fadein");
    });

    element[0].addEventListener("mouseout", event => {
      dropdown[0].classList.remove("fadein");
      dropdown[0].classList.add("fadeout");
    });

    element[1].addEventListener("mouseover", event => {
      dropdown[1].classList.remove("fadeout");
      dropdown[1].classList.add("fadein");
    });

    element[1].addEventListener("mouseout", event => {
      dropdown[1].classList.remove("fadein");
      dropdown[1].classList.add("fadeout");
      //dropdown[1].style.visibility = 'hidden';
    });
  }
}
 */

let canCont2 = true;
$(document).on("click", ".nav-services", function () {
	console.log("click");
	if (canCont2) {
		canCont2 = false;
		let dd = $(this).children(".dropdown-content");
		console.log(dd.hasClass("shown"));
		if (dd.hasClass("shown")) {
			dd.fadeOut(200);
			setTimeout(() => {
				dd.removeClass("shown");
				canCont2 = true;
			}, 200);
		} else {
			dd.fadeIn(200);
			setTimeout(() => {
				dd.addClass("shown");
				canCont2 = true;
			}, 200);
		}
	}
});
//LOADER
$(window).on("load", function () {
	$(".loader-wrapper").fadeOut("slow");
});

/* //odstranenie logo ked sa scrollne
window.addEventListener("scroll", function(){
    const logo = document.querySelector(".hero-logo");
    logo.classList.toggle("hidden", window.scrollY > 0);
    
}) */

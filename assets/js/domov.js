const swiper = new Swiper(".swiper", {
  // Optional parameters
  //direction: 'horizontal',
  loop: true,

  // If we need pagination
  pagination: {
    //el: '.swiper-pagination',
  },

  autoplay: {
    delay: 8000,
  },

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  // And if we need scrollbar
  scrollbar: {
    el: ".swiper-scrollbar",
  },
  effect: "fade",
});

canCont3 = true;

swiper.on("transitionStart", function () {
  if (canCont3) {
    canCont3 = false;
    let currentSlideIndex = parseInt(swiper.realIndex) + 1;
    $(".hero .text-Container .text")
      .not(
        ".hero .text-Container .text[data-slide_number=" +
          currentSlideIndex +
          "]"
      )
      .fadeOut(300)
      .addClass("hidden");
    $(
      ".hero .text-Container .text[data-slide_number=" + currentSlideIndex + "]"
    )
      .fadeIn(300)
      .removeClass("hidden");
    canCont3 = true;
  }
});
$(document).ready(function () {
  $(".gallery video").each(function () {
    $(this).get(0).pause();
    $(this).get(0).currentTime = 5;
  });
  if ($("#firstVid").get(0).readyState === 4) {
    $("#firstVid, #secondVid").attr("preload", "auto");
  }
  refreshFsLightbox();
});

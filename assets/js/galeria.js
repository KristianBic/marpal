$(document).ready(function () {
  $("video").each(function () {
    $(this).get(0).pause();
    $(this).get(0).currentTime = 5;
  });
  refreshFsLightbox();
});

$(document).on("click", ".pagination .number", function () {
  if (!$(this).hasClass("active")) {
    let page = $(this).data("page");
    $(".pagination .number").removeClass("active");
    console.log($(this));
    $(this).addClass("active");
    $.ajax({
      url: base_url + "theme/ajax/nacitajGaleriu.php",
      method: "POST",
      data: {
        page: page,
        miesto: "www",
        totalcount: $(".galleryContainer").data("totalcount"),
      },
      dataType: "text",
      success: function (data) {
        console.log(data);
        if ($.trim(data) != "") {
          $(".galleryContainer").html(data);
          $(".galleryContainer").data("currentpage", page);
          $("video").each(function () {
            $(this).get(0).pause();
          });
          refreshFsLightbox();
        }
      },
    });
  }
});

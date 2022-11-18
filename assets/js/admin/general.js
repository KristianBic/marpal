var base_url = $("#base_url").data("base_url");

$(document).on("click", ".logoutBtn", function () {
  $.ajax({
    url: base_url + "theme/ajax/logout.php",
    type: "POST",
    data: {
      sid: $("#sid").data("sid"),
    },
    success: function (response) {
      goHome();
    },
  });
});

let btnTimeout;

function toggleButtonLoader(button) {
  if (button.hasClass("loading")) {
    button.children(".btnLoader").fadeOut(300);
    btnTimeout = setTimeout(() => {
      button.removeClass("loading").children(".btnLoader").remove();
    }, 300);
  } else {
    clearTimeout(btnTimeout);
    button
      .addClass("loading")
      .append(
        '<div class="btnLoader"><lord-icon src="' +
          base_url +
          'assets/image/icons/loader3.json" stroke="90" trigger="loop" colors="primary:#ffffff,secondary:#ffffff"></lord-icon></div>'
      );
    button.children(".btnLoader").fadeIn(300);
  }
}

$(document).on("click", ".homeBtn", function () {
  goHome();
});

function goHome() {
  if (base_url.indexOf("localhost") == -1) {
    window.location = base_url;
  } else {
    let urlStrings = window.location.pathname;
    let newStrings = urlStrings.split("/");
    console.log(newStrings);
    var filtered = newStrings.filter(function (el) {
      return el != "";
    });
    newStrings = filtered.slice(0, 2);
    newStrings[1] = "domov";
    newStrings = newStrings.join("/");
    let refresh =
      window.location.protocol + "//" + window.location.host + "/" + newStrings;
    console.log(refresh);
    window.history.replaceState(
      {
        path: refresh,
      },
      "",
      refresh
    );
    window.location.reload();
  }
}

const validateEmail = email => {
  return String(email)
    .toLowerCase()
    .match(
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
};

$(document).on("click", ".sendEmailBtn", function () {
  let error = 0;
  let formData = new FormData();
  let container = $(".formContainer");
  container.find(".err").html("");

  let meno = $("#meno").val();
  if ($.trim(meno) == "") {
    error++;
    $("#meno").addClass("err");
  } else {
    formData.append("meno", meno);
  }

  let priezvisko = $("#priezvisko").val();
  if ($.trim(priezvisko) == "") {
    error++;
    $("#priezvisko").addClass("err");
  } else {
    formData.append("priezvisko", priezvisko);
  }

  let telefon = $("#telefon").val();
  if ($.trim(telefon) == "") {
    error++;
    $("#telefon").addClass("err");
  } else {
    formData.append("telefon", telefon);
  }

  let email = $("#email").val();
  if (!validateEmail(email)) {
    error++;
    $("#email").addClass("err");
  } else {
    formData.append("email", email);
  }

  let predmet = $("#predmet").val();
  formData.append("predmet", predmet);

  let sprava = $("#sprava").val();
  if ($.trim(sprava) == "") {
    error++;
    $("#sprava").addClass("err");
  } else {
    formData.append("sprava", sprava);
  }

  if (error == 0) {
    $.ajax({
      url: base_url + "theme/ajax/odosliEmail.php",
      method: "POST",
      cache: false,
      contentType: false,
      processData: false,
      data: formData,
      dataType: "text",
      success: function (data) {
        console.log(data);
        if ($.trim(data) == "")
          alert("Váš email bol úspešne odoslaný! Čoskoro sa Vám ozveme.");
        else alert("Email nebol odoslaný. Niekde nastala chyba.");
      },
    });
  }
});

$(document).on("click", ".saveContactInfoBtn", function () {
  let error = 0;
  let formData = new FormData();
  let container = $(".kontaktInfo");
  container.find(".err").html("");

  let sidlo = $("#sidlo").val();
  if ($.trim(sidlo) == "") {
    error++;
    container.find(".sidloError").html("Nezadali ste sídlo firmy!");
  } else {
    formData.append("sidlo", sidlo);
  }

  let korAdresa = $("#korAdresa").val();
  if ($.trim(korAdresa) == "") {
    error++;
    container.find(".korAdresaError").html("Nezadali ste kor. adresu!");
  } else {
    formData.append("korAdresa", korAdresa);
  }

  let iban = $("#iban").val();
  if ($.trim(iban) == "") {
    error++;
    container.find(".ibanError").html("Nezadali ste IBAN!");
  } else {
    formData.append("iban", iban);
  }

  let konatel = $("#konatel").val();
  if ($.trim(konatel) == "") {
    error++;
    container.find(".konatelError").html("Nezadali ste konateľa!");
  } else {
    formData.append("konatel", konatel);
  }

  let ico = $("#ico").val();
  if ($.trim(ico) == "") {
    error++;
    container.find(".icoError").html("Nezadali ste IČO!");
  } else {
    formData.append("ico", ico);
  }

  let icdph = $("#icdph").val();
  if ($.trim(icdph) == "") {
    error++;
    container.find(".icdphError").html("Nezadali ste IČDPH!");
  } else {
    formData.append("icdph", icdph);
  }

  if (error == 0) {
    $.ajax({
      url: base_url + "theme/ajax/zmenKontaktUdaje.php",
      method: "POST",
      cache: false,
      contentType: false,
      processData: false,
      data: formData,
      dataType: "text",
      success: function (data) {
        console.log(data);
        alert("Údaje boli úspešne zmenené!");
        container.find(".err").html("");
        setTimeout(() => {
          location.reload();
        }, 500);
      },
    });
  }
});

$(document).on("click", ".changePassBtn", function () {
  let error = 0;
  let formData = new FormData();
  let container = $(".changePass");
  container.find(".err").html("");

  let oldPass = $("#oldPass").val();
  if ($.trim(oldPass) == "") {
    error++;
    container.find(".oldPassError").html("Nezadali ste staré heslo!");
  } else {
    formData.append("oldPass", oldPass);
  }

  let newPass1 = $("#newPass1").val();
  if ($.trim(newPass1) == "") {
    error++;
    container.find(".newPass1Error").html("Nezadali ste nové heslo!");
  } else {
    let newPass2 = $("#newPass2").val();
    if ($.trim(newPass2) == "") {
      error++;
      container.find(".newPass2Error").html("Nezopakovali ste heslo.");
    } else {
      if (newPass1 != newPass2) {
        error++;
        container.find(".newPass1Error").html("Heslá sa nezhodujú.");
      } else {
        formData.append("newPass", newPass2);
      }
    }
  }

  if (error == 0) {
    $.ajax({
      url: base_url + "theme/ajax/zmenaHesla.php",
      method: "POST",
      cache: false,
      contentType: false,
      processData: false,
      data: formData,
      dataType: "text",
      success: function (data) {
        console.log(data);
        if ($.trim(data) == "") {
          alert("Heslo bolo úspešne zmenené!");
          container.find(".err").html("");
          setTimeout(() => {
            location.reload();
          }, 500);
        } else if (data.indexOf("##Err: WrongOldPassword##") > -1) {
          alert("Aktuálne heslo je nesprávne");
        } else {
          alert("Niekde nastala chyba. Kontaktujte správcu webu.");
        }
      },
    });
  }
});

$(document).on("click", ".loginBtn", function () {
	$(".error").html("");
	if ($.trim($("#login").val()) != "" && $.trim($("#password").val()) != "") {
		$.ajax({
			url: base_url + "theme/ajax/login.php",
			type: "POST",
			data: {
				login: $.trim($("#login").val()),
				password: $.trim($("#password").val()),
			},
			success: function (response) {
				console.log(response);
				if ($.trim(response) != "") {
					if (response.indexOf("wrongLogin") > -1) {
						$(".error").html("Nesprávny login alebo heslo.");
					}
				} else {
					window.location = base_url + "admin/galeria";
				}
			},
		});
	} else {
		if ($.trim($("#login").val()) == "" && $.trim($("#password").val()) != "") {
			$(".error").html("Prázdny login.");
		} else if ($.trim($("#password").val()) == "" && $.trim($("#login").val()) != "") {
			$(".error").html("Prázdne heslo.");
		} else {
			$(".error").html("Prázdny login a heslo.");
		}
	}
});

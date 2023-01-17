function addGalleryClose() {
	document.getElementById("addVehicle").style.display = "none";
}
function addGalleryOpen() {
	document.getElementById("addVehicle").style.display = "block";
}

const input = document.getElementById("image_uploads-main");
input.addEventListener("change", function () {
	const preview = document.querySelector(".previewMainIMG");
	updateImageDisplay(preview, input);
});

function updateImageDisplay(Ppreview, Pinput2) {
	const preview = Ppreview;
	const input2 = Pinput2;

	while (preview.firstChild) {
		preview.removeChild(preview.firstChild);
	}

	const curFiles = input2.files;
	if (curFiles.length === 0) {
		const para = document.createElement("p");
		para.textContent = "Momentálne nie sú vybraté žiadne obrázky";
		preview.appendChild(para);
	} else {
		const list = document.createElement("ol");
		preview.appendChild(list);

		for (const file of curFiles) {
			const listItem = document.createElement("li");
			const para = document.createElement("p");
			para.classList.add("mt-3");
			if (validFileType(file)) {
				para.textContent = `Názov: ${file.name}, veľkosť: ${returnFileSize(file.size)}.`;
				const image = document.createElement("img");
				image.src = URL.createObjectURL(file);

				listItem.appendChild(image);
				listItem.appendChild(para);
			} else {
				para.textContent = `Názov: ${file.name}: Zlý typ súboru. Zvolte znovu.`;
				listItem.appendChild(para);
			}

			list.appendChild(listItem);
		}
	}
}
const fileTypes = [
	"image/apng",
	"image/bmp",
	"image/gif",
	"image/jpeg",
	"image/pjpeg",
	"image/png",
	"image/svg+xml",
	"image/tiff",
	"image/webp",
	"image/x-icon",
];

function validFileType(file) {
	return fileTypes.includes(file.type);
}

function returnFileSize(number) {
	if (number < 1024) {
		return number + "bytes";
	} else if (number >= 1024 && number < 1048576) {
		return (number / 1024).toFixed(1) + "KB";
	} else if (number >= 1048576) {
		return (number / 1048576).toFixed(1) + "MB";
	}
}

$(document).on("click", ".sendBtn", function () {
	let formData = new FormData();
	let error = 0;
	let thiss = $(this);

	$(".err").html("");

	let title = $.trim($("#title").val());
	if ($.trim(title) == "") {
		error++;
		$(".error-title").html("Nezadali ste názov.");
	}

	let popis = $.trim($("#popis").val());

	let img;
	if ($("#image_uploads-main")[0].files[0]) {
		img = $("#image_uploads-main")[0].files[0];
	} else {
		error++;
		$(".error-img").html("Nevybrali ste obrázok.");
	}

	let hydraulika = 0;
	if ($("#hydraulika").is(":checked")) {
		hydraulika = 1;
	}
	formData.append("hydraulika", hydraulika);

	if (error == 0) {
		toggleButtonLoader(thiss);

		formData.append("img", img);
		formData.append("title", title);
		formData.append("popis", popis);

		$.ajax({
			url: base_url + "theme/ajax/vozovy-park.php",
			method: "POST",
			cache: false,
			contentType: false,
			processData: false,
			data: formData,
			dataType: "text",
			success: function (data) {
				console.log(data);
				toggleButtonLoader(thiss);
				alert("Vozidlo bolo úspešne pridané do VP.");
				window.location.reload();
			},
		});
	}
});

$(document).on("click", ".delete-card", function () {
	var valueID = $(this).data("delete");

	$.ajax({
		url: base_url + "theme/ajax/vozovy-park.php",
		type: "POST",
		data: { vozID: valueID },
		success: function (data) {
			console.log(data);
			window.location.reload();
		},
	});
});

var updatedID = 0;
$(document).on("click", ".update-card", function () {
	var valueID = $(this).data("update");
	updatedID = valueID;

	$.ajax({
		url: base_url + "theme/ajax/vozovy-park.php",
		type: "POST",
		data: { updID: valueID },
		datatype: "json",

		success: function (data) {
			var duce = jQuery.parseJSON(data);
			var nadpis = duce.nadpis;
			var popis = duce.popis;
			var preview = duce.preview;
			var is_hydraulicke = duce.id_hydraulicke;

			$(".sendBtn").addClass("updPostBtn");
			$(".updPostBtn").removeClass("sendBtn");
			$(".updPostBtn").text("Upraviť vozidlo");

			$('input[id="title"]').val(nadpis);
			$('input[id="popis"]').val(popis);
			if (is_hydraulicke == true) {
				$('input[id="hydraulika"]').prop("checked", true);
			}
			addGalleryOpen();
		},
	});
});

$(document).on("click", ".updPostBtn", function () {
	let formData = new FormData();
	let error = 0;
	let thiss = $(this);

	$(".err").html("");

	let title = $.trim($("#title").val());
	if ($.trim(title) == "") {
		error++;
		$(".error-title").html("Nezadali ste názov.");
	}

	let popis = $.trim($("#popis").val());

	let img;
	if ($("#image_uploads-main")[0].files[0]) {
		img = $("#image_uploads-main")[0].files[0];
	} else {
		//error++;
		//$(".error-img").html("Nevybrali ste obrázok.");
	}

	let hydraulika = 0;
	if ($("#hydraulika").is(":checked")) {
		hydraulika = 1;
	}
	formData.append("hydraulika", hydraulika);

	if (error == 0) {
		toggleButtonLoader(thiss);

		formData.append("img", img);
		formData.append("title", title);
		formData.append("popis", popis);
		formData.append("id", updatedID);

		$.ajax({
			url: base_url + "theme/ajax/updateVozovy-Park.php",
			method: "POST",
			cache: false,
			contentType: false,
			processData: false,
			data: formData,
			dataType: "text",
			success: function (data) {
				console.log(data);
				toggleButtonLoader(thiss);
				alert("Vozidlo bolo úspešne aktualizovane.");
				window.location.reload();
			},
		});
	}
});

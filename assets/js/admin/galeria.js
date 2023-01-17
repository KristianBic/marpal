function addGalleryClose() {
	document.getElementById("addGaleryO").style.display = "none";
}

function addGalleryOpen() {
	document.getElementById("addGaleryO").style.display = "block";
}

function updateGalleryClose() {
	document.getElementById("updateGaleryO").style.display = "none";
}

function updateGalleryOpen() {
	document.getElementById("updateGaleryO").style.display = "block";
}

const input = document.getElementById("nahlad");
const input2 = document.getElementById("galeria");

input.addEventListener("change", function () {
	const preview = document.querySelector(".previewMainIMG");
	updateImageDisplay(preview, input);
});

input2.addEventListener("change", function () {
	const preview = document.querySelector(".preview");
	updateImageDisplay(preview, input2);
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
			if (validFileType(file)) {
				para.textContent = `Názov obrázku: ${file.name}, Veľkosť: ${returnFileSize(file.size)}.`;
				const image = document.createElement("img");
				image.src = URL.createObjectURL(file);

				listItem.appendChild(image);
				listItem.appendChild(para);
			} else {
				if (isVideo(file)) {
					para.textContent = `Názov videa: ${file.name}, Veľkosť: ${returnFileSize(file.size)}.`;
					const video = document.createElement("video");
					// --- Spustenie videa ---
					//video.autoplay = true;
					//video.loop = true;
					video.src = URL.createObjectURL(file);
					listItem.appendChild(video);
					listItem.appendChild(para);
				} else {
					para.textContent = `Názov: ${file.name}: Zlý typ súboru. Zvolte znovu.`;
					listItem.appendChild(para);
				}
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

function isVideo(file) {
	if (file.type == "video/mp4") {
		return true;
	} else return false;
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

var useDarkMode = /* window.matchMedia('(prefers-color-scheme: light)').matches */ false;

tinymce.init({
	selector: "textarea#popis",
	plugins:
		"print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons",
	imagetools_cors_hosts: ["picsum.photos"],
	menubar: "file edit view insert format tools table help",
	toolbar:
		"undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl",
	toolbar_sticky: true,
	autosave_ask_before_unload: false,
	autosave_interval: "30s",
	autosave_prefix: "{path}{query}-{id}-",
	autosave_restore_when_empty: false,
	autosave_retention: "2m",
	image_advtab: true,
	link_list: [
		{ title: "My page 1", value: "https://www.tiny.cloud" },
		{ title: "My page 2", value: "http://www.moxiecode.com" },
	],
	image_list: [
		{ title: "My page 1", value: "https://www.tiny.cloud" },
		{ title: "My page 2", value: "http://www.moxiecode.com" },
	],
	image_class_list: [
		{ title: "None", value: "" },
		{ title: "Some class", value: "class-name" },
	],
	language: "sk",
	importcss_append: true,
	file_picker_callback: function (callback, value, meta) {
		/* Provide file and text for the link dialog */
		if (meta.filetype === "file") {
			callback("https://www.google.com/logos/google.jpg", { text: "My text" });
		}

		/* Provide image and alt text for the image dialog */
		if (meta.filetype === "image") {
			callback("https://www.google.com/logos/google.jpg", {
				alt: "My alt text",
			});
		}

		/* Provide alternative source and posted for the media dialog */
		if (meta.filetype === "media") {
			callback("movie.mp4", {
				source2: "alt.ogg",
				poster: "https://www.google.com/logos/google.jpg",
			});
		}
	},
	templates: [
		{
			title: "New Table",
			description: "creates a new table",
			content:
				'<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
		},
		{
			title: "Starting my story",
			description: "A cure for writers block",
			content: "Once upon a time...",
		},
		{
			title: "New list with dates",
			description: "New List with dates",
			content:
				'<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
		},
	],
	template_cdate_format: "[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]",
	template_mdate_format: "[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]",
	height: 320,
	image_caption: true,
	quickbars_selection_toolbar: "bold italic | quicklink h2 h3 blockquote quickimage quicktable",
	noneditable_noneditable_class: "mceNonEditable",
	toolbar_mode: "sliding",
	contextmenu: "link image imagetools table",
	skin: useDarkMode ? "oxide-dark" : "oxide",
	content_css: useDarkMode ? "dark" : "default",
	content_style: "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }",
});

$(document).on("click", ".addPostBtn", function () {
	let error = 0;
	let formData = new FormData();
	let spinner = $(this).find(".spinnerContainer");
	let container = $(".addGalery");
	let thiss = $(this);

	container.find(".err").html("");

	let typ = $("#typ").val();
	formData.append("typ", typ);

	let nadpis = $("#nadpis").val();
	if ($.trim(nadpis) == "") {
		error++;
		container.find(".nadpisError").html("Nezadali ste nadpis!");
	} else {
		formData.append("nadpis", nadpis);
	}

	let popis = tinymce.get("popis").getContent({ format: "text" });
	if (typ != "galeria" && popis == "") {
		error++;
		container.find(".popisError").html("Nezadali ste popis!");
	}
	if (popis != "") {
		formData.append("popis", popis);
	}

	if (typ != "text") {
		if ($("#nahlad")[0].files[0]) {
			console.log("add nahl");
			formData.append("nahlad", $("#nahlad")[0].files[0]);
		} else {
			error++;
			container.find(".nahladError").html("Nevybrali ste náhľadový obrázok!");
		}
	}

	if (typ == "galeria") {
		if ($("#galeria")[0].files.length > 0) {
			var totalfiles = document.getElementById("galeria").files.length;
			for (let index = 0; index < totalfiles; index++) {
				console.log("add gal");
				formData.append("galeria[]", document.getElementById("galeria").files[index]);
			}
		} else {
			error++;
			container.find(".galeriaError").html("Nevybrali ste žiadnu fotku alebo video!");
		}
	}

	if ($("input[name='ciel[]']:checked").length) {
		$("input[name='ciel[]']:checked").each(function () {
			formData.append("ciel[]", $(this).val());
		});
	} else {
		error++;
		container.find(".cielError").html("Vyberte aspoň jeden cieľ kam chcete pridať príspevok!");
	}

	if (error == 0) {
		toggleButtonLoader(thiss);

		$.ajax({
			url: base_url + "theme/ajax/pridajPrispevok.php",
			method: "POST",
			cache: false,
			contentType: false,
			processData: false,
			data: formData,
			dataType: "text",
			success: function (data) {
				console.log(data);
				toggleButtonLoader(thiss);
				alert("Príspevok bol úspešne pridaný!");
				container.find(".err").html("");
				$(".previewMainIMG, .preview").html("<p>Momentálne nie sú vybraté žiadne obrázky</p>");
				tinymce.get("popis").setContent("");
				$("#nadpis, #nahlad, #galeria").val("");
				$("input[name='ciel[]']:checked").prop("checked", false);
				addGalleryClose();
				window.location.reload();
			},
		});
	}
});

$(document).ready(function () {
	$("#typ").find("option:first").prop("selected", true);
});

function smart_substr(str, len) {
	var temp = str.substr(0, len);
	if (temp.lastIndexOf("<") > temp.lastIndexOf(">")) {
		temp = str.substr(0, 1 + str.indexOf(">", temp.lastIndexOf("<")));
	}
	return temp;
}

$(document).on("click", ".moreBtn", function () {
	let sibling = $(this).siblings(".post-images");
	if ($(this).hasClass("showMorePopis")) {
		sibling = $(this).parent();
		$.ajax({
			url: base_url + "theme/ajax/toggleCutText.php",
			method: "POST",
			data: {
				id: $(this).closest(".prispevokContainer").data("id"),
				action: "more",
			},
			dataType: "text",
			async: false,
			success: function (data) {
				console.log(data);
				if ($.trim(data) != "") {
					sibling.children(".content").html(data);
				}
			},
		});
	}
	sibling.removeClass("more");
	$(this).removeClass("moreBtn").addClass("lessBtn");
	$(this).text("Zobraz menej");
});

$(document).on("click", ".lessBtn", function () {
	let sibling = $(this).siblings(".post-images");
	if ($(this).hasClass("showMorePopis")) {
		sibling = $(this).parent();
		$.ajax({
			url: base_url + "theme/ajax/toggleCutText.php",
			method: "POST",
			data: {
				id: $(this).closest(".prispevokContainer").data("id"),
				action: "less",
			},
			dataType: "text",
			async: false,
			success: function (data) {
				console.log(data);
				if ($.trim(data) != "") {
					sibling.children(".content").html(data);
				}
			},
		});
	}
	sibling.addClass("more");
	$(this).addClass("moreBtn").removeClass("lessBtn");
	$(this).text("Zobraz všetko");
});

$(document).on("change", "#typ", function () {
	if ($(this).val() == "medium") {
		$("#nahlad").attr("accept", ".jpg, .jpeg, .png, .mp4");
		$(".galeriaInputContainer").css("display", "none");
		$(".nahladInputContainer").css("display", "block");
		$(".preview").html("<p>Momentálne nie sú vybraté žiadne obrázky</p>");
		$("#galeria").val("");
		$(".nahladInputContainer .title-bolder").text("Fotka alebo video");
	} else if ($(this).val() == "galeria") {
		$("#nahlad").attr("accept", ".jpg, .jpeg, .png");
		$(".galeriaInputContainer, .nahladInputContainer").css("display", "block");
		$(".previewMainIMG").html("<p>Momentálne nie sú vybraté žiadne obrázky</p>");
		$(".nahladInputContainer .title-bolder").text("Náhľadový obrázok");
		$("#nahlad").val("");
	} else {
		$("#nahlad").attr("accept", "");
		$(".galeriaInputContainer, .nahladInputContainer").css("display", "none");
		$("#nahlad, #galeria").val("");
		$(".preview, .previewMainIMG").html("<p>Momentálne nie sú vybraté žiadne obrázky</p>");
	}
});

$(document).on("click", ".pagination .number", function () {
	if (!$(this).hasClass("active")) {
		let page = $(this).data("page");
		$(".pagination .number").removeClass("active");
		$(this).addClass("active");
		$.ajax({
			url: base_url + "theme/ajax/nacitajGaleriu.php",
			method: "POST",
			data: {
				page: page,
				miesto: "admin",
				totalcount: $(".galContainer").data("totalcount"),
			},
			dataType: "text",
			success: function (data) {
				console.log(data);
				if ($.trim(data) != "") {
					$(".galContainer").html(data);
					$(".galContainer").data("currentpage", page);
					refreshFsLightbox();
				}
			},
		});
	}
});

$(document).on("click", ".delete-prispevok", function () {
	var id = $(this).closest(".prispevokContainer").data("id");

	$.ajax({
		url: base_url + "theme/ajax/deletePrispevok.php",
		type: "POST",
		data: { id: id },
		success: function (data) {
			console.log(data);
			if ($.trim(data) == "") {
				alert("Príspevok bol vymazaný!");
			} else if (data.indexOf("##Err: WrongID##") > -1) {
				alert("ID nebolo nájdené.");
			} else {
				alert("Niekde nastala chyba. Kontaktujte správcu webu.");
			}
			location.reload();
		},
	});
});

var updatedID = 0;
$(document).on("click", ".update-prispevok", function () {
	var id = $(this).closest(".prispevokContainer").data("id");
	updatedID = id;
	var title;
	var typ;
	var popis;

	$.ajax({
		url: base_url + "theme/ajax/getPrispevok.php",
		type: "POST",
		data: { id: id },
		datatype: "json",

		success: function (data) {
			var duce = jQuery.parseJSON(data);
			title = duce.nadpis;
			typ = duce.typ;
			popis = duce.popis;

			$(".addPostBtn").addClass("updPostBtn");
			$(".updPostBtn").removeClass("addPostBtn");
			$(".updPostBtn").text("Upraviť príspevok");

			$('input[id="nadpis"]').val(title);
			$('select[id="typ"]').val(typ).change();
			$("#tinymce > p").val(atob(popis));
			tinymce.activeEditor.setContent(atob(popis));
			$('input[id="webCHB"]').prop("checked", true);
			addGalleryOpen();
		},
	});
});

$(document).on("click", ".updPostBtn", function () {
	let error = 0;
	let formData = new FormData();
	let spinner = $(this).find(".spinnerContainer");
	let container = $(".addGalery");
	let thiss = $(this);

	container.find(".err").html("");

	let typ = $("#typ").val();
	formData.append("typ", typ);

	let nadpis = $("#nadpis").val();
	if ($.trim(nadpis) == "") {
		error++;
		container.find(".nadpisError").html("Nezadali ste nadpis!");
	} else {
		formData.append("nadpis", nadpis);
	}

	let popis = tinymce.get("popis").getContent({ format: "text" });
	if (typ != "galeria" && popis == "") {
		error++;
		container.find(".popisError").html("Nezadali ste popis!");
	}
	if (popis != "") {
		formData.append("popis", popis);
	}

	if ($("input[name='ciel[]']:checked").length) {
		$("input[name='ciel[]']:checked").each(function () {
			formData.append("ciel[]", $(this).val());
		});
	} else {
		error++;
		container.find(".cielError").html("Vyberte aspoň jeden cieľ kam chcete pridať príspevok!");
	}

	formData.append("id", updatedID);

	if (error == 0) {
		toggleButtonLoader(thiss);

		$.ajax({
			url: base_url + "theme/ajax/updatePrispevok.php",
			method: "POST",
			cache: false,
			contentType: false,
			processData: false,
			data: formData,
			dataType: "text",
			success: function (data) {
				console.log(data);
				toggleButtonLoader(thiss);
				alert("Príspevok bol úspešne pridaný!");
				container.find(".err").html("");
				$(".previewMainIMG, .preview").html("<p>Momentálne nie sú vybraté žiadne obrázky</p>");
				tinymce.get("popis").setContent("");
				$("#nadpis, #nahlad, #galeria").val("");
				$("input[name='ciel[]']:checked").prop("checked", false);
				addGalleryClose();
				window.location.reload();
			},
		});
	} else {
		console.log("Error: " + error);
	}
});

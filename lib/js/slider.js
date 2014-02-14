$("#filter").slider({
        orientation: "horizontal",
        range: "min",
        min: 0,
        max: 100,
        value: 50,
        slide: function (event, ui) {
            $("#frequencyVal").html("&nbsp;&nbsp;&nbsp;&nbsp;"+ui.value);
			$("#frequency").val(ui.value);
        }
    });
    $("#frequencyVal").html("&nbsp;&nbsp;&nbsp;&nbsp;"+$("#filter").slider("value"));
	$("#frequency").val($("#filter").slider("value"));

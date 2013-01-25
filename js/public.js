$(document).ready(function () {

	$('#postModal').click(function () {
		$('#post-modal-container').modal().addClass('modal-big');
	});

	$('#source').click(function () {
		$('#pictype-upload').attr("checked", "checked");
		$('#pictype-link').removeAttr("checked");
		$('#url').val('');
	});

	$('#url').click(function (){
		$('#pictype-upload').removeAttr("checked");
		$('#source').val('');
		$('#pictype-link').attr("checked", "checked");
	});

	$(".alink").click(function () {
		var d = new Date();
		$.post(
			'post/sawsaw',
			{"id" : $(this).data("id"),"sid":d.getTime()},
			function (data) {
				switch (data.status) {
					case "ERROR":
						window.location.replace("/facebook");
						break;
					case "INVALID":
						window.location.replace("/");
						break;
					case "OK":
						$("#sawsaw-pane-"+data.uid).show();
						break;
				}
			},
			'json');
		return false;
	});

});

function clearForm() {
	$('#title').val('');
	$('#description').val('');
	$('#url').val('');
}
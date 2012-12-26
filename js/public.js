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
	
});

function clearForm() {
	$('#title').val('');
	$('#description').val('');
	$('#url').val('');
}
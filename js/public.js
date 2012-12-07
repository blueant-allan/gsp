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

	if ($('#frmPosting').length > 0) {

		$('#btnPostadd').click(function () {
			$.post('post',$('#frmPosting').serialize(),
				function (data) {
					alert(data.message);
					$('#post-modal-container').modal('hide')
					clearForm();
				}
			,'json');
		});
	}

});

function clearForm() {
	$('#title').val('');
	$('#description').val('');
	$('#url').val('');
}
var $TABLE = $('#table');

$('.table-add').click(function () {
	var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line').addClass('child');
	$TABLE.find('table').append($clone);
});

$('.table-remove').click(function () {
  $(this).parents('tr').detach();
});
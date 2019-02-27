$('.table-add-child').click(function () {
	var $TABLE = $('#table-child');
	var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line').addClass('child');
	$clone.attr("required", true);
	$TABLE.find('table').append($clone);
});

$('.table-add-contact').click(function () {
	var $TABLE = $('#table-contact');
	var $clone = $TABLE.find('tr.contact').clone(true).removeAttr("required");
	$TABLE.find('table').append($clone);
});

$('.table-remove-child').click(function () {
  $(this).parents('tr').detach();
});

$('.table-remove-contact').click(function () {
  $(this).parents('tr').detach();
});
$('.table-add-child').click(function () {
	var $TABLE = $('#table-child');
	var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line').addClass('child');
	$TABLE.find('table').append($clone);
});

$('.table-add-contact').click(function () {
	var $TABLE = $('#table-contact');
	var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line').addClass('contact');
	$TABLE.find('table').append($clone);
});

$('.table-add-education').click(function () {
	var $TABLE = $('#table-education');
	var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line').addClass('education');
	$TABLE.find('table').append($clone);
});

$('.table-remove-child').click(function () {
  $(this).parents('tr').detach();
});

$('.table-remove-contact').click(function () {
  $(this).parents('tr').detach();
});

$('.table-remove-education').click(function () {
  $(this).parents('tr').detach();
});
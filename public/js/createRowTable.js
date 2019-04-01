$('.table-add-enfant').click(function () {
	var $TABLE = $('#table_enfant');
	var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line').addClass('enfant');
	$TABLE.find('table').append($clone);
});

$('.table_add_contact').click(function () {
	var $TABLE = $('#table_contact');
	var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line').addClass('contact');
	$TABLE.find('table').append($clone);
});

$('.table_add_formation').click(function () {
	var $TABLE = $('#table_formation');
	var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line').addClass('formation');
	$TABLE.find('table').append($clone);
});

$('.table_add_document').click(function () {
	var $TABLE = $('#table_document');
	var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line').addClass('document');
	$TABLE.find('table').append($clone);
});

$('.table_remove_enfant').click(function () {
  $(this).parents('tr').detach();
});

$('.table_remove_contact').click(function () {
  $(this).parents('tr').detach();
});

$('.table_remove_formation').click(function () {
  $(this).parents('tr').detach();
});

$('.table_remove_document').click(function () {
  $(this).parents('tr').detach();
});
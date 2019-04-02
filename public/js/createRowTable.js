$('.addLine').click(function() {
	var $TABLE = $(this).parent('div');
	var $class = $TABLE.attr('id').replace("table_", "");
	var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line').addClass($class);
	$TABLE.find('table').append($clone);
});

$('.removeLine').click(function () {
	$(this).parents('tr').detach();
});
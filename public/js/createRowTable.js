$('.addLine').click(function() {
	var $TABLE = $(this).parent('div');
	var $clone = $(this).next().find('tr.hide').clone(true).removeClass('hide table-line');
	$TABLE.find('table').append($clone);
});


$('.removeLine').click(function () {
	$(this).parents('tr').detach();
});
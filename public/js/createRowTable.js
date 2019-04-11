$('.addLine').click(function(){
	var $clone = $(this).next().clone(true).removeClass('hide').addClass('form-row line');
	$(this).parent().append($clone);
});

$('.removeLine').click(function () {
	$(this).parent('div').detach();
});
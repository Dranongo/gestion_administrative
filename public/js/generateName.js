$(".addLine").button().bind("click", function(){

	$("div.group").each(function(){
		$("div.line").each(function(index){ 
			var elem = $(this);
			elem.find("input").each(function(){
				replaceName($(this), index);
			});
		});
	});
});

function replaceName(elem, index){
	var _name = elem.data("name").replace("%%d%%", index.toString());
	elem.prop("name", _name);
}	
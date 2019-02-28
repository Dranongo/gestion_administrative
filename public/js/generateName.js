$("#suivant").button().bind("click", function(){

	$("tbody tr.child").each(function( index ){
		var elem = $(this);
		
		replaceName(elem.find(".lastName"), index);
		replaceName(elem.find(".firstName"), index);
		replaceName(elem.find(".birthdate"), index);
	});
	$("tbody tr.contact").each(function( index ){
		var elem = $(this);
		
		replaceName(elem.find(".lastName"), index);
		replaceName(elem.find(".firstName"), index);
		replaceName(elem.find(".phoneNumber"), index);
	});
});

function replaceName(elem, index){
	var _name = elem.data("name").replace("%%d%%", index.toString());
	elem.prop("name", _name).attr("required", true);
}
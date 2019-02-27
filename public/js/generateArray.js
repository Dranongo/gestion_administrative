$("#suivant").button().bind("click", function(){
	console.log("coucou");

	$("tbody tr.child").each(function( index ){
		var elem = $(this);
		
		replaceName(elem.find(".lastName"), index);
		replaceName(elem.find(".firstName"), index);
		replaceName(elem.find(".birthdate"), index);
		
	});
});

function replaceName(elem, index){
	var _name = elem.data("name").replace("%%d%%", index.toString());
	elem.prop("name", _name);
}
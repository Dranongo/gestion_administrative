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
		replaceName(elem.find(".relationship"), index);
		replaceName(elem.find(".phoneNumber"), index);
	});
	$("tbody tr.education").each(function( index ){
		var elem = $(this);
		
		replaceName(elem.find(".course"), index);
		replaceName(elem.find(".courseListLevel"), index);
		replaceName(elem.find(".courseInstitution"), index);
		replaceName(elem.find(".coursePlace"), index);
		replaceName(elem.find(".courseBeginning"), index);
		replaceName(elem.find(".courseEnding"), index);
		replaceName(elem.find(".graduate"), index);
	});
	$("tbody tr.attachment").each(function( index ){
		var elem = $(this);
		
		replaceName(elem.find(".fileAttachment"), index);
		replaceName(elem.find(".nameAttachment"), index);
		replaceName(elem.find(".typeAttachment"), index);
	});
});

function replaceName(elem, index){
	var _name = elem.data("name").replace("%%d%%", index.toString());
	elem.prop("name", _name).attr("required", true);
}
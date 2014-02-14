$(document).ready(function(){
	$('#CategoryTabDiv').tabs();
	$('#CategoryTabDiv').removeClass('ui-corner-all');
	$('#CategoryTabDiv').removeClass('ui-widget-content');
	
	
	
	$('#MusicTab').on('click',function(){
		alert('redirecting');
		window.location="CHCInstituteListWIC.php?&IType='guitar'";
	});
});


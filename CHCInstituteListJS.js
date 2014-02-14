$(document).ready(function(){
	$('#CategoryTabDiv').tabs();
	$('#CategoryMenuDiv').menu();
	
	$('#CategoryTabDiv').removeClass('ui-corner-all');
	$('#CategoryMenuDiv').removeClass('ui-corner-all');
	$('#CategoryTabDiv').removeClass('ui-widget-content');
	
	
	 $( "input[type=submit],  button" ).button();
	$('#MusicTab').on('click',function(){
		$.ajax({
				url: 'CHCInstituteListWIC.php?&ListType=2',
				dataType:'JSON',
				success:function(data){			
				
					createInstituteList(data);					
				}

			});			
			
	});
	$('#LanguageTab').on('click',function(){
		if($('#CategoryMenuDiv').css('display')=='none'){
			$('#CategoryMenuDiv').show('slow');
		}else{
			$('#CategoryMenuDiv').hide('slow');
		}
		
		/*offset=$(this).offset();
		alert( "left: " + offset.left + ", top: " + offset.top );
		$("#CategoryMenuDiv").css({top: offset.top+$(this).height()+20, left: offset.left-5});
		//alert("Top: " + x.top + " Left: " + x.left);
		alert(offset.top+",,,"+$(this).height()+",,,"+$("#CategoryMenuDiv").offset().top)*/
		
		
		
	});

	
	
	
	
	
	
});

function createInstituteList(JsonObj)
{
	l=JsonObj.length;
	for(i=0;i<l;i++){
		var cloneObj=$("#dummy").clone();
		cloneObj.find(".instituteName").html(JsonObj[i]["INSTITUTE_NAME"]);
		cloneObj.find(".instituteAddress").html(JsonObj[i]["ADDRESS_LINE1"]+","+JsonObj[i]["ADDRESS_LINE2"]);
		cloneObj.find(".cityName").html(JsonObj[i]["CITY_NAME"]);
		cloneObj.find(".pin").html(JsonObj[i]["PIN_CODE"]);	
		var ratingPos=setRating(JsonObj[i]["RANKING"]);		
		cloneObj.find(".rating").css("background-position",ratingPos);							
		cloneObj.removeAttr("id");
		$("#resultContainer").append(cloneObj);			
	}
}

function setRating(rating)
{
	rating=Math.round(rating);
	var pos=-90-1*rating*15;
	//alert(pos);
	return "0 "+pos+"px";	
}

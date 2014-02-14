var pageSize=5;
var l=JsonObj.length;
var pages=l/pageSize;
$(document).ready(function(){
	//alert(JsonObj.length);
	
	
	$('.multicheck').click(function(e) {     
         $(this).toggleClass("checked"); 
         $(this).find("span").toggleClass("icon-ok"); 
         return false;
      });
});
function search(){
	var limit=pageSize;
	if(pageSize>l){
		limit=l;
	}
	for(i=0;i<limit;i++){
		if((i==0)||(JsonObj[i]["city"]!=JsonObj[i-1]["city"])){
			var cloneObj=$("#dummyLoc").clone();
			cloneObj.find(".location").html(JsonObj[i]["city"]);
			cloneObj.removeAttr("id");
			$("#resultContainer").append(cloneObj);
		}
		var cloneObj=$("#dummy").clone();
		cloneObj.find(".itemName").html(JsonObj[i]["itemName"]);
		cloneObj.find(".itemDesc").html(JsonObj[i]["itemDesc"]);
		cloneObj.find(".cityName").html(JsonObj[i]["city"]);
		cloneObj.find(".zip").html(JsonObj[i]["zip"]);
		cloneObj.find(".bar").css("width",JsonObj[i]["frequency"]+"%");	
		cloneObj.find(".frequency").html(JsonObj[i]["frequency"]);
		var ratingPos=setRating(JsonObj[i]["rating"]);		
		cloneObj.find(".rating").css("background-position",ratingPos);	
		var secRatingPos=setSecRating(JsonObj[i]["secRating"]);
		cloneObj.find(".secRating").css("background-position",secRatingPos);		
		//cloneObj.find(".secRating").html(JsonObj[i]["secRating"]);
		cloneObj.find(".ILDesc").html(JsonObj[i]["ILDesc"]);
		cloneObj.removeAttr("id");
		$("#resultContainer").append(cloneObj);			
	}
	if(pages>1){
		var pager="<div class='pagination pagination-centered'>";
		pager+="<ul>";
		for(k=1;k<=pages;k++){	
			pager+="<li><a href='javascript:void(0);' onclick='showPage("+k+");'>"+k+"</a></li>";    
		}
		var rem=pages-Math.round(pages);
		//alert(l+",r="+rem+",ps="+pageSize+",p="+pages);
		if(rem){
			pager+="<li><a href='javascript:void(0);' onclick='showPage("+k+");'>"+k+"</a></li>";    
		}
		pager+="</ul>";
		pager+="</div>";
		$("#resultContainer").append(pager);
	}
	}		
function showHideFullFilters()
{
	var isFull=$("#fullFilters").css("display");
	if(isFull!="none"){
		//hide full filters
		$("#fullFilters").css("display","none");
		//show quick filters
		$("#quickFilters").css("display","block");
		//$("#resultContainer").css("left","20px");
		//$("#resultContainer").css("top","260px");
		$("#resultContainer").css("width","1000px");
		var gen=$("input:radio[name=genderF]:checked").val();
		$("input:radio[name=gender]").each(function(){if($(this).val()==gen){$(this).attr("checked","checked")}});
		
		var chk=$("#showLocF").is(":checked");
		if(chk){
			$("#showLoc").attr("checked","checked");
			//$("#showLoc").checked(true);
		}else{
			$("#showLoc").removeAttr("checked");
			//$("#showLoc").checked(true);
		}
						
		var country=$("#countryF").val();		
		$("#countryQ option").each(function(){if($(this).val()==country){$(this).attr("selected","selected")}else{$(this).removeAttr("selected")}});
		
		var state=$("#stateF").val();		
		$("#stateQ option").each(function(){if($(this).val()==state){$(this).attr("selected","selected")}else{$(this).removeAttr("selected")}});
		
		var city=$("#cityF").val();		
		$("#cityQ option").each(function(){if($(this).val()==city){$(this).attr("selected","selected")}else{$(this).removeAttr("selected")}});
		
	}else{
		//show full filters
		$("#fullFilters").css("display","block");
		//hide quick filters
		$("#quickFilters").css("display","none");
		
		//$("#resultContainer").css("left","340px");
		//$("#resultContainer").css("top","54px");
		$("#resultContainer").css("width","660px");
		
		var gen=$("input:radio[name=gender]:checked").val();		
		$("input:radio[name=genderF]").each(function(){if($(this).val()==gen){$(this).attr("checked","checked")}});
		
		var chk=$("#showLoc").is(":checked");
		if(chk){
			//$("#showLocF").checked(true);
			$("#showLocF").attr("checked","checked");
		}else{
			$("#showLocF").removeAttr("checked");
			//$("#showLocF").checked(false);
		}
		
		var country=$("#countryQ").val();		
		$("#countryF option").each(function(){if($(this).val()==country){$(this).attr("selected","selected")}else{$(this).removeAttr("selected")}});
		
		var state=$("#stateQ").val();		
		$("#stateF option").each(function(){if($(this).val()==state){$(this).attr("selected","selected")}else{$(this).removeAttr("selected")}});
		
		var city=$("#cityQ").val();
		$("#cityF option").each(function(){if($(this).val()==city){$(this).attr("selected","selected")}else{$(this).removeAttr("selected")}});
	}
}

function setRating(rating)
{
	rating=Math.round(rating);
	var pos=-1*rating*15;
	//alert(pos);
	return "0 "+pos+"px";	
}
function setSecRating(rating)
{
	rating=Math.round(rating);
	var pos=-90-1*rating*15;
	//alert(pos);
	return "0 "+pos+"px";	
}
function showPage(pageNum)
{
	var minLim=(pageNum-1)*pageSize;
	var maxLim=(pageNum)*pageSize;
	if(maxLim>l){
		maxLim=l;
	}
	$("#resultContainer").html("");
	for(i=minLim;i<maxLim;i++){
		if((i==0)||(JsonObj[i]["city"]!=JsonObj[i-1]["city"])){
			var cloneObj=$("#dummyLoc").clone();
			cloneObj.find(".location").html(JsonObj[i]["city"]);
			cloneObj.removeAttr("id");
			$("#resultContainer").append(cloneObj);
		}
		var cloneObj=$("#dummy").clone();
		cloneObj.find(".itemName").html(JsonObj[i]["itemName"]);
		cloneObj.find(".itemDesc").html(JsonObj[i]["itemDesc"]);
		cloneObj.find(".cityName").html(JsonObj[i]["city"]);
		cloneObj.find(".zip").html(JsonObj[i]["zip"]);
		cloneObj.find(".bar").css("width",JsonObj[i]["frequency"]+"%");	
		cloneObj.find(".frequency").html(JsonObj[i]["frequency"]);
		var ratingPos=setRating(JsonObj[i]["rating"]);		
		cloneObj.find(".rating").css("background-position",ratingPos);	
		var secRatingPos=setSecRating(JsonObj[i]["secRating"]);
		cloneObj.find(".secRating").css("background-position",secRatingPos);		
		//cloneObj.find(".secRating").html(JsonObj[i]["secRating"]);
		cloneObj.find(".ILDesc").html(JsonObj[i]["ILDesc"]);
		cloneObj.removeAttr("id");
		$("#resultContainer").append(cloneObj);			
	}
	if(pages>1){
		var pager="<div class='pagination pagination-centered'>";
		pager+="<ul>";
		for(k=1;k<=pages;k++){	
			pager+="<li><a href='javascript:void(0);' onclick='showPage("+k+");'>"+k+"</a></li>";    
		}
		var rem=pages-Math.round(pages);
		//alert(l+",r="+rem+",ps="+pageSize+",p="+pages);
		if(rem){
			pager+="<li><a href='javascript:void(0);' onclick='showPage("+k+");'>"+k+"</a></li>";    
		}
		pager+="</ul>";
		pager+="</div>";
		$("#resultContainer").append(pager);
	}
}
function showHideLoc()
{
	
	var disp=$(".locationDiv").css("display");
	if(disp=="none"){
		$(".locationDiv").css("display","block");
		$("#dummyLoc").css("display","none");
	}else{
		$(".locationDiv").css("display","none");
	}
}
function filterRating(rating)
{
	
	$("#primaryRating").val(rating);
	var curStar=$("#firstStar");
	for(i=0;i<rating;i++){
		curStar.attr("src","star/filledStar.png");
		curStar=curStar.next();
	}
	for(i=rating;i<5;i++){
		curStar.attr("src","star/emptyStar.png");
		curStar=curStar.next();
	}
}
function filterSecRating(rating)
{
	$("#secRating").val(rating);
	var curStar=$("#firstStarSec");
	for(i=0;i<rating;i++){
		curStar.attr("src","star/filledStarPink.png");
		curStar=curStar.next();
	}
	for(i=rating;i<5;i++){
		curStar.attr("src","star/emptyStar.png");
		curStar=curStar.next();
	}
}

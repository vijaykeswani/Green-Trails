//Placed outside .ready for scoping
var targetX, targetY;
var strComma;
var intEqualTags;
var tagCounter = 0;
var smallTagSize = 60;
var standardTagSize = 100;
var boolLockTag = false;

$(document).ready(function(){	
	//Dynamically wrap image
	
	$("img").wrap('<div id="tag-wrapper" />');
	
	//Dynamically size wrapper div based on image dimensions
	$("#tag-wrapper").css({width: $("img").outerWidth(), height: $("img").outerHeight()});

	//Append #tag-target content and #tag-input content
	$("#tag-wrapper").append('<div id="tag-target"></div><div id="tag-input"><font face="tahoma" color="#FFFFFF" style="background-color:#009" size="1"><b>&nbsp;Tag The Photo&nbsp;</b></font><label for="tag-name">New Tag:</label><input type="text" id="tag-name"><button type="submit">Tag</button><button type="reset">Cancel</button></div>');
	
	//$("#tag-wrapper").click(function(e){
	
	//#####################################################################################################
	$("img").mousemove(function(e){
		for (var i = 0; i<totalTags; i++){
			if ((e.pageX>=arrTagX[i]+20 && e.pageX<=arrTagX[i]+arrTagSize[i]+30) && (e.pageY>=arrTagY[i]+20 && e.pageY<=arrTagY[i]+arrTagSize[i]+50)){
				showTag(i);//(arrTagValue[i]);	
				arrTagLock[i] = true;	
				document.getElementsByTagName('div')[0].style.cursor = "default";
			}
			else{
				hideTag(i);
				arrTagLock[i] = false;
			}
		}
	});
	//#####################################################################################################

	$("img").click(function(e){
		for (var i = 0; i<totalTags; i++){
			if (arrTagLock[i]==true){
				return false;
			}
		}

		//Disable select button
		document.getElementById('cmdSmall').disabled = true;		
		document.getElementById('cmdStandard').disabled = true;

		//Determine area within element that mouse was clicked
		mouseX = e.pageX - $("#tag-wrapper").offset().left;
		mouseY = e.pageY - $("#tag-wrapper").offset().top;
		
		//Get height and width of #tag-target
		targetWidth = $("#"+document.getElementsByTagName('div')[1].id+"").outerWidth();
		targetHeight = $("#"+document.getElementsByTagName('div')[1].id+"").outerHeight();
				
		//Determine position for #tag-target
		targetX = mouseX-targetWidth/2;
		targetY = mouseY-targetHeight/2;
		
		//Determine position for #tag-input
		inputX = mouseX+targetWidth/2;
		inputY = mouseY-targetHeight/2;
		
		//Animate if second click, else position and fade in for first click
		if($("#"+document.getElementsByTagName('div')[1].id+"").css("display")=="block")
		{
			$("#"+document.getElementsByTagName('div')[1].id+"").animate({left: targetX, top: targetY}, 500);
			$("#tag-input").animate({left: inputX, top: inputY}, 500);
		} else {
			$("#"+document.getElementsByTagName('div')[1].id+"").css({left: targetX, top: targetY}).fadeIn();
			$("#tag-input").css({left: inputX, top: inputY}).fadeIn();
		}
		
		//Give input focus
		$("#tag-name").focus();	
	});
	
	//If cancel button is clicked
	$('button[type="reset"]').click(function(){
		closeTagInput();
		document.getElementById('cmdSmall').disabled = false;		
		document.getElementById('cmdStandard').disabled = false;
	});
	
	//If enter button is clicked within #tag-input
	$("#tag-name").keyup(function(e) {
		if(e.keyCode == 13) submitTag();
	});	
	
	//If submit button is clicked
	$('button[type="submit"]').click(function(){
		if($("#tag-name").val()!=""){
			submitTag();
			document.getElementById('cmdSmall').disabled = false;		
			document.getElementById('cmdStandard').disabled = false;
		}
	});

	for (var i = 0; i<totalTags; i++){
		readTag(i,arrTagValue[i],arrTagX[i],arrTagY[i]);

		tagCounter++;
	}
	
 	intEqualTags = tagCounter;

}); //$(document).ready
 
function submitTag()
{
	tagValue = $("#tag-name").val();	
	targetY=parseInt(targetY)-20;
	
	$("#tagItems").fadeOut();

	//Adds a new list item. Also adds events inline as they are dynamically created after page load
	$("#tag-wrapper").after('<span id="hotspot-item-' + tagCounter + '">[&nbsp;<span class="tagLink" onmouseover="showTag(' + tagCounter + ')" onmouseout="hideTag(' + tagCounter + ')">' + tagValue + '</span>&nbsp;<span class="remove" onclick="removeTag(' + tagCounter + ')" onmouseover="showTag(' + tagCounter + ')" onmouseout="hideTag(' + tagCounter + ')"><img src="delete.gif" title="Delete ['+tagValue+']"></span>&nbsp;]&nbsp;</span>');
	
	//Adds a new hotspot to image
	$("#tag-wrapper").append('<div id="hotspot-' + tagCounter + '" class="'+document.getElementById('hotspot').value+'" style="left:' + targetX + 'px; top:' + targetY + 'px;"><span>' + tagValue + ' by rachit</span></div>');	
	
	$("#tag-wrapper").after('<span id="tagItems">Tagged Items:&nbsp;</span>');

	tagCounter++;	

	if (document.getElementById('hotspot').value=="hotspot"){
		intSize=standardTagSize;
	}
	else if (document.getElementById('hotspot').value=="hotspot-small"){
		intSize=smallTagSize;
	}
	
	arrTagValue[totalTags] = tagValue;
	arrTagX[totalTags] = targetX;
	arrTagY[totalTags] = targetY;
	arrTagSize[totalTags] = intSize;
	
	totalTags++;

	intEqualTags++;

	closeTagInput();
}
 
function closeTagInput()
{
	$("#"+document.getElementsByTagName('div')[1].id+"").fadeOut();
	$("#tag-input").fadeOut();
	$("#tag-name").val("");
}
 
function removeTag(i)
{
	$("#hotspot-item-"+i).fadeOut();
	$("#hotspot-"+i).fadeOut();
	arrTagValue[i]="";
	intEqualTags--;
}
 
function showTag(i)
{
	$("#hotspot-"+i).addClass("hotspothover");
}
 
function hideTag(i)
{
	$("#hotspot-"+i).removeClass("hotspothover");
}


///////////

function readTag(tagCounter,tagValue,targetX,targetY)
{
	//tagValue = $("#tag-name").val();	
	var strHotspot;	
	
	if (arrTagSize[tagCounter]==standardTagSize){
		strHotspot = "hotspot";
	}
	else if (arrTagSize[tagCounter]==smallTagSize){
		strHotspot = "hotspot-small";
	}
	
	//Adds a new list item. Also adds events inline as they are dynamically created after page load
	$("#tag-wrapper").after('<span id="hotspot-item-' + tagCounter + '">[&nbsp;<span class="tagLink" onmouseover="showTag(' + tagCounter + ')" onmouseout="hideTag(' + tagCounter + ')">' + tagValue + '</span>&nbsp;<span class="remove" onclick="removeTag('+ tagCounter + ')" onmouseover="showTag(' + tagCounter + ')" onmouseout="hideTag(' + tagCounter + ')"><img src="delete.gif" title="Delete ['+tagValue+']"></span>&nbsp;]&nbsp;</span>');


	//Adds a new hotspot to image
	$("#tag-wrapper").append('<div id="hotspot-' + tagCounter + '" class="'+strHotspot+'" style="left:' + targetX + 'px; top:' + targetY + 'px;"><span>' + tagValue + '</span></div>');
	
	
	if (tagCounter==(totalTags-1)){	
		$("#tag-wrapper").after('<span id="tagItems">Tagged Items:&nbsp;</span>');
	}
}

function changeTagSize(val)
{	
	if (val==1){
		document.getElementsByTagName('div')[1].id="tag-target-small";
		document.getElementById('hotspot').value="hotspot-small";
	}
	else
	{
		document.getElementsByTagName('div')[1].id="tag-target";
		document.getElementById('hotspot').value="hotspot";
	}
	$(document).ready
}

//function savePhoto(PID,index,link)
function savePhoto()
{
	var intCount = 0;
	var link="catch_form.php";
	var PID=1;
	var index="tag_saved_1.js";
	document.writeln('<form method="post" id="frmSave">');
	
	for (var i = 0; i<totalTags; i++){
		if (arrTagValue[i]!=""){
			document.writeln('<input type="hidden" name="tagValue'+intCount+'" value="'+arrTagValue[i]+'">');
			document.writeln('<input type="hidden" name="tagX'+intCount+'" value="'+arrTagX[i]+'">');
			document.writeln('<input type="hidden" name="tagY'+intCount+'" value="'+arrTagY[i]+'">');
			document.writeln('<input type="hidden" name="tagSize'+intCount+'" value="'+arrTagSize[i]+'">');
//			alert('<input type="hidden" name="tagValue'+intCount+'" value="'+arrTagValue[i]+'">');
  //                      alert('<input type="hidden" name="tagX'+intCount+'" value="'+arrTagX[i]+'">');
    //                    alert('<input type="hidden" name="tagY'+intCount+'" value="'+arrTagY[i]+'">');
      //                  alert('<input type="hidden" name="tagSize'+intCount+'" value="'+arrTagSize[i]+'">');

			intCount++;
		}
	}
	
	document.writeln('<input type="hidden" name="PID" value="'+PID+'">');
	document.writeln('<input type="hidden" name="jsFile" value="'+index+'">');
	document.writeln('<input type="hidden" name="totalTags" value="'+intCount+'">');
	 document.writeln('<input type="hidden" name="imageid" value="">');

	document.writeln('</form>');	

	document.writeln('<script language="Javascript">');
	document.writeln('var formArea = document.getElementById("frmSave");');
	document.writeln('formArea.action="'+link+'";');
	document.writeln('formArea.submit();');
	document.writeln('</script>');
}
	

$("img#1").fadeIn(0);
$("img#1").delay(5500).fadeOut(0);


var count=2;
setInterval(function(){
	$("img#"+count).fadeIn(0);
	$("img#"+count).delay(5500).fadeOut(0);
	count=count+1;
	if(count==6){count=1;};
},5500);

$("#alert").fadeIn(1000);
$("#alert").delay(1000).fadeOut(1000);




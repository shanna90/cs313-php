function buttonAlert(){
	alert("You clicked the button!");
}
fuction changeColor(){
	var col = document.getElementById("color");
	document.getElementById('div1').style.backgroundColor = col;
}
$("#colorChange").click(function(){
	$('div1').style.backgroundColor = $('color');
});
$(document).ready(function(){
    $("#button3").click(function(){
        $("#div3").fadeOut(slow);
		$("#div3").fadeIn(slow);
    });
});


	$(document).ready(function(){
$("#loft").click(function(){
	$(".opencategCatcher").fadeIn(200 , function(){

		$("#lcft").fadeOut(200);
		$('.opencatcherContainer').css('opacity', 1);
	});


});


	});



$(document).ready(function(){
$("#lcft").click(function(){
	$(".closecategCatcher").fadeIn(200 , function(){

		$("#loft").fadeOut(200);
		$('.closecatcherContainer').css('opacity', 1);
	});


});


	});




$(document).ready(function() {
    
  $("#district").change(function() {

  	$("#loader").hide();
    $(this).after('<div id="loader"><img src="resources/loading.gif" alt="loading subcategory" /></div>');
   
    $.get('loadzone.php?parent_cat=' + $(this).val(), function(data) {
    	$("#zonelabel").show(300);
    	$("#zone").fadeIn(300);
      $("#zone").html(data);
      $('#loader').slideUp(200, function() {
        $(this).remove();
});
    }); 	
    });

});








$(document).ready(function() {
    
  $("#closedistrict").change(function() {

  	$("#loader").hide();
    $(this).after('<div id="loader"><img src="resources/loading.gif" alt="loading subcategory" /></div>');
   
    $.get('closeloadzone.php?parent_cat=' + $(this).val(), function(data) {
    	$("#zonelabel").show(300);
    	$("#closezone").fadeIn(300);
      $("#closezone").html(data);
      $('#loader').slideUp(200, function() {
        $(this).remove();
});
    }); 	
    });

});







$(document).ready(function() {
    
  $("#zone").change(function() {
  	$("#loader").hide();


    $(this).after('<div id="loader"><img src="resources/loading.gif" alt="loading subcategory" /></div>');
    $.get('loadexchange.php?parent_cat=' + $(this).val(), function(data) {
    	$("#exchange").fadeIn(300);
      $("#exchange").html(data);
      $('#loader').slideUp(200, function() {
        $(this).remove();
});
    }); 
    });

});



$(document).ready(function() {
    
  $("#closezone").change(function() {
  	$("#loader").hide();


    $(this).after('<div id="loader"><img src="resources/loading.gif" alt="loading subcategory" /></div>');
    $.get('closeloadexchange.php?parent_cat=' + $(this).val(), function(data) {
    	$("#closeexchange").fadeIn(300);
      $("#closeexchange").html(data);
      $('#loader').slideUp(200, function() {
        $(this).remove();
});
    }); 
    });

});




$(document).ready(function() {
    
  $("#exchange").change(function() {

$("#loader").hide();
    $(this).after('<div id="loader"><img src="resources/loading.gif" alt="loading subcategory" /></div>');
    $.get('complain.php?parent_cat=' + $(this).val(), function(data) {
    	
      $("#openccontainer").html(data);
      $('#loader').slideUp(200, function() {
        $(this).remove();
});
    }); 
    });

});




$(document).ready(function() {
    
  $("#closeexchange").change(function() {

$("#loader").hide();
    $(this).after('<div id="loader"><img src="resources/loading.gif" alt="loading subcategory" /></div>');
    $.get('closecomplain.php?parent_cat=' + $(this).val(), function(data) {
    	
      $("#ccontainer").html(data);
      $('#loader').slideUp(200, function() {
        $(this).remove();
});
    }); 
    });

});







function loaddis(){
	$(document).ready(function(){


	
$.ajax({


type:'post',
url:'filterbydistrict.php',
data: data,
success : function(x){
	$("#disctrictCatcher").html(x);
}

	});
});
}

	
$(document).ready(function(){
$("#district").change(function(){
	$("#openzoneCatcher").html('');
	$("#opendisctrictCatcher").html('');
	$("#openccontainer").html('');
	$("#opendisctrictCatcher").show();
	$("#openccontainer").hide();
	$("#zone").hide();
	$("#exchange").hide();
	$("#hide1").show();
	$("#show1").hide();
$("#zoneCatcher").hide();
	var ctr=$(this).val();
	var data='ctr=' + ctr;

	$.ajax({


type:'post',
url:'filterbydistrict.php',
data: data,
success : function(x){
	$("#opendisctrictCatcher").html(x);
}

	});


});

});



$(document).ready(function(){
$("#closedistrict").change(function(){
	$("#zoneCatcher").html('');
	$("#disctrictCatcher").html('');
	$("#ccontainer").html('');
	$("#disctrictCatcher").show();
	$("#ccontainer").hide();
	$("#zone").hide();
	$("#exchange").hide();
	$("#hide1").show();
	$("#show1").hide();
$("#zoneCatcher").hide();
	var ctr=$(this).val();
	var data='ctr=' + ctr;

	$.ajax({


type:'post',
url:'closefilterbydistrict.php',
data: data,
success : function(x){
	$("#disctrictCatcher").html(x);
}

	});


});

});




$(document).ready(function(){
$("#zone").change(function(){
	$("#openzoneCatcher").html('');
	$("#disctrictCatcher").html('');
	$("#openccontainer").html('');
	$("#openzoneCatcher").show();
	$("#openccontainer").hide();
	$("#exchange").hide();
	
$("#opendisctrictCatcher").hide(100);
	var mofc=$(this).val();
	var data='mofc=' + mofc;


	$.ajax({


type:'post',
url:'filterbyzone.php',
data: data,
success : function(x){
	$("#openzoneCatcher").html(x);
}

	});


});

});

$(document).ready(function(){
$("#closezone").change(function(){
	$("#zoneCatcher").html('');
	$("#disctrictCatcher").html('');
	$("#ccontainer").html('');
	$("#zoneCatcher").show();
	$("#ccontainer").hide();
	$("#exchange").hide();
	
$("#disctrictCatcher").hide(100);
	var mofc=$(this).val();
	var data='mofc=' + mofc;


	$.ajax({


type:'post',
url:'closefilterzone.php',
data: data,
success : function(x){
	$("#zoneCatcher").html(x);
}

	});


});

});


$(document).ready(function(){
$("#exchange").change(function(){
	$("#openzoneCatcher").html('');
	$("#opendisctrictCatcher").html('');
	$("#openccontainer").html('');
	$("#openzoneCatcher").hide()
	$("#opendisctrictCatcher").hide();
	$("#openccontainer").show();

$("#openopendisctrictCatcher").hide(100);
	
});

});



$(document).ready(function(){
$("#closeexchange").change(function(){
	$("#zoneCatcher").html('');
	$("#disctrictCatcher").html('');
	$("#ccontainer").html('');
	$("#zoneCatcher").hide()
	$("#disctrictCatcher").hide();
	$("#ccontainer").show();

$("#disctrictCatcher").hide(100);
	
});

});


$(document).ready(function(){
	
$("#openhide").click(function(){

$("#openshow1").show();
$("#openhide1").hide();
$("#opendisctrictCatcher").css('opacity', 0);
$("#openzoneCatcher").css('opacity' , 0);
$("#openccontainer").css('opacity' , 0);



});

});
$(document).ready(function(){
	
$("#openshow").click(function(){

$("#openshow").hide();
$("#openopenhide").show();
$("#opendisctrictCatcher").css('opacity' , 1);
$("#openzoneCatcher").css('opacity' , 1);
$("#openccontainer").css('opacity' , 1);




});

});
$(document).ready(function(){
	
$(".close").click(function(){

$("#show1").hide();
$("#hide1").hide();

$(".opencategCatcher").hide();
$(".opencatcherContainer").css('opacity', 0);
$("#lcft").show();



});

});

$(document).ready(function(){
	
$(".close2").click(function(){

$("#show2").hide();
$("#hide2").hide();

$(".closecategCatcher").hide();
$(".closecatcherContainer").css('opacity', 0);
$("#loft").show();



});

});








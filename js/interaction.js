

$(document).ready(function(){
 	$("#addrestaurant").hide();
 	$(".toggle").on("click", function(event){
	$('#addrestaurant').slideToggle('slow');
	event.preventDefault();
});
    
    });

// $ betekent, selecteer ,
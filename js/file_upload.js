(function($) {
$(function(){

	var myFunction = function() {
		$('textarea').each(function (index, ta) {
			var selectedID = this.id.match(/\d+/);
			var $ta = $(ta);
			if (localStorage.getItem('ta'+selectedID) !== null) {
				if(localStorage.getItem('ta'+selectedID) != $ta.val()){
					$('#bt_carousel_'+selectedID+'_save').removeAttr("disabled"); 
				}
			}
			localStorage.setItem('ta'+selectedID, $ta.val());
		});
		var yetVisited = localStorage['visited'];
	};
	setInterval(myFunction, 10);

	$( "input[type='button']").click(function(){
		var selectedID = this.id.match(/\d+/);
		var text = "";
		$('textarea').each(function (index, ta) {
            var $ta = $(ta);

            if($ta.attr('id') === ('carousel'+selectedID)){
            	text = $ta.val();
            }
        });
		var image_url = "";
		if($('#imageurl_not_local_'+selectedID).val() != ""){
			image_url = $('#imageurl_not_local_'+selectedID).val();
		}
		$.post('/carouselbeheer/updatecarousel/', {
			carousel_id: selectedID,
			carousel_img_url: image_url,
	        carousel_text: text,
		}, function(data, statusText) {
            console.log(data);
		});
	});

	$( "#bt_carousel1_delete" ).click(function() {
			$('textarea').each(function (index, ta) {
            var $ta = $(ta);
            alert($ta.val());
        });
	});


	$( ".filestyle" ).change(function() {
		var selectedID = this.id.match(/\d+/);
  		var filename = $(this).val().split('\\').pop();
  		$('#bt_carousel_'+selectedID+'_save').removeAttr("disabled");
  		$('#imageurl_not_local_'+selectedID).val("");
  		$('#fileToUpload'+selectedID).val(filename);
	});


	$( "input[type='url']").change(function(){
		var selectedID = this.id.match(/\d+/);
		var url = $(this).val();
		$("<img>", {
		    src: url,
		    error: function() {
		    	if(url != ""){ 
		    		console.log("invalid image url");
		    		$('#image_error_'+selectedID).show();
		    		$('#bt_carousel_'+selectedID+'_save').attr("disabled", true);
		    	}},
		    load: function() {
		    	$('#bt_carousel_'+selectedID+'_save').removeAttr("disabled"); 
		    	document.getElementById("imgClickAndChange_"+selectedID).src = url;
		    	$('#fileToUpload'+selectedID).val("");
		    	$('#image_error_'+selectedID).hide(); }
		});
	});

});
}(jQuery));
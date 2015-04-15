<?php
	include 'Navigation.php';
?>

<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Menu drag and drop demo</title>

  <script type='text/javascript' src='../../js/jquery.min.js'></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
  <!--<script type="text/javascript" src="js/jquery-sortable.js"></script>-->
<style type="text/css">
	div.current-pages {

	    overflow:auto;
	    border: 1px solid black;
	}
	.nav {
     min-height:5px;
	}
	#top{
		height: 600px;
		width: 500px;
	}
	#bottem{
		height: 600px;
		width: 500px;
	}
</style>
<script type='text/javascript'>

/*(function( $ ){
   $.fn.myfunction = function() {
		var phrases = new Array();
		$(this).each(function(){
		    var phrase = '';
		    var first = $(this).attr('id');
		    $(this).find('li').each(function(){
		        var current = $(this).closest('ul').attr('id');
		        if(current === first){
		        phrase = $(this).text();
		        phrases.push(phrase);
		    	}
		    });
		    
		});
    
      return phrases;
   }; 
})( jQuery );*/


function updateSelect(options) {
   	var result = $('#top').myfunction();
   	options.append($("<option />").val("top").text(""));
	for (var i = 1; i < result.length+1; i++) {
		options.append($("<option />").val(result[i-1]).text(result[i-1]));
	}
}


$(document).ready(function(){
	var transferred = true;
	$( "#bottem li" ).draggable({
        connectToSortable: ".nav",
        helper: "clone",
                start: function(event, ui)
        {
            $(this).hide();
        },
        stop: function(event, ui)
        {
            if(!transferred)
                $(this).show();
            else
            {
                $(this).remove();
                transferred = false;
            }
        }
    });

    $( ".nav" ).sortable({
        revert: true,
        connectWith: ".nav",
        receive: function(event, ui) {
        	transferred = true;
            var name = ui.item.text();
            $(this).find('li').each(function() {
            	if(name == $(this).text()){
            		if($(this).closest('ul').attr('id') == "bottem"){
            			$(this).replaceWith("<li>"+name+"</li>");
            		}
            		else{
	            		$(this).replaceWith("<li id='Home'>"+name+"<ul class='nav ui-sortable'></ul></li>");
            		}
            	}

            	
            });
        }
    });

	/*$(".nav").sortable({
        connectWith: ".nav"
    }).disableSelection();*/

	//$('.nav il').hide();

	$('#web_development').click(function() {
	    $(this).find('ul').slideToggle();
	});

	var options = $("#toplevel");
	updateSelect(options);
    options.change(function () {
    	alert(options.val());
    });

    $("button").click(function(){
    	var levelselection = $('#toplevel').val().toLowerCase();
    	var test = levelselection.toLowerCase();
    	alert(test);
		var row = $('#'+levelselection);
    	var item = $('#newItem').val();
    	row.append('<li><a>'+item+'</a></li>');
    	alert(item);
    	var li = $('<li/>')
	        .addClass('ui-menu-item')
	        .attr('role', 'menuitem')
	        .appendTo(row);
    	var aaa = $('<a/>')
	        .addClass('ui-all')
	        .text(item)
	        .appendTo(li);
    });
});
</script>

</head>
<body>
<div class="navbar-collapse collapse" align="center">
	<div id="container" class="navbar-collapse collapse">
		<table>
			<tr>
				<td>
					<div id="navigationEnabled" class="current-pages">
						<ul class="nav" id="top">
							<?php 
								$Navigation = new Navigation();
								$result = $Navigation->getNavigation("true");
							 	foreach ($result as $element) {
							 		echo "<li id=".$element->getName().">".$element->getName()."<ul class='nav'></ul></li>";
							 	} 
							?>
						</ul>
					</div>
				</td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td>
					<div id="navigationDisabled" class="current-pages">
					<ul class="nav" id="bottem">
					<?php 
						$Navigation = new Navigation();
						$result = $Navigation->getNavigation("false");
						 foreach ($result as $element) {
						        echo "<li id=".$element->getName().">".$element->getName()."</li>";
						 } 
					?>
					</ul>
					</div>
				</td>
			</tr>

		</table>
	</div>
	<br/>
	<input type="button" class="btn btn-success" value="Wijzigingen opslaan" onclick="location.href='/OLD/dashboard/pages/navigation.management.php'" />
</div>

</body>


</html>

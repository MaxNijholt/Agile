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


/*function updateSelect(options) {
   	var result = $('#top').myfunction();
   	options.append($("<option />").val("top").text(""));
	for (var i = 1; i < result.length+1; i++) {
		options.append($("<option />").val(result[i-1]).text(result[i-1]));
	}
}*/


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


    var onRecieve = function(event, ui) {

         transferred = true;
         var id = $(ui.item).attr("id");
         $(this).find('li').each(function() {
         		var name = ui.item.text();
            	if(name == $(this).text()){
            		if($(this).closest('ul').attr('id') == "bottem"){
            			$(this).replaceWith("<li id='"+id+"'>"+name+"</li>");
            		}
            		else{
            			if($(this).children(":first").text() != ""){

            			}
            			else{
	            			$(this).replaceWith("<li id='"+id+"'>"+name+"<ul class='nav ui-sortable'></ul></li>");
	            		}
            		}
            	}
    	});

        $( ".nav" ).sortable(sortableOptions);
    }

    var sortableOptions = {
        revert: true,
        connectWith: ".nav",
        receive: onRecieve
   	};

   	$( ".nav" ).sortable(sortableOptions);

    $("#btnSubmit").click(function(){
    	var items = new Array();
    	var subCounter = 0;
    	var minusCounter = 0;
    	$("#top").find('li').each(function() {
    		var nav_item = "";
    		var page_order = 0;
    		var page_parent = "0";
    		var parentModule = $(this).closest("ul").closest("li").attr("id");
    		if(typeof parentModule == 'undefined'){
    			minusCounter = minusCounter + subCounter;
    			subCounter = 0;
    			page_order = (items.length-minusCounter);
    			nav_item = '{ "pag_id": "'+$(this).attr("id")+'","pag_order": "'+(items.length-minusCounter)+'", "pag_parent": "0", "pag_enabled": "1" }';

    		}
    		else{
    			nav_item = '{ "pag_id": "'+$(this).attr("id")+'","pag_order": "'+subCounter+'", "pag_parent": "'+parentModule+'", "pag_enabled": "1" }';
    			page_order = subCounter;
    			page_parent = parentModule;
    			subCounter = subCounter + 1;
    		}
				$.post('Navigation.php', {
				    pag_id: $(this).attr("id"),
		            pag_order: page_order,
		            pag_parent: page_parent,
		            pag_enabled: "1"
				}, function(data, statusText) {
			});
    		items.push(nav_item);
    	});
		
		$("#bottem").find('li').each(function() {
			$.post('Navigation.php', {
			    pag_id: $(this).attr("id"),
	            pag_order: "0",
	            pag_parent: "0",
	            pag_enabled: "0"
			}, function(data, statusText) {
				});
		});
		

		alert("De wijzigingen zijn opgeslagen!");
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
								$result = $Navigation->getEnabledNavigation();
								GenerateNavHTML($result);
							 	/*foreach ($result as $element) {
							 		echo "<li id=".$element->getID().">".$element->getTitle()."<ul class='nav'>";
							 			foreach ($element->getChilds() as $child) {
										    echo "<li id=".$child->getID().">".$child->getTitle()."<ul class='nav'></ul></li>";
										}
									echo "</ul></li>";
							 	}*/
							 	function GenerateNavHTML($nav)
								{
								    foreach($nav as $page)
								    {
								        echo "<li id=".$page->getID().">".$page->getTitle()."<ul class='nav'>";
								        echo GenerateNavHTML($page->getChilds());
								        echo "</ul></li>";
								    }
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
						$result = $Navigation->getDisabledNavigation();
						 foreach ($result as $element) {
						        echo "<li id=".$element->getID().">".$element->getTitle()."</li>";
						 } 
					?>
					</ul>
					</div>
				</td>
			</tr>

		</table>
	</div>
	<br/>
	<input type="button" id="btnSubmit" class="btn btn-success" value="Wijzigingen opslaan" onclick="location.href='#'" />
</div>

</body>


</html>

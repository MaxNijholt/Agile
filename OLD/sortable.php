<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Menu drag and drop demo</title>

  <script type='text/javascript' src='js/jquery.min.js'></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
  <!--<script type="text/javascript" src="js/jquery-sortable.js"></script>-->
<style type="text/css">
	div.current-pages {
		height: 600px;
		width: 500px;
	    overflow: scroll;
	}
</style>
<script type='text/javascript'>

(function( $ ){
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
})( jQuery );


$(window).load(function(){
$(document).ready(function () {
    $(".nav").sortable({
        connectWith: ".nav"
    }).disableSelection();
});
});


function updateSelect(options) {
   	var result = $('#top').myfunction();
   	options.append($("<option />").val("top").text(""));
	for (var i = 1; i < result.length+1; i++) {
		options.append($("<option />").val(result[i-1]).text(result[i-1]));
	}
}


$(document).ready(function(){

	$('.nav il').hide();

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


<div id="navbar" class="navbar-collapse collapse">
	<table>
		<tr>
			<td>
				<div id="navbar" class="current-pages">
					<ul class="nav" id="top">
						<li >Web Development</li>
						<ul class="nav" id="web_development">
							<li>PHP Jobs</li>
							<li>OSCommerce projects</li>
							        <ul class="nav">
							            <li><a>first level submenu</a></li>
							            <li><a>first level submenu</a></li>
							            <li><a>first level submenu</a>
							                <ul class="nav">
							                    <li><a>second level submenu</a></li>
							                    <li><a>second level submenu</a></li>
							                    <li><a>second level submenu</a></li>
							                    <li><a>second level submenu</a></li>
							                </ul>
							            </li>
							            <li><a>first level submenu</a></li>
							            <li><a>first level submenu</a></li>
							        </ul>
						</ul>
						<li>Content Creation</li>
						<ul class="nav">
							<li>Technical Writing Jobs</li>
							<li>Forum Posting</li>
						</ul>
						<li>Design and Artwork</li>
						<ul class="nav">
							<li>Blog Design Projects</li>
							<li>Freelance Website Design</li>
						</ul>
						<li>Sales and Marketing</li>
						<ul class="nav">
							<li>Internet Marketing Consulting</li>
							<li>Leads Generation Services</li>
						</ul>
						<li>Test</li>
						<ul class="nav">
							<li>Hello world!</li>
						</ul>
					</ul>
				</div>
			</td>
			<td>
				<div id="navbar" class="current-pages">
				<ul class="nav" id="bottem">
					<li>Hello world 1</li>
					<li>Hello world 2</li>
					<li>Hello world 3</li>
					<li>Hello world 4</li>
					<li>Hello world 5</li>
					<li>Hello world 6</li>
					<li>Hello world 7</li>
					<li>Hello world 8</li>
					<li>Hello world 9</li>
					<li>Hello world 10</li>
					<li>Hello world 11</li>
					<li>Hello world 12</li>
					<li>Hello world 13</li>
					<li>Hello world 14</li>
					<li>Hello world 15</li>
					<li>Hello world 16</li>
					<li>Hello world 17</li>
					<li>Hello world 18</li>
					<li>Hello world 19</li>
					<li>Hello world 20</li>
				</ul>
				</div>
			</td>
		</tr>

	</table>
</div>
  <input type="text" id="newItem">
  <select name="toplevel" id="toplevel"></select>
	<button>Add sub level</button><br/>

</body>


</html>

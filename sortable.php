<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Menu drag and drop demo</title>
  
  <script type='text/javascript' src='js/jquery.min.js'></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
  <!--<script type="text/javascript" src="js/jquery-sortable.js"></script>-->

<script type='text/javascript'>

(function( $ ){
   $.fn.myfunction = function() {
		var phrases = new Array();
		$(this).each(function(){
		    var phrase = '';
		    $(this).find('li').each(function(){
		        var current = $(this);
		        $(document.body).append(current.closest('ul').attr('id')+"---"+current.text()+"<br />");
		        console.log(current.parent().text()+"---"+current.text());
		        if(current.children().size() > 0) {return true;}
		        phrase = $(this).text();
		        phrases.push(phrase);
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

$(document).ready(function(){
	var count = 1;
	var options = $("#toplevel");
	var result = $('#top').myfunction();
	for (var i = 0; i < result.length; i++) {
		options.append($("<option />").val(i).text(result[i]));
	}
    $("button").click(function(){
    	var level = "";
    	var levelselection = $('#levelID').val();

    	switch (levelselection) {
    case "1":
        level = "top";
        break;
    case "2":
        level = "sub";
        break;
    case "3":
        level = "header";
        break;
    case "4":
        level = "header";
        break;
}
		var row = $('#'+level);
    	var item = $('#newItem').val();
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
<ul class="nav" id="top">
	<li class="test">Web Development</li>
	<ul class="nav" id="sub">
		<li>PHP Jobs</li>
		<li>OSCommerce projects</li>
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
  <input type="text" id="newItem">
  <select name="toplevel" id="toplevel">
  </select>
  <select name="level" id="levelID">
		<option value="1">Top level</option>
		<option value="2">Sub level 1</option>
		<option value="3">Sub level 2</option>
		<option value="4">Sub level 3</option>
	</select>
	<button>Add item</button></br>
</body>


</html>

<link href="/css/contentbeheer.css" rel="stylesheet">
<script type="text/javascript" src="../js/tinymce/tinymce.min.js"></script>

<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>

<?php include '/var/www/tjosti.nl/components/dashboardtopnav.inc.php'; ?>
	<div id="wrapper">
		<?php
			include "components/menubar.inc.php";
		?>
	</div>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<?php
                echo "<h2 class='page-header'>Content Beheer ".$pagName."</h2>";
            ?>
		</div>
</div>
        <?php
            if (strpos($message,'succesvol') !== false) {
                echo "<div class='alert alert-success' role='alert'>{$message}</div>";
            } 
            if ($message === 'Er is iets fout gegaan tijdens het verwijderen.') {
                echo "<div class='alert alert-danger' role='alert'>{$message}</div>";
            }
            if($message === "Content already exsists"){
                echo "<div class='alert alert-danger' role='alert'>De ingevoerde content is al reeds geregistreerd.</div>";
            }
            if($pages != ""){
                echo "         <div class='btn-group'>
                <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>Pagina's <span class='caret'></span></button>
                <ul class='dropdown-menu scrollable-menu' role='menu'>";
                    foreach ($pages as $value) {
                        echo "<li>
                                <from>
                                    <input type='hidden' name='pageid' value='{$value['pag_id']}'/>
                                    <input type='hidden' name='page' value='{$value['pag_name']}'/>
                                    <input type='submit' class='btn btn-warning' name='btsubmit' value='{$value['pag_name']}'/>
                                </from></li>";
                    }
                echo "</ul>
                        </div> ";

            }
        ?>


	<h4>Content titel</h4>

     <form id="contentform" action='/contentbeheer/edit' method='POST'>
         <?php echo "<input name='content_title' class='input' placeholder='Gewenste titel' value='$cont_title'/>";
         ?>
    <br/>
    <br/>
        <textarea name="pagecontent" cols="50" rows="15"> 
        <?php
            echo $pageContent;
        ?>
        </textarea>
        <br/> 
        <?php echo "<input type='hidden' name='pageid' value='$pagID'/>";
              echo "<input type='hidden' name='pagname' value='$pagName'/>";
              if (isset($contentID)){
                echo "<input type='hidden' name='cont_id' value='$contentID'/>";  
                }?>
        
    </form>
    <?php 
        if($pageContent === ""){
            echo "<input type='submit' class='btn btn-success formleft' name='btsubmit' value='Aanmaken' form='contentform'/>";
        }
        else{
            echo "<input type='submit' class='btn btn-success formleft' name='btsubmit' value='Bewerken' form='contentform'/>";
        }
    ?>
    
    <form class="formright" action='/contentbeheer'>
        <input type='submit' class='btn btn-warning' value='Annuleer'/>
    </form>
    <br/>
    <br/>
</div>

</div>
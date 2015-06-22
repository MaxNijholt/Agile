<?php /**
 * Created by PhpStorm.
 * User: toinebakkeren
 * Date: 22/06/15
 * Time: 11:04
 */ ?>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="/js/footerJS.js"></script>
<script>tinymce.init({selector:'textarea'});</script>


<div class="container">
    <div class="row">
        <h1>Footer beheer</h1>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Links
                </div>
                <div class="panel-body">
                    <textarea name="leftArea"><?php echo $currentData['col1'];?></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Midden
                </div>
                <div class="panel-body">
                    <textarea name="middleArea"><?php echo $currentData['col2'];?></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Rechts
                </div>
                <div class="panel-body">
                    <textarea name="rightArea"><?php echo $currentData['col3'];?></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="melding-box"></div>
    <div class="row">
        <button class="btn btn-default" id="editButton">Aanpassen</button>
        <button class="btn btn-default" id="restoreButton">Herstellen</button>
    </div>

</div>
<?php include 'inc/header.inc.php'; ?>
	<?php include 'inc/nav.inc.php'; ?>

	<style>

	.carousel, .carousel-inner, .carousel-inner .item {
		height: 200px;
	}

	.carousel-inner p {
		padding-left: 25px;
		padding-top: 14%;
	}
	
	</style>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.3";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>



	<div id="carousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->	
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>

		<?php
            function isMobile() {
                return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
            }

            if(isMobile()){ ?>
                <div class="carousel-inner" role="listbox">
                    <div class="item active" style="background-size: 100%; background-repeat: no-repeat; background-position: left center; background-image: url(http://tjosti.nl//img/1.jpg);">
                        <div class="carousel-caption">Eerste afbeelding</div>
                    </div>
                    <div class="item" style="background-size: 100%; background-repeat: no-repeat; background-position: left center; background-image: url(http://tjosti.nl//img/2.jpg);">
                        <div class="carousel-caption">Tweede afbeelding</div>
                    </div>
                    <div class="item" style="background-size: 100%; background-repeat: no-repeat; background-position: left center; background-image: url(http://tjosti.nl//img/3.jpg);">
                        <div class="carousel-caption">Derde afbeelding</div>
                    </div>
                    ...
                </div>
            <?php }
            else { ?>
                <div class="carousel-inner" role="listbox">
                    <div class="item active" style="background-size: 70%; background-repeat: no-repeat; background-position: left center; background-image: url(http://tjosti.nl//img/1.jpg);">
                        <div style="width: 30%; float: right"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div>
                        <div class="carousel-caption">Eerste afbeelding</div>

                    </div>
                    <div class="item" style="background-size: 70%; background-repeat: no-repeat; background-position: left center; background-image: url(http://tjosti.nl//img/2.jpg);">
                        <div style="width: 30%; float: right"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div>
                        <div class="carousel-caption">Tweede afbeelding</div>
                    </div>
                    <div class="item" style="background-size: 70%; background-repeat: no-repeat; background-position: left center; background-image: url(http://tjosti.nl//img/3.jpg);">
                        <div style="width: 30%; float: right"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div>
                        <div class="carousel-caption">Derde afbeelding</div>
                    </div>
                    ...
                </div>
            <?php }
        ?>
        <!-- Wrapper for slides -->


		<!-- Controls -->	
		<a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Vorige</span>
		</a>
		<a class="right carousel-control" href="#carousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Volgende</span>
		</a>
	</div>
<!-- 
	<div class="jumbotron"> -->
		<div class="container">
			<div class="col-md-8">
				<h1>Welkom!</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<p><a class="btn btn-primary btn-lg" href="#" role="button">Lees meer &raquo;</a></p>
			</div>
			<div class="col-md-4">
				<h2>Twitter</h2>
                <a class="twitter-timeline" href="https://twitter.com/wijkraadBunders" data-widget-id="598422132855541760">Tweets door @wijkraadBunders</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
		</div>
	<!-- </div> -->

	<div class="container">
		<!-- Example row of columns -->
		<div class="row">
			<div class="col-md-4">
				<h2>Laatste Nieuws</h2>
				<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
				<p><a class="btn btn-default" href="#" role="button">Lees meer &raquo;</a></p>
			</div>
			
			<div class="col-md-4">
				<h2>Recent gewijzigd</h2>
				<div class="list-group">
					<a href="#" class="list-group-item active">Nieuw Plantsoen <span style="font-size: 12px; color: #CCC;" class="pull-right">01-01-2015</span></a>
					<a href="#" class="list-group-item">Bushalte De Bunders <span style="font-size: 12px; color: #CCC;" class="pull-right">01-01-2015</span></a>
					<a href="#" class="list-group-item">De Courant <span style="font-size: 12px; color: #CCC;" class="pull-right">01-01-2015</span></a>
					<a href="#" class="list-group-item">Oud papier data <span style="font-size: 12px; color: #CCC;" class="pull-right">01-01-2015</span></a>
					<a href="#" class="list-group-item">Kaas is koning <span style="font-size: 12px; color: #CCC;" class="pull-right">01-01-2015</span></a>
				</div>
				<p><a class="btn btn-default" href="#" role="button">Meer &raquo;</a></p>
			</div>
            <div class="col-md-4">
                <h2>Facebook</h2>
                <div class="fb-page" data-href="https://www.facebook.com/wijkraaddebunders" data-width="350px" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/wijkraaddebunders"><a href="https://www.facebook.com/wijkraaddebunders">Wijkraad de Bunders</a></blockquote></div></div>
            </div>
		</div>

		<hr>

		<footer>
			<p>&copy; 2015 - De Bunders - Alle rechten voorbehouden.</p>
		</footer>
	</div>
	<!-- /container -->

<?php include 'inc/footer.inc.php'; ?>

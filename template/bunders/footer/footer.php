	<!-- Bootstrap JS -->
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	
	<!-- JS Files -->
	<?php
	if(isset($refs['js']))
		foreach ($refs['js'] as $file)
			echo '<script type="text/javascript" src="' . $file . '"></script>';
	?>
</body>
</html>

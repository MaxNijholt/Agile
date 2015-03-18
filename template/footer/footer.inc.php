	<!-- Bootstrap JS -->
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>

	<!-- JS Files -->
	<?php
	if(isset($refs['js']))
		foreach ($$refs['js'] as $file)
			echo '<script type="text/javascript" src="' . $file . '"></script>';
	?>
</body>
</html>
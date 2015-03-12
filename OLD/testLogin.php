<?php

echo $_SERVER["PHP_AUTH_USER"];

if(isset($_SERVER["PHP_AUTH_USER"]))
{
	echo "restricted content";
}
?>
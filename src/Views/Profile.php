<?php
echo "<!DOCTYPE html>
<html>
    <head>
		<title>Profile</title>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script type='text/javascript'>
                </script>
    </head>
    <body>";
echo "Welcome"+$_SESSION['username']+"Password"+$_SESSION['password'];

echo "</body>
</html>";
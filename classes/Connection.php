<?php 
		$sHost = "db4free.net";
		$sUser = "antonwijns";
		$sPassword = "ThomasMore";
		$sDatabase = "phpdb";
		$link = @mysqli_connect($sHost, $sUser, $sPassword, $sDatabase) or die("Oop, dbase is gone!");	
?>
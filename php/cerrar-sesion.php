<?php
require '../admin/config.php';
 session_start(); 
	session_destroy();
	$_SESSION  = array();
	header("Location:".URL."index.php");
?>
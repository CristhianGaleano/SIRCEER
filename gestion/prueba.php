<?php 
echo ini_get("memory_limit"); 
ini_set("memory_limit","200M");
echo ini_get("memory_limit");
ini_restore("memory_limit"); 
echo ini_get("memory_limit"); 
?>
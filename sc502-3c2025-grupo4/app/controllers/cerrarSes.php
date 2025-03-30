<?php
session_start();
session_unset();    
session_destroy();  //Cierra la session actual

header("Location: ../../index.php"); 
exit;

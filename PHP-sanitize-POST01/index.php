<?php 
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$someVar = $POST['someVar'];

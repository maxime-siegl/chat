<?php
session_start();
var_dump($_SESSION);
var_dump(unserialize($_SESSION["utilisateur"]));

 ?>

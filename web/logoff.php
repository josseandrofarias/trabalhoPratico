<?php
// Inicia sessões, para assim poder destruí-las 
session_start();
if(session_destroy()) {
    header("Location: login.php");
}
?>
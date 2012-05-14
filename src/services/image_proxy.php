<?php
    $filename = $_GET['url'];
    header('Content-Type: image/jpeg');
    readfile($filename);
?>
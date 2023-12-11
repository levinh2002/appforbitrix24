<?php
    include "methodBX24.php";
    $id = $_GET["id"];
    deleteContact($id);
    header('location: index.php');
?>
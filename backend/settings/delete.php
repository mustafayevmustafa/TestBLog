<?php

include "../config/config.php";

$id = $_GET['id'];

$query = "DELETE FROM settings where id = " . $id;
$result = mysqli_query($db, $query);

if (mysqli_affected_rows($db) != 0) {
    header("Location:database.php?route=settings");
}

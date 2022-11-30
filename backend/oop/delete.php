<?php

include "../_class/database.php";

$id = $_GET['id'];

//$query = "DELETE FROM admin where id = " . $id;
//$result = mysqli_query($db, $query);

$a = new database();
$a->delete('admin',"id='$id'");
if ($a = true) {
    header("Location:index.php?route=oop");
}
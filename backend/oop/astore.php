<?php
include "../_class/database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $status = $_POST['status'];

    $db = new database();
    $db->insert('admin',['name'=>$name,'surname'=>$surname,'username'=>$username,'email'=>$email,'password'=>$password,'status'=>$status]);

    if ($db==true) {
        header("Location:index.php?route=oop");
    }
}

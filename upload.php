<?php

require_once 'bootstrap.php';

$conn = Db::getInstance();
session_start();

if (isset($_FILES['image'])) {
    //check MIME TYPE - http://php.net/manual/en/function.finfo-open.php
    $allowedtypes = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif');
    $filename = $_FILES['image']['tmp_name'];
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $fileinfo = $finfo->file($filename);

    if (in_array($fileinfo, $allowedtypes)) {
        $description = $_POST['description'];
        $newfilename = 'images/post_images/'.$_FILES['image']['name'];
        $statement = $conn->prepare("SELECT id FROM users WHERE email = '".$_SESSION['email']."'");
        $statement->execute();
        $id = $statement->fetch(PDO::FETCH_COLUMN);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $newfilename)) {
            $insert = $conn->query("INSERT into posts (image, description, user_id) 
                                        VALUES ('".$newfilename."', '".$description."', '".$id."')");
            header('location:index.php');
        } else {
            $msg = 'Sorry, de upload is mislukt.';
            header('location:index.php');
        }
    } else {
        $msg = 'Sorry, enkel afbeeldingen zijn toegestaan.';
        header('location:index.php');
    }
}

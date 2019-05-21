<?php

session_start();

require_once 'bootstrap.php';
$conn = Db::getInstance();

if (isset($_FILES['avatar'])) {
    if ($_FILES['avatar']['error'] > 0) {
        //for error messages: see http://php.net/manual/en/features.fileupload.errors.php
        switch ($_FILES['avatar']['error']) {
        case 1:
        $msg = 'U mag maximaal 2MB opladen.';
        break;
        default:
        $msg = 'Sorry, uw upload kon niet worden verwerkt.';
            echo "<button onclick=\"location.href='index.php'\">Try again</button>";
        }
    } else {
        //check MIME TYPE - http://php.net/manual/en/function.finfo-open.php
        $allowedtypes = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif');
        $filename = $_FILES['avatar']['tmp_name'];
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $fileinfo = $finfo->file($filename);

        if (in_array($fileinfo, $allowedtypes)) {
            $newfilename = 'images/profile_images/'.$_FILES['avatar']['name'];
            $statement = $conn->prepare("SELECT id FROM users WHERE email = '".$_SESSION['email']."'");
            $statement->execute();
            $id = $statement->fetch(PDO::FETCH_COLUMN);

            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $newfilename)) {
                $insert = $conn->query("UPDATE users
                SET avatar = '".$newfilename."'
                WHERE users.id='".$id."';");

                header('location:profile.php');
            } else {
                $msg = 'Sorry, de upload is mislukt.';
            }
        } else {
            $msg = 'Sorry, enkel afbeeldingen zijn toegestaan.';
        }
    }
}

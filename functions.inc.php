<?php
    // this function checks if a user can login and return TRUE or FALSE
    function canILogin($username, $password)
    {
        $conn = new mysqli('localhost', 'root', 'root', 'talktype', 8889);

        // username because people like it short, email only in use for marketing :-)
        $query = "select * from users where username = '".$conn->real_escape_string($username)."'";

        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return true;
            }
        }

        return false;
    }

?>


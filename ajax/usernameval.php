<?php

require_once '../bootstrap.php';

if (!empty($_POST)) {
    $name = $_POST['name'];

    try {
        $e = User::UsernameAvailable($name);
        if ($e == false) {
            $result = [
                'status' => 'auwtch',
                'message' => 'This username is already taken :(',
                    ];
        } else {
            $result = [
                'status' => 'success',
                'message' => 'This one is not taken yet, great!',
                    ];
        }
    } catch (Throwable $t) {
        $result = [
            'status' => 'error',
            'message' => 'Oops, something failed. Try again!',
            ];
    }

    echo json_encode($result);
}

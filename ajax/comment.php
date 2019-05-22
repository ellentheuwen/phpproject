<?php
    require_once '../bootstrap.php';

    if (!empty($_POST)) {
        $text = htmlspecialchars($_POST['text']);

        try {
            $c = new comment();
            $c->setText($text);
            $c->save();

            $result = [
            'status' => 'success',
            'message' => 'Comment was saved',
        ];
        } catch (Throwable $t) {
            $result = [
                'status' => 'error',
                'message' => 'Something went wrong',
            ];
        }

        echo json_encode($result);
    }

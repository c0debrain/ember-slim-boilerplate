<?php


$app->post('/api/token', function () use ($app) {
    $app->response->header('Content-Type', 'application/json');
    $body = $app->request->params();
    if ($body['grant_type'] == 'password') {
        $username = $body['username'];
        $password = $body['password'];
        $user = User::where('username', '=', $username)->orWhere('email', '=', $username)->first();
        if ($user && password_verify($password, $user->password)) {
            $sessionHash = hash('sha256', $user->username . $user->salt);
            $_SESSION['user'] = $user->username;
            echo json_encode(array(
                'access_token' => $sessionHash
            ));
        } else {
            $app->response->status(400);
            echo json_encode(array(
                'error' => 'invalid_grant'
            ));
        }
    } else {
        $app->response->status(400);
        echo json_encode(array(
            'error' => 'unsupported_grant_type'
        ));
    }
});


$app->post('/api/revoke', function () use ($app) {
    $body = $app->request->getBody();
    if ($body->token_type_hint == 'access_token' || $body->token_type_hint == 'refresh_token') {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            echo '';
        }
    } else {
        $app->response->status(400);
        echo json_encode(array(
            'error' => 'unsupported_token_type'
        ));
    }
});
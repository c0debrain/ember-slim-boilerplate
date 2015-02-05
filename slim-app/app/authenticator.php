<?php

function checkBearerToken($authBearerToken) {

    $userInSession = $_SESSION['user'];
    $user = User::where('username', '=', $userInSession)->first();

    $sessionHash = hash('sha256', $user->username . $user->salt);
    $sessionHashBearer = "Bearer " . $sessionHash;

    if($authBearerToken === $sessionHashBearer) {
        return true;
    } else {
        return false;
    }

}
<?php
    session_start();

    function csrf_token() {
        $token = md5(uniqid());
        $_SESSION['CSRF_TOKENS'][$token] = $token;
        return $token;
    }

    function json($value) {
        return json_encode($value);
    }

    function checkCsrfToken($token) {
        if (!empty($_SESSION['CSRF_TOKENS'][$token])) {
            return true;
        }
        return false;
    }

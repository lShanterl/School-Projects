<?php

include 'db.php';

if ($cookie && isset($_COOKIE['email'])) {
    $stmt = $conn->prepare('UPDATE users SET auth_token = NULL WHERE email = ?');
    $stmt->bind_param('s', $_COOKIE['email']);
    $stmt->execute();
    $stmt->close();
}

$past = time() - 3600;
setcookie('email',      '', $past, '/', '', false, true);
setcookie('auth_token', '', $past, '/', '', false, true);
unset($_COOKIE['email'], $_COOKIE['auth_token']);

$_SESSION = [];
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(), '',
        time() - 42000,
        $params['path'], $params['domain'],
        $params['secure'], $params['httponly']
    );
}
session_destroy();

header('Location: ./index.php');
exit();

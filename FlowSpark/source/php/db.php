<?php

session_start([
    'cookie_httponly' => true,
    'cookie_samesite' => 'Strict',
]);

$server = 'localhost';
$user   = 'root';
$pass   = '';          
$db     = 'flowspark';

$admin = 0;

$movie_path = "../../resources/movie_images/";

$conn = new mysqli($server, $user, $pass, $db);

if ($conn->connect_error) {
    error_log('DB connection failed: ' . $conn->connect_error);
    die('Database connection error. Please try again later.');
}

$conn->set_charset('utf8mb4');

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$cookie = isset($_COOKIE['email']) && isset($_COOKIE['auth_token']);

if ($cookie) {
    $stmt = $conn->prepare(
        'SELECT isAdmin, auth_token FROM users WHERE email = ? LIMIT 1'
    );
    $stmt->bind_param('s', $_COOKIE['email']);
    $stmt->execute();
    $stmt->bind_result($isAdmin, $db_auth_token);

    if ($stmt->fetch()) {
        if (hash_equals((string)$db_auth_token, (string)$_COOKIE['auth_token'])) {
            $admin = (int)$isAdmin;
        } else {
            _clear_auth_cookies();
            $cookie = false;
            header('Location: ./index.php');
            exit();
        }
    } else {
        _clear_auth_cookies();
        $cookie = false;
    }

    $stmt->close();
}

function _clear_auth_cookies(): void {
    $past = time() - 3600;
    setcookie('email',      '', $past, '/', '', true, true);
    setcookie('auth_token', '', $past, '/', '', true, true);
    unset($_COOKIE['email'], $_COOKIE['auth_token']);
}

function verify_csrf(): void {
    $token = $_POST['csrf_token'] ?? '';
    if (!hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
        http_response_code(403);
        die('CSRF token mismatch.');
    }
}

function GetIcon(): string {
    global $conn;
    if (!isset($_COOKIE['email'])) {
        return '../../resources/user_images/default.jpg';
    }

    $stmt = $conn->prepare(
        'SELECT image_path FROM users WHERE email = ? LIMIT 1'
    );
    $stmt->bind_param('s', $_COOKIE['email']);
    $stmt->execute();
    $stmt->bind_result($image_path);

    if ($stmt->fetch() && !empty($image_path)) {
        $stmt->close();
        return htmlspecialchars($image_path, ENT_QUOTES, 'UTF-8');
    }

    $stmt->close();
    return '../../resources/user_images/default.jpg';
}

function GetUsername(): string {
    global $conn;
    if (!isset($_COOKIE['email'])) {
        return 'User';
    }

    $stmt = $conn->prepare(
        'SELECT name FROM users WHERE email = ? LIMIT 1'
    );
    $stmt->bind_param('s', $_COOKIE['email']);
    $stmt->execute();
    $stmt->bind_result($name);

    if ($stmt->fetch() && !empty($name)) {
        $stmt->close();
        return htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    }

    $stmt->close();
    return 'User';
}

function csrf_field(): string {
    $token = htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8');
    return '<input type="hidden" name="csrf_token" value="' . $token . '">';
}

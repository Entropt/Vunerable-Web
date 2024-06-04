<?php
session_start();

session_unset();

// Destroy the session
session_destroy();

// Get the session parameters
$sessionParams = session_get_cookie_params();

// Set the time to some time in the past to ensure the cookie is removed
$expires = time() - 3600; // 1 hour ago

// Set the cookie with an expired time to remove it
setcookie(
    session_name(),
    '',
    $expires,
    $sessionParams['path'],
    $sessionParams['domain'],
    $sessionParams['secure'],
    $sessionParams['httponly']
);

Header("Location: index.php");
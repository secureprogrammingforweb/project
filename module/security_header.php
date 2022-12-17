<?php
header('X-Content-Type-Options: nosniff');
header("Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self'; frame-ancestors 'none'");
// CORS ?
header("Set-Cookie: key=value; path=/; HttpOnly; SameSite=Lax");
header("Cache-Control: no-store");
header("Strict-Transport-Security: max-age=63072000; preload");
header("X-Frame-Options: deny");
header("Feature-Policy: microphone 'none'; camera 'none'");
header("X-XSS-Protection: 1; mode=block");
?>
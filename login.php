<?php
require_once('./_private/bundle.php');
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= HOME . '/assets/css/login.css?v' . rand(1, 1000) ?>" />
    <title>Document</title>
</head>

<body class="flex-center">
    <div id="login">
        <div id="login-fb-gg" class="flex-center">
            <img alt="" src="<?= HOME .'/assets/images/arrow.svg?1'?>">
            <div>
                <div>F</div>
                <div>G</div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="279.243" height="29.947" viewBox="0 0 279.243 29.947">
                <path id="Path_2" data-name="Path 2" d="M0,0S63.449,25.348,131.974,25.348,274.1,0,274.1,0" transform="translate(2.599 2.599)" fill="none" stroke="#cba25b" stroke-linecap="round" stroke-width="4" />
            </svg>
        </div>
        <div id="login-acc" class="flex-center">
            <from>
                <input type="text" name="username" placeholder="|"><br />
                <input type="text" name="password" placeholder="|">
            </from>
            <svg xmlns="http://www.w3.org/2000/svg" width="279.243" height="29.947" viewBox="0 0 279.243 29.947">
                <path id="Path_2" data-name="Path 2" d="M0,0S63.449,25.348,131.974,25.348,274.1,0,274.1,0" transform="translate(2.599 2.599)" fill="none" stroke="#1d1c17" stroke-linecap="round" stroke-width="4" />
            </svg>
            <div>
                Login
            </div>

            <p>Or</p>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="<?= HOME . '/assets/js/login.js?v' . rand(1, 1000) ?>"></script>

</body>

</html>
<?php
$title = isset($title) ? $title : $_default_title;
$keywords = isset($keywords) ? $keywords : $_default_keywords;
$description = isset($description) ? $description : $_default_description;

/* override */
$description = substr($description, 0, 157) . '...';

require_once('./_private/bundle.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?= $description ?>" />
    <meta name="keywords" content="<?= $keywords ?>" />
    <link rel="stylesheet" href="<?= HOME . '/assets/css/bundle.css?v' . rand(1, 1000) ?>" />
    <title><?= $title ?></title>
</head>

<body>
    <header class="fixed-width">
        <div id="logo">
            <a href="<?= HOME?>">shortlink</a>
        </div>
        <div id="nav" active="off">
            <div id="user"><?php echo substr($_loggedIn['name'], 0, 2); ?></div>
            <img alt="" src="<?= HOME . 'assets/images/arrow.svg' ?>" />
            <ul>
                <li><a href="<?= HOME . 'links.php' ?>">Your Links</a></li>
                <li>Recharge</li>
                <li style="text-align: end;">Ref Link <br /> <?php echo $_loggedIn['ref_link'] ?></li>
            </ul>
        </div>
    </header>
<?php
require_once('./_private/bundle.php');

function encode($key)
{
    $dict = [
        0 => 0,    1 => 1,    2 => 2,    3 => 3,    4 => 4,    5 => 5,    6 => 6,    7 => 7,    8 => 8,    9 => 9,    10 => 'a',    11 => 'b', 12 => 'c',    13 => 'd',    14 => 'e',    15 => 'f',  16 => 'g',    17 => 'h',    18 => 'i',    19 => 'j',    20 => 'k',    21 => 'l',    22 => 'm',    23 => 'n',    24 => 'o',    25 => 'q',    26 => 'p',    27 => 's',    28 => 'r',    29 => 'u',    30 => 'v',    31 => 't',
        32 => 'y',    33 => 'x',    34 => 'w',    35 => 'z',    36 => 'A', 37 => 'B', 38 => 'D', 39 => 'E', 40 => 'F', 41 => 'G', 42 => 'H', 43 => 'I', 44 => 'J', 45 => 'K', 46 => 'L', 47 => 'M', 48 => 'N', 49 => 'O', 50 => 'P', 51 => 'Q', 52 => 'R', 53 => 'S', 54 => 'U', 55 => 'T', 56 => 'V', 57 => 'X', 58 => 'Y', 59 => 'Z', 60 => 'W'
    ];
    $key = $key * 27 + 800000000;
    $value = "";
    while ($key > 0) {
        $value = $value . $dict[$key % 60];
        $key = floor($key / 60);
    }
    $value = "long.vivoo.vn/" . $value;
    return $value;
}
function decode($code)
{
    $code = str_replace("long.vivoo.vn/", "", $code);
    $dict = [
        0 => 0,    1 => 1,    2 => 2,    3 => 3,    4 => 4,    5 => 5,    6 => 6,    7 => 7,    8 => 8,    9 => 9,    10 => 'a',    11 => 'b', 12 => 'c',    13 => 'd',    14 => 'e',    15 => 'f',  16 => 'g',    17 => 'h',    18 => 'i',    19 => 'j',    20 => 'k',    21 => 'l',    22 => 'm',    23 => 'n',    24 => 'o',    25 => 'q',    26 => 'p',    27 => 's',    28 => 'r',    29 => 'u',    30 => 'v',    31 => 't',
        32 => 'y',    33 => 'x',    34 => 'w',    35 => 'z',    36 => 'A', 37 => 'B', 38 => 'D', 39 => 'E', 40 => 'F', 41 => 'G', 42 => 'H', 43 => 'I', 44 => 'J', 45 => 'K', 46 => 'L', 47 => 'M', 48 => 'N', 49 => 'O', 50 => 'P', 51 => 'Q', 52 => 'R', 53 => 'S', 54 => 'U', 55 => 'T', 56 => 'V', 57 => 'X', 58 => 'Y', 59 => 'Z', 60 => 'W'
    ];
    $nd = [];
    foreach ($dict as $key => $value)
        $nd[$value] = $key;
    $value = 0;
    for ($i = 5; $i >= 0; $i--) {
        $value = $value * 60 + $nd[substr($code, $i, 1)];
    }
    return ($value - 800000000) / 27;
}

// if (isset($_GET['action'])) {
//     if ($_GET['action'] == 'decode') {
//         $url = $_GET['url'];
//         $id = decode($url);
//         echo $DB->get("SELECT long_url FROM links WHERE id = $id")['long_url'];
//     }
//     if ($_GET['action'] == 'encode') {
//         $url = $_GET['url'];
//         $DB->query("INSERT INTO links SET long_url = '" . $url . "',short_url='',user_id=1,visits=0");
//         $id = $DB->lastId();
//         $short_url = encode($id);
//         $DB->query("UPDATE links SET short_url='" . $short_url . "' WHERE id = $id ");
//         echo $short_url;
//     }
// }
//if there are no url sent


if (!isset($_POST['url']) || $_POST['url'] == '') {
    exit();
}

$url = $_POST['url'];
$DB->query("INSERT INTO links SET long_url = '" . $url . "',short_url='',user_id=1,visits=0");
$id = $DB->lastId();
$short_url = encode($id);
$DB->query("UPDATE links SET short_url='" . $short_url . "' WHERE id = $id ");


header('Content-type: application/json');
echo json_encode(array("shortlink"=>$short_url));

<?php
function randStr($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < $n; $i++) {
        $randstring = $randstring.$characters[rand(0, strlen($characters))];
    }
    return $randstring;
}



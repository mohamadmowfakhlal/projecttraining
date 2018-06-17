<?php

// generate 116 common cards
echo "Commons: " . '<br />';
for ($commonfeed = 0; $commonfeed < 3; $commonfeed++) {
echo mt_rand(0, 1000). '<br />';
}

echo gegenerateRandomString();


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>

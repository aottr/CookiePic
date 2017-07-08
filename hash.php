<?php

$key = bin2hex(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM));

echo $key;
echo "\r\nLongHash: " . hash("sha512", $key);
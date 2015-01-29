<?php

function hex2str( $hex ) {
  return pack('H*', $hex);
}

require ('./phpseclib0.3.9/Crypt/AES.php');

$aesCBC = new Crypt_AES(CRYPT_AES_MODE_CBC);
$aesCBC->setKeyLength(128);
$aesCBC->setKey(hex2str('140b41b22a29beb4061bda66b6747e14'));
$aesCBC->enablePadding();

$ciphertext1 = hex2str("4ca00ff4c898d61e1edbf1800618fb2828a226d160dad07883d04e008a7897ee2e4b7465d5290d0c0e6c6822236e1daafb94ffe0c5da05d9476be028ad7c1d81");
$iv1 = substr($ciphertext1,0,16);
$aesCBC->setIV($iv1);
echo "-------------------------------------------------------".PHP_EOL;
echo $aesCBC->decrypt(substr($ciphertext1,16));
echo PHP_EOL."-------------------------------------------------------".PHP_EOL;


$ciphertext2 = hex2str("5b68629feb8606f9a6667670b75b38a5b4832d0f26e1ab7da33249de7d4afc48e713ac646ace36e872ad5fb8a512428a6e21364b0c374df45503473c5242a253");
$iv2 = substr($ciphertext2,0,16);
$aesCBC->setIV($iv2);
echo "-------------------------------------------------------".PHP_EOL;
echo $aesCBC->decrypt(substr($ciphertext2,16));
echo PHP_EOL."-------------------------------------------------------".PHP_EOL;

$aesCTR = new Crypt_AES(CRYPT_AES_MODE_CTR);
$aesCTR->setKeyLength(128);
$aesCTR->setKey(hex2str('36f18357be4dbd77f050515c73fcf9f2'));
$aesCTR->enablePadding();

$ciphertext3 = hex2str("69dda8455c7dd4254bf353b773304eec0ec7702330098ce7f7520d1cbbb20fc388d1b0adb5054dbd7370849dbf0b88d393f252e764f1f5f7ad97ef79d59ce29f5f51eeca32eabedd9afa9329");
$iv3 = substr($ciphertext3,0,16);
$aesCTR->setIV($iv3);
echo "-------------------------------------------------------".PHP_EOL;
echo $aesCTR->decrypt(substr($ciphertext3,16));
echo PHP_EOL."-------------------------------------------------------".PHP_EOL;


$ciphertext4 = hex2str("770b80259ec33beb2561358a9f2dc617e46218c0a53cbeca695ae45faa8952aa0e311bde9d4e01726d3184c34451");
$iv4 = substr($ciphertext4,0,16);
$aesCTR->setIV($iv4);
echo "-------------------------------------------------------".PHP_EOL;
echo $aesCTR->decrypt(substr($ciphertext4,16));
echo PHP_EOL."-------------------------------------------------------".PHP_EOL;


?>
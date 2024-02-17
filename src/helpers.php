<?php

use Tankfairies\Tcrypt\Encrypt as TFEncrypt;
use Tankfairies\Tcrypt\Decrypt as TFDecrypt;
use Tankfairies\Tcrypt\Keys as TFKeys;
use Tankfairies\Tcrypt\TcryptException;

if (!function_exists('tcrypt')) {
    /**
     * @param $action
     * @param string $password
     * @param string $salt
     * @param string $message
     * @param string $publicKey
     * @return string
     * @throws SodiumException
     * @throws TcryptException
     */
    function tcrypt(
        $action,
        string $password,
        string $salt,
        string $message,
        string $publicKey
    ): string
    {
        $keys = new TFKeys();
        $keys->setPasswordAndSalt($password, $salt);

        switch ($action) {
            case 'encrypt':
                $crypt = new TFEncrypt();
                $crypt
                    ->setLocalKeys($keys)
                    ->setForeignKey($publicKey);

                $output = $crypt->enc($message);
                break;
            case 'decrypt':
                $decrypt = new TFDecrypt();
                $decrypt
                    ->setLocalKeys($keys)
                    ->setForeignKey($publicKey);

                $output = $decrypt->dec($message);
                break;
            default:
                throw new TcryptException('unknown action');
        }
        return $output;
    }
}

if (!function_exists('generate_public_tkey')) {
    /**
     * @param string $password
     * @param string $salt
     * @return string
     * @throws SodiumException
     * @throws TcryptException
     */
    function generate_public_tkey(
        string $password,
        string $salt
    ): string
    {
        $keys = new TFKeys();
        $keys->setPasswordAndSalt($password, $salt);
        return $keys->getPublicKey();
    }
}
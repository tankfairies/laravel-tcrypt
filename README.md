[![Latest Stable Version](https://poser.pugx.org/tankfairies/laravel-tcrypt/v/stable)](https://packagist.org/packages/tankfairies/laravel-tcrypt)
[![Total Downloads](https://poser.pugx.org/tankfairies/laravel-tcrypt/downloads)](https://packagist.org/packages/tankfairies/laravel-tcrypt)
[![Latest Unstable Version](https://poser.pugx.org/tankfairies/laravel-tcrypt/v/unstable)](https://packagist.org/packages/tankfairies/laravel-tcrypt)
[![License](https://poser.pugx.org/tankfairies/laravel-tcrypt/license)](https://packagist.org/packages/tankfairies/laravel-tcrypt)
[![Build Status](https://travis-ci.com/tankfairies/laravel-tcrypt.svg?branch=main)](https://travis-ci.com/github/tankfairies/laravel-tcrypt)

# Laravel Tcrypt

This Laravel package is useful for using 2 way encryption with Sodium.

## Installation

Install with [Composer](https://getcomposer.org/):

```bash
composer require tankfairies/laravel-tcryppt
```

#### Laravel
Register the package service provider in `config/app.php` file.

```php
'providers' => [
    Tankfairies\LaravelTcrypt\GuidServiceProvider::class,
]
```

## Public Key

How to generate your public key.  The sender and receiver exchange these.

```php
$publicKey = generate_public_tkey('your_password', 'your_salt');
```

The public key will look something like: -

```a322e905bd29167702bfc816a6e5ad2be0d8ede171d3c6e68497a5ef5b316d08```

## Encrypt A message

How to encrypt a message.
```php
$encryptedMessage = tcrypt(
        'encrypt',
        'your_password',
        'your_salt',
        'my secret message',
        'the_public_key_from_the_receiver');
```
This will produce something like: -

```9G/vMg4piI778CzVpjcOL/c4kGV7+j0ih+JfuYh0QzWYyfAvwQcy1tW8jXcrb2Fd5aRvkljTeQ55```

## Decrypt A message

How to decrypt a message.
```php
$decryptedMessage = tcrypt(
        'decrypt',
        'your_password',
        'your_salt',
        'the encrypted message',
        'the_public_key_from_the_sender');
```

This will produce something like: -

```my secret message```

## Copyright and licence

The tankfairies/laravel-guid library is Copyright (c) 2019 Tankfairies (https://tankfairies.com) and licenced for use under the MIT Licence (MIT).

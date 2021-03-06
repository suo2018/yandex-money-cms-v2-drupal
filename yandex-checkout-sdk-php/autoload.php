<?php

function yandexMoneyClassLoader($className)
{
    if (strncmp('YandexCheckout', $className, 14) === 0) {
        $length = 14;
        $path = __DIR__ . DIRECTORY_SEPARATOR . 'lib';
    } elseif (strncmp('Psr\Log', $className, 7) === 0) {
        $length = 7;
        $path = __DIR__
            . DIRECTORY_SEPARATOR . 'vendor'
            . DIRECTORY_SEPARATOR . 'psr'
            . DIRECTORY_SEPARATOR . 'log'
            . DIRECTORY_SEPARATOR . 'Psr'
            . DIRECTORY_SEPARATOR . 'Log';
    } else {
        return;
    }
    if (DIRECTORY_SEPARATOR === '/') {
        $path .= str_replace('\\', '/', substr($className, $length)) . '.php';
    } else {
        $path .= substr($className, $length) . '.php';
    }
    if (file_exists($path)) {
        require_once $path;
    }
}

spl_autoload_register('yandexMoneyClassLoader');

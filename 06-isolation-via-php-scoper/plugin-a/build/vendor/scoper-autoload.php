<?php

// scoper-autoload.php @generated by PhpScoper

$loader = require_once __DIR__.'/autoload.php';

// Aliases for the whitelisted classes. For more information see:
// https://github.com/humbug/php-scoper/blob/master/README.md#class-whitelisting
class_exists('_PhpScoper5cdb0eeda39b3\ComposerAutoloaderInitb94c1aa0fb4a2004bca76c1c5e3fec76');

// Functions whitelisting. For more information see:
// https://github.com/humbug/php-scoper/blob/master/README.md#functions-whitelisting
if (!function_exists('apcu_fetch')) {
    function apcu_fetch() {
        return \_PhpScoper5cdb0eeda39b3\apcu_fetch(...func_get_args());
    }
}

return $loader;
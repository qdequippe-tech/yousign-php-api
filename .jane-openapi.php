<?php

$directory = __DIR__ . '/generated/';

return [
    'openapi-file' => 'https://swagger.yousign.com/swagger.json',
    'namespace' => 'Qdequippe\Yousign\Api',
    'directory' => $directory,
    'reference' => true,
    'strict' => false,
    'clean-generated' => true,
    'use-fixer' => true,
    'fixer-config-file' => __DIR__ . '/.php-cs-fixer.php',
];
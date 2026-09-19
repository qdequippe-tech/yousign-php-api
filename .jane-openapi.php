<?php

return [
    'openapi-file' => 'https://developers.youtrust.com/openapi/public-api-v3.json',
    'namespace' => 'Qdequippe\Yousign\Api',
    'directory' =>  __DIR__ . '/generated/',
    'reference' => true,
    'strict' => false,
    'clean-generated' => true,
    'use-fixer' => true,
    'fixer-config-file' => __DIR__ . '/.php-cs-fixer.php',
    'allow-external-refs' => true,
];

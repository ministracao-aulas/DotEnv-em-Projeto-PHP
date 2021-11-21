<?php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
$dotenv->required([
    'DB_HOST',
    'DB_NAME',
    'DB_USER',
    'DB_PASS',
]);

/**
 * Booleanos obrigatórios
 */
$dotenv->required(['DEBUG_ENABLED'])->isBoolean();

/**
 * Valores com tipos específicos apenas se presente no .env
 */
$dotenv->ifPresent('DEBUG_QUERY')->isBoolean();

/**
 * Variáveis com valores aceitos
 */
$dotenv->required('DB_DRIVER')->allowedValues([
    'mysql',
    'pgsql',
]);

// Ainda não existe a função env(), vou implementar posteriormente
// echo env('DB_HOST');

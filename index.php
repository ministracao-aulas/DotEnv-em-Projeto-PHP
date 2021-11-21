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
$dotenv->required(['DEBUG_ENABLED'])->isBoolean();//Para integer utilize isInteger()

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

/**
 * Variáveis que não podem estar vazias
 */
$dotenv->required('DB_HOST')->notEmpty();

 // A função env() não existe nativamente no pacote Dotenv,
 // por isso a criei no arquivo global_functions.php e fiz load no composer.json

//Como o valor que está recebendo é uma string, preciso passar o segundo parâmetro como valor default
dump(env('DB_HOST', 'meusite', 'integer'));
dump(env('DB_HOST', 'meusite'));
dump(env('DB_HOST'));
dump(env('ENV_QUE_NAO_EXISTE', 'valor caso não exista'));
dump(env('ENV_QUE_NAO_EXISTE'));

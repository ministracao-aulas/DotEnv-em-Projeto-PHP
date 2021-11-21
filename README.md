# DotEnv-em-Projeto-PHP

Exemplificando o uso do .env para armazenar as variáveis sensíveis

Este projeto utiliza como base o pacote `vlucas/phpdotenv`

Repositório do pacote:

https://github.com/vlucas/phpdotenv

----


> A função `env()` não existe nativamente no pacote Dotenv,
> por isso a criei no arquivo global_functions.php e fiz load no composer.json

> Como o valor que está recebendo é uma string, preciso passar o segundo parâmetro como valor default

```bash
# No .env
DB_HOST="localhost"
```

```php
dump(env('DB_HOST', 'meusite', 'integer'));
dump(env('DB_HOST', 'meusite'));
dump(env('DB_HOST'));
dump(env('ENV_QUE_NAO_EXISTE', 'valor caso não exista'));
dump(env('ENV_QUE_NAO_EXISTE'));

## Saida:
/*
"meusite"
"localhost"
"localhost"
"valor caso não exista"
null
*/

```

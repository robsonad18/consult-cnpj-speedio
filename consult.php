<?php 

require __DIR__.'/vendor/autoload.php';

use App\WebService\Speedio;

$result = (new Speedio)->consultCnpj("00000000000191");

if (empty($result)) die("Problemas ao consultas CNPJ");

if (isset($result['error'])) die($result['error']);

print_r($result);
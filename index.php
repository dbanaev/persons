<?php

use classes\MyLogger;
use classes\PDOAdapter;
use classes\View;


require_once  __DIR__ . '/vendor/autoload.php';
$db = require_once __DIR__ . '/config/db.php';


$logfile = __DIR__ . '/logs/logfile';
$logger = new MyLogger($logfile);

$pdo = new PDOAdapter('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'], $db['username'], $db['password'], $logger);


$result = $pdo->execute('selectOne', 'SELECT MAX(age) maxAge FROM person');
$maxAge = (int) $result->maxAge;

$person = $pdo->execute('selectOne','SELECT id, firstname, lastname, age FROM person WHERE mother_id IS NULL AND age < :max_age LIMIT 1', ['max_age' => $maxAge]);

if ($person) {
    $pdo->execute('execute', 'UPDATE person SET age = :max_age WHERE id = :id', ['max_age' => $maxAge, 'id' => $person->id]);
}



$data['persons'] = $pdo->execute('selectAll', 'SELECT firstname, lastname, age FROM person WHERE age = (SELECT MAX(age) FROM person) ORDER BY lastname, firstname');
$data['maxAge'] = $maxAge;


View::render('persons', $data);
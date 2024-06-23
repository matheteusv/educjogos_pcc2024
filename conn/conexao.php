<?php

$dsn = 'mysql:host=127.0.0.1;dbname=dbeducjogos;charset=utf8;';
$conn = new PDO($dsn, 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

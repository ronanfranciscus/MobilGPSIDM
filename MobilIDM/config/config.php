<?php

function getConnection():PDO{
    $host='192.168.249.193';
    $port=5432;
    $dbname='simckl';
    $username='simckl';
    $password='simckl';

    $db="pgsql:host=$host;port=$port;dbname=$dbname";
    return new PDO($db,$username,$password);
}
<?php

$c = $GLOBALS['app']->getContainer();

$c->set(PDO::class, function ($c) {
    $host = $c->get('db.host');
    $dbname = $c->get('db.db_name');
    $dbUser = $c->get('db.db_user');
    $dbPass = $c->get('db.db_pass');

    return new PDO(
        "pgsql:host=$host;dbname=$dbname",
        $dbUser,
        $dbPass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
});

<?php

$table = "users";
try {
    $db = new PDO("sqlite:base.sqlite");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Error Handling
    $sql = "CREATE table $table (
    userid INT( 11 ) PRIMARY KEY,
    username VARCHAR( 255 ) NOT NULL, 
    password VARCHAR( 250 ) NOT NULL);";
    $db->exec($sql);
    $sql = "CREATE TABLE user_permissions (
    pid INT(10) NOT NULL,
    permission_name VARCHAR(100) NOT NULL,
    permission_type INT(1),
    userid INT(10) NOT NULL,
    PRIMARY KEY (pid)
    );";
    $db->exec($sql);
} catch (PDOException $e) {
    echo $e->getMessage();
}

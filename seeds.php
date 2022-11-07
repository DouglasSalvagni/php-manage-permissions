<?php

// $senha = "alpina2022";

// $password_hash = hash('sha512', $senha);
try {
    $db = new PDO("sqlite:base.sqlite");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Error Handling
    $sql = "INSERT INTO users (username, password) VALUES ('John', 'teste')";
    $db->exec($sql);
} catch (PDOException $e) {
    echo $e->getMessage();
}

<?php

// $senha = "alpina2022";

// $password_hash = hash('sha512', $senha);
try {
    $db = new PDO("sqlite:base.sqlite");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Error Handling
    // $sql = "INSERT INTO users (userid, username, password) VALUES ('1', 'John', 'teste')";
    // $db->exec($sql);

    
    $sql = "INSERT INTO user_permissions (pid, permission_name, permission_type, userid) VALUES ('1', 'page_dashboard', '1', '1')";
    $db->exec($sql);



} catch (PDOException $e) {
    echo $e->getMessage();
}

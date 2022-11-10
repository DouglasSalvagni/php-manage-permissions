<?php

require __DIR__ . '/db.php';

try {
    $sql = "CREATE TABLE users (
        userid INT(10) NOT NULL AUTO_INCREMENT,
        group_id INT(10) NOT NULL,
        username VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        reg_date INT(10),
        PRIMARY KEY(userid)
       );";
    $db->exec($sql);

    
    $sql = "CREATE TABLE usergroups (
        group_id INT(10) NOT NULL AUTO_INCREMENT,
        group_name VARCHAR(100) NOT NULL,
        PRIMARY KEY(group_id)
       );";
    $db->exec($sql);

    
    $sql = "CREATE TABLE user_permissions (
        pid INT(10) NOT NULL AUTO_INCREMENT,
        permission_name VARCHAR(100) NOT NULL,
        permission_type INT(1),
        userid INT(10) NOT NULL,
        PRIMARY KEY (pid)
       );";
    $db->exec($sql);
    
    $sql = "CREATE TABLE group_permissions (
        pid INT(10) NOT NULL AUTO_INCREMENT,
        permission_name VARCHAR(100) NOT NULL,
        permission_type INT(1),
        group_id INT(10) NOT NULL,
        PRIMARY KEY (pid)
       );";
    $db->exec($sql);
} catch (PDOException $e) {
    echo $e->getMessage();
}

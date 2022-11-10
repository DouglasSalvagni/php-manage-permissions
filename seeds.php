<?php

require __DIR__ . '/db.php';

try {
    // $sql = "INSERT INTO usergroups (group_name) VALUES ('visitor')";
    // $db->exec($sql);

    // $sql = "INSERT INTO users (group_id, username, password) VALUES (3,'Visitante','visitante')";
    // $db->exec($sql);

    // $sql = "INSERT INTO group_permissions (permission_name, permission_type, group_id) VALUES ('page_dashboard', 1, 2)";
    // $db->exec($sql);

    // $sql = "INSERT INTO user_permissions (permission_name, permission_type, userid) VALUES ('page_dashboard', 0, 2)";
    // $db->exec($sql);



} catch (PDOException $e) {
    echo $e->getMessage();
}

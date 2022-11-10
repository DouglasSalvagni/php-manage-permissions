<?php

require __DIR__ . '/acl.php';

$permissions = new Acl();

// $myuser->check('page_dashboard', 1, 1);

echo 'Usuário id 1 do grupo 1 tem permissão para page_dashboard? ' . $permissions->check('page_dashboard', 1) . '<br>';

echo 'Usuário id 1 do grupo 1 tem permissão para form_edit_user? ' . $permissions->check('form_edit_user', 1) . '<br>';

echo 'Usuário id 2 do grupo 1 tem permissão para page_dashboard? ' . $permissions->check('page_dashboard', 2) . '<br>';

echo 'Usuário id 3 do grupo 2 tem permissão para form_edit_user? ' . $permissions->check('form_edit_user', 3) . '<br>';

echo 'Usuário id 3 do grupo 2 tem permissão para form_edit_user? ' . $permissions->check('form_edit_user', 4) . '<br>';
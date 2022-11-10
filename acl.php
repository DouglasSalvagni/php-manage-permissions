<?php

// require __DIR__ . '/db.php';
require __DIR__ . '/Database.php';


class Acl
{

    private $db;
    private $user_empty = false;

    //initialize the database object here
    function __construct()
    {
        $this->db = new Database();
    }

    function check($permission, $userid)
    {

        $stmt = $this->db->getConnection()->prepare("SELECT group_id FROM users WHERE userid = :userid");

        $stmt->execute(array(':userid' => $userid));

        $f = $stmt->fetch();

        echo '<pre>';
        echo 'group id = ' . $f['group_id'];
        echo '</pre>';

        if ($f['group_id']) {
            if (!$this->group_permissions($permission, $f['group_id'])) {
                return false;
            }
        }

        return true;
    }

    function user_permissions($permission, $userid)
    {
        $stmt = $this->db->getConnection()->prepare("SELECT COUNT(*) AS count FROM user_permissions WHERE permission_name = :permission_name AND userid = :userid");

        $stmt->execute(array(':permission_name' => $permission, ':userid' => $userid,));

        $f = $stmt->fetch();

        if ($f['count'] > 0) {
            $stmt = $this->db->getConnection()->prepare("SELECT * FROM user_permissions WHERE permission_name = :permission_name AND userid = :userid");

            $stmt->execute(array(':permission_name' => $permission, ':userid' => $userid,));

            $f = $stmt->fetch();

            if ($f['permission_type'] == 0) {
                return false;
            }

            return true;
        }
        $this->setUserEmpty('true');

        return true;
    }

    function group_permissions($permission, $group_id)
    {
        $stmt = $this->db->getConnection()->prepare("SELECT COUNT(*) AS count FROM group_permissions WHERE permission_name = :permission_name AND group_id = :group_id");

        $stmt->execute(array(':permission_name' => $permission, ':group_id' => $group_id,));

        $f = $stmt->fetch();

        if ($f['count'] > 0) {
            $stmt = $this->db->getConnection()->prepare("SELECT * FROM group_permissions WHERE permission_name = :permission_name AND group_id = :group_id");

            $stmt->execute(array(':permission_name' => $permission, ':group_id' => $group_id,));

            $f = $stmt->fetch();

            if ($f['permission_type'] == 1) {
                return true;
            }

            return false;
        }

        return false;
    }


    function setUserEmpty($val)
    {
        $this->userEmpty = $val;
    }

    function isUserEmpty()
    {
        return $this->userEmpty;
    }
}

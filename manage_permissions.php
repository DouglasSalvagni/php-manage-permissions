<?php

class Manage_Permissions
{

    /**
     * User Permission.
     *
     * @since    1.0.0
     * @access   private
     * @var      integer    $user_permission.
     */
    private $user_permission;

    /**
     * Permissions accepted.
     *
     * @since    1.0.0
     * @access   private
     * @var      array    $permissionsAccepted.
     */
    private $permissionsAccepted;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $user_permission 
     * @param      array    $permissionsAccepted 
     */
    public function __construct($user_permission, $permissionsAccepted)
    {

        $this->user_permission = $user_permission;
        $this->permissionsAccepted = $permissionsAccepted;
    }

    /**
     * Check if the user has permission based on the list.
     *
     * @since    1.0.0
     */
    public function is_allowed()
    {
        foreach ($this->permissionsAccepted as $permission) {
            if($permission === $this->user_permission) {
                return true;
            }

            return false;
        }
        
    }

    /**
     * 
     *
     * @since    1.0.0
     * @return bool
     */
    public function is_above($comparedUserPermission)
    {
        if($this->user_permission > $comparedUserPermission) {
            return true;
        }

        return false;
        
    }

    /**
     * 
     *
     * @since    1.0.0
     * @return bool
     */
    public function is_below($comparedUserPermission)
    {
        if($this->user_permission < $comparedUserPermission) {
            return true;
        }

        return false;
        
    }

    /**
     * 
     *
     * @since    1.0.0
     * @return bool
     */
    public function is_equal($comparedUserPermission)
    {
        if($this->user_permission == $comparedUserPermission) {
            return true;
        }

        return false;
        
    }

}

$user = new Manage_Permissions(1,[1,2,3]);

var_dump($user->is_allowed());
var_dump($user->is_equal(2));


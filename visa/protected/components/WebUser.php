<?php

/**
 * Description of WebUser
 *
 * @author laila
 */
// this file must be stored in:
// protected/components/WebUser.php

class WebUser extends CWebUser {

    /**
     * Local user
     * @var type
     */
    private $_user;

    /**
     * Profile of user
     * @var type
     */
    //private $profile;
    private $user;

    public function getName() {
        $this->loadUser(Yii::app()->user->id);
        return $this->_user->name;
    }

//    public function getSelfCode() {
//        $this->loadUser(Yii::app()->user->id);
//        $roles = Yii::app()->user->getState('roles') ? Yii::app()->user->getState('roles') : array();
//        if($roles[0] == Pengguna::model()->role[Pengguna::ROLE_PENTADBIR_UTAMA] || $roles[0] == Pengguna::model()->role[Pengguna::ROLE_PENTADBIR] || $roles[0] == Pengguna::model()->role[Pengguna::ROLE_PENYELIA]) {
//            return substr($this->_user->pegawai->kod_waran, 0, 4);
//        } 
//    }

    public function checkAccess($operation, $params = array(), $allowCaching = true) {
        parent::checkAccess($operation, $params, $allowCaching);
        return $this->hasRole($operation);
    }

    public function isAdministrator() {
        $this->loadUser(Yii::app()->user->id);
        if (in_array(AclRoles::ROLE_SUPER_ADMINISTRATOR, $this->_user->roles)) {
            return true;
        }

        return false;
    }


//    public function hasRole($role = '') {
//        $roles = Yii::app()->user->getState('roles') ? Yii::app()->user->getState('roles') : array();
//        if (!is_array($role)) {
//            $role = array($role);
//        }

//        foreach ($role as $item) {
//            if (in_array($item, $roles)) {
//                return $item;
//            }
//        }
//        return false;
//    }

    /*
     * Load user model 
     */

    protected function loadUser($id = null) {
        if ($this->_user === null) {
            if ($id !== null) {
                $this->_user = User::model()->findByPk($id);
            }
        }
    }

    public function getRoles() {
        $this->loadUser(Yii::app()->user->id);
        return $this->_user->roles;
    }
}
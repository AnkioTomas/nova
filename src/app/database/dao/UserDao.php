<?php

namespace app\database\dao;

use app\database\model\UserModel;
use nova\plugin\orm\object\Dao;

class UserDao extends Dao
{
    function list()
    {
        $user = $this->select()->commit();
        return $user;
    }

    function add(UserModel $user)
    {
        $this->insertModel($user);
    }
}
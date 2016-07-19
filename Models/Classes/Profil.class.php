<?php
class Profil
{
    public function getUserInfo($id)
    {
        $result = Connection::connect()->prepare(
                'SELECT * FROM `user` WHERE `id`=:id AND `active`=1 AND `deleted`=0;'
                );
        $result->execute(array(
                ':id' => $id
        ));
         
        $user = $result->fetch();
        
        return $user;
    }
}
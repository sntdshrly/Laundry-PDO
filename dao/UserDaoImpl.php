<?php

class UserDaoImpl
{
    public function userLogin($email, $password){
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM users WHERE email = ? AND password = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$email);
        $stmt->bindParam(2,$password);
        $stmt->execute();
        $user = $stmt->fetchAll();
        $stmt = null;
        return $user;
    }

    public function fetchUserById($id){
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM users WHERE id = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$id);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $link = null;
        return $stmt->fetchObject('User');
    }

    public function fetchUserId($id){
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM users WHERE id = ?';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        $stmt->bindParam(1,$id);
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function saveUser(User $user){
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO users(name, email, password, nomor_telepon, role) VALUES(?, ?, ?, ?, ?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1,$user->getName());
        $stmt->bindValue(2,$user->getEmail());
        $stmt->bindValue(3,$user->getPassword());
        $stmt->bindValue(4,$user->getNomorTelepon());
        $stmt->bindValue(5,$user->getRole());
        $link->beginTransaction();
        if ($stmt->execute()){
            $link->commit();
            $result = 1;
        }
        else{
            $link->rollBack();
        }
        $link = null;
        return $result;
    }

    public function updateUser(User $user){
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'UPDATE users SET name = ? , email = ?, nomor_telepon = ? WHERE id = ?';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1,$user->getName());
        $stmt->bindValue(2,$user->getEmail());
        $stmt->bindValue(3,$user->getNomorTelepon());
        $stmt->bindValue(4,$user->getId());
        
        $link->beginTransaction();
        if ($stmt->execute()){
            $link->commit();
            $result = 1;
        }
        else{
            $link->rollBack();
        }
        $link = null;
        return $result;
    }

    public function fetchAllUser()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM users';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function deleteUser($deletedId){
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'DELETE FROM users WHERE id = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$deletedId,PDO::PARAM_INT);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
            $result=1;
        }
        else{
            $link->rollBack();
        }
        $link=null;
        return $result;
    }

    public function updateInfoProfil(User $user){
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'UPDATE users SET name = ? , email = ?, password = ?, nomor_telepon = ? WHERE id = ?';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1,$user->getName());
        $stmt->bindValue(2,$user->getEmail());
        $stmt->bindValue(3,$user->getPassword());
        $stmt->bindValue(4,$user->getNomorTelepon());
        $stmt->bindValue(5,$user->getId());
        
        $link->beginTransaction();
        if ($stmt->execute()){
            $link->commit();
            $result = 1;
        }
        else{
            $link->rollBack();
        }
        $link = null;
        return $result;
    }

}
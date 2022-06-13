<?php

class RatingDaoImpl
{
    public function fetchAllRating(){
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM rating';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Rating');
        $stmt->execute();
        // var_dump($stmt);
        $link = null;
        return $stmt->fetchAll();

    }

    public function saveRating(Rating $rating){
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO rating(email, rating, komentar) VALUES(?, ?, ?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1,$rating->getEmail());
        $stmt->bindValue(2,$rating->getRating());
        $stmt->bindValue(3,$rating->getKomentar());
        $link->beginTransaction();
        if ($stmt->execute()){
            $link->commit();
            $result = 1;
        }
        else{
            $link->rollBack();
            echo 'rollback';
        }
        $link = null;
        return $result;
    }

}
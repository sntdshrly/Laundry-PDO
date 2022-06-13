<?php

class OrderDaoImpl
{
    public function fetchAllOrder(){
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM pesanan';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Order');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }
    public function fetchOrderByUserIdAdm($id){
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM pesanan WHERE id = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$id);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $link = null;
        return $stmt->fetchObject('Order');
    }
    
    public function fetchOrderByUserId($userId){
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM pesanan WHERE id_user = ? ORDER BY id';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Order');
        $stmt->bindParam(1,$userId);
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    

    public function fetchCatByUserId($userId){
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT jenis_laundry FROM pesanan WHERE id_user = ?';
        $stmt = $link->prepare($query);
        
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->bindParam(1,$userId);
        $stmt->execute();
        $link = null;
        // print_r('var_dump di orderdaoimpl: ');
        // var_dump($stmt);
        return $stmt->fetchAll();
    }

    public function updateOrder(Order $order){
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'UPDATE pesanan SET jenis_laundry = ? , massa_barang = ?, jumlah_barang = ?,status_pemesanan  = ? WHERE id = ?';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1,$order->getJenisLaundry());
        $stmt->bindValue(2,$order->getMassaBarang());
        $stmt->bindValue(3,$order->getJumlahBarang());
        $stmt->bindValue(4,$order->getStatusPemesanan());
        $stmt->bindValue(5,$order->getId());
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

    public function deleteOrder($deletedId){
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'DELETE FROM pesanan WHERE id = ?';
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
    public function saveOrder(Order $order){
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO pesanan(jenis_laundry, massa_barang, jumlah_barang, waktu_pengambilan,  alamat, catatan, status_pemesanan, id_user) VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $link->prepare($query);

        $stmt->bindValue(1,$order->getJenisLaundry());
        $stmt->bindValue(2,$order->getMassaBarang());
        $stmt->bindValue(3,$order->getJumlahBarang());
        $stmt->bindValue(4,$order->getWaktuPengambilan());
        $stmt->bindValue(5,$order->getAlamat());
        $stmt->bindValue(6,$order->getCatatan());
        $stmt->bindValue(7,$order->getStatusPemesanan());
        $stmt->bindValue(8,$_SESSION['id']);

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
<?php

class PriceDaoImpl
{
    public function fetchAllPrice(){
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM harga';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Price');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }
    public function fetchPriceByCategory($namaBarang){
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT harga FROM harga WHERE nama_barang = ?';
        $stmt = $link->prepare($query);
        echo '<br>';
        print_r('var_dump di pricedaoimpl: ');
        var_dump($namaBarang);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->bindParam(1,$namaBarang);
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchHargaPesanan($userId){
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM harga INNER JOIN pesanan ON pesanan.jenis_laundry = harga.nama_barang WHERE id_user = ? ORDER BY pesanan.id';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Price');
        $stmt->bindParam(1,$userId);
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

}
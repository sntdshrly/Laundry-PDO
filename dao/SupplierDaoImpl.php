<?php

class SupplierDaoImpl
{
    public function fetchAllSupplier()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM supplier';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Supplier');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }
    
    public function fetchSupplierById($id){
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM supplier WHERE supplier_id = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$id);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $link = null;
        return $stmt->fetchObject('Supplier');
    }

    public function updateSupplier(Supplier $supplier){
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'UPDATE supplier SET supplier_name = ? , supplier_address = ?, supplier_phone = ? WHERE supplier_id = ?';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1,$supplier->getSupplierName());
        $stmt->bindValue(2,$supplier->getSupplierAddress());
        $stmt->bindValue(3,$supplier->getSupplierPhone());
        $stmt->bindValue(4,$supplier->getSupplierId());
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

    public function deleteSupplier($deletedId){
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'DELETE FROM supplier WHERE supplier_id = ?';
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

    public function saveSupplier(Supplier $supplier){
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO supplier(supplier_name, supplier_address, supplier_phone) VALUES(?, ?, ?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1,$supplier->getSupplierName());
        $stmt->bindValue(2,$supplier->getSupplierAddress());
        $stmt->bindValue(3,$supplier->getSupplierPhone());
        $link->beginTransaction();
        if ($stmt->execute()){
            $link->commit();
            $result = 1;
            ?> <script>window.location="index.php?webmenu=admin-dashboard#suppliers";</script>
        <?php }
        else{
            $link->rollBack();
        }
        $link = null;
        return $result;
    }
}
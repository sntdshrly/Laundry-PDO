<?php

class Supplier
{
    private $supplier_id;
    private $supplier_name;
    private $supplier_address;
    private $supplier_phone;

    /**
     * @return mixed
     */
    public function getSupplierId()
    {
        return $this->supplier_id;
    }

    /**
     * @param mixed $supplier_id
     */
    public function setSupplierId($supplier_id)
    {
        $this->supplier_id = $supplier_id;
    }

    /**
     * @return mixed
     */
    public function getSupplierName()
    {
        return $this->supplier_name;
    }

    /**
     * @param mixed $supplier_name
     */
    public function setSupplierName($supplier_name)
    {
        $this->supplier_name = $supplier_name;
    }

    /**
     * @return mixed
     */
    public function getSupplierAddress()
    {
        return $this->supplier_address;
    }

    /**
     * @param mixed $supplier_address
     */
    public function setSupplierAddress($supplier_address)
    {
        $this->supplier_address = $supplier_address;
    }

    /**
     * @return mixed
     */
    public function getSupplierPhone()
    {
        return $this->supplier_phone;
    }

    /**
     * @param mixed $supplier_phone
     */
    public function setSupplierPhone($supplier_phone)
    {
        $this->supplier_phone = $supplier_phone;
    }

    
}
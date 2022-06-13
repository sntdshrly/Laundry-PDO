<?php

class Price
{
    private $id;
    private $nama_barang;
    private $harga;
    private $massa_barang;
    private $jumlah_barang;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
  /**
     * @return mixed
     */
    public function getMassaBarang()
    {
        return $this->massa_barang;
    }

    /**
     * @param mixed $massa_barang
     */
    public function setMassaBarang($massa_barang)
    {
        $this->massa_barang = $massa_barang;
    }

    /**
     * @return mixed
     */
    public function getJumlahBarang()
    {
        return $this->jumlah_barang;
    }

    /**
     * @param mixed $jumlah_barang
     */
    public function setJumlahBarang($jumlah_barang)
    {
        $this->jumlah_barang = $jumlah_barang;
    }
    /**
     * @return mixed
     */
    public function getNamaBarang()
    {
        return $this->nama_barang;
    }

    /**
     * @param mixed $nama_barang
     */
    public function setNamaBarang($nama_barang)
    {
        $this->nama_barang = $nama_barang;
    }

    /**
     * @return mixed
     */
    public function getHarga()
    {
        return $this->harga;
    }

    /**
     * @param mixed $harga
     */
    public function setHarga($harga)
    {
        $this->harga = $harga;
    }
}

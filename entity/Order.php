<?php

class Order
{
    private $id;
    private $jenis_laundry;
    private $massa_barang;
    private $jumlah_barang;
    private $waktu_pengambilan;
    private $waktu_pengantaran;
    private $alamat;
    private $catatan;
    private $status_pemesanan;
    private $id_user;

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
    public function getJenisLaundry()
    {
        return $this->jenis_laundry;
    }

    /**
     * @param mixed $jenis_laundry
     */
    public function setJenisLaundry($jenis_laundry)
    {
        $this->jenis_laundry = $jenis_laundry;
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
    public function getWaktuPengambilan()
    {
        return $this->waktu_pengambilan;
    }

    /**
     * @param mixed $waktu_pengambilan
     */
    public function setWaktuPengambilan($waktu_pengambilan)
    {
        $this->waktu_pengambilan = $waktu_pengambilan;
    }

    /**
     * @return mixed
     */
    public function getWaktuPengantaran()
    {
        return $this->waktu_pengantaran;
    }

    /**
     * @param mixed $waktu_pengantaran
     */
    public function setWaktuPengantaran($waktu_pengantaran)
    {
        $this->waktu_pengantaran = $waktu_pengantaran;
    }

    /**
     * @return mixed
     */
    public function getAlamat()
    {
        return $this->alamat;
    }

    /**
     * @param mixed $alamat
     */
    public function setAlamat($alamat)
    {
        $this->alamat = $alamat;
    }

    /**
     * @return mixed
     */
    public function getCatatan()
    {
        return $this->catatan;
    }

    /**
     * @param mixed $catatan
     */
    public function setCatatan($catatan)
    {
        $this->catatan = $catatan;
    }


    /**
     * @return mixed
     */
    public function getStatusPemesanan()
    {
        return $this->status_pemesanan;
    }

    /**
     * @param mixed $status_pemesanan
     */
    public function setStatusPemesanan($status_pemesanan)
    {
        $this->status_pemesanan = $status_pemesanan;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
}
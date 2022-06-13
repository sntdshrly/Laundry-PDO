<?php

class Rating
{
    private $id_rating;
    private $email;
    private $rating;
    private $komentar;

    /**
     * @return mixed
     */
    public function getIdRating()
    {
        return $this->id_rating;
    }

    /**
     * @param mixed $id_rating
     */
    public function setIdRating($id_rating)
    {
        $this->id_rating = $id_rating;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $id_user
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return mixed
     */
    public function getKomentar()
    {
        return $this->komentar;
    }

    /**
     * @param mixed $komentar
     */
    public function setKomentar($komentar)
    {
        $this->komentar = $komentar;
    }

}
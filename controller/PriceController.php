<?php
class PriceController
{
    private $priceDao;
    private $ratingDao;
    public function __construct()
{
    $this->priceDao = new PriceDaoImpl();
    $this->ratingDao = new RatingDaoImpl();
}

    public function index(){   
        $harga = $this->priceDao->fetchAllPrice();
        $rating = $this->ratingDao->fetchAllRating();
        include_once 'view/home-view.php';
    }

}
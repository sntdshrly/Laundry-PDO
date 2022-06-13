<?php
class RatingController
{
    private $ratingDao;
    public function __construct()
{
    $this->ratingDao = new RatingDaoImpl();
}

    public function index(){   
        $buttonPressed = filter_input(INPUT_POST,'btnSubmit');
        if(isset($buttonPressed)){
            $email = filter_input(INPUT_POST,'email');
            $rating = filter_input(INPUT_POST,'rating');
            $komentar = filter_input(INPUT_POST,'komentar');
            
            $trimmedEmail = trim($email);
            $trimmedRating = trim($rating);
            $trimmedKomentar = trim($komentar);
            if (empty($trimmedKomentar)) {
                echo '<div class="bg-error">Please fill komentar or rating</div>';
                }
            else {
                $rating = new Rating;
                $rating->setEmail($trimmedEmail);
                $rating->setRating($trimmedRating);
                $rating->setKomentar($trimmedKomentar);
                $result = $this->ratingDao->saveRating($rating);
            }
        }
        else{
            echo '';
        }
        $rating = $this->ratingDao->fetchAllRating();
        include_once 'view/dashboard.php';
    }
}
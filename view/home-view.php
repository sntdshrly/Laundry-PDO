
<hr id="how-to-order">
<div class="jumbotron jumbotron-fluid bg-white">
    <div class="container">
        <div class="tengah">
            <br>
            <h1 class="tengah">ORDER TUTORIAL</h1>
            <p style="text-align:center; font-size: 17px;" class="">Want to order? Let's see the tutorial below!</p>
            <hr class="my-4">
            <br><br><br>
            <div class="row">
                <div class="col-sm">
                    <h6><img src="images/img3.png" width="135px"> </h6>
                    <h2>Sign Up</h2>
                    <p style="font-size: 100%;">Customers register themselves on the website page and click order</p>
                </div>
                <div class="col-sm">
                    <h6><img src="images/img4.png" width="100px"> </h6>
                    <h2>Pick Up</h2>
                    <p style="font-size: 100%;">Our delivery courier will pick up your laundry</p>
                </div>
                <div class="col-sm">
                    <h6><img src="images/img5.png" width="108px"> </h6>
                    <h2>Services</h2>
                    <p style="font-size: 100%;">Give the best services for your the clothes as your order</p>
                </div>
                <div class="col-sm">
                    <h6><img src="images/img6.png" width="100px"> </h6>
                    <h2>Delivery</h2>
                    <p style="font-size: 100%;">Our delivery courier will deliver your clothes to your home</p>
                </div>
                <div class="col-sm">
                    <h6><img src="images/img7.png" width="160px"> </h6><br>
                    <h2>Payment</h2>
                    <p style="font-size: 100%;">Order payment can be made by cash on delivery</p>
                </div>
            </div>
        </div>
    </div>
</div>

<id="price-list">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="tengah">
                <h1 class="tengah">PRICE LIST</h1>
                <br>
                <hr class="my-4">
                <br>
                <table id="pagination" class="table table-borderless table-hover">
                    <thead  class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($harga as $price) {
                            echo '<tr>';
                            echo '<td>' . $price->getNamaBarang() . '</td>';
                            echo '<td>' . $price->getHarga() . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <head>
        <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    </head>
    <br><br>
    <div class="jumbotron jumbotron">
        <div class="container">
            <div class="tengah ">
                <h1 class="tengah">REVIEW</h1><br><br>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        foreach ($rating as $ratings) {
                            if ( $ratings->getRating() == "5"){
                                echo '<p style="font-size: 120%;">
                                <span style="font-size:18px;">' . $ratings->getEmail() . '</span>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#f7c631;"></i>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#f7c631;"></i>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#f7c631;"></i>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#f7c631;"></i>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#f7c631;"></i>
                                </p>';
                                echo '<p>' . $ratings->getKomentar() . '</p>';
                                echo '<hr>';
                            }
                            else if ( $ratings->getRating() == "4"){
                                echo '<p style="font-size: 120%;">
                                <span style="font-size:18px;">' . $ratings->getEmail() . '</span>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#f7c631;"></i>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#f7c631;"></i>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#f7c631;"></i>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#f7c631;"></i>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:black;"></i>
                                </p>';
                                echo '<p>' . $ratings->getKomentar() . '</p>';
                                echo '<hr>';
                            }
                            else if ( $ratings->getRating() == "3"){
                                echo '<p style="font-size: 120%;">
                                <span style="font-size:18px;">' . $ratings->getEmail() . '</span>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#f7c631;"></i>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#f7c631;"></i>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#f7c631;"></i>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:black;"></i>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:black;"></i>
                                </p>';
                                echo '<p>' . $ratings->getKomentar() . '</p>';
                                echo '<hr>';
                            }
                            else if ( $ratings->getRating() == "2"){
                                echo '<p style="font-size: 120%;">
                                <span style="font-size:18px;">' . $ratings->getEmail() . '</span>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#f7c631;"></i>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#f7c631;"></i>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:black;"></i>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:black;"></i>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:black;"></i>
                                </p>';
                                echo '<p>' . $ratings->getKomentar() . '</p>';
                                echo '<hr>';
                            }
                            else if ( $ratings->getRating() == "1"){
                                echo '<p style="font-size: 120%;">
                                <span style="font-size:18px;">' . $ratings->getEmail() . '</span>
                                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#f7c631;"></i>
                                </p>';
                                echo '<p>' . $ratings->getKomentar() . '</p>';
                                echo '<hr>';
                            }
                            
                        }
                        ?>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <script>
        // DataTables
        $(document).ready(function() {
            $('#pagination').DataTable();
        });
    </script>
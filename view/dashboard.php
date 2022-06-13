<div style="margin-top:110px ;margin-bottom:120px;">
<?php if ($_SESSION['role'] == 'user') { ?>
    <div data-spy="scroll" data-target="#navbar-user" data-offset="0">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 id="greeting"></h1>
                <h4 id="clock"></h4>
                <br>
                <p style="font-size:140%; color:red;"><i>Drop your clothes here &#x2B07; &#x2B07; &#x2B07; </i></p>
                <br>
                <a class="btn btn-outline-danger" href="index.php?webmenu=order"><b>ORDER HERE</b></a>
            </div>
        </div>

        <div class="jumbotron jumbotron-fluid bg-fluid">
            <div class="container">
                <h1 class="tengah" id="status-order">STATUS</h1>
                <p class="tengah">Check Your Status Here.</p>
                <br>
                <table id="pagination"  class="table table-borderless table-hover table-light">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Pick Up Schedule</th>
                            <th scope="col">Address</th>
                            <th scope="col">Note</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($order as $orders) {
                            echo '<tr>';
                            echo '<th>' . $orders->getId() . '</th>';
                            echo '<th>' . $orders->getWaktuPengambilan() . '</th>';
                            echo '<th>' . $orders->getAlamat() . '</th>';
                            echo '<th>' . $orders->getCatatan() . '</th>';
                            echo '<th>' . $orders->getStatusPemesanan() . '</th>';
                            echo '</tr>';
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="jumbotron jumbotron-fluid bg-fluid">
            <div class="container">
                <h1 class="tengah" id="price">PRICE</h1>
                <p class="tengah">Calculate Your Order Here.</p>
                <br>
                <table id="pagination"  class="table table-borderless table-hover table-light">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price/item</th>
                            <th scope="col">Weight/kg</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($priceOrder as $priceOrders) {
                            echo '<tr>';
                            echo '<th>' . $priceOrders->getId() . '</th>';
                            echo '<th>' . $priceOrders->getNamaBarang() . '</th>';
                            echo '<th>' . $priceOrders->getHarga() . '</th>';
                            echo '<th>' . $priceOrders->getMassaBarang() . '</th>';
                            echo '<th>' . $priceOrders->getJumlahBarang() . '</th>';
                            echo '<th>' . $priceOrders->getHarga() * $priceOrders->getMassaBarang() * $priceOrders->getJumlahBarang() . '</th>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="jumbotron jumbotron-fluid bg-fluid">
            <div class="container">
                <h1 class="tengah" id="review">REVIEW</h1>
                <p class="tengah">Rate Me Here.</p>
                <br>
                <form method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email address">
                    </div>
                    <div class="form-group">
                        <select name="rating" class="form-control" aria-label="Default select example">
                            <option name="rating" selected>--Select Here--</option>
                            <option name="rating" value="1">1</option>
                            <option name="rating" value="2">2</option>
                            <option name="rating" value="3">3</option>
                            <option name="rating" value="4">4</option>
                            <option name="rating" value="5">5</option>
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" placeholder="Write your review here..." name="komentar" id="komentar" required></textarea><br>
                        <input type="submit" value="Submit" name="btnSubmit" class="btn btn-outline-info active">
                    </div>
                </form>
            </div>
        </div>

        <div class="jumbotron jumbotron-fluid bg-dark text-light">
            <div class="container">
                <h1 class="tengah" id="profil">CURRENT PROFILE</h1>
                <br>
                <?php
                // var_dump($user);
                foreach ($user as $users) {
                    echo '<p style="font-size:120%;" class="tengah"> YOUR ID : ' . $users->getId();
                    echo '<br>';
                    echo 'YOUR NAME : ' . $users->getName();
                    echo '<br>';
                    echo 'YOUR EMAIL : ' . $users->getEmail();
                    echo '<br>';
                    echo 'YOUR PHONE NUMBER : ' . $users->getNomorTelepon() . '</p>';

                    echo '<p class="tengah"><button onclick="editProfile(\'' . $users->getId() . '\')" class="btn btn-warning active"><i data-fa-symbol="edit" class="fas fa-edit fa-fw"></i></button></p>';
                }
                ?>
            </div>
        </div>

    <?php } ?>
    <script>
        // Fungsi editProfile
        function editProfile(id) {
            window.location = "index.php?webmenu=edgen3&eid3=" + id;
        }

        function clock() {
            var date = new Date();
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();

            hours = updateTime(hours);
            minutes = updateTime(hours);
            seconds = updateTime(seconds);

            midday = (hours >= 12) ? " PM" : " AM";
            document.getElementById("clock").innerHTML = hours + ":" + minutes + ":" + seconds + midday;

            var time = setTimeout(function() {
                clock();
            }, 1000);

            if (hours < 12) {
                var greeting = "Good morning, <?php echo $_SESSION['web_full_name']; ?> &#128512; &#x1F305; !";
            }

            if (hours >= 12 && hours <= 18) {
                var greeting = "Good afternoon, <?php echo $_SESSION['web_full_name']; ?> &#x1F31E; &#x26C5; !";
            }

            if (hours >= 18 && hours <=24) {
                var greeting = "Good night, <?php echo $_SESSION['web_full_name']; ?> &#x1F31D; &#x1F320; !";
            }

            document.getElementById("greeting").innerHTML = greeting;

            }
            function updateTime(k) {
                if (k < 10) {
                    return "0" + k
                } else {
                    return k;
                }
        }
        clock();
    </script>
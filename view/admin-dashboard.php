<link rel="stylesheet" type="text/css" href="css/button.css">
<style>
    .table {
        padding: 10px;
    }
</style>

<div style="margin-top:100px;" class="jumbotron jumbotron-fluid">
<h1 id="greeting"></h1>
<h4 id="clock"></h4>
</div>
<div class="jumbotron jumbotron-fluid">
    <h1 class="tengah" id="pesanan">ORDER</h1>
    <p style="font-size: 120%;" class="tengah">Order list from customers.</p>
    <br>
    <table id="pagination" class="table table-borderless table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">USER ID</th>
                <th scope="col">ORDER ID</th>
                <th scope="col">LAUNDRY CATEGORIES</th>
                <th scope="col">WEIGHT</th>
                <th scope="col">QUANTITY</th>
                <th scope="col">STATUS</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($order as $orders) {
                echo '<tr>';
                echo '<th>' . $orders->getIdUser() . '</th>';
                echo '<th>' . $orders->getId() . '</th>';
                echo '<th>' . $orders->getJenisLaundry() . '</th>';
                echo '<th>' . $orders->getMassaBarang() . '</th>';
                echo '<th>' . $orders->getJumlahBarang() . '</th>';
                echo '<th>' . $orders->getStatusPemesanan() . '</th>';
                echo '<th>
                        <button onclick="editOrder(\'' . $orders->getId() . '\')" class="btn btn-warning"><i data-fa-symbol="edit" class="fas fa-edit fa-fw"></i></button>
                        <button onclick="deleteOrder(\'' . $orders->getId() . '\')" class="btn btn-danger"><i data-fa-symbol="delete" class="fas fa-trash fa-fw"></i></button>
                        </th>';
                echo '<tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<div  class="jumbotron jumbotron-fluid">
    <h1 class="tengah" id="customers">CUSTOMER PROFILE</h1>
    <p style="font-size: 120%;" class="tengah">Registered customer list.</p>
    <br>
    <table id="pagination2" class="table  table-borderless table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">USER ID</th>
                <th scope="col">NAME</th>
                <th scope="col">E-MAIL</th>
                <th scope="col">PHONE NUMBER</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($user as $users) {
                echo '<tr>';
                echo '<th>' . $users->getId() . '</th>';
                echo '<th>' . $users->getName() . '</th>';
                echo '<th>' . $users->getEmail() . '</th>';
                echo '<th>' . $users->getNomorTelepon() . '</th>';
                echo '<th> 
                        <button onclick="editUser(\'' . $users->getId() . '\')" class="btn btn-warning"><i data-fa-symbol="edit" class="fas fa-edit fa-fw"></i></button>
                        <button onclick="deleteUser(\'' . $users->getId() . '\')" class="btn btn-danger"><i data-fa-symbol="delete" class="fas fa-trash fa-fw"></i></button></th>';
                echo '<tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<div  class="jumbotron jumbotron-fluid">
    <h1 class="tengah" id="suppliers">SUPPLIER PROFILE</h1>
    <p style="font-size: 120%;" class="tengah">Registered supplier list.</p>
    <div class="center"><button class="button-19" onclick="location.href='index.php?webmenu=add-supplier'">Add New Supplier</button></div>
    <br>
    <table id="pagination2" class="table table-light table-borderless table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">SUPPLIER ID</th>
                <th scope="col">NAME</th>
                <th scope="col">ADDRESS</th>
                <th scope="col">PHONE NUMBER</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($supplier as $suppliers) {
                echo '<tr>';
                echo '<th>' . $suppliers->getSupplierId() . '</th>';
                echo '<th>' . $suppliers->getSupplierName() . '</th>';
                echo '<th>' . $suppliers->getSupplierAddress() . '</th>';
                echo '<th>' . $suppliers->getSupplierPhone() . '</th>';
                echo '<th> 
                        <button onclick="editSupplier(\'' . $suppliers->getSupplierId() . '\')" class="btn btn-warning"><i data-fa-symbol="edit" class="fas fa-edit fa-fw"></i></button>
                        <button onclick="deleteSupplier(\'' . $suppliers->getSupplierId() . '\')" class="btn btn-danger"><i data-fa-symbol="delete" class="fas fa-trash fa-fw"></i></button></th>';
                echo '<tr>';
            }
            ?>

        </tbody>
    </table>
</div>

<script>
    // Menggunakan library DataTables
    $(document).ready(function() {
        $('#pagination').DataTable();
    });

    $(document).ready(function() {
        $('#pagination2').DataTable();
    });

    // Fungsi editOrder & deleteOrder 
    function editOrder(id) {
        window.location = "index.php?webmenu=edgen&eid=" + id;
    }

    function deleteOrder(id) {
        const confirmation = window.confirm("Are you sure want to delete this data?");
        if (confirmation) {
            window.location = "index.php?webmenu=admin-dashboard&delcom=1&did=" + id;
        }
    }

    // Fungsi editUser & deleteUser 
    function editUser(id) {
        window.location = "index.php?webmenu=edgen2&eid2=" + id;
    }

    function deleteUser(id) {
        const confirmation = window.confirm("Are you sure want to delete this data?");
        if (confirmation) {
            window.location = "index.php?webmenu=admin-dashboard&delcom2=1&did2=" + id;
        }
    }

    // Fungsi editSupplier & deleteSupplier 
    function editSupplier(id) {
        window.location = "index.php?webmenu=edgen4&eid4=" + id;
    }

    function deleteSupplier(id) {
        const confirmation = window.confirm("Are you sure want to delete this data?");
        if (confirmation) {
            window.location = "index.php?webmenu=admin-dashboard&delcom4=1&did4=" + id;
        }
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

        if (hours >= 18 && hours <= 24) {
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
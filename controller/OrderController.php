<?php
class OrderController
{
    private $orderDao;
    private $userDao;
    private $priceOrderDao;
    private $supplier;
    public function __construct()
{
    $this->orderDao = new OrderDaoImpl();
    $this->userDao = new UserDaoImpl();
    $this->priceOrderDao = new PriceDaoImpl();
    $this->supplierDao = new SupplierDaoImpl();
}

    public function index()
    {   /* fungsi delete order */
        $deleteApproved = filter_input(INPUT_GET, 'delcom');
        /* fungsi delete supplier */
        $deleteApproved4 = filter_input(INPUT_GET, 'delcom4');
       /* fungsi delete customer */
       $deleteApproved2 = filter_input(INPUT_GET, 'delcom2');

        if(isset($deleteApproved)&&$deleteApproved==1){
            $deletedId = filter_input(INPUT_GET,'did');
            $result = $this->orderDao->deleteOrder($deletedId);
        }

        if(isset($deleteApproved4)&&$deleteApproved4==1){
            $deletedId = filter_input(INPUT_GET,'did4');
            $result = $this->supplierDao->deleteSupplier($deletedId);
        }
        
        if(isset($deleteApproved2)&&$deleteApproved2==1){
            $deletedId = filter_input(INPUT_GET,'did2');
            $result = $this->userDao->deleteUser($deletedId);
        }

        /* fungsi order */
        $buttonPressed = filter_input(INPUT_POST,'btnOrder');
        if(isset($buttonPressed)){
            $category = filter_input(INPUT_POST,'txtJenis');
            $weight = filter_input(INPUT_POST,'txtMassa');
            $qty = filter_input(INPUT_POST,'txtJumlah');
            $pickup = filter_input(INPUT_POST,'txtPickUp');
            $address = filter_input(INPUT_POST,'txtAddress');
            $note = filter_input(INPUT_POST,'txtNote');
            $status = filter_input(INPUT_POST,'txtStatus');
            $pesan = new Order;
            $pesan->setJenisLaundry($category);
            $pesan->setMassaBarang($weight);
            $pesan->setJumlahBarang($qty);
            $pesan->setWaktuPengambilan($pickup);
            $pesan->setAlamat($address);
            $pesan->setCatatan($note);
            $pesan->setStatusPemesanan($status);
            $result = $this->orderDao->saveOrder($pesan);
        }

        /* ------------------------------------- */
        $order = $this->orderDao->fetchAllOrder();
        $supplier = $this->supplierDao->fetchAllSupplier();
        $user = $this->userDao->fetchAllUser();
        include_once 'view/dashboard.php';
        include_once 'view/admin-dashboard.php';
 
    }

    public function updateIndex(){
        $editedId = filter_input(INPUT_GET,'eid');
        if(isset($editedId) && $editedId != ''){
            $order = $this->orderDao->fetchOrderByUserIdAdm($editedId);

        }
        $buttonPressed = filter_input(INPUT_POST,'btnSubmit');
        if(isset($buttonPressed)){
            $jenisLaundry=filter_input(INPUT_POST,'txtJenis');
            $massaBarang=filter_input(INPUT_POST,'txtMassa');
            $jumlahBarang=filter_input(INPUT_POST,'txtJumlah');
            $statusPemesanan=filter_input(INPUT_POST,'txtStatus');

            $updatedOrder = new Order();
            $updatedOrder->setId($order->getId());
            $updatedOrder->setJenisLaundry($jenisLaundry);
            $updatedOrder->setMassaBarang($massaBarang);
            $updatedOrder->setJumlahBarang($jumlahBarang);
            $updatedOrder->setStatusPemesanan($statusPemesanan);

            $result = $this->orderDao->updateOrder($updatedOrder);
                if ($result){
                    header('location:index.php?webmenu=admin-dashboard#pesanan');
                }
                else{
                    echo '<div class="bg-error">Failed to update</div>';
                }

            }
      
            include_once 'view/update-pesanan-view.php';
        }
       
        public function orderByUser()
        { 
            /* fungsi order */
            $buttonPressed = filter_input(INPUT_POST,'btnOrder');
      
            if(isset($buttonPressed)){
         
                $category = filter_input(INPUT_POST,'txtJenis');
                $weight = filter_input(INPUT_POST,'txtMassa');
                $qty = filter_input(INPUT_POST,'txtJumlah');
                $pickup = filter_input(INPUT_POST,'txtPickUp');
                $delivery = filter_input(INPUT_POST,'txtDelivery');
                $address = filter_input(INPUT_POST,'txtAddress');
                $note = filter_input(INPUT_POST,'txtNote');
                $status = filter_input(INPUT_POST,'txtStatus');
                $pesan = new Order;
                $pesan->setJenisLaundry($category);
                $pesan->setMassaBarang($weight);
                $pesan->setJumlahBarang($qty);
                $pesan->setWaktuPengambilan($pickup);
                $pesan->setWaktuPengantaran($delivery);
                $pesan->setAlamat($address);
                $pesan->setCatatan($note);
                $pesan->setStatusPemesanan($status);
                $result = $this->orderDao->saveOrder($pesan);
                
                header('location:index.php?webmenu=dashboard');
            }
    
            /* ------------------------------------- */
            $order = $this->orderDao->fetchOrderByUserId($_SESSION['id']);
            $harga = $this->priceOrderDao->fetchAllPrice();
            include_once 'view/order-view.php';
        }
        
        public function allOrderByUserId()
        {   
            // var_dump($_SESSION['id']);
            $order = $this->orderDao->fetchOrderByUserId($_SESSION['id']);
            $user = $this->userDao->fetchUserId($_SESSION['id']);
            // $namaBarang = $this->orderDao->fetchCatByUserId($_SESSION['id']);
            // $namaBarang = "Kemeja";
            $priceOrder = $this->priceOrderDao->fetchHargaPesanan($_SESSION['id']);

            // var_dump($order);
            include_once 'view/dashboard.php';
        }
    
        
        
    }

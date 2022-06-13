<?php
class SupplierController
{
    private $supplierDao;
    public function __construct()
{
    $this->supplierDao = new SupplierDaoImpl();
}

    public function updateIndexSupplier()
    {   
        $editedId = filter_input(INPUT_GET,'eid4');
        if(isset($editedId) && $editedId != ''){
            $supplier = $this->supplierDao->fetchSupplierById($editedId);
        }
        $buttonPressed = filter_input(INPUT_POST,'btnSubmit');
        if(isset($buttonPressed)){
            $name=filter_input(INPUT_POST,'txtName');
            $address=filter_input(INPUT_POST,'txtAdress');
            $nomorTelepon=filter_input(INPUT_POST,'txtPhone');
    
            $updatedSupplier = new Supplier();
            $updatedSupplier->setSupplierId($supplier->getSupplierId());
            $updatedSupplier->setSupplierName($name);
            $updatedSupplier->setSupplierAddress($address);
            $updatedSupplier->setSupplierPhone($nomorTelepon);
    
            $result = $this->supplierDao->updateSupplier($updatedSupplier);
                if ($result){
                    header('location:index.php?webmenu=admin-dashboard#suppliers');
                }
                else{
                    echo '<div class="bg-error">Failed to update</div>';
                }
    
            }
      
            include_once 'view/update-supplier-view.php';
    }

    public function addSupplier()
    {
        $buttonPressed = filter_input(INPUT_POST, 'btnSubmit');
        if (isset($buttonPressed)) {
            $name = filter_input(INPUT_POST, 'txtName', FILTER_SANITIZE_STRING);
            $address = filter_input(INPUT_POST, 'txtAddress', FILTER_SANITIZE_STRING);
            $phone = filter_input(INPUT_POST, 'txtPhone');
            $trimmedName = trim($name);
            $trimmedAddress = trim($address);

            if (empty($trimmedName) or empty($trimmedAddress) or empty($phone)) {
                
                echo '<div class="bg-error">Please fill supplier name or address or phone</div>';
            } else {
                $supplier = new Supplier();
                $supplier->setSupplierName($trimmedName);
                $supplier->setSupplierAddress($trimmedAddress);
                $supplier->setSupplierPhone($phone);
                var_dump($supplier);
                $result = $this->supplierDao->saveSupplier($supplier);
                if ($result) {
                    echo '<div class="bg-success">New supplier added</div>';
                } else {
                    echo '<div class="bg-error">Failed to added Supplier Data</div>';
                }

            }
        }
        $supplier = $this->supplierDao->fetchAllSupplier();
        include_once 'view/add-supplier-view.php';
    }
}
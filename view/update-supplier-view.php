<form method="post">
    <div class="form-group">
        <label for="userId">ID Supplier</label>
        <input type="text" id="userId" name="txtId" placeholder="ID" required class="form-control my-2" value="<?php echo $supplier->getSupplierId(); ?>" readonly>
    </div>

    <div class="form-group">
        <label for="nameId">Name</label>
        <input type="text" id="nameId" name="txtName" placeholder="Update Name" autofocus required maxlength="100" class="form-control my-2" value="<?php echo $supplier->getSupplierName(); ?>">
    </div>

    <div class="form-group">
        <label for="addressId">Address</label>
        <input type="text" id="addressId" name="txtAdress" placeholder="Update Address" autofocus required maxlength="100" class="form-control my-2" value="<?php echo $supplier->getSupplierAddress(); ?>">
    </div>

    <div class="form-group">
        <label for="namePhone">Phone Number</label>
        <input type="text" id="namePhone" name="txtPhone" placeholder="Update Phone Number" autofocus required maxlength="100" class="form-control my-2" value="<?php echo $supplier->getSupplierPhone(); ?>">
    </div>

    <div class="form-group">
        <input type="submit" name="btnSubmit" value="Update Supplier" class="btn btn-primary mt-4 my-4">
    </div>
</form>
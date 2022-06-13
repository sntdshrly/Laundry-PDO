<div style="margin-top:110px; margin-bottom:50px;">
<div class="container">
<form method="post">
<div class="form-group">
  
        <label for="jenisId">YOUR ID</label>
        <input type="text" id="userId" name="txtUserId" placeholder=""  required maxlength="100" class="form-control my-2" value="<?php echo $_SESSION['id'];?>" readonly>
    </div>

    <div class="form-group">
        <label for="jenisId">CATEGORY</label><br>
        <select name="txtJenis" id="jenisId" class="form-select">
            <option selected>-- SELECT CATEGORY NAME --</option>
            <?php
            $harga = $this->priceOrderDao->fetchAllPrice();

            foreach ($harga as $hargas) {
                echo '<option value="' . $hargas->getNamaBarang() . '">' . $hargas->getNamaBarang() . '</option>';
            }
            ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="nameMassa">WEIGHT / KG</label>
        <input type="number" id="nameMassa" name="txtMassa" placeholder="INSERT ITEM WEIGHT HERE"  required maxlength="100" class="form-control my-2">
              
    </div>

    <div class="form-group">
        <label for="nameJumlah">QUANTITY / PCS</label>
        <input type="number" id="nameJumlah" name="txtJumlah" placeholder="INSERT ITEM QUANTITY HERE"  required maxlength="100" class="form-control my-2">     
    </div>

    <div class="form-group">
        <label for="namePickUp">PICK UP SCHEDULE</label>
        <input type="date" id="namePickUp" name="txtPickUp" placeholder=""  required maxlength="100" class="form-control my-2">     
    </div>

    <div class="form-group">
        <label for="nameAddress">ADDRESS</label>
        <input type="text" id="nameAddress" name="txtAddress" placeholder="INSERT YOUR ADDRESS HERE"  required maxlength="100" class="form-control my-2">     
    </div>


    <div class="form-group">
        <label for="nameNote">ADDITIONAL NOTE</label>
        <input type="text" id="nameNote" name="txtNote" placeholder="Masukan Catatan" maxlength="100" class="form-control my-2">     
    </div>

    <div class="form-group">
        <label for="nameStatus">STATUS</label>
    <div>
    <div class="form-group">
        <input type="radio" id="tunggu_konfirmasi" name="txtStatus" value="Awaiting confirmation from admin" checked>
        <label for="tunggu_konfirmasi">Awaiting confirmation from admin</label><br>
    </div>

<div class="form-group">
    <input type="submit" name="btnOrder" value="ORDER" class="btn btn-primary mt-4 my-4">
    </div>
</form>
<form method="post">
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="form-group">
        <label for="nameIdUser">USER ID</label>
        <input type="text" id="nameIdUser" name="txtIdUser" placeholder="ID" required class="form-control my-2"
        value="<?php echo $order->getIdUser(); ?>" readonly>
    </div>

    <div class="form-group">
        <label for="nameId">ORDER ID</label>
        <input type="text" id="nameId" name="txtId" placeholder="ID" required class="form-control my-2"
        value="<?php echo $order->getId(); ?>" readonly>
    </div>

    <div class="form-group">
        <label for="jenisId">CATEGORY</label>
        <input type="text" id="jenisId" name="txtJenis" placeholder="Update Jenis Laundry"  required maxlength="100" class="form-control my-2"
               value="<?php echo $order->getJenisLaundry(); ?>">
    </div>

    <div class="form-group">
        <label for="nameMassa">WEIGHT</label>
        <input type="number" id="nameMassa" name="txtMassa" placeholder="Update Massa Barang"  required maxlength="100" class="form-control my-2"
               value="<?php echo $order->getMassaBarang(); ?>">
    </div>

    <div class="form-group">
        <label for="nameJumlah">QUANTITY</label>
        <input type="number" id="nameJumlah" name="txtJumlah" placeholder="Update Jumlah Barang"  required maxlength="100" class="form-control my-2"
               value="<?php echo $order->getJumlahBarang(); ?>">
    </div>


   

    <div class="form-group">
        <label for="nameStatus">ORDER STATUS</label>
    <div>
    <div class="form-group">
        <input type="radio" id="tunggu_konfirmasi" name="txtStatus" value="Awaiting confirmation from admin	" checked>
        <label for="tunggu_konfirmasi">AWAITING CONFIRMATION FROM ADMIN</label><br>
        <input type="radio" id="diambil_kurir" name="txtStatus" value="Courier picks up your laundry">
        <label for="diambil_kurir">COURIER PICKS UP YOUR LAUNDRY</label><br>
        <input type="radio" id="dicuci" name="txtStatus" value="Take care by laundry">
        <label for="dicuci">TAKE CARE BY LAUNDRY</label><br>
        <input type="radio" id="diantar_kurir" name="txtStatus" value="Courier delivers your laundry">
        <label for="diantar_kurir">COURIER DELIVERS YOUR LAUNDRY</label><br>
        <input type="radio" id="selesai" name="txtStatus" value="Finish">
        <label for="selesai">FINISH</label>
    </div>

    <div class="form-group">
    <input type="submit" name="btnSubmit" value="Update Pesanan" class="btn btn-primary mt-4 my-4">
    </div>
</form>
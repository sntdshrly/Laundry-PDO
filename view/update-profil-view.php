<form method="post">
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="form-group">
        <label for="nameId">USER ID</label>
        <input type="text" id="nameId" name="txtId" placeholder="ID" required class="form-control my-2"
        value="<?php echo $user->getId(); ?>" readonly>
    </div>

    <div class="form-group">
        <label for="nameId">NAME</label>
        <input type="text" id="nameId" name="txtName" placeholder="Update Name" autofocus required maxlength="100" class="form-control my-2"
               value="<?php echo $user->getName(); ?>">
    </div>

    <div class="form-group">
        <label for="emailId">EMAIL</label>
        <input type="text" id="emailId" name="txtEmail" placeholder="Update Email" autofocus required maxlength="100" class="form-control my-2"
               value="<?php echo $user->getEmail(); ?>">
    </div>

    <div class="form-group">
        <label for="passwordId">PASSWORD</label>
        <input type="text" id="passwordId" name="txtPassword" placeholder="Update Password" autofocus required maxlength="100" class="form-control my-2"
               value="<?php echo $user->getPassword(); ?>">
    </div>

    <div class="form-group">
        <label for="namePhone">PHONE NUMBER</label>
        <input type="text" id="namePhone" name="txtPhone" placeholder="Update Phone Number" autofocus required maxlength="100" class="form-control my-2"
               value="<?php echo $user->getNomorTelepon(); ?>">
    </div>

    <div class="form-group">
    <input type="submit" name="btnSubmit" value="Update User" class="btn btn-primary mt-4 my-4">
    </div>
</form>
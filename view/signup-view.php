<br>
<br>
<br>
<br>
<div style="margin-top:50px" class="jumbotron">
    <div class="form-group">
    <h1>Signup</h1>  
    <form class="px-4 py-3" method="post">
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Your Name">
        </div>
        <div class="form-group">
            <label>E-Mail :</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Your E-mail">
        </div>
        <div class="form-group">
            <label>Phone Number :</label>
            <input class="form-control" type="tel" name="nomorTelepon" id="nomorTelepon" placeholder="Your Phone Number" pattern=".{10,14}" required>
        </div>
        <div class="form-group">
            <label>Password :</label>
            <input class="form-control" type="password" name="password" id="password" pattern=".{8,}" required title="Minimum 8 karakter" placeholder="Your Password">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" onclick="myFunction()"> 
            <label class="form-check-label"> Show Password </label>
        </div>
        <br>
        <div class="form-group">
            <input type="radio" id="user" name="role" value="user" checked>
            <label class="form-check-label"for="user">New User</label><br>
        </div>
            <input class="btn btn-primary" type="submit" name="btnSignup" value="Sign Up">
    </form>
</div>
</div>
<script type="application/javascript">
    //Untuk memunculkan password di form
    function myFunction(){
        var x = document.getElementById("password");
        if (x.type === "password"){
            x.type = "text";
        } 
        else{
            x.type = "password";
        }
    }
</script>
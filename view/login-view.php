<div style="margin-top:180px">
<div class="jumbotron jumbotron">
    <div class="container">
        <h1>Login</h1>   
        <br>     
        <form method="POST">
            <div class="form-group">
                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" name="email" required placeholder="Enter your email address">
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password" required placeholder="Enter your password">
                    <br>
                    <input type="checkbox" onclick="myFunction()"> Show Password
                </div>
                <div class="form-outline mb-4">
                    <button class="btn btn-primary btn-block mb-4" id="btnLogin" type="submit" name="btnLogin">Login</button>
                </div>
                <p>
                    <a href="index.php?webmenu=signup">
                        New User? Create New Account Here!</a>
                </p>
            </div>
        </form>
    </div>
</div>
<br>
<br>
<br>
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
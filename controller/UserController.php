<?php

class UserController
{
    public function __construct()
    {
        $this->userDao = new UserDaoImpl();
    }

public function index(){

    /* fungsi delete user */
    $deleteApproved = filter_input(INPUT_GET, 'delcom2');
    if(isset($deleteApproved)&&$deleteApproved==1){
        $deletedId = filter_input(INPUT_GET,'did2');
        $result = $this->userDao->deleteUser($deletedId);
        if($result){
            echo '<div class="bg-success">User Deleted!</div>';
        }
        else{
            echo '<div class="bg-error">Failed to delete User!</div>';
        }
    
    }
    include_once 'view/admin-dashboard.php';
}

public function signupIndex(){
    $buttonPressed = filter_input(INPUT_POST,'btnSignup');
    if (isset($buttonPressed)){
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $nomorTelepon = filter_input(INPUT_POST, 'nomorTelepon');
        $role = filter_input(INPUT_POST, 'role');
        
        $trimmedName = trim($name);
        $trimmedEmail = trim($email);
        $trimmedPassword = trim($password);
        $trimmedNomorTelepon = trim($nomorTelepon);
        $trimmedRole = trim($role);

        if (empty($trimmedName) or empty($trimmedEmail) or empty($trimmedPassword)
        or empty($trimmedNomorTelepon)) {
            echo '<div class="bg-error">Please fill supplier name or address</div>';
        }
        else {
            $user = new User();
            $user->setName($trimmedName);
            $user->setEmail($trimmedEmail);
            $user->setPassword($trimmedPassword);
            $user->setNomorTelepon($trimmedNomorTelepon);
            $user->setRole($trimmedRole);
            var_dump($user);
            $result = $this->userDao->saveUser($user);
            if ($result) {
                header('location:index.php?webmenu=login');
            } else {
                echo '<div class="bg-error">Failed to added User Data</div>';
            }

        }
    }
    else{
        echo 'button = null';
    }
    $user = $this->userDao->fetchAllUser();
    include_once 'view/signup-view.php';
}

public function updateIndexUser(){
    $editedId = filter_input(INPUT_GET,'eid2');
    if(isset($editedId) && $editedId != ''){
        $user = $this->userDao->fetchUserById($editedId);
    }
    $buttonPressed = filter_input(INPUT_POST,'btnSubmit');
    if(isset($buttonPressed)){
        $name=filter_input(INPUT_POST,'txtName');
        $email=filter_input(INPUT_POST,'txtEmail');
        $nomorTelepon=filter_input(INPUT_POST,'txtPhone');

        $updatedUser = new User();
        $updatedUser->setId($user->getId());
        $updatedUser->setName($name);
        $updatedUser->setEmail($email);
        $updatedUser->setNomorTelepon($nomorTelepon);

        $result = $this->userDao->updateUser($updatedUser);
            if ($result){
                header('location:index.php?webmenu=admin-dashboard#customers');
            }
            else{
                echo '<div class="bg-error">Failed to update</div>';
            }

        }
  
        include_once 'view/update-user-view.php';
    }

public function deleteUser(){
    /* fungsi delete user */
    $deleteApproved = filter_input(INPUT_GET, 'delcom2');
    if(isset($deleteApproved)&&$deleteApproved==1){
        $deletedId = filter_input(INPUT_GET,'did2');
        $result = $this->userDao->deleteUser($deletedId);
    }
    if($result){
        echo '<div class="bg-success">User Deleted!</div>';
    }
    else{
        echo '<div class="bg-error">Failed to delete User!</div>';
    }
}

public function loginUser(){
    /* fungsi login user */
    $loginPressed = filter_input(INPUT_POST,'btnLogin');
    if (isset($loginPressed)){
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $result = $this->userDao->userLogin($email, $password);
        if(isset($result) && $result != null && $result[0]['email'] == $email){
            $_SESSION['web_is_logged'] = true;
            $_SESSION['web_full_name'] = $result[0]['name'];
            $_SESSION['role'] = $result[0]['role'];
            $_SESSION['id'] = $result[0]['id'];
            $_SESSION['email'] = $result[0]['eimal'];
            if($result[0]['role'] == 'admin'){     
                header('location:index.php?webmenu=admin-dashboard');
            }
            else if($result[0]['role'] == 'user'){
                header('location:index.php?webmenu=dashboard'); }
            }
        else{
            echo("E-mail atau password salah, silahkan ulangi kembali");
        }
    }
    include_once 'view/login-view.php';
}

public function updateProfile(){
    $editedId = filter_input(INPUT_GET,'eid3');
    if(isset($editedId) && $editedId != ''){
        $user = $this->userDao->fetchUserById($editedId);
    }
    $buttonPressed = filter_input(INPUT_POST,'btnSubmit');
    if(isset($buttonPressed)){
        $name=filter_input(INPUT_POST,'txtName');
        $email=filter_input(INPUT_POST,'txtEmail');
        $password=filter_input(INPUT_POST,'txtPassword');
        $nomorTelepon=filter_input(INPUT_POST,'txtPhone');

        $updatedProfil = new User();
        $updatedProfil->setId($user->getId());
        $updatedProfil->setName($name);
        $updatedProfil->setEmail($email);
        $updatedProfil->setPassword($password);
        $updatedProfil->setNomorTelepon($nomorTelepon);

        $result = $this->userDao->updateInfoProfil($updatedProfil);
            if ($result){
                header('location:index.php?webmenu=dashboard#profil');
            }
            else{
                echo '<div class="bg-error">Failed to update</div>';
            }
        }
        include_once 'view/update-profil-view.php';
    }

}

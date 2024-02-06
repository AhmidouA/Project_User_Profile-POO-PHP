<?php 
require 'header.html'; 
require 'Users.php';
require 'Admin.php';

// Db 
require_once '../data/db.php';

$admin = new Admin($bddPDO);


if(isset($_POST['lastName'])){
    $user = new Users([
        'lastName'=>$_POST['lastName'],
        'firstName'=>$_POST['firstName'],
        'phone'=>$_POST['phone'],
        'email'=>$_POST['email'],
    ]);
    
    if($user->isUserValide()){
        // insert user
        $admin->insert($user);
        echo 'User Save';
    }
}



?>




<body >
<div id="signup">
        <div class="container">
            <div id="signup-row" class="row justify-content-center align-items-center">
                <div id="signup-column" class="col-md-6">
                    <div id="signup-box" class="col-md-12">
                        <form id="signup-form" class="form" action="" method="POST">
                            <h3 class="text-center text-info">Signup</h3>
                            <div class="form-group">
                                <label for="lastName" class="text-info">lastName:</label><br>
                                <input type="text" name="lastName" id="lastName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="firstName" class="text-info">firstName:</label><br>
                                <input type="text" name="firstName" id="firstName" class="form-control">
                            </div>            
                            <div class="form-group">
                                <label for="phone" class="text-info">Phone number:</label><br>
                                <input type="number" name="phone" id="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="signup" class="btn btn-info btn-md" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>








<?php



?>
<?php 
require 'header.html'; 

/* class */
require 'includeClasses.php';

/* DB */ 
require_once '../data/db.php';

$manager = new Manager($bddPDO);


if(isset($_POST['lastName'])){
    $user = new Users([
        'lastName'=>$_POST['lastName'],
        'firstName'=>$_POST['firstName'],
        'phone'=>$_POST['phone'],
        'email'=>$_POST['email'],
    ]);
    
    if($user->isUserValide()){
        // insert user
        $manager->insert($user);
        echo 'User Save';
    } else {
        $errors = $user->getErrors();
    }
}
?>

<body >
<div id="signup">
        <div class="container">
            <div id="signup-row" class="row justify-content-center align-items-center">
                <div id="signup-column" class="col-md-6">
                    <div id="signup-box" class="col-md-12">
                        <form id="signup-form" class="form" action="signup.php" method="POST">
                            <h3 class="text-center text-info">Signup</h3>

                            <?php
                                if(isset($errors) && in_array(Users::LASTNAME_INVALID, $errors)) echo "Last Name invalid <br>";
                            ?>
                            <div class="form-group">
                                <label for="lastName" class="text-info">lastName:</label><br>
                                <input type="text" name="lastName" id="lastName" class="form-control">
                            </div>

                            <?php
                                if(isset($errors) && in_array(Users::FIRSTNAME_INVALID, $errors)) echo "Frist Name invalid <br>";
                            ?>
                            <div class="form-group">
                                <label for="firstName" class="text-info">firstName:</label><br>
                                <input type="text" name="firstName" id="firstName" class="form-control">
                            </div>

                            <?php
                                if(isset($errors) && in_array(Users::PHONE_INVALID, $errors)) echo "Phone number invalid <br>";
                            ?>          
                            <div class="form-group">
                                <label for="phone" class="text-info">Phone number:</label><br>
                                <input type="text" name="phone" id="phone" class="form-control">
                            </div>

                            <?php
                                if(isset($errors) && in_array(Users::EMAIL_INVALID, $errors)) echo "Email invalid <br>";
                            ?> 
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
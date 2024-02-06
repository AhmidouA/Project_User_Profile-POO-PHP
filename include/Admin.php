<?php 
require 'header.html'; 

require 'includeClasses.php';

/* DB */
require_once '../data/db.php';

$manager = new Manager($bddPDO);

/* UPDATE */
if(isset($_GET['update'])) {
    $user = $manager->getUser((int) $_GET['update']);
}

/* UPDATE AND INSERT */
if(isset($_POST['lastName'])) {
    $user = new Users([
        'lastName'=>$_POST['lastName'],
        'firstName'=>$_POST['firstName'],
        'phone'=>$_POST['phone'],
        'email'=>$_POST['email'],
    ]);

if(isset($_POST['id'])){
    $user->setId($_POST['id']);
}

if($user->isUserValide()) {
    $manager->updateUser($user);
    $message = 'User Updated';
} else {
    $errors = $user->getErrors();
}
}




/* DELETE */
if(isset($_GET['delete'])){
    $manager->deleteUser((int) $_GET['delete']);
    $message = 'User Deleted';
} else {
    $errors = $user->getErrors();
}
    


?>
<head><title>Admin</title></head>
<body>
<style type="text/css">
      table, td {
        color: white;
        border: 1px solid black;
      }
      
      table {
        margin:auto;
        text-align: center;
        border-collapse: collapse;
      }
      
      td {
        padding: 3px;
      }
    </style>
    <p><a href="../index.php" style="color: white;">Home Page</a></p>
    <body >

<div id="admin" class="pb-5">
        <div class="container">
            <div id="admin-row" class="row justify-content-center align-items-center">
                <div id="admin-column" class="col-md-6">
                    <div id="admin-box" class="col-md-12">
                        <form id="admin-form" class="form" action="admin.php" method="POST">
                            <?php 
                                if(isset($message)) echo $message
                            ?>
                            <h3 class="text-center text-info">Update User</h3>

                            <?php
                                if(isset($errors) && in_array(Users::LASTNAME_INVALID, $errors)) echo "Last Name invalid <br>";
                            ?>
                            <div class="form-group">
                                <label for="lastName" class="text-info">lastName:</label><br>
                                <input type="text" name="lastName" id="lastName" class="form-control"
                                value="<?php if(isset($user)) echo $user->getLastName();?>">
                            </div>

                            <?php
                                if(isset($errors) && in_array(Users::FIRSTNAME_INVALID, $errors)) echo "Frist Name invalid <br>";
                            ?>
                            <div class="form-group">
                                <label for="firstName" class="text-info">firstName:</label><br>
                                <input type="text" name="firstName" id="firstName" class="form-control"
                                value="<?php if(isset($user)) echo $user->getFirstName();?>">
                            </div>

                            <?php
                                if(isset($errors) && in_array(Users::PHONE_INVALID, $errors)) echo "Phone number invalid <br>";
                            ?>          
                            <div class="form-group">
                                <label for="phone" class="text-info">Phone number:</label><br>
                                <input type="text" name="phone" id="phone" class="form-control"
                                value="<?php if(isset($user)) echo $user->getPhone();?>">
                            </div>

                            <?php
                                if(isset($errors) && in_array(Users::EMAIL_INVALID, $errors)) echo "Email invalid <br>";
                            ?> 
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control"
                                value="<?php if(isset($user)) echo $user->getEmail();?>">
                            </div>
                            <div class="form-group">
                                <?php
                                if(isset($user)) {
                                    ?>
                                    <input type="hidden" name="id" value="<?=$user->getId() ?>" />
                                    <input type="submit" value="Udpate "name="update" class="btn btn-info btn-md">
                                    <?php
                                    }
                                    ?>                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-5">
    <table >
        <tr>
            <th>&nbsp; LastName &nbsp;</th> 
            <th>&nbsp;FirstName &nbsp;</th> 
            <th>&nbsp;Email &nbsp;</th> 
            <th>&nbsp;Phone Number&nbsp;</th> 
            <th>&nbsp;Update&nbsp;</th> 
            <th>&nbsp;Delete &nbsp;</th>
        </tr>

        <?php
        foreach ($manager->getUsers() as $user) {
            echo '<tr>
                <td>', $user->getLastName(),'</td>
                <td>', $user->getFirstName(),'</td>
                <td>', $user->getEmail(),'</td>
                <td>', $user->getPhone(), '</td>
                <td><a href="?update=', $user->getId(), '">&nbsp Update &nbsp</a></td>
                <td><a href="?delete=', $user->getId(), '">&nbsp Delete &nbsp</a></td>
            </tr>';
        }
        ?>
    </table>
    </div>
</body>
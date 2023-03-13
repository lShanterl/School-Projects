<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlowSpark</title>
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="../css/sign.css">
</head>
<body>
<div class="wrapper">
    <div class="logbox">
        
        <h1>Sign Up</h1>
        <form action="create_account.php" method="post">

            <?php if (isset($_GET['error'])) { ?>
                 <p class='error-message'><?php echo $_GET['error']; ?></p>
            <?php }?>

          <label>Name</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>">
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name">
          <?php }?>

          <label>Surname</label>
          <?php if (isset($_GET['surname'])) { ?>
               <input type="text" 
                      name="surname" 
                      placeholder="surname"
                      value="<?php echo $_GET['surname']; ?>">
          <?php }else{ ?>
               <input type="text" 
                      name="surname" 
                      placeholder="surname">
          <?php }?>

          <label>Email</label>
          <?php if (isset($_GET['email'])) { ?>
               <input type="text" 
                      name="email" 
                      placeholder="email"
                      value="<?php echo $_GET['email']; ?>">
          <?php }else{ ?>
               <input type="text" 
                      name="email" 
                      placeholder="email">
          <?php }?>

     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password">

          <label>Re Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Password">

            <input type="submit" value="Sign Up">
            <input type="reset" value="Reset">
            <a href="./login.php" class="create-login">log in instead?</a>

        </form>
    </div>

</div>

    <script src="../js/reset_form.js"></script>
</body>
</html>
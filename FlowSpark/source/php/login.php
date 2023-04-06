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
        
        <h1>Sign in</h1>
        <form action="log_into_account.php" method="post">

            <?php if (isset($_GET['error'])) { ?>
                 <p class='error-message'><?php echo $_GET['error']; ?></p>
            <?php }?>

          <label>Email</label>
          <?php if (isset($_GET['email'])) { ?>
               <input type="email" 
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

            <input type="submit" value="Log in">
            <input type="reset" value="Reset">
            <div class='back_wrap'>
                <a href="./index.php" class="create-login">Go back</a>
                <a href="./signup.php" class="create-login">Sign up instead?</a>
            </div>
        </form>
    </div>

</div>

    <script src="../js/reset_form.js"></script>
</body>
</html>
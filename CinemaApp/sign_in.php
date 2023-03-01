<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Theather</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sign_up">
        <h1>Sign in</h1>
        <form action="sign_in_check.php" method="post">

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

            <input type="submit" value="Log in">
            <input type="reset" value="Reset">
        </form>
        not a member? <a href="sign_up.php">Sign In</a>
    </div>
</body>
</html>
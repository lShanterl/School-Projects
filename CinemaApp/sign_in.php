<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Theather</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .sign_up {
            width: 400px;
            height: 500px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            padding: 20px;
            margin: 100px auto;
        }

        .sign_up h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sign_up input {
            display: block;
            width: 100%;
            height: 40px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 0 10px;
            box-sizing: border-box;
        }

        .sign_up input[type="submit"] {
            background-color: #000;
            color: #fff;
            cursor: pointer;
        }
        .sign_up input[type="reset"] {
            background-color: #000;
            color: #fff;
            cursor: pointer;
        }
    </style>
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
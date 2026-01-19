<?php require "../includes/header.php"?>
<?php require "../config/config.php"?>

<?php
    // check for submit 


    // take the data 

    // write my query 


    //execute and then fetch

    // do the row count

    // verifyng tha password + redirect the user to the index page

    if (isset($_SESSION['username']))
    {
      header('location: ../index.php');
    }
    if (isset($_POST['submit']))
    {
        if ($_POST['email'] == '' OR $_POST['password'] == '')
        {
            echo "the fields are required";
        } else {
            $email = $_POST['email'];
            $password = $_POST['password'];
            // echo "password : " . $password;
            $login = $connection->prepare("SELECT * FROM users WHERE email = :email");
            $login->bindParam(':email', $email);
            $login->execute();

            $row = $login->fetch(PDO::FETCH_ASSOC);
            // var_dump($row);
            // echo $login->rowCount();
            // var_dump($row);
            if ($login->rowCount() > 0)
            {
              // if (password_verify($password, $row['password']))
              // {
              //   // headeer('location: ../index.php');
              //    echo "logged in";
              // }
              if (!password_verify($password, $row['password']))
              {
                echo "do not work !";
              } else {

                $_SESSION['username'] = $row['username'];
                $_SESSION['id'] = $row['id'];
                header ('location: http://localhost:8000/index.html');
              }
            }
        }
    }
?>
               <form method="POST" action="login.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                  <!-- Register buttons -->
                  <div class="text-center">
                    <p>a new member? Create an acount<a href="register.php"> Register</a></p>
                    

                   
                  </div>
                </form>

        <?php
              require "../includes/footer.php";    
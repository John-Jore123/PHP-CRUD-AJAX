<?php include_once 'header.php'; ?>

<?php 
    if(isset($_SESSION['username']))
    {
        header('Location:admin/dashboard.php');
    }
    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($con,$_POST['user_email']);
        $password = mysqli_real_escape_string($con,$_POST['user_pass']);
        
        $sql=mysqli_query($con,"SELECT * FROM account_tbl WHERE username='$username' AND admin_password='$password' AND(role = 1 OR role = 0)");
        $count = mysqli_num_rows($sql);
    
        if($count > 0)
        {
            while ($row = mysqli_fetch_array($sql)){
    
    
                $_SESSION['id']=$row['account_id'];
                $_SESSION['user_email']=$username;
                $_SESSION['state']=$row['position'];
                header('location: admin/dashboard.php');
              
            }
        }
        else
        {
            $log=0;
        }
    }
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h3 class="mb-5">Login Account</h3>
                <form method="POST" enctype="multipart/form-data" id="register"> 
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="form2Example1" name="user_email" class="form-control" />
                        <label class="form-label" for="form2Example1">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="form2Example2" name="user_pass" class="form-control" />
                        <label class="form-label" for="form2Example2">Password</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="login" class="btn btn-primary btn-block mb-4">Sign in</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Click to create an account here: <a href="register.php">Register</a></p>
                    </div>
                </form>

            </div>
        </div>
        
    </div>
</section>


<?php include_once 'footer.php'; ?>
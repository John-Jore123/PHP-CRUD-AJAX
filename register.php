<?php require 'header.php'; ?>

<?php
    // if (isset($_POST['register'])) {
    //     $name = $_POST['user_name'];
    //     $email = $_POST['user_email'];
    //     $password = $_POST['user_pass'];

    //     $query = "INSERT INTO account_db.users VALUES(NULL,'$name','$email','$password','$name')";
    //     $sql = mysqli_query($conn,$query);
    //     if ($sql) {
    //         echo "resgister";
    //     } else {
    //         echo "failed";
    //     }
    // }
?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#regData").on('submit',function(event) {
            event.preventDefault();
            
            var formArr = $('#regData')[0];
            var formData = new FormData(formArr);
            var password = $('#passwordReg').val();
            var repassword = $('#repasswordReg').val(); 
            // $("#regSUBMIT").prop("disabled", true);

            if(password != repassword) {
                document.getElementById("msgOUTPUT").innerHTML = "Password do not match.";
                // $("#regSUBMIT").prop("disabled", false);
            } else {
                $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: '/sql/_regQuery.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 800000,
                    success:function(data) {
                        var response = JSON.parse(data);
                        // $('#msgOUTPUT').text(decode);
                        // $("#regSUBMIT").prop("disabled", false);

                        if(response.statusCode == 200) {
                            console.log("Success: ", response);
                            formArr.reset();
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Successfully registered.',
                                showConfirmButton: false,
                                timer: 1800
                            });
                        }
                        if(response.statusCode == 201) {
                            console.log("Failed: ", response);
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Something went wrong. Please try again.',
                                showConfirmButton: false,
                                timer: 1800
                            });
                        }
                    },
                    error: function (e) {
                        $('#msgOUTPUT').text(e.responseText);
                        console.log("Error: ", e);
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Something went wrong. Please try again.',
                            showConfirmButton: false,
                            timer: 1800
                        });
                        // $("#regSUBMIT").prop("disabled", false);
                    }
                });
            }
        })
    });
</script>

<section>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-5">
                <h3 class="mb-5">Register Account</h3>
                <span class="text-danger" id="msgOUTPUT"></span>

                <form action="" method="POST" enctype="multipart/form-data" id="regData" class="my-3">
                    <div class="form-outline mb-4">
                        <input type="text" id="nameReg" name="nameReg" class="form-control" />
                        <label class="form-label" for="form2Example1">Name</label>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="uemailReg" name="emailReg" class="form-control" />
                        <label class="form-label" for="form2Example1">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="passwordReg" name="passwordReg" class="form-control" />
                        <label class="form-label" for="form2Example2">Password</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="repasswordReg" name="repasswordReg" class="form-control" />
                        <label class="form-label" for="form2Example2">Confirm Password</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Already have an account click: <a href="login.php">Login</a></p>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

</body>
</html>
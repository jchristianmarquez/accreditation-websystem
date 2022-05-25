<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CCC Accreditation</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        {{-- Scripts --}}
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        
        {{-- Bootstrap / CSS Files --}}
        <link rel="stylesheet" href="{{ asset('css/login.css') }} " type="text/css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet"> 

        <!-- Styles -->
    </head>

    <body>
        <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <img src ={{ asset('images/CCC-logo.png') }}>
                    <h3>CITY COLLEGE OF CALAMBA </h3>
                    <h6>ALCUCOA Accreditation</h6>
                    <h6>Online Documentation</h6> 
                    <p>With this online documentation platform, you will be able to navigation through 
                      various areas of accredictation per program.
                    </p>
                    <p>Kindly login using the credentials sent to you by the CCC Accreditation Team.</p>
                </div>
                <div class="col-md-6 login-form-2">
                    <h3>Login and Access the online documentation here</h3>
                    <p id = "login-sub">Please enter the login credential sent to you.</p>
                    <?php if(!empty($invalidLogin_err)){
                        echo '<div class ="alert alert-danger">'.$invalidLogin_err.'</div>';
                    }?>
                    <form method ="POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-group" id = "username" >
                            <label for = "accessName">Access Name</label>
                            <input type="text" class=" login-field" name="username" placeholder="Enter acess name " value="" />
                        </div>
                        <div class="form-group" id = "password">
                        <label for = "secusityCode">Security Code</label>
                            <input type="password" class="login-field"  name ="password" placeholder="Enter security code" value="" />
                        </div>
                        <div class="form-group  d-flex align-items-center justify-content-center">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                        <div class="form-group  d-flex align-items-center justify-content-center">

                            <a href="forgotpass.php" class="ForgetPwd" value="Login">Forgot Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

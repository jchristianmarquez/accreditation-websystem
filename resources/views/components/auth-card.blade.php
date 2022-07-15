<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1 bg-blue">
            <img src ={{asset('/images/official-CCC-logo.png')}}>
            <h3>CITY COLLEGE OF CALAMBA </h3>
            <h6>ALCUCOA Accreditation</h6>
            <h6>Online Documentation</h6>
            <p>With this online documentation platform, you will be able to navigation through
              various areas of accreditation per program.
            </p>
            <p>Kindly login using the credentials sent to you by the CCC Accreditation Team.</p>
        </div>
        <div class="col-md-6 login-form-2">
            <h3>Login and Access the online documentation here</h3>
            <p id = "login-sub">Please enter the login credential sent to you.</p>
            {{ $slot }}
        </div>
    </div>
</div>

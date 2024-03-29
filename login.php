<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="login.css" />
</head>

<body>
  <section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="image/download.png" class="img-fluid" alt="Sample image" />
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form action="login_proses.php" method="post">

            <b>LOGIN SURAT MASUK DAN SURAT KELUAR</b>
            <!-- Email input -->
            <?php if (isset($_GET['error'])) : ?>
              <div class="alert alert-danger" role="alert">
                Username dan Password salah
              </div>
            <?php endif ?>
            <div class="form-outline mb-4">
              <input type="text" id="form3Example3" class="form-control form-control-lg" name="username" />
              <label class="form-label" for="form3Example3">Username</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" id="form3Example4" class="form-control form-control-lg" name="password" />
              <label class="form-label" for="form3Example4">Password</label>
            </div>

            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3">
                  Remember me
                </label>
              </div>
              <a href="#!" class="text-body">Forgot password?</a>
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem">
                Login
              </button>
              <p class="small fw-bold mt-2 pt-1 mb-0">
                Don't have an account?
                <a href="#!" class="link-danger">Register</a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>

  </section>
  <script src="dist/js/bootstrap.min.js"></script>
</body>

</html>
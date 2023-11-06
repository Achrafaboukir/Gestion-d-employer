<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <!-- MDB -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <style>
        .gradient-custom-2 {
  /* fallback for old browsers */
  background: #ff616d;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to right, rgba(255, 97, 109, 1), rgba(255, 145, 147, 1));

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to right, rgba(255, 97, 109, 1), rgba(255, 145, 147, 1));
}
.form-signin {
            width: 100%;
            max-width: 420px;
            padding: 15px;
            margin: auto;
        }
        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .form-signin button {
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            padding: 10px;
        }
        

    </style>
</head>
<body>

<section class="h-100 gradient-form " style=" height:100%">
  <div class="container  h-100" style="margin-top:140px;">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 shadow-md  text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="https://profilaction.ca/wp-content/uploads/2022/05/salvatore_logo.png"
                    style="width: 185px;" alt="logo">
                </div>
                <?php if ($this->session->flashdata('login_error')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('login_error'); ?>
            </div>
        <?php endif; ?>

                <div class="container mt-5 py-20">
                <?php echo form_open('auth/login'); ?>
            <div class="form-group">
                <input type="email" id="inputEmail" class="form-control mb-3" placeholder="Email address" id="login" name="login" required autofocus>
            </div>
            <div class="form-group">
                <input type="password"  class="form-control mb-5" placeholder="Password" id="password" name="password" required>
            </div>
            <button class="btn btn-lg btn-primary btn-block " type="submit">Log in</button>
            <?php echo form_close(); ?>
    </div>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Pizza Salvadoré</h4>
                <p class="small mb-0">La première pizzéria de la famille Abbatiello a vu le jour à Saint-Georges-de-Beauce en
1964 au Canada. Il s’agit donc d’une franchise Canadienne étendue dans tout l’etat à ce
jour. Étant un mets encore nouveau à l’époque, la pizza de Salvatoré attire des gens de
plusieurs horizons dans la région, notamment des Américains du Maine, grâce à son goût
unique</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="h-100 gradient-form" style="background-color: #eee;">

</body>
</html>

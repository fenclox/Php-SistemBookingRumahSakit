<?php include 'modal/daftar.php';?>
<?php include 'modal/login.php';?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RS. Daan Mogot</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.css" rel="stylesheet">

    <!-- Bootstrap -->
    <script src="bs/js/bootstrap.min.js"></script>

    <style type="text/css">
      label{
       font-size: 13px;
       font-weight: bold;
        font-family: Tahoma, sans-serif;  
      }
      input[type="text"], input[type="password"]{
        font-size: 12px;
        display: block;
        font-family: Tahoma, sans-serif;
      }
      textarea#styled {
        font-size: 12px;
        height: 70px;
        padding: 5px;
        font-family: Tahoma, sans-serif;
      }
      button[type="button"] {
          width: 120px;
          font-size: 15px;
          margin-left: 35px;
          display: block;
          font-size: 
      }
    </style>
    <!-- ////////////////// Onkeypress ////////////////// -->
    <script language="javascript">
      function isNumberKey(evt) //Number
      {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        console.log(charCode);
          if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
      }
      function isAlphabetKey(evt) //Alphabet + spc
      {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        console.log(charCode);
          if (charCode > 32 && (charCode < 97 || charCode > 122))
            return false;

        return true;
      }
      function isIdpasienKey(evt) //Id pasien
      {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        console.log(charCode);
          if (charCode > 31 && charCode != 45 && (charCode < 48 || charCode > 57))
            return false;

        return true;
      }
    </script>
    <!-- ////////////////// End Onkeypress ////////////////// -->
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">RS. Daan Mogot</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a style="cursor:pointer;" class="nav-link js-scroll-trigger" data-toggle="modal" data-target="#modalDaftar">Daftar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Galeri</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Kontak</a>
            </li>
            <li class="nav-item">
              <a style="cursor:pointer;" class="nav-link js-scroll-trigger" data-toggle="modal" data-target="#modalLogin">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead">
      <div class="header-content">
        <div class="header-content-inner">
          <h1 id="homeHeading"><img src="../images/logo.png" width="200" height="200"></h1>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">Profil</h2>
            <hr class="light">
            <p class="text-faded">Kami selalu siap melayani pasien...</p>
          </div>
        </div>
      </div>
    </section>

    <div class="call-to-action bg-dark" id="portfolio">
      <div class="container text-center">
        <section class="p-0">
      <div class="container-fluid">
        <div class="row no-gutter popup-gallery">
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    RS. Daan Mogot
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    RS. Daan Mogot
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    RS. Daan Mogot
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/4.jpeg">
              <img class="img-fluid" src="img/portfolio/thumbnails/4.jpeg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    RS. Daan Mogot
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/5.jpeg">
              <img class="img-fluid" src="img/portfolio/thumbnails/5.jpeg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    RS. Daan Mogot
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/6.jpeg">
              <img class="img-fluid" src="img/portfolio/thumbnails/6.jpeg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    RS. Daan Mogot
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
      </div>
    </div>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Kontak</h2>
            <hr class="primary">
            <p>Silahkan hubungi kami melalui kontak atau email kami yang tertera di bawah ini!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x sr-contact"></i>
            <p>021-62629090</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x sr-contact"></i>
            <p>
              <a href="mailto:your-email@your-domain.com">rs_daanmogot@gmail.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

  </body>

</html>
<!-- ////////////////////////////////////////////////////////////////////// -->
<!-- Visible password -->
<script type="text/javascript">
  //Daftar Pasien
  function mouseoverPassDaftar(obj) {
  var obj = document.getElementById('passDaftar');
  obj.type = "text";
  }
  function mouseoutPassDaftar(obj) {
  var obj = document.getElementById('passDaftar');
  obj.type = "password";
  }
  //Login Pasien
  function mouseoverPassLogin(obj) {
  var obj = document.getElementById('passLogin');
  obj.type = "text";
  }
  function mouseoutPassLogin(obj) {
  var obj = document.getElementById('passLogin');
  obj.type = "password";
  }
</script>
<script type="text/javascript">
  $('#modalDaftar,#modalLogin').modal({backdrop: 'static', keyboard: false, show: false})  
</script>
<!-- Auto Uppercase -->
<script type="text/javascript">
  $(document).ready(function() {
    $("#Uppercase").keyup(function() {
        var valtext = $(this).val()
        $(this).val(valtext.toUpperCase())
    })
  })
</script>

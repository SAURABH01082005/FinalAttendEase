<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>AttendEase</title>
  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;900&family=Ubuntu:wght@300;400;700&display=swap" rel="stylesheet">
  <!-- CSS StyleSheets -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="guardian_front2.css">
  <!-- bootstrap script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
  <!-- fonts awesome -->
  <script src="https://kit.fontawesome.com/cc45b1306a.js" crossorigin="anonymous"></script>

</head>

<body>

    <section id="title">

      <div class="container-fluid">

        <!-- Nav Bar -->

        <nav class="navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand logo" href="">AttendEase</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" id="nav-link" href="https://localhost/miniprojectattendenceSem3/Attendencemain/AttendEase.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="nav-link" href="">Assessment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"  id="nav-link" href="">Attendance</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="nav-link" href="">Extracurriculars</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="nav-link" href="">Faculty_Remark</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="nav-link" href="">Session</a>
              </li>
            </ul>
          </div>
        </nav>


        <!-- Title -->

        <div class="row">

          <div class="col-md-6 col-12">
            <?php 
            session_start();
            if(isset($_SESSION['guardian_username'])){
              $name=strtoupper($_SESSION['guardian_username']);
              $space="    ";
              ?>
            <H4 >WELCOME <pre style="font-size:23.4327px ; font-family: 'Montserrat', sans-serif;; font-weight: 500; margin-top: 0;"><?php  echo "      $space$name";    ?></pre></H4>
              <?php
            }
            ?>
          </div>
          <div class="col-md-6 col-12">

          </div>
        </div>
      </div>

    </section>
    <!----------------------------------------- image -->
    <img src="logo.png" alt="logoImg" class="circular_logo">

<!-- full items below title -->



  <!-- Features -->



  <!-- Testimonials -->



  <!-- Footer -->
<P>                                                       
    <br><br><br><br><br><br><br><br><br><br><br>                
</P>
  <footer id="footer">
    <i class="fa-brands fa-twitter"></i><i class="fa-brands fa-facebook-f"></i><i class="fa-brands fa-instagram"></i><i class="fa-solid fa-envelope"></i>

    <p>© Copyright 2024 AttendEase</p>

  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

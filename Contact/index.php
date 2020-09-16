<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config.php';

session_start();

if (!empty($_SESSION['_contact_form_error'])) {
    $error = $_SESSION['_contact_form_error'];
    unset($_SESSION['_contact_form_error']);
}

if (!empty($_SESSION['_contact_form_success'])) {
    $success = true;
    unset($_SESSION['_contact_form_success']);
}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="derekverbrugge.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
    

    <title>DerekVerbrugge.com Contact</title>

    <!-- reCAPTCHA Javascript -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    
</head>
<body>    
    <!--contact-->

    <div class="header">
        <p class="title"><b><a href="https://derekverbrugge.com/contact">DerekVerbrugge.com</a></b></p>
        <!--<a href="https://derekverbrugge.com/contact.html">Contact</a>-->
    </div>



    <ul>
        <li><a href="https://derekverbrugge.com">Home</a></li>
        <li class="dropdown">
            <!--<a href="javascript:void(0)" class="dropbtn">Portfolio</a>-->
            <a href="https://derekverbrugge.com/about.html" class="dropbtn">About</a>
            <div class="dropdown-content">
              <a href="https://derekverbrugge.com/interior-painting.html">Interior Painting</a>
              <!--<a href="#">Fine Art</a>-->
              <!--<a href="#">Software and Digital Assets</a>-->
            </div>
        </li>
        <!--<li><a href="https://derekverbrugge.com/about.html">About</a></li>-->
        <li class="right"><a href="https://derekverbrugge.com/contact">Contact</a></li>

      </ul>


      <div class="row">
    
        
        

        <div class="column">
            <center><h2><a href="https://derekverbrugge.com/contact">Contact</a></h2></center>
            <div class="column dark">
                <div class="column side">
                    <h3>Serving Manchester, NH and Southern New Hampshire</h3>
                    <h4>
                        Text or Call: (208) 691-4350<br>
                        Email: derekverbrugge@gmail.com<br>
                    </h4>
                </div>
                <div class="column main">
                <div class="container">
    <div class="row">
       <!-- <div class="col-md-8 offset-md-2">-->
            <!--<div class="card mt-5">-->
                <div class="card-body">
                    <!--<h1 class="card-title">
                        Contact Us
                    </h1>-->

                    <?php
                    if (!empty($success)) {
                        ?>
                        <div class="alert alert-success">Your message was sent successfully!</div>
                        <?php
                    }
                    ?>

                    <?php
                    if (!empty($error)) {
                        ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                        <?php
                    }
                    ?>

                    <form method="post" action="submit.php">
                        <div class="row">
                            <label for="name">Your Name</label>
                            <input type="text" name="name" id="name" class="form-control" style="width:100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-top: 6px; margin-bottom: 16px; resize: vertical;">
                        </div>

                        <div class="row">
                            <label for="email">Your Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" style="width:100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-top: 6px; margin-bottom: 16px; resize: vertical;">
                        </div>

                        <div class="row">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="subject" style="width:100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-top: 6px; margin-bottom: 16px; resize: vertical;">
                        </div>

                        <div class="row">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" class="form-control" rows="12" style="width:100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-top: 6px; margin-bottom: 16px; resize: vertical;"></textarea>
                        </div>

                        <div class="row">
                            <div class="g-recaptcha" data-sitekey="<?= CONTACTFORM_RECAPTCHA_SITE_KEY ?>"></div>
                        </div>

                        <button class="btn btn-primary btn-block">Send Message</button>
                    <!--</form>
                </div>
            </div>-->
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->

                </div>
            </div>
        </div>
    </div>

<br><br><br><br>

<div>
    <ul>
        <li>
            <a href="https://derekverbrugge.com">Home</a> <br> 
            <!--<a href="https://derekverbrugge.com/portfolio.html">Portfolio</a></br>-->
            <a href="https://derekverbrugge.com/about.html">About</a><br>
            <a href="https://derekverbrugge.com/contact">Contact</a><br>
            <br><br><br>
            
            
        </li>
  
    </ul>
    <div class="footer">
        Copywrite © 2020 Derek Verbrugge - All Rights Reserved
    </div>
    
</div>

</body>
</html>


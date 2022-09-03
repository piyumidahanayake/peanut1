<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>

    <header style="height:60px">
       
        <div class="left_area">
        <h3>Agro <span>Master</span><span style="margin-left:24%;font-family: z;font-weight: 800 ;">Your reliable delivery partner</span></h3>
        </div>
        <div class="right_area">
          <a href="<?php echo URLROOT; ?>/collectioncenterpages/home" class="logout_btn">Home</a>
        </div>
      </header>
      <div style="background-color:#f0f2f5;height:600px" class="row">
      <img src="<?php echo URLROOT; ?>/img/login-3.jpeg" alt="Girl in a jacket" width=1450px height=600px style="margin-top:40px">
      <div style="top:80px;left:58%;position:fixed;" class="col-md-5 mx-auto">
      <div class="card card-body bg-primary mt-5">
      <?php flash('send_success'); ?>
        <h2>Forgot password</h2>
        <p>Please fill out this form to send a password reset request</p>
        <form action="<?php echo URLROOT; ?>/users/forgot_password" method="post">
          <div class="form-group">
            <label for="email">Email address: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg ">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
         

          <div class="row">
            <div class="col">
              <input type="submit" value="Submit" class="btn btn-dark btn-block">
              <div class="col">
            
            </div>
            </div>
            <div class="row">
            <div class="col">
             
             
              <a href="<?php echo URLROOT; ?>/users/reset_password" class="btn btn-light btn-block">Reset password</a>
            </div>
            </div>
            
           
          </div>
        </form>
      </div>
    </div>
  </div>
  </body>
</html>
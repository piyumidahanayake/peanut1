<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">
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
          <a href="<?php echo URLROOT; ?>/pages/home" class="logout_btn">Home</a>
        </div>
      </header>
       
      <div style="background-color:#f0f2f5;height:900px" class="row">

      <img src="<?php echo URLROOT; ?>/img/login-2.jpeg" alt="Girl in a jacket" width=100% height=100% style="margin-top:60px">
      <div style="margin-top:50px;left:58%;position:absolute;"class="col-md-5 mx-auto">
      <div class="card card-body bg-info mt-5">
     <?php flash('send_success'); ?>
      <?php flash('request-success'); ?>
        <h2>Change account password</h2>
        <p>Please fill out this form to change password</p>
        <form action="<?php echo URLROOT; ?>/users/reset_password" method="post">
          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="verification_code">Verification code: <sup>*</sup></label>
            <input type="text" name="verification_code" class="form-control form-control-lg ">
            <span class="invalid-feedback"><?php echo $data['verification_code_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="password">Password: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="confirm_password">Confirm Password: <sup>*</sup></label>
            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
          </div>
          <div class="row">
            <div class="col">
              <input type="submit" value="Reset" class="btn btn-success btn-block">
            </div>
         
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
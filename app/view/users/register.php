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
      <div style="background-color:#f0f2f5;height:1000px" class="row">
      <img src="<?php echo URLROOT; ?>/img/login-3.jpeg" alt="Girl in a jacket" width=1450px height=1000px style="margin-top:60px">
      <div style="margin-top:50px;left:58%;position:absolute;" class="col-md-5 mx-auto">
      <div class="card card-body bg-primary mt-5">
      <?php flash('register_success'); ?>
        <h2>Create An Account</h2>
        <p>Please fill out this form to register with us</p>
        <form action="<?php echo URLROOT; ?>/users/register" method="post">
          <div class="form-group">
            <label for="name">Requester name: <sup>*</sup></label>
            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="email">Email address: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="type">Type: <sup>*</sup></label>
            <select name = "type"class="form-control form-control-lg" <?php echo (!empty($data['type_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['type']; ?>">
            <option value=""></option>
              <option value="collection center">Collection center</option>
              <option value = "outlet">Outlet</option>
            </select>
            <span class="invalid-feedback"><?php echo $data['type_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="con_number">Contact number: <sup>*</sup></label>
            <input type="text" name="con_number" class="form-control form-control-lg <?php echo (!empty($data['con_number_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['con_number']; ?>">           
             <span class="invalid-feedback"><?php echo $data['con_number_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="cen_name">Collection center/outlet name: <sup>*</sup></label>
            <input type="text" name="cen_name" class="form-control form-control-lg ">
            <span class="invalid-feedback"><?php echo $data['cen_name_err']; ?></span>
          </div>
          <div class="form-group">
          <label for="name">District: <sup>*</sup></label>
            <input list="districts" id="district"name="district" class="form-control form-control-lg <?php echo (!empty($data['district_err'])) ? 'is-invalid' : ''; ?> " value="<?php echo $data['district']; ?>">
            <datalist id="districts">
              <option value="galle">
              <option value="jaffna">
              <option value="colombo">
              <option value="mathara">
              <option value="kurunegala">
              <option value="gampaha">
              <option value="kandy">
              <option value="nuwara eliya">
            </datalist>
            <span class="invalid-feedback"><?php echo $data['district_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="location">Location: <sup>*</sup></label>
            <input type="text" name="location" class="form-control form-control-lg <?php echo (!empty($data['location_err'])) ? 'is-invalid' : ''; ?> " value="<?php echo $data['location']; ?>">
            <span class="invalid-feedback"><?php echo $data['location_err']; ?></span>
          </div>
         

          <div class="row">
            <div class="col">
              <input type="submit" value="Register" class="btn btn-dark btn-block">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  </body>
</html>
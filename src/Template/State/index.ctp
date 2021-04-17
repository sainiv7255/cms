<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
<style>


label {
    margin-bottom: 0px;
}

.form-control-label {
    font-size: 10px;
    color: #6C6C6C;
    font-weight: bold;
    letter-spacing: 1px;
}

.btn-outline-primary {
    border-color: #0DB8DE;
    color: #0DB8DE;
    border-radius: 0px;
    font-weight: bold;
    letter-spacing: 1px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.btn-outline-primary:hover {
    background-color: #0DB8DE;
    right: 0px;
}

.login-btm {
    float: left;
}

.login-button {
    padding-right: 0px;
    text-align: right;
    margin-bottom: 25px;
}

.login-text {
    text-align: left;
    padding-left: 0px;
    color: #A2A4A4;
}

.loginbttm {
    padding: 0px;
}
</style>
  

 
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-md-auto gap-2">
        <li class="nav-item rounded">
          <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-house-fill me-2"></i>Home</a>
        </li>
        <li class="nav-item rounded">
          <a class="nav-link" href="<?= $this->Url->build(['controller'=>'State', 'action'=>'index','_full'=>true]); ?>"><i class="bi bi-people-fill me-2"></i>State</a>
        </li>
        <li class="nav-item rounded">
          <a class="nav-link" href="<?= $this->Url->build(['controller'=>'District', 'action'=>'index','_full'=>true]); ?>"><i class="bi bi-telephone-fill me-2"></i>District</a>
        </li>
		<li class="nav-item rounded">
          <a class="nav-link" href="<?= $this->Url->build(['controller'=>'Child', 'action'=>'index','_full'=>true]); ?>"><i class="bi bi-telephone-fill me-2"></i>Child</a>
		  
        </li>
		<li class="nav-item rounded">
          <a class="nav-link" href="<?= $this->Url->build(['controller'=>'Users', 'action'=>'logout','_full'=>true]); ?>"><i class="bi bi-telephone-fill me-2"></i>Logout</a>
        </li>
        <!-- class="nav-item dropdown rounded">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill me-2"></i>Profile</a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Account</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul>
        </li-->
      </ul>
    </div>
  </div>
</nav>
     
           
         
   <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                
                <div class="col-lg-12 login-title">
                    ADD State
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <?php
                echo $this->Form->create('');
                 ?>
                            <div class="form-group">
                                <label class="form-control-label">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                         

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                                </div>
                            </div>
                        
              <?php
                   echo $this->Form->end();
              ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
		
		<div class ='col-lg-12'>
		<ul>
		<?php
		foreach($state as $row)
		{?>
			<li>
			<?php echo($row->name);?>
          <li>
		<?php  } ?>
       
      </ul>
		</div>

</div>




      

    

              


</body>
</html>
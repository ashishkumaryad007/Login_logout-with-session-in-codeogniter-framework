<!DOCTYPE html>
<head>
    <tittle>CRUD Application - Create User</tittle>
    <link rel="Stylesheet" type="text/css" 
    href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class= "navbar-brand">CRUD Application</a>
            <div class="navbar-brand col-md-6 text-right text-white">Welcome,
                 <?php echo $user['name'] ; ?> <a href="<?php echo base_url().'index.php/Auth/logout';?>"
                  class="nav-item text-white">LogOut</a> </div>
        </div>
    </div>
    <div class="container" style="padding-top: 10px;">
        <div class="row">
            <div class="col-md-12">
                <?php 
                    $success = $this->session->userdata('success');
                    if($success != ""){ ?>
                        <div class = "alert alert-success"><?php echo $success; ?></div>
                    <?php
                    }
                ?>
            </div>
        </div>
        <h3>User Dashboard</h3>
        <hr>
    </div>
</body>
</html>
           
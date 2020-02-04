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
        <h3>Create User</h3>
        <hr>
        <form method="post" name="CreateUser" action="<?php echo base_url().'index.php/Auth/register';?>">
        <div class ="row">
            <div class= "col-md-6">
                <div class= "form-group">
                    <lible>Name</lable>
                    <input type="text" name="name" value="<?php echo set_value('name')
                    // to avoid from loosing the name in the name space ?>" class ="form-control">
                    <?php echo form_error('name');?>
                </div>
                <div class= "form-group">
                    <lible>Email</lable>
                    <input type="text" name="email" value="<?php echo set_value('email')
                    //to avoid from lossing the email in the name space ?>" class ="form-control">
                    <?php echo form_error('email');?>
                </div>
                <div class= "form-group">
                    <lible>Mobile</lable>
                    <input type="text" name="mobile" value="<?php echo set_value('mobile')
                    //to avoid from lossing the mobile in the name space ?>" class ="form-control">
                    <?php echo form_error('mobile');?>
                </div>
                <div class= "form-group">
                    <lible>Password</lable>
                    <input type="password" name="password" value="<?php echo set_value('password')
                    //to avoid from lossing the password in the name space ?>" class ="form-control">
                    <?php echo form_error('password');?>
                </div>
                <div class= "form-group">
                    <button class="btn btn-primary">SignUp</button>
                    <a href="<?php echo base_url().'index.php/Auth/login';?>"
                     class="btn-secondary btn">Login</a>
                    <a href="" class="btn-danger btn">Cancel</a>
                </div>
            </div>
        </div>
        </form>
    </div>
</body>
</html>
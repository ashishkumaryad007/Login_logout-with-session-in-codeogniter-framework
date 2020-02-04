<!DOCTYPE html>
<head>
    <tittle>CRUD Application - Login User</tittle>
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
        <h3>Login User</h3>
        <hr>
        <div class ="row">
        <?php
                $Failed = $this->session->flashdata('Failed');
                if($Failed !=""){

            ?>
            <div class='alert alert-danger'>
                    <?php echo $Failed; ?>
            </div>
                <?php }
                ?>
        </div>
        <form method="post" name="LoginUser" action="<?php echo base_url().'index.php/Auth/login';?>">
        <div class ="row">
            <div class= "col-md-6">
                <div class= "form-group">
                    <lible>Email</lable>
                    <input type="text" name="email" value="<?php echo set_value('email')
                    //to avoid from lossing the email in the name space ?>" class ="form-control">
                    <?php echo form_error('email');?>
                </div>
                <div class= "form-group">
                    <lible>Password</lable>
                    <input type="password" name="password" value="<?php echo set_value('password')
                    //to avoid from lossing the password in the name space ?>" class ="form-control">
                    <?php echo form_error('password');?>
                </div>
                <div class= "form-group">
                    <button class="btn btn-primary">Login</button>
                    <a href="<?php echo base_url().'index.php/Auth/register';?>"
                     class="btn-secondary btn">Signup</a>
                    <a href="" class="btn-danger btn">Cancel</a>
                </div>
            </div>
        </div>
        </form>
    </div>
</body>
</html>
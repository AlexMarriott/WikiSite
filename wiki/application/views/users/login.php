<?php
/*
 * /*@author Alex Marriott s4816928,
 * 12/4/2018.
 * filename: templates/header.php
 * The header page is used for the header of all the pages on the website.
 */
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
<?php echo form_open('users/login');?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">'
        <h1 class="text-center"><?php echo $title?></h1>
        <div class="form-group">
            <input type="text" name="user_name" class="form-control" placeholder="Enter User Name" required autofocus>
        </div>
        <div class="form-group">
            <input type="password" name="account_password" class="form-control" placeholder="Enter Password" required autofocus>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </div>
</div>
        </div>
    </div>
</div>




<?php echo form_close();?>

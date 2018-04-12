<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



<!-- found here https://bootsnipp.com/snippets/featured/user-profile-widget -->
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="<?php echo site_url(); ?>assets/images/users/<?php echo $user_info['user_image']; ?>"
                             alt="User Image" height="380" width="500" class="img-rounded img-responsive">
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4><?php echo $user_info['user_name']; ?></h4>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i> <?php echo $user_info['email_address']; ?>
                            <br/>
                            <i class="glyphicon glyphicon-gift"></i> Account created
                            on: <?php echo $user_info['account_creation_date']; ?></p>
                    </div>
                </div>
            </div>
        </div>


        <?php if ($this->session->userdata('user_id') === $user_info['user_id']):?>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('users/user_account'); ?>
                    <div class="col-xs-12 col-sm-6 col-md-8">
                        <h4>Edit Details.</h4>
                        <h4>Please enter and confirm your password to make changes to your account.</h4>
                        <h4>Page currently work, please check back later.</h4>


                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email_address" placeholder="<?php echo $user_info['email_address']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="user_name" placeholder="<?php echo $user_info['user_name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="picture-upload">File input</label>
                            <p class="help-block">Upload a user image!</p>
                            <input type="file" id="picture-upload" name="userfile" size="20">
                        </div>
                        <!--<button type="submit" class="btn btn-primary btn-block">Submit</button>-->
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>

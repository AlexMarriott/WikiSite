<?php
/*
 * /*@author Alex Marriott s4816928,
 * 12/4/2018.
 * filename: posts/view.php
 * This is the posts/view page. This page is used as the view for each post. This page also has a unique view for the user. If they are logged in, they can edit or delete there post.
 */
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4"><?php echo $post_item['post_title'];?> </h1>

            <!-- Author -->
            <p class="lead">
                by
                <a href="<?php echo site_url('users/user_account/' . $post_item['user_id']);?>"><?php echo $post_item['user_name'];?></a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p><?php echo $post_item['post_date'];?></p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post_item['post_image']; ?>" alt="<?php echo $post_item['post_image']; ?>">

                    <hr>

                    <!-- Post Content -->
            <p class="lead"><?php echo $post_item['post_body'];?>

                <blockquote class="blockquote">
            <p class="mb-0">Current Rating: <?php echo round($post_rating['rating']);?></p>
            </blockquote>
            <hr>
            <!-- if the user are log in, they can delete and edit there post.-->
            <?php if ($this->session->userdata('user_id') == $post_item['user_id_FK']): ?>
                <hr>
                <a class="btn btn-primary pull-left"
                   href="<?php echo base_url(); ?>posts/edit/<?php echo $post_item['slug']; ?>">Edit</a>
                <?php echo form_open('posts/delete/' . $post_item['post_id']); ?>
                <input type="submit" value="Delete" class="btn btn-danger">
                </form>

            <?php endif; ?>

            <!-- if the current logged in user is not the post user, they can rate the post-->
            <?php if ($this->session->userdata('user_id') != $post_item['user_id']): ?>
                <!-- https://www.youtube.com/watch?v=NmF_00eAjD8 is where i based the star rating system from.-->
                <strong>Like the post? Give it a rating: </strong>
                <?php foreach (range(1, 5) as $rating): ?>
                    <a href="<?php echo base_url('posts/rate/') . $post_item['post_id'] . '/' . $rating . '/' . $post_item['slug']; ?>"><?php echo $rating ?></a>
                <?php endforeach; ?>
            <?php endif; ?>

            <!-- hidden values used for getting information on the user and the post-->
            <input type="hidden" name="slug" value="<?php echo $post_item['slug']; ?>">
            <input type="hidden" name="logged_in_user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
            <hr>

            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('comments/create/' . $post_item['post_id']); ?>
                    <div class="form-group">
                        <textarea class="form-control" name="comment" rows="3"></textarea>
                    </div>
                    <!-- This allows the comment controller grab the slug of the post-->
                    <input type="hidden" name="slug" value="<?php echo $post_item['slug']; ?>">
                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                    </form>
                </div>
            </div>

            <?php if ($comments) : ?>
                <?php foreach ($comments as $comment) : ?>
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="<?php echo site_url(); ?>assets/images/users/<?php echo $comment['user_image']; ?>" alt="user_image" height="50" width="50">
                        <div class="media-body">
                            <h5 class="mt-0"><strong><?php echo $comment['user_name'] . ' on ' . $comment['comment_date'] ?></strong></h5>
                            <?php echo $comment['comment']; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No comments</p>
            <?php endif; ?>
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <?php echo form_open('search/'); ?>
                    <div class="input-group">
                        <input type="text" class="form-control" name="keyword" placeholder="Search for post">
                        <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit">Search</button>
                </span>
                    </div>
                    </form>
                </div>
            </div>


            <!-- Categories Widget -->
            <div class="card my-4 fixed-side sidenav">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="http://student30371.bucomputing.uk/wiki/categories/subcategories/Networking">Networking</a>
                                </li>
                                <li>
                                    <a href="http://student30371.bucomputing.uk/wiki/categories/subcategories/Software">Software</a>
                                </li>
                                <li>
                                    <a href="http://student30371.bucomputing.uk/wiki/categories/subcategories/Infrastructure">Infrastructure</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="http://student30371.bucomputing.uk/wiki/categories/subcategories/System Design">System
                                        Design</a>
                                </li>
                                <li>
                                    <a href="http://student30371.bucomputing.uk/wiki/categories/subcategories/Hardware">Hardware</a>
                                </li>
                                <li>
                                    <a href="http://student30371.bucomputing.uk/wiki/categories/subcategories/Databases">Databases</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="align-self-end">
                                <strong><a href="http://student30371.bucomputing.uk/wiki/categories">View
                                        More...</a></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $logged_user = $this->session->userdata('user_id');
            if (!empty($logged_user)):?>
                <div class="card my-4 sidenav2">
                    <h5 class="card-header">User account view</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href=<?php echo site_url('users/view_posts/' . $this->session->userdata('user_id')); ?>>View
                                            Posts</a>
                                    </li>
                                    <li>
                                        <strong><?php echo "Total Posts: " . $this->session->userdata('post_count') ?></strong>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <strong><?php echo "User: ". $this->session->userdata('user_name'); ?></strong>
                                    </li>
                                    <li>
                                        <strong>Average Rating: <?php foreach ($this->session->userdata('rating') as $rating): echo round($rating['rating'],2); endforeach; ?></strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endif; ?>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

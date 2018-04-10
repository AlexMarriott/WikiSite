<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">Wiki N Stuff Knowledge Base.</h1>
            <?php echo '<h2>' . $title . '</h2>' ?>
            <?php foreach ($posts as $data): ?>
                <!-- Blog Post -->
                <div class='card mb-4'>
                    <img class='card-img-top'
                         src="<?php echo site_url(); ?>assets/images/posts/<?php echo $data['post_image']; ?>"
                         alt='Card image cap'>
                    <div class='card-body'>
                        <h2 class='card-title'><?php echo $data['post_title']; ?></h2>
                        <p class='card-text'><?php echo word_limiter($data['post_body'], 25); ?></p>
                        <a href="<?php echo site_url('posts/view/' . $data['slug']); ?>" class='btn btn-primary'>Read
                            More &rarr;</a>
                    </div>
                    <div class='card-footer text-muted'>
                        <small class="posted-date">Created on: <?php echo $data['post_date']; ?> <br>
                            Sub-Category: <strong><?php echo $data['sub_category_name']; ?></strong></small>
                        <br>
                        <small class="user">By: <a href='<?php
                            echo site_url('users/view/' . $data['user_id_FK']); ?>'> <?php echo $data['user_name']; ?></a>
                        </small>
                        <br>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- Pagination Numbers -->
            <?php echo $this->pagination->create_links() ?>


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
                                        <a href=<?php echo site_url('users/view/' . $this->session->userdata('user_id')); ?>>View
                                            Posts</a>
                                    </li>
                                    <li>
                                        <strong><?php echo "Total Posts: " . $post_count ?></strong>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <strong><?php echo "User: ". $this->session->userdata('user_name'); ?></strong>
                                    </li>
                                    <li>
                                        <strong><?php echo "Average Rating: " .  round($rating[0]['rating'],2); ?></strong>
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

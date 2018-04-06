<!-- Page Content -->
<div class="container">

    <div class="row">

        <style>
            .glyphicon glyphicon-upload:before {
                glyphicon glyphicon-upload;
            }
        </style>
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
                            echo site_url('user/view/' . $data['user_id_FK']);?>'> <?php echo $data['user_name'];?></a></small>
                        <br>
                        <small>Current rating:<strong> <?php echo $data['rating'];?></strong></small>
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
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                    </div>
                </div>
            </div>


            <!-- Categories Widget -->
            <div class="card my-4">
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
                                    <a href="http://student30371.bucomputing.uk/wiki/categories/subcategories/System Design">System Design</a>
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

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">User account view</h5>
                <div class="card-body">
                    <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="http://student30371.bucomputing.uk/wiki/user/view/account/">Account</a>
                            </li>
                            <li>
                                <a href="http://student30371.bucomputing.uk/wiki/user/view/usersid/posts">View Posts</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <strong><?php echo $data['user_name'];?></strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

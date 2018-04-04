

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">Wiki N Stuff Knowledge Base.</h1>
            <?php echo '<h2>'. $title . '</h2>'?>
            <?php foreach ($posts as $data):?>
            <!-- Blog Post -->
            <div class='card mb-4'>
                <img class='card-img-top' src="<?php echo site_url(); ?>assets/images/posts/<?php echo $data['post_image'];?>" alt='Card image cap'>
                <div class='card-body'>
                    <h2 class='card-title'><?php echo $data['post_title']; ?></h2>
                    <p class='card-text'><?php echo word_limiter($data['post_body'], 25);?></p>
                    <a href="<?php echo site_url('posts/view/'.$data['slug']);?>" class='btn btn-primary'>Read More &rarr;</a>
                </div>
                <div class='card-footer text-muted'>
                    <small class="posted-date">Created on: <?php echo $data['post_date'];?> <br>
                        Sub-Category: <strong><?php echo $data['sub_category_name'];?></strong></small><br>
            <small class="user">By: <a href='<?php //TODO create a user controller
             echo site_url('user/'.$data['user_id_FK']);?>'>user</a></small>
                </div>
            </div>
            <?php endforeach; ?>

            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <a class="page-link" href="#">&larr; Older</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#">Newer &rarr;</a>
                </li>
            </ul>

            <!-- Pagination Numbers -->
            <ul class="pagination justify-content-center mb-4">
                <!-- Show pagination links -->
                <?php echo '<p>' . $links . '</p>' ?>
            </ul>

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
                                    <a href="#">Web Design</a>
                                </li>
                                <li>
                                    <a href="#">HTML</a>
                                </li>
                                <li>
                                    <a href="#">Freebies</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                                <li>
                                    <a href="#">CSS</a>
                                </li>
                                <li>
                                    <a href="#">Tutorials</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="align-self-end">
                                <strong><a href="http://student30371.bucomputing.uk/wiki/categories">View More...</a></strong>
                            </div>
                </div>
            </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">User account view</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

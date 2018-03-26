<h2><?php echo $title; ?></h2>

<?php foreach ($posts as $post_item): ?>

        <h3><?php echo $post_item['title']; ?></h3>
        <div class="main">
                <?php echo $post_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('posts/'.$post_item['slug']); ?>">View article</a></p>

<?php endforeach; ?>
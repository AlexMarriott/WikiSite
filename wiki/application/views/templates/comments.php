<?php
foreach ( $post_item as $count): ?>

    <h3><?php echo $post_item['username']; ?></h3>
    <div class="main">
        <?php echo $post_item['comment']; ?>
    </div>
    <?php echo $post_item['comment_date']; ?>


<?php endforeach; ?>
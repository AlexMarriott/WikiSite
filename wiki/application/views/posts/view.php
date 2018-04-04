<?php //var_dump($post_item);?>
<img class='card-img-top' src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post_item['post_image']; ?>"
     alt='Card image cap'>

<?php
echo '<h2>' . $username . '</h2>';
echo '<h2>' . $post_item['post_title'] . '</h2>';
echo '<h2>' . $post_item['post_body'] . '</h2>';

echo '<h2>' . $post_item['rating_score'] . '</h2>';

echo '<h2>' . $post_item['post_date'] . '</h2>';


?>
<?php if ($this->session->userdata('user_id') == $post_item['user_id_FK']): ?>
<hr>
<a class="btn btn-primary pull-left"
   href="<?php echo base_url(); ?>posts/edit/<?php echo $post_item['slug']; ?>">Edit</a>
<?php echo form_open('posts/delete/' . $post_item['post_id']); ?>
<input type="submit" value="Delete" class="btn btn-danger">
</form>
<?php endif; ?>
<hr>
<h3>Comments</h3>
<?php if ($comments) : ?>
    <?php foreach ($comments as $comment) : ?>
        <div class="well">
            <h5><?php echo $comment['comment']; ?> [<strong>by <?php echo $post_item['user_name']; ?></strong>] </h5>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <p>No comments</p>
<?php endif; ?>

<hr>
<h3>Add Comment</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/' . $post_item['post_id']); ?>
<div class="form-group">
    <label>Comment</label>
    <textarea type="text" name="comments" value="Comment" class="form-control"></textarea>
</div>
<input type="hidden" name="slug" value="<?php echo $post_item['slug']; ?>">
<button class="btn btn-primary" type="submit">Submit Comment</button>

</form>



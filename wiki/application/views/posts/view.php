<?php
echo '<h2>'.$post_item['username'].'</h2>';
echo '<h2>'.$post_item['post_title'].'</h2>';
echo '<h2>'.$post_item['post_body'].'</h2>';

echo '<h2>'.$post_item['rating_score'].'</h2>';

echo '<h2>'.$post_item['post_date'].'</h2>';
?>

<hr>
<a class="btn btn-primary pull-left" href="http://student30371.bucomputing.uk/wiki/posts/edit/<?php echo $post_item['slug'];?>">Edit</a>
<?php echo form_open('posts/delete/'.$post_item['post_id']);?>
    <input type="submit" value="Delete" class="btn btn-danger">
</form>



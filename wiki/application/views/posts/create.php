<?php error_reporting(E_ALL);
ini_set('display_errors', 1);

?>


<h2><?php echo $post_title; ?></h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open('posts/create'); ?>
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="body">Post Text</label>
        <textarea class="form-control" id="body" name="body" rows="'30"></textarea>
    </div>
    <!--<div class="form-group">
        <label for="picture-upload">File input</label>
        <input type="file" id="picture-upload">
        <p class="help-block">Upload an image for your post</p>
    </div>-->
    <div class="form-group">
        <label for="sel1">Select a Subcategory:</label>
        <select class="form-control" id="subcategory">
            <?php// foreach ($results as $data):?>
            <option>//$data->post_title;</option>
                <option>$post_item['username']</option>

            <?php //endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
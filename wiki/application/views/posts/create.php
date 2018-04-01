<?php /*if (isset($error)) {
echo '<div class="alert alert-danger" role="alert">' . var_dump($error). '</div>';
}*/?>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('posts/create'); ?>
<?php echo '<h2>'.$title.'</h2>'; ?>

<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" id="title" name="title">
</div>
<div class="form-group">
    <label for="body">Post Text</label>
    <textarea class="form-control" id="body" name="body" rows="'30"></textarea>
</div>
<div class="form-group">
    <label for="sel1">Select a Subcategory:</label>
    <select class="form-control" id="subcategory" name="subcategory">
        <?php foreach ($sub_categories as $subcategory):?>
        <option value="<?php echo $subcategory['sub_category_id'];?>"><?php echo $subcategory['sub_category_name'];?></option>

        <?php endforeach; ?>
    </select>
</div>
<div class="form-group">
    <label for="sel1">Select a category:</label>
    <select class="form-control" id="category" name="category">
        <?php foreach ($categories as $category):?>
        <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name'];?></option>

        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label for="picture-upload">File input</label>
    <p class="help-block">Upload an image for your post!</p>
    <input type="file" id="picture-upload" name="userfile" size="20">
</div>

<button type="submit" class="btn btn-default">Submit</button>
</form>
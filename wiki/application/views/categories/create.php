<h2><?php echo $title;?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('categories/create'); ?>
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="sub-category-field" placeholder="Enter Name of a sub-category">
    </div>
<div class="form-group">
    <label for="sel1">Select a category:</label>
    <select class="form-control" id="category" name="category">
        <?php foreach ($categories as $category):?>
            <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name'];?></option>

        <?php endforeach; ?>
    </select>
</div>
<button type="submit" class="btn btn-default">Submit</button>
</form>

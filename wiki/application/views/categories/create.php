<?php
/*
 * /*@author Alex Marriott s4816928,
 * 12/4/2018.
 * filename: categories/create.php
 * This is the categories/create page. This is the page which is used for users to create there sub-categories.. This interacts with the categories controller.
 */
?>

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

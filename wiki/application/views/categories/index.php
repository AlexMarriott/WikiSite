<?php
/*
 * /*@author Alex Marriott s4816928,
 * 12/4/2018.
 * filename: categories/index.php
 * This is the categories/index page. This is the page which is used for users to select and search though both the available categories and sub-categories.
 */
?>


<h1><?php echo $title; ?></h1>

<ul class="list-group">

    <?php if ($categories != null): ?>
        <?php foreach ($categories as $category) : ?>
            <li class="list-group-item"><a
                        href="<?php echo site_url('/categories/subcategories/' . $category['category_name']); ?>"><?php echo $category['category_name']; ?></a>
            </li>
        <?php endforeach; ?>
    <?php elseif ($sub_categories != null): ?>
    <?php foreach ($sub_categories as $sub_category) : ?>
    <li class="list-group-item"><a
                href="<?php echo site_url('/categories/posts/' . $sub_category['sub_category_name']); ?>"><?php echo $sub_category['sub_category_name']; ?></a>
    </li>
</ul>
<?php endforeach; ?>
<?php else: ?>
    <?php echo "no categories available"; ?>
<?php endif; ?>

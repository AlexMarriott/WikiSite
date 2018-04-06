<h1><?php echo $title; ?></h1>

<ul class="list-group">

    <?php if ($categories != null) {
    foreach ($categories as $category) :?>
    <li class="list-group-item"><a
                href="<?php echo site_url('/categories/subcategories/' . $category['category_name']); ?>"><?php echo $category['category_name']; ?></a>
    </li>
    <?php endforeach;
    }else if($sub_categories != null){
    foreach ($sub_categories as $sub_category) : ?>
    <li class="list-group-item"><a
                href="<?php echo site_url('/categories/posts/' . $sub_category['sub_category_name']); ?>"><?php echo $sub_category['sub_category_name']; ?></a>
    </li>
</ul>
<?php endforeach;

} else {
    echo "no categories available";
}?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php if (isset($_SESSION['success'])) {
        echo '<div class="alert alert-success" role="alert">' . $_SESSION['success'] . '</div>';
    }?>
    <?php //echo var_dump($this->session->flashdata('success'));?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Wiki N Stuff</title>

    <!-- Bootstrap core CSS -->
    <link href="/wiki/assets/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/wiki/assets/css/blog-home.css" rel="stylesheet">

    <!-- ckeditor for the blog creation pages-->
    <script src="http://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url();?>">Wiki N Stuff</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url();?>">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>account">Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>posts/create">Create New Post</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
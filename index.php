<?php
ini_set('display_errors','on');
error_reporting(1);
include('config.php');

$page_title ="Course Categories";
$page_to_include='categorieslist.php';
$categorylist = [];
$courselist = [];
$subcategorylist = [];
if(isset($_GET['category']) && !isset($_GET['subcategory'])){
    $coursedata = getCategoryCourses($_GET['category']);
    //echo "<pre>";print_r($courselist);echo "</pre><br/>";
    $status = $coursedata['status'];
    $course_type = $coursedata['data']['type'];
    //echo "$status $course_type";
    if($course_type == 'SubCategory'){
        $page_to_include='subcategorylist.php';
        $subcategorylist = $coursedata['data']['subCategories'];
    }else if($course_type == 'Courses'){
        $page_to_include='courselist.php';
        $courselist = $coursedata['data']['courses'];
    }
}
else if(isset($_GET['category']) && isset($_GET['subcategory'])){
    $page_to_include='courselist.php';
    $category_path =$_GET['category'];
    $subcategory_path = $_GET['subcategory'];
    $urlpath = "category=$category_path&sub_category=$subcategory_path";

    $coursedata = getSubCategoryCourses($urlpath);
    //echo "<pre>";print_r($coursedata);echo "</pre><br/>";
    $status = $coursedata['status'];
    $course_type = $coursedata['data']['type'];
    if($course_type == 'SubCategory'){
        $page_to_include='subcategorylist.php';
        $subcategorylist = $coursedata['data']['subCategories'];
    }else if($course_type == 'Courses'){
        $page_to_include='courselist.php';
        $courselist = $coursedata['data']['courses'];
    }
}
else{
    $categorylist = getCategories();

}



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZERCOMS LMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ZERCOM LMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<section class="content">
    <?php include('incs/'.$page_to_include);?>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

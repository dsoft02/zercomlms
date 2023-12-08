<?php
ini_set('display_errors','on');
error_reporting(1);
include('config.php');

$url = CATEGORY_URL;
$curl = curl_init($url);
curl_setopt_array($curl, array(
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
    CURLOPT_TIMEOUT => 0,
));

$response = curl_exec($curl);

if(curl_errno($curl)){

}else{
    $resp = json_decode($response, true);
    //print_r($resp);
}
curl_close($curl);



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
<nav class="navbar bg-body-tertiary" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <a class="navbar-brand text-center" href="#">
            ZERCOM LMS
        </a>
    </div>
</nav>
<section class="content">
    <div class="container-fluid">
        <div class="container-fluid mt-5 mb-1" style="color:#F37631; background-color: #F4F4F4;">
            <div class="row">
                <h1 class="text-center" >Course Categories</h1>
            </div>
        </div>
        <div class="container mt-2" style="background-color: #F1F1F1;">
            <div class="row p-3">
                <?php
                echo "<pre>";print_r($resp);echo "</pre><br/>";
                //echo $resp['status'];
                if ($resp['status']=='Success'){
                    $courses_data = $resp['data'];
                    if(!empty($courses_data )){
                        foreach($courses_data as $course){
                            $course_name=$course['Name'];
                            $course_path=$course['Path'][0];
                            $course_image=$course['Image'];
                            $course_subcategories=$course['SubCategories'];
                            ?>
                            <div class="col-md-2">
                                <div class="card text-center mb-3" style="height: 150px;">
                                    <div class="card-body">
                                        <img src="<?php echo $course_image;?>" class="" alt="">
                                        <h5 class="card-title"><?php echo $course_name;?></h5>
                                    </div>
                                </div>
                            </div>
                            <?php
                            //echo "<pre>";print_r($course);echo "</pre><br/>";
                        }
                    }
                }
                ?>



            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

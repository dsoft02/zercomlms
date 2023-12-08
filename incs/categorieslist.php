<div class="container-fluid">
    <div class="container-fluid mt-5 mb-1" style="color:#F37631; background-color: #F4F4F4;">
        <div class="row">
            <h1 class="text-center" >Course Categories</h1>
        </div>
    </div>
    <div class="container mt-2" style="background-color: #F1F1F1;">
        <div class="row p-3">
            <?php
            //echo "<pre>";print_r($resp);echo "</pre><br/>";
            //echo $resp['status'];
            if ($categorylist['status']=='Success'){
                $courses_data = $categorylist['data'];
                if(!empty($courses_data )){
                    foreach($courses_data as $ind =>$course){
                        $course_name=$course['Name'];
                        //$course_path=str_replace(' ','-', $course_name);
                        $course_path=$course['Path'][0];
                        $course_image=$course['Image'];
                        $course_subcategories=$course['SubCategories'];
                        $course_url = "?category=$course_path";
                        ?>

                        <div class="col-md-2">
                            <a href="<?php echo $course_url;?>" style="text-decoration: none">
                                <div class="card text-center mb-3" style="height: 150px;">
                                    <div class="card-body">
                                        <img src="<?php echo $course_image;?>" class="" alt="">
                                        <h5 class="card-title"><?php echo $course_name;?></h5>
                                    </div>
                                </div>
                            </a>
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
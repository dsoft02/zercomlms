<div class="container-fluid">
    <div class="container-fluid mt-5 mb-1" style="color:#F37631; background-color: #F4F4F4;">
        <div class="row">
            <h1 class="text-center" ><?php echo $subcategorylist[0]['CategoryName'][0];?></h1>
        </div>
    </div>
    <div class="container mt-2" style="background-color: #F1F1F1;">
        <div class="row p-3">
            <?php
            //echo "<pre>";print_r($subcategorylist);echo "</pre><br/>";
            //echo $resp['status'];
            if(!empty($subcategorylist )){
                foreach($subcategorylist as $ind => $subcategory){
                    $category_name=$subcategory['CategoryName'][1];
                    //$category_path=str_replace(' ','-', $category_name);
                    $category_path=$subcategory['CategoryPath'][0];
                    $subcategory_path=$subcategory['CategoryPath'][1];
                    $category_image=$subcategory['Image'];
                    $category_subcategories=$subcategory['SubCategories'];
                    $category_url = "?category=$category_path&subcategory=$subcategory_path";
                    ?>

                    <div class="col-md-2">
                        <a href="<?php echo $category_url;?>" style="text-decoration: none">
                            <div class="card text-center mb-3" >
                                <div class="card-body">
                                    <img src="<?php echo $category_image;?>" class="" alt="">
                                    <h5 class="card-title"><?php echo $category_name;?></h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                    //echo "<pre>";print_r($course);echo "</pre><br/>";
                }
            }
            ?>



        </div>
    </div>
</div>
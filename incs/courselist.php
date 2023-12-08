<div class="container-fluid">
  <div class="container-fluid mt-5 mb-1" style="color:#F37631; background-color: #F4F4F4;">
    <div class="row">
      <h1 class="text-center" >Courses List</h1>
    </div>
  </div>
  <div class="container mt-2">
    <div class="row p-3">

      <div class="col-md-12">
        <table class="table">
          <thead>
          <tr>
            <th scope="col">Course ID</th>
            <th scope="col">Course Title</th>
            <th scope="col">Licensed Duration</th>
            <th scope="col">Training Time</th>
          </tr>
          </thead>
          <tbody>

      <?php
      //echo "<pre>";print_r($subcategorylist);echo "</pre><br/>";
      //echo $resp['status'];
      if(!empty($courselist )){
        $coursedetails_data=[];
        foreach($courselist as $ind => $course){
          $CourseID = $course['CourseID'];
          $CourseTitle = $course['CourseTitle'];
          $LicentDuration =$course['AvailablePurchaseOptions'][0]['Description'];
          $trainingtime =$course['HoursOfTraining'];
          $coursedetails =$course['Outline']['Introduction'];
          $coursedetails_data[$CourseID]=$coursedetails;
          ?>
          <tr>
            <th scope="row"><a id="btnview" title="<?php echo $CourseTitle;?>" data-coursetitle="<?php echo $CourseTitle;?>" data-courseid="<?php echo $CourseID; ?>" data-bs-toggle="modal" data-bs-target="#viewModal"><?php echo $CourseID;?></a></th>
            <td><?php echo $CourseTitle;?></td>
            <td><?php echo (empty($LicentDuration))?'1 Year':$LicentDuration;?></td>
            <td><?php echo $trainingtime;?></td>
          </tr>
          <?php

        }
        echo "<script type='text/javascript'> var course_details=".json_encode($coursedetails_data).";</script>";
      }
      ?>

          </tbody>
        </table>
      </div>



    </div>
  </div>
</div>

<div id="viewModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title"></h6>
          <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body pd-10 pd-sm-20 pt-4">
         <p id="course-content"></p>
        </div><!-- modal-body -->

    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->


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
        foreach($courselist as $ind => $course){
          $CourseID = $course['CourseID'];
          $CourseTitle = $course['CourseTitle'];
          $LicentDuration =$course['AvailablePurchaseOptions'][0]['Description'];
          $trainingtime =$course['HoursOfTraining'];
          ?>
          <tr>
            <th scope="row"><a href="courseview.php?courseid=?php echo $CourseID;?>"><?php echo $CourseID;?></a></th>
            <td><?php echo $CourseTitle;?></td>
            <td><?php echo (empty($LicentDuration))?'1 Year':$LicentDuration;?></td>
            <td><?php echo $trainingtime;?></td>
          </tr>
          <?php

        }
      }
      ?>

          </tbody>
        </table>
      </div>



    </div>
  </div>
</div>

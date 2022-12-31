 <?php 
  include_once "navbar.php";
 ?>
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h3 class="mt-4 mb-3">
      POLLING UNIT RESULTS
    </h3>

 
    <div class="row">
      <div class="col-md-8 mb-3">
 
      <table class="table table-bordered table-striped table-hover" style="margin-bottom:90px ;">
        <thead style="background-color:#8fc74a">
          <tr>
            <th>Party</th>
            <th>Party Result</th>
            <th>Polling Unit</th>
          </tr>
        </thead>
        <tbody>
          <?php //include the class result

            include_once "..\connection/election.php";

            //create Result Object
             $resultobj = new Result();

             //reference get polling unit result method
  
             $pu_result = $resultobj->getPollingUnitResult();

            //  echo "<pre>";
            //  print_r($pu_result);
            //  echo "</pre>";
          ?>

          <?php

            //loop thruogh the array
             if(count ($pu_result)>0){

            foreach ($pu_result as $key => $value) {
              //$pu_result = $value['product_id'];
          ?>
          <tr>
            <td><?php echo $value['Party']?></td>
            <td><?php echo $value['Result']?></td>
            <td><?php echo $value['PollingUnit']?></td>
          </tr>

          <?php 
            } 
          }
          ?> 
        </tbody>
      </table>

        <div>
            <a href="#logo" style="text-decoration: none;"><p>Go Up</p></a>
        </div>
        
      </div>

    </div>

  </div>

<?php 
  include_once "../footer.php";
?>

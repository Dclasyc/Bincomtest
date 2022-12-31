<?php 
    include_once "navbar.php";

    //check if Submit Result button is clicked


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnsubmitresult'])){


	//validate inputs

    if(empty($_POST['pollingunit'])){
        $errors['pollingunit'] = "Polling Unit field cannot be empty";
    	}

		if(empty($_POST['partyname'])){
        $errors['partyname'] = "Party field cannot be empty";
    	}

      if(empty($_POST['partyscore'])){
       $errors['partyscore'] = "Party Score field cannot be empty";
      }

      if (empty($errors)) {


        //Sanitize input
  
        include_once "..\connection/common.php";
        $cmobj = new Common;
  
        //make use of sanitizeinput method
        $partyname = $cmobj->sanitizeInputs($_POST['partyname']);
        $partyscore = $cmobj->sanitizeInputs($_POST['partyscore']);
        $pollingunit = $cmobj->sanitizeInputs($_POST['pollingunit']);

      }


      //create object of Result class and pass parameters to input new result method;
      include_once "..\connection/election.php";
      $newresultobj = new Result();

      //store what it returns in output variable
      $output = $newresultobj->InputNewResult($pollingunit, $partyname, $partyscore);

      //check if its sucessfull

        if($output == true){

            $msg ="Result was succefully uploaded!";
            //redirect
            header("Location:newpuresult.php?m=$msg");
            
            }else{
            $errors[] = 'Oops! could not input result. Try again'.header("Location:newpuresult.php?");
                }


            }
?>

<div class="container">



 <div class="row mt-5" id="newpudiv" style="display:flex; justify-content: center;">

    <div class="col-md-6">

            <div>

                <?php
                    if(isset($_REQUEST['m'])){
                ?>

                <div class="alert alert-success">
                    <?php echo $_REQUEST['m']; ?>
                </div>

                <?php

                }

                ?>
            </div>

        <h4 class="mb-3">INPUT PARTY RESULT</h4>

        <form action="" method="post" class="form-control p-4">

            <label class="form-label">Polling Unit</label>
            <input type="text" name="pollingunit" id="pollingunit" class="form-control mb-3" value="<?php if(isset ($_POST['pollingunit'])){ echo $_POST['pollingunit'];} ?>">

            <label class="form-label">Party</label>
            <input type="text" name="partyname" id="partyname" class="form-control mb-3" value="<?php if(isset ($_POST['partyname'])){ echo $_POST['partyname'];} ?>">

            <label class="form-label">Party Score</label>
            <input type="number" name="partyscore" id="partyscore" class="form-control mb-3" value="<?php if(isset ($_POST['partyscore'])){ echo $_POST['partyscore'];} ?>">

            <input type="submit" name="btnsubmitresult" class="btn btn-success mt-3" id="btnsubmitresult" value="Submit Result">


        </form>
     </div>
        
    </div>

</div>

<?php 
    include_once "../footer.php";
?>

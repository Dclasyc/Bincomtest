<?php

//Include and create Result Object
include_once "connection/election.php";

if (!empty($_GET['lga_id'])) {
    // collect value of input field

    $resultobj = new Result();

    // reference get polling unit method

     $lgapu = $resultobj->getLgaPollingUnits($_GET['lga_id']);

    foreach ($lgapu as $lgapu => $value) {
        $puname = $value['polling_unit_name'];
        $puid = $value['polling_unit_id'];
        $plgaid =$value['lga_id'];

                    //Check if values have been populated
                        // echo "<pre>";
                        // print_r($lgapu);
                        // echo "</pre>";

	    echo    "
                
                <option value ='$plgaid'>$puname</option>
            
                ";
    }
}elseif(isset($_GET['polling_unit_uniqueid']) && !empty($_GET['polling_unit_uniqueid'])) {
        
        
    $resultobj = new Result();

// reference sum polling unit method

    $sumpulga = $resultobj->sumLgaPollingunits($_GET['polling_unit_uniqueid']);

foreach ($sumpulga as $sumpulga => $value) {
    
    $lgapusum = $value['LGA RESULT'];

                //Check if values have been populated
                    // echo "<pre>";
                    // print_r($lgapusum);
                    // echo "</pre>";

        if (!empty ($lgapusum)) {
            echo "<h5 style='color:#8fc74a'>$lgapusum</h5>";
        }elseif (empty ($lgapusum)) {
            echo "<h5 style='color:red'>No Result!</h5>";
        }
}
}else{
    echo "<p>Sum not Summed</p>";
}
        
    
    

?>


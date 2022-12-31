<?php 
    include_once "navbar.php";
?>

<div class="container-fluid">
    <div class="row p-3" style="justify-content:space-between">

        <div class="col-md-3 mb-3 mt-3">
            <h5>Select LGA</h5>
            <div class="row">
                <form action="" method="get">
                <select id="lga" class="form-select mb-3" name="lga">
					<option value="">Select state</option>
					<?php 

						//Include and create Result Object
                        include_once "..\connection/election.php";
                        
                         $resultobj = new Result();

                        //reference get lga method
             
                       $lgas = $resultobj->getLga();
           
                        // echo "<pre>";
                        // print_r($lgas);
                        // echo "</pre>";

					foreach ($lgas as $lga => $value) {
						$lganame = $value['lga_name'];
						$lgaid = $value['lga_id'];
                        

						echo "<option value ='$lgaid'>$lganame</option>";
                    
					}
                    

					?>
					
				</select>
                
            </div>
        </div>
        
        <div class="col-md-4 mb-3 mt-3">
        <h5>Polling Units Under Selected LGA</h5>
            <div class="row">
            
            <select id="lgapollingunits" name="lgapollingunits" class="form-select mb-3">
					<option value="" disabled>Select Polling units</option>
				
                </select>

            </div>
        </div>
        
        <div class="col-md-3 mb-3 mt-3">
        <h5>Sum Total Result In All PU's Of Selected LGA</h5>
                    
                    <div>
                        <h5 id="sumpollingunits"></h5>
                    </div>

        </div>
    </form>

</div>
</div>

            
<!-- <script type="text/javascript" src="jquery/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <script type="text/javascript" language="Javascript">

    $(document).ready(function (){
        // alert('Ready to serve');
		$('#lga').on('change',function(){
		var newlga = $(this).val();
        //Conole.log data to check if available
        // console.log(newlga);
        
     if(newlga){
        $.ajax({
          url:"../loadpollingunit.php",
          type:"GET",
          data:'lga_id='+newlga,
          
          cache:false,
          success:function(data){
            // console.log(data);
            $('select[name="lgapollingunits"]').html(data);
            
            $('select[name="lgapollingunits"]').append('<option value="Choose" selected>Choose Any Polling Unit</option>');
            $.each(JSON.parse(data), function(key, value){
                $('select[name="lgapollingunits"]').empty();

                $result = '<option value="'+ key +'">' + value + '</option>';

            $('#lgapollingunits').append($result);
            

        });

        
               
        },
        
        });
    }else{
                $('select[name="lgapollingunits"]').empty();
         }

    });

      //Calculate Polling unit result under selected lga
      $('#lgapollingunits').on('change',function(){
		var newpu = $(this).val();
        //Conole.log data to check if available
        // console.log(newpu);
     if(newpu){
        $.ajax({
          url:"../loadpollingunit.php",
          type:"GET",
          data:'polling_unit_uniqueid='+newpu,
          cache: false,
          success:function(data){
            $('#sumpollingunits').html(data);
                      
        },
        });
    }

    });

    })
    </script>

    

<?php 
    include_once "../footer.php";
?>

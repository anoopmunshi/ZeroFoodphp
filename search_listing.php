<?php
include_once('header.php');
include_once('menu.php');


    if(isset($_GET['search'])){
        //Call the API
        // Get cURL resource

// Get execution time for search
      /* Start of the code to profile */

      $start = microtime(TRUE);


          for ($a = 0; $a < 10000000; $a++)
          {
            $b = $a*$a;
          }



        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://3.16.206.55:3000/api/login",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Connection: Keep-Alive'
          ),
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS =>"{\"emailId\":\"testuser@gmail.com\",\"password\":\"TestUser1\"}",
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        
        $result = json_decode($response, true);
        
        $token = $result['token'];
    
    
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://3.16.206.55:3000/api/food-centers?q=".$_GET['search'],
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Connection: Keep-Alive'
          ),
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET"
        ));
    
        $response = curl_exec($curl);
        
        curl_close($curl);
            
        $foodListings = json_decode($response, true);
    }


/* End of the code to profile */

$end = microtime(TRUE);


?>


<script type="text/javascript">
    function getDetailpage(id){
        //Call a POST method to url
        $("#data-"+id).submit();
    }
</script>
    <div class="container">
         <div class="row align-items-center" style="margin-bottom: 2rem;">

    <div class="table-responsive">
             
             <span style="margin: 4rem;"> <h3>Nearest Free Food Centers around you</h3></span>
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Place name</th>
                        <th scope="col">State</th>
                        <th scope="col">City/District</th>
                        <th scope="col">Address</th>                      
                        <th scope="col">Timing</th>
                        <th scope="col">Capacity</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Location</th>
                        <!-- <th scope="col">Action</th> -->
                    </tr>
        </thead>
        <tbody>
            <?php
            
            if(count($foodListings) > 0) {
                $count = 1;
                foreach($foodListings as $eachListings){
                    $allData = json_encode($eachListings);
                ?>
            <tr>
                <form id="data-<?php echo $count;?>" method="POST" action="foodcenterdetail.php">
                <input type="hidden" name="centerdata" value='<?php echo $allData; ?>' />
                <th scope="row"><?php echo $count; ?></th>
                <td><a onclick="return getDetailpage(<?php echo $count; ?>);" href="#"> <?php echo $eachListings['name']; ?></a></td>
                <td><?php echo $eachListings['state']; ?></td>
                <td><?php echo $eachListings['city']; ?></td>
                <td><?php echo $eachListings['address']; ?></td>         
                <td>Lunch: <small><?php echo $eachListings['timings']['lunch']['start']; ?></small><br>
                    Dinner: <small><?php echo $eachListings['timings']['dinner']['start']; ?></small> </td>
                <td>100</td>
                <td><?php echo $eachListings['contactNumber']; ?></td>
                <td> <button type="button" class="btn btn-indigo btn-sm m-0">View in Map</button></td>


                <!-- <td align="Center"> <button type="button" class="btn btn-sm btn-info glyphicon glyphicon-share-alt "> </button></td> -->
                
          </tr>
                </form>
                <?php      
                $count++;              
                }
            } else {
                ?>
                <tr scope="row">
                No centres found. Please check back again later.
                </tr>
                <?php
            }
            
            ?>
        </tbody>



        

      </table>

      <span> <?php echo "Search completed in " . round(($end - $start), 4) ; ?> </span>
    </div>

    <script>
        $(document).ready( function () {
        $('#myTable').DataTable();
    } );
        </script>

                  
                    </div>

            </div>


            <?php
		
		include_once('footer.php')
		
		?>

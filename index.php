
<?php

include_once('header.php');
include_once('menu.php');

$countData = file_get_contents("http://localhost:3000/api/food-centers/count");
$count = json_decode($countData, true);



// Google recaptcha 

// $site_key = '6Le4ougUAAAAADCC0zd-jMm012n1MRvhwmz4-NTB';
// $secret_key = 'SECRET_KEY';


// if (isset($_POST['g-recaptcha-response'])) {
 
//     //get verify response data
//     $verifyCaptchaResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
//     $responseCaptchaData = json_decode($verifyCaptchaResponse);
//     if($responseCaptchaData->success) {
//         echo 'Captcha verified';
//         //proceed with form values
//     } else {
//         echo 'Verification failed';
//     }
// }






?> 
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key='KEY'&sensor=false&libraries=places"></script>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('autocomplete_search'));
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace();
                var address = place.formatted_address;
                var latitude = place.geometry.location.lat();
				var longitude = place.geometry.location.lng();  
                var mesg = "Address: " + address;
                mesg += "\nLatitude: " + latitude;
                mesg += "\nLongitude: " + longitude;

				if(place) {
					var searchText = $('#autocomplete_search').val();
				if(searchText == ''){
					alert("Please enter your Search location");
					return false;
				}

				window.location.href = 'search_listing.php?search='+searchText+'&long='+longitude+"&lat="+latitude;
				return false;
				}
				
                 //alert(mesg);
            });
        });
    </script>
		<!-- <script type="text/javascript">
			function getSearch(){
				alert("Triggered");
				return false;

				
			}
		</script> -->




<div class="container">



<!-- Google places Autocomplete -->

	<div class="row">
<div class="alert alert-info text-center mb-4" role="alert">Can you help needy people serve free food from your home kitchen? &nbsp; Capacity does not matter,  &nbsp;you can serve 5 or 1,000s. So please Join us as a <a class="alert-link" href="signup.php">Food organiser!</a> <br> 
</div>

	</div>
</div>

	<div class="container">
		<form method="GET" id="userForm">
		<!--<input type="hidden" name="lat" id="lat" />
		<input type="hidden" name="long" id="long" /> -->
		<div class="row align-items-center" style="margin-top: 4rem;">
						<div class="col-sm-6 col-md-offset-3">
							<h2>Find free food centers around you?</h2>

	            <div id="custom-search-input" style="margin-top: 2rem;">
	                <div class="form-group ">

	                    <input id="autocomplete_search" required="required"   name="autocomplete_search" type="text" class="form-control input-lg autocomplete-address" placeholder="Location name" />

	                    <span class="help-block"> Help needy people find food within 5 kms radius</span>
	    </div>
	                    <input type="hidden" name="lat" id="lat" />
	                    <input type="hidden" name="long" id="long" />

	                 </div>

			<div class="col-md-6 col-md-offset-3">

					<p style="text-align: center;">
					


					<a href="#"><button class="g-recaptcha btn btn-outline-dark">Search Food Centers</button></a>	


 <!-- Google recaptcha  button data-keys-->

						<!-- <a href="#"><button type="submit" data-sitekey="6Le4ougUAAAAADCC0zd-jMm012n1MRvhwmz4-NTB" data-callback="submitForm" onclick="return getSearch();" class="g-recaptcha btn btn-outline-dark">Search Food Centers</button></a> -->				
					


					</p>				 		
	  		</div>
			  </form>


		
 </div>


			<div class="col-md-6 col-md-offset-3" style="margin-top: 3rem;">

					<p style="text-align: center;"><small> We are building this as unlicensed project. <br>
						<a href="https://forms.gle/ZckA8JrCJE2m6sCk9" target="_blank"  class="btn-link">Join us as Technical Collaborator</a></small>
					</p>

						 		
	  			</div>



		<div class="col-md-6 col-md-offset-3" style="margin-top:  8rem;">

					 		<span style="text-align: center;">

									<h2><?php echo $count['count']; ?></h2>

							</span>
				<p  style="text-align: center;">Free Food Centers across India </p>
								</span>
						
	  	</div>


 <!-- Google recaptcha  -->

<!-- <script>
function submitForm() {
    document.getElementById('userForm').submit();
}
</script>
 -->
		</body>


		<?php
		
		include_once('footer.php')
		
		?>

<?php
include_once('header.php');
include_once('menu.php');
?> 
		<script type="text/javascript">
			function getSearch(){
				var searchText = $('#autocomplete_search').val();
				if(searchText == ''){
					alert("Please enter your Search location");
					return false;
				}
				window.location.href = 'search_listing.php?search='+searchText;
				
				return false;
			}
		</script>




<div class="container">



<!-- Google places Autocomplete -->

 <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=&sensor=false&libraries=places"></script>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('autocomplete_search'));
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace();
                var address = place.formatted_address;
                var latitude = place.geometry.location.A;
                var longitude = place.geometry.location.F;
                var mesg = "Address: " + address;
                mesg += "\nLatitude: " + latitude;
                mesg += "\nLongitude: " + longitude;
                // alert(mesg);
            });
        });
    </script>




	<div class="row">
<div class="alert alert-info text-center mb-4" role="alert">Can you help needy people serve free food from your home kitchen? &nbsp; Capacity does not matter,  &nbsp;you can serve 5 or 1,000s. So please Join us as a <a class="alert-link" href="signup.php">Food organiser!</a> <br> 
</div>

	</div>
</div>

	<div class="container">
		<form method="GET">
		<div class="row align-items-center" style="margin-top: 4rem;">
						<div class="col-sm-6 col-md-offset-3">
							<h2>Find free food centers around you?</h2>

	            <div id="custom-search-input" style="margin-top: 2rem;">
	                <div class="form-group ">

	                    <input id="autocomplete_search" required="required"   name="autocomplete_search" type="text" class="form-control input-lg autocomplete-address" placeholder="Location name" />

	                    <span class="help-block"> Help needy people find food within 5 kms radius</span>
	    </div>
	                    <!-- input type="hidden" name="lat"> -->
	                    <!-- <input type="hidden" name="long"> -->

	                 </div>

			<div class="col-md-6 col-md-offset-3">

					<p style="text-align: center;">
						<a href="#"><button type="submit" onclick="return getSearch();" class="btn btn-outline-dark">Search Food Centers</button></a>				
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
									<h1>5000</h1>
							</span>
				<p  style="text-align: center;">Free Food Centers across India </p>
								</span>
						
	  	</div>

		</body>
		<?php
		
		include_once('footer.php')
		
		?>
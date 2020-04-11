<?php
include_once('header.php');
include_once('menu.php');

if(isset($_POST)){
    $data = json_decode($_POST['centerdata'], true);
}

?>
		<div class="content-body">
			<div class="container">
				<div class="row">


           <div class="col-md-6 col-md-offset-3">
                   <div class="contact-bg">
                         <h3><?php echo $data['name']; ?></h3>
                         <div class="quick-contact-widget"> 
                               <span><i class="glyphicon glyphicon-earphone"  ></i> <?php echo $data['contactNumber']; ?> </span>
                               <span><i class="glyphicon glyphicon-time" ></i>	Lunch: <?php echo implode($data['timings']['lunch'], '-'); ?> ||
Dinner: <?php echo implode($data['timings']['dinner'], '-'); ?> </span>
 							 <span><i class="glyphicon glyphicon-user"></i> Can serve - 100 people </span>
                               <span><i class="glyphicon glyphicon-map-marker"></i> <?php echo $data['address']; ?> || <?php echo $data['city']; ?> || <?php echo $data['state']; ?>	</span>
                                    
                           </div>
                       </div>
                        

                      <div class="p-2 white-bg mt-3">

                      <iframe src='https://maps.google.com/maps?q=<?php echo $data['lat']; ?>, <?php echo $data['long']; ?>&t=&z=13&ie=UTF8&iwloc=&z=16&output=embed' width="100%" height="250" frameborder="0" style="border:0" allowfullscreen>
                        
                      </iframe>
                               <button type="button" class="btn  btn-lg btn-block btn-info glyphicon glyphicon-share-alt "> </button>
                       </div>
           </div>

				

				</div>
			</div>
		</div>

        <?php
		
		include_once('footer.php')
		
		?>
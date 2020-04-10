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

                      <!-- <div class="p-2 white-bg mt-3">
                               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d448183.73912804417!2d76.81306640115254!3d28.646677246352574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd5b347eb62d%3A0x37205b715389640!2sDelhi!5e0!3m2!1sen!2sin!4v1536257189401" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                               <button type="button" class="btn  btn-lg btn-block btn-info glyphicon glyphicon-share-alt "> </button>
                       </div> -->
           </div>

				

				</div>
			</div>
		</div>

        <?php
		
		include_once('footer.php')
		
		?>
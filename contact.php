
<?php
include_once('header.php');
include_once('menu.php');

if(isset($_POST['type'])){
	//COde to send email
	$msg = json_encode($_POST);
	$headers =  'MIME-Version: 1.0' . "\r\n"; 
	$headers .= 'From: Your name <info@address.com>' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
	mail('manoj.kulkarni5@gmail.com',$_POST['subject'],$msg, $headers);
}
?> 



<div class="content-body">
	<div class="container">
		<div class="row">
			<main class="col-md-12">
				<h1 class="page-title">Contact</h1>
				<article class="post">
					<div class="entry-content clearfix">
						<form action="#" method="post" class="contact-form">
							<div class="row">
								<div class="col-md-6 col-md-offset-3">
									<input type="hidden" name="type" value="sendemail" />
									<input required="required" type="text" name="name" placeholder="Name" required>
									<input required="required" type="email" name="email" placeholder="Email" required>
									<input required="required" type="text" name="subject" placeholder="Subject" required>
									<textarea required="required" name="message" rows="7" placeholder="Your Message" required></textarea>
									<button class="btn-send btn-5 btn-5b ion-ios-paperplane"><span>Drop Me a Line</span></button>
								</div>
							</div>	<!-- row -->
						</form>
					</div>
				</article>
			</main>
		</div>
	</div>
</div>




<!--Start of Tawk.to Script-->
<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/5e916dac69e9320caac2819d/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
	})();
</script>
<!--End of Tawk.to Script-->






<?php

include_once('footer.php')

?>

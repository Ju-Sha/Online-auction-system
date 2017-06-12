<?php
	session_start();
	include_once('html2headPage.php');
?>
<body>
<?php
	include_once('headerPage.php');
?>
<div id="mainBody">
<div class="container">
<h1>FAQ</h1>
<hr class="soften"/>	
<div class="accordion" id="accordion2">
	<div class="accordion-group">
	  <div class="accordion-heading">
		<h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
		  The concept
		</a></h4>
	  </div>
	  <div id="collapseOne" class="accordion-body collapse"  >
		<div class="accordion-inner">
			Bootshop is an unique Online auction platform that allows you to BID on products and gives you a change to WIN products at nominal prices. It's a kind of fun bargain deals and online Shopping.

		</div>
	  </div>
	</div>
	<div class="accordion-group">
	  <div class="accordion-heading">
		<h4><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
		  Who can participate in auctions?
		</a></h4>
	  </div>
	  <div id="collapseTwo" class="accordion-body collapse"  >
		<div class="accordion-inner">
		 Any one can sign up and participate in Bootshop Auctions. Users from Abroad can also join Bootshop.
		</div>
	  </div>
	</div>
	<div class="accordion-group">
	  <div class="accordion-heading">
		<h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
		  How do the auctions work?
		</a></h4>
	  </div>
	  <div id="collapseThree" class="accordion-body collapse"  >
		<div class="accordion-inner">
		Registered users compete each other to win items. The price of the item starts at the value specified by the user who posted it and the auction clock starts counting down. Each time a bid is placed, the price of the item increases by a set amount. Once you place a bid, you're in the lead until the auction clock runs out or someone else places a bid. When the auction clock reaches 0:00, the auction is over and the last person who bids wins the auction.	</div>
	  </div>
	</div>
	
	<div class="accordion-group">
	  <div class="accordion-heading">
		<h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
		  Is it legal to participate in online auctions?
		</a></h4>
	  </div>
	  <div id="collapseFour" class="accordion-body collapse"  >
		<div class="accordion-inner">  
		Yes, Absolutely. this is a new version of traditional offline auction Going 1- Going 2- SOLD.
		</div>
	  </div>
	</div>
	
	<div class="accordion-group">
	  <div class="accordion-heading">
		<h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
		How long does an auction last?
		</a></h4>
	  </div>
	  <div id="collapseFive" class="accordion-body collapse"  >
		<div class="accordion-inner">
		  The user who put the item up for auctioning determines the time when the bidding ends.
		</div>
	  </div>
	</div>
	
	<div class="accordion-group">
	  <div class="accordion-heading">
		<h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix">
		  My Question is not listed here and I need further clarifications
		</a></h4>
	  </div>
	  <div id="collapseSix" class="accordion-body collapse"  >
		<div class="accordion-inner">
		 We are open minded, just contact us by filling up quick contact form on our <a href="contact.php"> Contact us </a> page, we will get back to you with clarifications
		</div>
	  </div>
	</div>
  </div>
</div>
</div>
<!-- MainBody End ============================= -->
<?php
	include_once('footerPage.php');
?>

</body>
</html>
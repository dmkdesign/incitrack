<script language="javascript" type="text/javascript">
function popupTandC()
 {
 var sOption='toolbar=no,location=no,directories=no,menubar=no,';
 sOption+='scrollbars=yes,width=960,height=800,left =500,top=50';

//TreeviewExpandCollapseAll('MainContent_TreeViewTransactions',true);
 //var treeView = document.getElementById('MainContent_TreeViewTransactions');
 var TandC = document.getElementById('TandC');

var winprint=window.open('','',sOption);
	winprint.document.open();
	winprint.document.write("<link href=\"/gridbid/css/main.css\" type=\"text/css\" rel=\"stylesheet\">");
	winprint.document.write("<link href=\"/gridbid/css/screen.css\" type=\"text/css\" rel=\"stylesheet\">");
	winprint.document.write(TandC.innerHTML);

 	winprint.document.close();

 }
 </script>

<div id="FAQ" class ="projectView clear-fix">
	<div class="span-16" style="padding:10px">
	<div class="title">
	FAQ
	</div>
	<div class="row">
	<div class="pointLabel">Is it free to list?</div>
	<p>Auctioning your roof is free. We collect a small fee from the solar installer who is selected by you in your auction to cover the cost of processing. Solar installers are happy to pay, as they have secured a great roof to install solar on - your roof! Funds are charged directly to the installer.
Professional photography of your roof is free in most areas.</p>
	</div>
	<div class="row"> 
	<div class="pointLabel">Who will bid on my roof?</div>
	<p>Proven solar installers from your State. 
	<ul>
	<li>	Solar installers who provide solar as a service and pay the upfront cost of installing your system in exchange for a percentage of the money that you save each month</li>
	<li>	Solar installers who will sell you a solar system outright and install it for you </li>
	<li>	Contractors who will install a system that you buy from someone else</li></p>
	</ul>
	</div>
		
	<div class="row">
	<div class="pointLabel">Why auction your roof?</div>

	<ul><li>To get a better deal on installing solar on your roof</li>
	<li>To save time finding a great installer</li>
	<li>To compare a number of solar offers side by side</li>
	<li>To see customer reviews of solar installers</li>
	<li>To test things out and see if auctioning your roof is for you</li>
	</ul>
	</div>



	<div class="row">
	<div class="pointLabel"><?php echo CHtml::encode("What if I don't like the offers I get?");?></div>
	<p>You can cancel your auction anytime before you select a winning bidder. If none of the offers are right for you, simply notify us at support@gridbid.com and we will cancel your auction.  You will be allowed to start a new auction for that same roof, but as a courtesy to the bidders from your first auction, you will be required to state why you did not accept their previous bids. 
	</p>
	</div>

	<div class="row">
	<div class="pointLabel">What can you auction?</div>
	<p>Any roof surface you own or are legally allowed to put solar on
	The roof of an organization
	The roof of your home, barn, or vacation property
	The roof of your clients if you are a consultant or contractor	</p>
	</div>

<div class="row">
	<div class="pointLabel">What happens if I select a winning bidder, but then change my mind about installing solar?</div>
	<p>Just like in any auction, if you put your item up for auction, and pick a winning bidder, you are obligated to sell your item on the terms of the winning bid. By agreeing to <?php echo CHtml::encode("Gridbid's"); ?> Terms & Conditions you agree that if you pick a winning bidder, you are legally obligated to negotiate a contract with that solar installer. Naturally, if they change the terms of their bid later, or if they find that your roof information is different than what you put in you auction, either of you are NOT obligated to negotiate a contract to install solar (unless you still want to). 

Also, if an installer finds that your roof information differs from what you put in your auction, they are not obligated by the terms of their bid. They can change their bid, and you can accept or reject their new bid.
	</p>
	</div>

	Please see our <?php echo CHtml::link('Terms  & Conditions','#', array('onclick'=>'javascript:popupTandC();return false;'))?> for more information.
	<?php $this->renderPartial("//site/TandC");?> 
	
	
</div>
<div class="span-6" style="float:right">

		<div class ="portletShadowBox" >
		<div class="projectTitle">Support</div>
<p>If you have any questions give us a call!</p>
<div style="color:#009DDC; font-size:24px; font-weight:bold;text-align:center">1.855.474.3243</div>
  		</div>
  </div>
  </div>
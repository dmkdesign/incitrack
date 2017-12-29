<?php if(Yii::App()->user->isGuest): ?>
			 <div id="login" class="span-7" style="position:relative; top:-185px; left: 620px; height:150px">
             <?php echo $loginDiv ?>
			</div>
<?php else: ?>
<div id="login" class="span-7" style="position:relative; top:-170px; left: 620px; height:150px">
	<p style="margin-right:10px; float:right">
		Welcome: <?php echo ucfirst(Yii::App()->user->name)?> | Not you? <a href="index.php?r=/user/logout">Logout</a>
	</p>
</div>
	
<?php endif;  ?>

 <div class="content" style="height:500px;">
	<table  width="75%" style="text-align:center; clear:both;">
  		<tr >
    		<td style=" vertical-align:top;text-align:center; border-top:none; border-right:#999 solid thin" width="50%" >
            <h4 small>Interested in solar for your project?</h4>
            <input class="btn" type="submit" alt ="New Solar Project" value="Start a Project" style="float:none;display:block;width:150px; height:50px; margin:10px auto" onclick="javascript:location.href='index.php?r=/site/CreateProject'; return false;"/>
            </td>
  			<td style=" vertical-align:top; text-align:center;border-top:none;"  width="50%" >
            <h4 small>Are you a Solar Company?</h4>
            <input class="btn" id="soco"  type="submit"  value="Find a Project" style="float:none;display:block; width:150px;height:50px; margin:10px auto" onclick="javascript:location.href='index.php?r=/user/registration'; return false;"/>
            </td>
 		</tr>
  </table>
  </div>

 <!-- end .content -->



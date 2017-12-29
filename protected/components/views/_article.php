<?php if (Articles::itemAlias('type',$article->type)=='viewable'): ?>
<div id="<?php echo $article->framecode ?>"
<?php if( Yii::app()->getModule('user')->isAdmin()){ echo "style='background-color:".$adminBackColor."'";} ?>>

<?php
echo $article->content;
?>
<?php if (Yii::app()->getModule('user')->isAdmin()):?>
<?php echo CHtml::link('Edit',array('articles/update', 'id'=>$article->id), array('target'=>'_blank'));?>

<?php endif ?>
</div>
<?php elseif(Articles::itemAlias('type',$article->type)=='meta'||Articles::itemAlias('type',$article->type)=='text'):?>
<?php
echo $article->content;
?>
<?php elseif(Articles::itemAlias('type',$article->type)=='slideshow'):?>
<?php $images = Images::model()->findAll('category=articles and associate_id='.$article->id);?>
<?php if(count($images)>0):?>
	<div class = "span-12" style="float:right" >
	<div class="sliderFrame" style="display:block">
  		<div id="slides" >
			<div class="slides_container" style="overflow: hidden; position: relative; display: block;  ">
	<?php foreach ($images as $image){?>
		<div class="slide">
		<img style = "margin:auto" alt="<?php echo $image->alt_text ?>" src="images/articles/<?php echo $image->filename ?>" width="400px">
		<div class="caption" style="bottom: 0px;"><?php echo $image->caption?></div>
		</div>
	<?php }?>
	</div>
	</div>
	</div>
	</div>
	<?php endif ?>
<?php endif?>

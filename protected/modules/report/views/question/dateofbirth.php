<?php /*
<div class="row">
<div class="rowTitle"><?php echo CHtml::encode($question->title); ?></div>
<?php
$params=array('onBlur'=>'calculateage();return false;');

$this->renderPartial('../question/'.$question->choicesView,array('model'=>$model,'form'=>$form,'question'=>$question),false);

?>
</div> */?>
<div class="row">
<div class="rowTitle"><?php 
$ageQuestion = Question::model()->findByAttributes(array('varname'=>'age'));
echo CHtml::encode($ageQuestion->title); ?></div>
<?php 
            $js ="function calculateage()
{
	var dob = $('#Report_dateOfBirth').val();
	dob = dob +' 00:00:00';
	
		dob = new Date(dob.replace(/-/g, '/'));
		var today = new Date();
		var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
		$('#Report_age').val(age);
		
		};
            ";// $('#Report_dateOfBirth').on('custom',function(){calculateage();});
             /*function init() {
                var control = document.getElementById('Report_dateOfBirth');
                if(control.addEventListener){
                    control.addEventListener('change',  calculateage, false);
                }
                else {if(button.attachEvent){
                    control.attachEvent('onchange', calculateage);
                }
                }
            };
           
            if(window.addEventListener){
                window.addEventListener('load', init, false);
            } else if(window.attachEvent){
                window.attachEvent('onload', init);
            } else{
               document.addEventListener('load', init, false);
            }";*/
            Yii::app()->clientScript->registerScript('dateOfBirth', $js, CClientScript::POS_HEAD);
        ?>
        <?php /* 
<script>
        
function calculateage()
{
	var dob = $('#Report_dateOfBirth').val();
	dob = dob +' 00:00:00';
	
		dob = new Date(dob.replace(/-/g, "/"));
		var today = new Date();
		var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
		$('#Report_age').val(age);
		};

</script> */?>
<?php 


echo $form->textField($model,$ageQuestion->varname,array('onfocus'=>'calculateage();return false;','readonly'=>'readonly','style'=>'width:430px; font-size:15px', 'size'=>60,'maxlength'=>(($question->field_size)?$question->field_size:255)));

$script="$(document).ready(function() {
    
	
 $('#Report_age').focus(function() {
	var dob = $('#Report_dateOfBirth').val(); 
	dob = dob +' 00:00:00';
	dob = new Date(dob);
	var today = new Date();
	var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
	$('#Report_age').html(age);
	});
	
});
";
//Yii::app()->clientScript->registerScript('dateofbirth',$script,CClientScript::POS_READY);
?></div>
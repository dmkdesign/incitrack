
<?php 
	
	$this->menu = array(
			array('label'=>'Manage Users','url'=>array('/user/admin')),
			array('label'=>'Manage Profile Fields','url'=>array('profileField/admin')),
	);
	if (count($list)) {
		foreach ($list as $item)
			array_push($this->menu,$item);
	}
?>

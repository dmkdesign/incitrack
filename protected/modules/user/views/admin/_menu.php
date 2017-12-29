
<?php /*
	*/
	$this->menu = array(
			array('label'=>'List User','url'=>array('/user')),
			array('label'=>'Manage Users','url'=>array('admin')),
			array('label'=>'Manage Profile Fields','url'=>array('profileField/admin')),
			);
	if (count($list)) {
		foreach ($list as $item)
			array_push($this->menu,$item);
	}
?>
	

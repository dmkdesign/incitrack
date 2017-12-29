
<?php 
	
	$this->menu = array(
			array('label'=>'Manage Pages','url'=>array('page/admin')),
			array('label'=>'Manage Questions','url'=>array('question/admin')),
	);
	if (count($list)) {
		foreach ($list as $item)
			array_push($this->menu,$item);
	}
?>

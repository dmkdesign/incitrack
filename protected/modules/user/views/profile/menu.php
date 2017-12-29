
<?php 
$this->menu= array(array('label'=>'Profile','url'=>array('/user/profile')),
					array('label'=>'Edit','url'=>array('edit')),
					array('label'=>'Change password','url'=>array('changepassword')),
					array('label'=>'Logout','url'=>array('/user/logout')),);
if(UserModule::isAdmin()) {
	array_push($this->menu,array('label'=>UserModule::t('Manage Users'),'url'=>array('/user/admin')));
}
?>
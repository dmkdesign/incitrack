<?php
Class Upload Extends CFormModel{
public $file;

	public function rules()
	{
		return array(array('file','file','types'=>'pdf'),);
	}

}

Class pictureUpload Extends CFormModel{
	public $file;

	public function rules()
	{
		return array(array('file','file','types'=>'jpeg, jpg, png, gif, bmp'),);
	}

}
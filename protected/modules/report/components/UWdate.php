<?php
class UWdate extends CWidget
{
	/**
	 * @var array
	 */
	public $params = array(
			'ui-theme'=>'base',
			'language'=>'en',
			'defaultDate',
			'model',
			'question',
			'createDate' => true,
			'createTime' => true,
			'form'
	
	);
	
	/**
	 * Initialization
	 * @return array
	 */
	public function init() {
		return array(
				'name'=>__CLASS__,
				'label'=>UserModule::t('Datetime'),
				'fieldType'=>array('DATE','DATETIME','TIME'),
				'params'=>$this->params,
				'paramsLabels' => array(
						'createDate'=>UserModule::t('Create Date(true or false'),
						'createTime'=>UserModule::t('Create Time(true or false'),
				),
		);
	}
	public function editAttribute()
	{
			
						
		$this->render('_dateTime',array('model'=>$params['model'],'form'=>$params['form'], 'question'=>$params['question'], 'createDate'=>$params['createDate'],'createTime'=>$params['createTime'] ));
	}
		
}
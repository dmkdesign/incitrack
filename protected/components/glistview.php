<?php

Yii::import('zii.widgets.CListView');

class glistview extends CListView {

	public $sorterList;
	public $url;
	public function renderSorter(){
		if($this->dataProvider->getItemCount()<=0 || !$this->enableSorting || empty($this->sortableAttributes))
			return;
		
		$link = Yii::app()->controller->createUrl('');
		$modelname = 'Leads';
		
		$attributes = array();
		foreach($this->sortableAttributes as $name=>$label)
			$attributes[$name] = $label;
		
		echo CHtml::openTag('div',array('class'=>$this->sorterCssClass))."\n";
		echo $this->sorterHeader===null ? Yii::t('zii','Sort by: ') : $this->sorterHeader;
		if(isset($_GET[$modelname.'_sort'])) {
			$selected = explode('.', $_GET[$modelname.'_sort']);
			$selected = $selected[0];
		}
		echo CHtml::dropDownList('sorter',
				isset($_GET[$modelname.'_sort'])
				? $selected : 0, $attributes);
		
		echo CHtml::closeTag('div');
		
		Yii::app()->clientScript->registerScript('sorter', "
		searchurl = window.location.href;
		if(searchurl.indexOf('monthly_electric_usage')>=0)
		{
			$('#sorter').val('monthly_electric_usage.desc');
		}
		$('#sorter').change(function(){
		
        var url = '".$this->url."&id_sort='+this.value;
        window.location = url;
});", CClientScript::POS_READY);
		
	}
}

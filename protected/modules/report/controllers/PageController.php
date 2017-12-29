<?php

class PageController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),*/
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','admin','delete'),
				'users'=>UserModule::getAdmins(),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$question = new Question;
		$question->page_id = $id;
		//really? Should this not be in update?
		$cs = Yii::app()->getClientScript();
		$cs->registerScript(
				'showQuestion',
				'function showQuestion()
				{
				
				$("#addQuestion").show("slow");}',
				CClientScript::POS_END
		);
		$this->registerScript();
		$criteria=new CDbCriteria(array(
				'condition'=>'page_id='.$id
					
		));
		
		$dataProvider=new CActiveDataProvider('Question', array(
				'criteria'=>$criteria,
		));
		$this->render('view',array(
			'model'=>$this->loadModel($id),'dataProvider'=>$dataProvider,'question'=>$question
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Page;
		$question = new Question;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Page']))
		{
			$model->attributes=$_POST['Page'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Page']))
		{
			$model->attributes=$_POST['Page'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Page');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Page('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Page']))
			$model->attributes=$_GET['Page'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Page::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='page-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	/**
	 * Register Script
	 */
	public function registerScript() {
		$basePath=Yii::getPathOfAlias('application.modules.user.views.asset');
		$baseUrl=Yii::app()->getAssetManager()->publish($basePath);
		$cs = Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		$cs->registerCssFile($baseUrl.'/css/redmond/jquery-ui.css');
		$cs->registerCssFile($baseUrl.'/css/style.css');
		$cs->registerScriptFile($baseUrl.'/js/jquery-ui.min.js');
		$cs->registerScriptFile($baseUrl.'/js/form.js');
		$cs->registerScriptFile($baseUrl.'/js/jquery.json.js');
	
		$widgets = QuestionController::getWidgets();
	
		$wgByTypes = Question::itemAlias('field_type');
		foreach ($wgByTypes as $k=>$v) {
			$wgByTypes[$k] = array();
		}
	
		foreach ($widgets[1] as $widget) {
			if (isset($widget['fieldType'])&&count($widget['fieldType'])) {
				foreach($widget['fieldType'] as $type) {
					array_push($wgByTypes[$type],$widget['name']);
				}
			}
		}
		//echo '<pre>'; print_r($widgets[1]); die();
		$js = "
	
		var name = $('#name'),
		value = $('#value'),
		allFields = $([]).add(name).add(value),
		tips = $('.validateTips');
	
		var listWidgets = jQuery.parseJSON('".str_replace("'","\'",CJavaScript::jsonEncode($widgets[0]))."');
		var widgets = jQuery.parseJSON('".str_replace("'","\'",CJavaScript::jsonEncode($widgets[1]))."');
		var wgByType = jQuery.parseJSON('".str_replace("'","\'",CJavaScript::jsonEncode($wgByTypes))."');
	
		var fieldType = {
		'INTEGER':{
		'hide':['match','other_validator','widgetparams'],
		'val':{
		'field_size':10,
		'default':'0',
		'range':'',
		'widgetparams':''
	}
	},
	'VARCHAR':{
	'hide':['widgetparams'],
	'val':{
	'field_size':255,
	'default':'',
	'range':'',
	'widgetparams':''
	}
	},
	'TEXT':{
	'hide':['range','widgetparams'],
	'val':{
	'field_size':10000,
	'default':'',
	'range':'',
	'widgetparams':''
	}
	},
	'DATETIME':{
	'hide':['field_size','field_size_min','match','range','widgetparams'],
	'val':{
	'field_size':0,
	'default':'1970-00-00 00:00:00',
	'range':'',
	'widgetparams':''
	}
	},
	'DATE':{
	'hide':['field_size','field_size_min','match','range','widgetparams'],
	'val':{
	'field_size':0,
	'default':'2014-00-00',
	'range':'',
	'widgetparams':''
	}
	},
	'TIME':{
	'hide':['field_size','field_size_min','match','range','widgetparams'],
	'val':{
	'field_size':0,
	'default':'00:00:00',
	'range':'',
	'widgetparams':''
	}
	},
	'FLOAT':{
	'hide':['match','other_validator','widgetparams'],
	'val':{
	'field_size':'10,2',
	'default':'0.00',
	'range':'',
	'widgetparams':''
	}
	},
	'BOOL':{
	'hide':['field_size','field_size_min','match','widgetparams'],
	'val':{
	'field_size':0,
	'default':0,
	'range':'1==".UserModule::t('Yes').";0==".UserModule::t('No')."',
	'widgetparams':''
	}
	},
	'BLOB':{
	'hide':['field_size','field_size_min','match','widgetparams'],
	'val':{
	'field_size':0,
	'default':'',
	'range':'',
	'widgetparams':''
	}
	},
	'BINARY':{
	'hide':['field_size','field_size_min','match','widgetparams'],
	'val':{
	'field_size':0,
	'default':'',
	'range':'',
	'widgetparams':''
	}
	},
	'SELECT':{
	'hide':['field_size','field_size_min','match','widgetparams'],
	'val':{
	'field_size':255,
	'default':'',
	'range':'',
	'widgetparams':''
	}
	},
	'RADIO':{
	'hide':['field_size','field_size_min','match','widgetparams'],
	'val':{
	'field_size':255,
	'default':'',
	'range':'',
	'widgetparams':''
	}
	}
	};
		
	function showWidgetList(type) {
	$('div.widget select').empty();
	$('div.widget select').append('<option value=\"\">".UserModule::t('No')."</option>');
	if (wgByType[type]) {
	for (var k in wgByType[type]) {
	$('div.widget select').append('<option value=\"'+wgByType[type][k]+'\">'+widgets[wgByType[type][k]]['label']+'</option>');
	}
	}
	}
	
	function setFields(type) {
	if (fieldType[type]) {
	if (".((isset($_GET['id']))?0:1).") {
	showWidgetList(type);
	$('#widgetlist option:first').attr('selected', 'selected');
	}
		
	$('div.row').addClass('toshow').removeClass('tohide');
	if (fieldType[type].hide.length) $('div.'+fieldType[type].hide.join(', div.')).addClass('tohide').removeClass('toshow');
	if ($('div.widget select').val()) {
	$('div.widgetparams').removeClass('tohide');
	}
	$('div.toshow').show(500);
	$('div.tohide').hide(500);
	".((!isset($_GET['id']))?"
			for (var k in fieldType[type].val) {
			$('div.'+k+' input').val(fieldType[type].val[k]);
	}":'')."
	}
	}
	
	function isArray(obj) {
	if (obj.constructor.toString().indexOf('Array') == -1)
	return false;
	else
	return true;
	}
	
	$('#dialog-form').dialog({
	autoOpen: false,
	height: 400,
	width: 400,
	modal: true,
	buttons: {
	'".UserModule::t('Save')."': function() {
	var wparam = {};
	var fparam = {};
	$('#dialog-form fieldset .wparam').each(function(){
	if ($(this).val()) wparam[$(this).attr('name')] = $(this).val();
	});
	
	var tab = $('#tabs ul li.ui-tabs-selected').text();
	fparam[tab] = {};
	$('#dialog-form fieldset .tab-'+tab).each(function(){
	if ($(this).val()) fparam[tab][$(this).attr('name')] = $(this).val();
	});
	
	if ($.JSON.encode(wparam)!='{}') $('div.widgetparams input').val($.JSON.encode(wparam));
	if ($.JSON.encode(fparam[tab])!='{}') $('div.other_validator input').val($.JSON.encode(fparam));
	
	$(this).dialog('close');
	},
	'".UserModule::t('Cancel')."': function() {
	$(this).dialog('close');
	}
	},
	close: function() {
	}
	});
	
	
	$('#widgetparams').focus(function() {
	var widget = widgets[$('#widgetlist').val()];
	var html = '';
	var wparam = ($('div.widgetparams input').val())?$.JSON.decode($('div.widgetparams input').val()):{};
	var fparam = ($('div.other_validator input').val())?$.JSON.decode($('div.other_validator input').val()):{};
	
	// Class params
	for (var k in widget.params) {
	html += '<label for=\"name\">'+((widget.paramsLabels[k])?widget.paramsLabels[k]:k)+'</label>';
	html += '<input type=\"text\" name=\"'+k+'\" id=\"widget_'+k+'\" class=\"text wparam ui-widget-content ui-corner-all\" value=\"'+((wparam[k])?wparam[k]:widget.params[k])+'\" />';
	}
	// Validator params
	if (widget.other_validator) {
	var tabs = '';
	var li = '';
	for (var t in widget.other_validator) {
	tabs += '<div id=\"tab-'+t+'\" class=\"tab\">';
	li += '<li'+((fparam[t])?' class=\"ui-tabs-selected\"':'')+'><a href=\"#tab-'+t+'\">'+t+'</a></li>';
	
	for (var k in widget.other_validator[t]) {
	tabs += '<label for=\"name\">'+((widget.paramsLabels[k])?widget.paramsLabels[k]:k)+'</label>';
	if (isArray(widget.other_validator[t][k])) {
	tabs += '<select type=\"text\" name=\"'+k+'\" id=\"filter_'+k+'\" class=\"text fparam ui-widget-content ui-corner-all tab-'+t+'\">';
	for (var i in widget.other_validator[t][k]) {
	tabs += '<option value=\"'+widget.other_validator[t][k][i]+'\"'+((fparam[t]&&fparam[t][k])?' selected=\"selected\"':'')+'>'+widget.other_validator[t][k][i]+'</option>';
	}
	tabs += '</select>';
	} else {
	tabs += '<input type=\"text\" name=\"'+k+'\" id=\"filter_'+k+'\" class=\"text fparam ui-widget-content ui-corner-all tab-'+t+'\" value=\"'+((fparam[t]&&fparam[t][k])?fparam[t][k]:widget.other_validator[t][k])+'\" />';
	}
	}
	tabs += '</div>';
	}
	html += '<div id=\"tabs\"><ul>'+li+'</ul>'+tabs+'</div>';
	}
	
	$('#dialog-form fieldset').html(html);
	
	$('#tabs').tabs();
	
	// Show form
	$('#dialog-form').dialog('open');
	});
	
	$('#field_type').change(function() {
	setFields($(this).val());
	});
	
	$('#widgetlist').change(function() {
	if ($(this).val()) {
	$('div.widgetparams').show(500);
	} else {
	$('div.widgetparams').hide(500);
	}
	
	});
	
	// show all function
	$('div.form p.note').append('<br/><a href=\"#\" id=\"showAll\">".UserModule::t('Show all')."</a>');
	$('#showAll').click(function(){
	$('div.row').show(500);
	return false;
	});
	
	// init
	setFields($('#field_type').val());
	
	";
		$cs->registerScript(__CLASS__.'#dialog', $js);
	}
}

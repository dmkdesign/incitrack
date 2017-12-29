<?php
class instaCMS extends CWidget
{
	public $framecode;
	public $adminBackColor = "#FFFF99";
	public function run()
	{
		$article = Articles::Model()->find("framecode = '".$this->framecode."'");
		if(!isSet($article))
		{
			$article = new Articles();
			$article->framecode = $this->framecode;
			$article->content = 'New article '.$this->framecode.'. Please edit. ';
			$article->save();		
		}		
		$this->render('_article',array('article'=>$article, 'adminBackColor'=>$this->adminBackColor));
	}
		
}
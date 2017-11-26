<?php 

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\html;

/**
* 
*/
class headerbottomWidget extends Widget
{
	public $message;

	public function init()
	{
 parent::init();

	}

	public function run()
	{
		return $this->render('headerbottomWidget');
	}
}
?>
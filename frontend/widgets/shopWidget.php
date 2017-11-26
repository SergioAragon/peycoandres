<?php 
namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\html;

/**
* 
*/
class shopWidget extends Widget
{
	public $message;

	public function init()
	{
        parent::init();

	}

	public function run()
	{
		return $this->render('shopWidget');
	}
}
?>
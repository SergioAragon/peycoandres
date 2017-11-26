<?php 
namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

/**
* 
*/
class cartWidget extends Widget
{
	public $message;

	public function init()
	{
        parent::init();
        //return $this->render('cartWidget');
	}

	public function run()
	{
		return $this->render('cartWidget');
	}
}
?>
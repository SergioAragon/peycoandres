<?php 
namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\html;
use frontend\models\Clasificacion;


/**
* 
*/
class categorytabWidget extends Widget
{
	public $message;

	public function init()
	{
        parent::init();

	}

	public function run()
	{
		$dataCla = new Clasificacion();
		$dataCla= $dataCla->getDataTabHomePage();
		return $this->render('categorytabWidget',["dataCla"=>$dataCla]);
	}
}
?>
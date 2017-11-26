<?php 
namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\html;
use frontend\models\Clasificacion;

/**
* 
*/
class categoryWidget extends Widget
{
	public $message;

	public function init()
	{
        parent::init();

	}

	public function run()
	{
		$data = new Clasificacion();
		$datapa= $data->getClasifBy();
		return $this->render('categoryWidget',['datapa'=> $datapa]);
	}
}
?>
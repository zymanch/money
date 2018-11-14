<?php
namespace controllers\base;

use Yii;
use yii\db\ActiveRecord;
use \yii\web\Controller as Base;
use yii\web\HttpException;

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends Base
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='main';

    /**
     * @param integer the ID of the model to be loaded
     */
	public function loadModel($id, $with = array()) {
        $modelClass = $this->modelClass;
        /** @var ActiveRecord $modelClass */
		$model =$modelClass::findOne($id);
		if($model===null) {
			throw new HttpException(404,'The requested page does not exist.');
        }
		return $model;
	}


    protected function setUserMessage($text) {
        Yii::$app->session->setFlash('status', $text);
    }

}
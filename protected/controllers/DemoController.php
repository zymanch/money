<?php

namespace controllers;

use controllers\base\Controller;

class DemoController extends Controller {

    public $layout='demo';

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex() {
		return $this->render('index');
	}


}
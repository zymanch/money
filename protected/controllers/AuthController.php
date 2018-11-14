<?php

namespace controllers;

use controllers\base\Controller;

class AuthController extends Controller {


	/**
	 * Displays the login page
	 */
	public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
	}

    public function actionRegister($imei) {

	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout() {
		\Yii::$app->user->logout();
		$this->redirect(\Yii::$app->homeUrl);
	}

}
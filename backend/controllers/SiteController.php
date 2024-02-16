<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Usuario;
use app\models\LoginForm;
use app\models\Usuarios;

class SiteController extends Controller
{
    // Outros métodos da sua classe

    public function actionSignup()
    {
        $model = new Usuarios();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // Redirecionar após o registro bem-sucedido
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }
}

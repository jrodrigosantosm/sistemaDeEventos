<?php

namespace app\controllers;

use app\models\ArtesMarciais;
use app\models\Graduacoes;
use yii\web\Controller;


class UsuarioController extends Controller
{
    public function actionGetArtesMarciais()
    {
        $artesMarciais = ArtesMarciais::find()
            ->orderBy(['id' => SORT_ASC])
            ->all();

        return $artesMarciais;
    }

    public function actionGetGraduacao($id)
    {
        $graduacoes = Graduacoes::findAll(['id_arte_marcial' => $id]);

        return $graduacoes;
    }
}

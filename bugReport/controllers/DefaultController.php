<?php
namespace common\modules\bugReport\controllers;

use common\modules\bugReport\models\BugReport;
use yii\web\Controller;
use \yii\web\Response;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $model = new BugReport();
        $request = \Yii::$app->getRequest();
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if ($request->isAjax && $request->isPost && $model->load($request->post())) {
            return ['success' => $model->save()];
        } else {
            $model->validate();
            return ['error' => $model->getErrors()];
        }
    }
}
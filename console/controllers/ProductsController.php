<?php
namespace console\controllers;

use yii\console\Controller;
use common\models\User;
use Yii;

class ProductsController extends Controller
{
    public function actionAssign($role, $email)
    {
        $user = User::find()->where(['email' => $email])->one();
        if (!$user) {
            throw new InvalidParamException("There is no user \"$email\".");
        }

        $auth = Yii::$app->authManager;
        $roleObject = $auth->getRole($role);
        if (!$roleObject) {
            throw new InvalidParamException("There is no role \"$role\".");
        }

        $auth->assign($roleObject, $user->id);
    }
}
<?php

namespace xandrkat\radmin\controllers;

use Yii;
use yii\web\Controller;

/**
 * DefaultController
 *
 * @author Alexandr Katrazhenko <katrazhenko@gmail.com>
 * @since  1.0
 */
class DefaultController extends Controller
{

    /**
     * Action index
     */
    public function actionIndex($page = 'README.md')
    {
        if (preg_match('/^docs\/images\/image\d+\.png$/', $page)) {
            $file = Yii::getAlias("@xandrkat/radmin/{$page}");
            return Yii::$app->getResponse()->sendFile($file);
        }
        return $this->render('index', ['page' => $page]);
    }
}

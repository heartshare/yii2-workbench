<?php

namespace johnitvn\workbench;

use yii\base\BootstrapInterface;
use yii\console\Application as ConsoleApplication;
use johnitvn\workbench\FileSystem;
use Yii;

/**
 * @author John Martin <john.itvn@gmail.com>
 * @since 1.0.0
 */
class Bootstrap implements BootstrapInterface {

    public function bootstrap($app) {
        Yii::setAlias('@johnitvn/workbench', __DIR__);
        $basePath = dirname(Yii::getAlias('@vendor'));

        if ($app instanceof ConsoleApplication) {
            $app->controllerMap['workbench'] = [
                'class' => 'johnitvn\workbench\controllers\WorkbenchController',
            ];
        }

        $starter = new Starter();
        $starter->start($app);
    }

}

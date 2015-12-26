<?php

namespace liuxy\frontend;

use yii\base\BootstrapInterface;

/**
 * liuxy module bootstrap class.
 */
class Bootstrap implements BootstrapInterface {
    /**
     * @inheritdoc
     */
    public function bootstrap($app) {
        // Add module URL rules.
        $app->getUrlManager()->addRules(
            [
                '' => \Yii::$app->defaultRoute,
                '<_m>/<_c>/<_a>' => '<_m>/<_c>/<_a>',
                '<_m>/<_c>/<_a>.json' => '<_m>/<_c>/<_a>'
            ]
        );

        /**
         * 设置编译模板
         */
        $app->view->defaultExtension = 'html';
        $app->view->renderers = [
            'html' => [
                'class' => 'liuxy\frontend\components\SmartyViewRenderer',
                'cachePath' => '@runtime/Smarty/cache',
                'options' => [
                    'left_delimiter' => '<!--{',
                    'right_delimiter' => '}-->',
                    'php_handling' => 3
                ]
            ]
        ];
    }
}

<?php

namespace liuxy\frontend;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\FileHelper;
use yii\helpers\StringHelper;

/**
 * Class Theme
 * @package liuxy\frontend
 */
class Theme extends \yii\base\Theme {

    public $template = 'default';

    /**
     * @inheritdoc
     */
    public function init() {
        parent::init();
        if (isset(Yii::$app->params['template'])) {
            $this->template = \Yii::$app->params['template'];
        }

        Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'css' => [
                'css/bootstrap.min.css'
            ]
        ];
        Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapPluginAsset'] = [
            'js' => [
                'js/bootstrap.min.js'
            ]
        ];
        Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = [
            'js' => [
                'jquery.min.js'
            ]
        ];
        Yii::$app->assetManager->bundles['yii\jui\JuiAsset'] = [
            'js' => [
                'jquery-ui.min.js'
            ]
        ];

        $this->pathMap['@modules'] = '@modules/views/frontend/themes/'.$this->template;
    }

    /**
     * @inheritDoc
     */
    public function applyTo($path)
    {
        $ext = substr(strrchr($path, '.'), 1);
        if ($ext !== Yii::$app->getView()->defaultExtension) {
            $path = str_replace('.'.$ext, '.'.Yii::$app->getView()->defaultExtension, $path);
        }
        return parent::applyTo($path);
    }
}

<?php

namespace liuxy\frontend;

use Yii;

/**
 * Main frontend module.
 */
class Module extends \yii\base\Module {

    public static function t( $message, $params = [], $language = null) {
        $content = $message;
        Yii::$app->i18n->suffix = 'frontend';
        if (isset(Yii::$app->i18n->translations['common/frontend'])) {
            $content = Yii::t('common/frontend', $message, $params, $language);
        }
        if ($content == $message) {
            $content = Yii::t('liuxy/frontend', $message, $params, $language);
        }
        return $content;
    }
}

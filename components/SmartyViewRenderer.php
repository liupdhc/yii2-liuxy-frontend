<?php
/**
 * FileName: SmartyViewRenderer.php.
 * Author: liupeng
 * Date: 2015/8/15
 */

namespace liuxy\frontend\components;

use Yii;
use yii\smarty\ViewRenderer;

/**
 * 扩展自定义的Smarty函数
 * Class SmartyViewRenderer
 * @package oppo\sns\components
 */
class SmartyViewRenderer extends ViewRenderer {
    /**
     * @inheritDoc
     */
    public function init() {
        $this->widgets['functions'] = ['lang'=>__CLASS__];
        parent::init();
    }

    /**
     * 获取语言资源包
     * @param $key  string
     * @return string
     */
    public function _widget_func__lang($key) {
        try {
            if (Yii::$app->module) {
                $currentModuleId = Yii::$app->module->getUniqueId();
                $content = Yii::t('modules/' . $currentModuleId, $key);
            }
        } catch (InvalidConfigException $ex) {

        }
        return $content;

    }

    /**
     * 兼容yii2.0.6以上版本
     * @param $key
     */
    public function _widget_function__lang($key) {
        $this->_widget_func__lang($key);
    }
}
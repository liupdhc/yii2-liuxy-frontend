<?php
/**
 * User: liupeng
 * Date: 2015/6/14
 * File Name: AbstractAsset.php
 */

namespace liuxy\frontend\assets;

use yii\web\AssetBundle;

abstract class AbstractAsset extends AssetBundle {

    protected $plugin_js = [
    ];

    protected $plugin_css = [];

    protected $plugin_depends = [];

    protected $plugin_js_options = [];

    protected $plugin_css_options = [];

    public function init() {
        parent::init();
        foreach($this->plugin_js as $item) {
            $this->js[] = $item;
        }
        foreach($this->plugin_css as $item) {
            $this->css[] = $item;
        }
        foreach($this->plugin_depends as $item) {
            $this->depends[] = $item;
        }
        foreach($this->plugin_css_options as $item) {
            $this->cssOptions[] = $item;
        }
    }

    public static function hash($filePath)
    {
        $path = (is_file($filePath) ? dirname($filePath) : $filePath) . filemtime($filePath);
        return sprintf('%x', crc32($path . Yii::getVersion()));
    }
}
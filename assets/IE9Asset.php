<?php
/**
 * author: liupeng
 * createTime: 2015/6/5 3:43
 * description: ${TODO}
 * file: IE9Asset.php
 */

namespace liuxy\frontend\assets;

class IE9Asset extends AbstractAsset {

    public $jsOptions = ['condition'=>'lte IE 9'];
    public $cssOptions = ['condition'=>'lte IE 9'];

    public $plugin_js = [
        'scripts/respond.min.js'
    ];
} 
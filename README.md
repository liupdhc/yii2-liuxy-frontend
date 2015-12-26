liuxy frontend module.
=======================
提供基于Yii2的前台主题管理模板


配置
-------------

编辑配置文件中的 `module` 部分:

```php
'modules' => [
    'frontend' => [
        'class' => 'liuxy\frontend\Module'
    ]
]
```

同时在params.php文件加入模板名称
```php
return [
    'template' => 'default'
]
```

@see[范例](https://github.com/liupdhc/yii2-liuxy-themes).部分的frontend集成
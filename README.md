# Bag report module support documentation.
-----------------------------------------



### console/config/main
```php
'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationNamespaces' => [
                'frontend\modules\bugReport\migrations',
            ],
            //'migrationPath' => null, // allows to disable not namespaced migration completely
        ],

    ],
```

### Add to  в config console app
```php
 'controllerMap' => [
     ...
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationNamespaces' => [
                'common\modules\bugReport\migrations',
            ],
        ],
   ...
    ],
```

### Add to config common app
```php
    'modules' => [
        ...
        'bugReport' => [
            'class' => 'common\modules\bugReport\Module',
        ],
      ...
    ],
```
### Make migration "common\modules\bugReport\migrations\m170512_134218_bug_report" 
```php
php yii migrate/up
```
### Using into layout
```php
<?php echo \common\modules\bugReport\widgets\BugReportPopup::widget() ?>
```

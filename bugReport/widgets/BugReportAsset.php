<?php

namespace common\modules\bugReport\widgets;

use Yii;
use yii\web\AssetBundle;

class BugReportAsset extends AssetBundle
{
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public $sourcePath = '@common/modules/bugReport/assets';

    public $css = [
        'bugReport.css',
    ];

    public $js = [
        'bugReport.js',
    ];
}
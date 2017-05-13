<?php
namespace common\modules\bugReport\widgets;

use yii\base\Widget;

class BugReportPopup extends Widget
{
    public function init()
    {
        parent::init();
        $this->registerAssets();
    }

    public function registerAssets()
    {
        $view = $this->getView();
        BugReportAsset::register($view);
    }

    public function run()
    {

        return $this->render('@common/modules/bugReport/views/popup');
    }


}
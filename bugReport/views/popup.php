<?php
use \yii\widgets\ActiveForm;
use \yii\bootstrap\Html;
use \yii\helpers\Url;
use \yii\web\View;
use \common\modules\bugReport\models\BugReport;

$bugReport = new BugReport();
$js = <<<JS
$('form#{$bugReport->formName()}').on('beforeSubmit', function() {
    var this_org = $(this);
    this_org.find('button[type="submit"]').button('loading');
     $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            dataType: "json",
            data: $(this).serialize(),
            success: function(response) {
                this_org.find('button[type="submit"]').button('reset');
                if(response.success == true){
                     this_org.find('.alert-success').removeClass('fade').show();
                     this_org.find('.alert-danger').addClass('fade').hide();
                     this_org[0].reset();
                     setTimeout(function() {
                        $('#bugReport').modal('hide');
                        this_org.find('.alert-success').addClass('fade').hide();
                     },2500)
                }
            },
            error: function() {
                this_org.find('button[type="submit"]').button('reset');
                this_org.find('.alert-danger').removeClass('fade').show();
            }
        });
    return false;
}).on('submit', function(e){    
    e.preventDefault();        
});
JS;

$this->registerJs($js, View::POS_READY);

?>
<div class="modal fade" id="bugReport">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo Yii::t('app', 'Problem Report') ?></h4>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => $bugReport->formName(),
                'action' => Url::toRoute(['bugReport/default/index']),
                'ajaxParam' => 'ajax',
                'ajaxDataType' => 'json',
                'options' => [
                    'class' => 'form-horizontal',
                ],

            ]); ?>
            <div class="modal-body">
                <div class="col-lg-12">
                    <?php
                    echo $form->field($bugReport, 'email')->textInput();
                    echo $form->field($bugReport, 'description')->textarea();
                    echo Html::activeHiddenInput($bugReport, 'url', ['value' => Url::current()]);
                    ?>
                </div>
                <div class="row"></div>
                <div class="alert alert-success fade alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    <strong><?php echo Yii::t('app', 'Success!') ?></strong><?php echo Yii::t('app', 'Thank you for reporting the issue!') ?>
                </div>
                <div class="alert alert-danger fade alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong><?php echo Yii::t('app', 'Error.') ?></strong><?php echo Yii::t('app', 'Service is currently not available. Please try again later.') ?>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <?php echo Yii::t('app', 'Close') ?>
                </button>
                <?php echo Html::submitButton(Yii::t('app', 'Save'), [
                    'class' => 'btn btn-primary',
                    'data-loading-text'=>Yii::t('app',"Loading...")
                ]) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
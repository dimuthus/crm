<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = Yii::$app->name . ' - Tools';
$sub_title = 'User Roles';
/*$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="role-index">
<div class="panel panel-info" style="margin-top: 20px;">
        <div class="panel-heading">           
            <h3 class="panel-title">
                <span class="glyphicon glyphicon-th"></span>
                <?= $sub_title ?>
            </h3>
        </div>
        <div class="panel-body">
    <?php $form = ActiveForm::begin(['id' => 'dropdown-role-form']); ?>
    <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => 250, 'placeholder' => 'New Item'])->label(false)->error(false) ?>
                </div>
                <div class="col-md-1">
                    <input type="hidden" name="hasNew" value="true">
                    <?= Html::submitButton('<span class="glyphicon glyphicon-plus"></span> Add', ['class' => 'btn btn-success btn-sm', 'data-loading-text' => 'Adding...']) ?>                                
                </div>
            </div>
    <?php ActiveForm::end(); ?>



    <div style="clear: both;"></div>

    <div id="role-widget">
        <?= $this->render(Url::to('role_list'), [
                'dataProvider' => $dataProvider,
        ]) ?>
    </div>

</div>
 </div>
    </div>
<?php
    $this->registerJs("

        $('#dropdown-role-form').submit(function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            addDropdownValue($(this),'role');
            return false;
        });

    ");
?>


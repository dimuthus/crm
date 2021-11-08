<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = Yii::$app->name . ' - Tools';
$sub_title = 'Place of Purchase';
/*$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="place-of-purchase-index">

    <h4><?= $sub_title ?></h4>

    <?php $form = ActiveForm::begin(['id' => 'dropdown-place-of-purchase-form']); ?>
    <table class="dropdown-form">
        <tr>
            <td><?= $form->field($model, 'name')->textInput(['maxlength' => 250, 'placeholder'=>'New Item'])->label(false)->error(false) ?></td>
            <td>
                <input type="hidden" name="hasNew" value="true">
                <?= Html::submitButton('<span class="glyphicon glyphicon-plus"></span> Add', ['class' => 'btn btn-success btn-sm','data-loading-text'=>'Adding...']) ?>
            </td>
        </tr>
    </table>
    <?php ActiveForm::end(); ?>



    <div style="clear: both;"></div>

    <div id="place-of-purchase-widget">
        <?= $this->render(Url::to('place_of_purchase_list'), [
                'dataProvider' => $dataProvider,
        ]) ?>
    </div>

</div>

<?php
    $this->registerJs("

        $('#dropdown-place-of-purchase-form').submit(function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            addDropdownValue($(this),'place_of_purchase');
            return false;
        });

    ");
?>


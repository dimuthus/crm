<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Interaction */
$this->title = Yii::$app->name . ' - Interactions';

Modal::begin([
    'header' => '<h4 id="interaction-modal-title"></h4>',
    'id' => 'interaction-modal',
]);

echo '<div id="interaction-modal-content"></div>';

Modal::end();
?>

<div id="interaction-view">

    <h4>Interactions</h4>

    
    <?php if(Yii::$app->user->can('Create Interaction')) { ?>
        <?= Html::button('<span class="glyphicon glyphicon-plus"></span> Add Interaction', [
                                        'value'=>Url::to(['interaction/create','case_id' => isset($case_id)? $case_id:0]),
                                        'class' => isset($case_id)?'btn btn-xs btn-success console-button'
                                                                     :'btn btn-xs btn-success console-button disabled', 
                                        'id'=>'create-interaction-modal-button', 
                                        'data-loading-text'=>'Loading...'
        ]) ?>
    <?php } ?>
    
    <div style="clear: both;"></div>
    <?php \yii\widgets\Pjax::begin(['id' => 'interactions','enablePushState'=>FALSE,'timeout' => 10000, 'clientOptions' => ['container' => 'pjax-container']]); ?>

    <?= GridView::widget([
        'dataProvider' => $interactions,
        'id' => 'interactions-widget',
        'layout'=>"{items}\n{summary}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'inbound_interaction_id',
                'contentOptions'=>['style'=>'width: 100px;']
            ],
         //   'channel.name',
            [
                'attribute'=>'created_datetime', 
                'format'=>['date', 'php:d M y @ h:i a']
            ],
            'creator.username',
        ],
        'rowOptions'   => function ($model, $key, $index, $grid) {
            return ['data-id' => $model->id];
        },
    ]); ?>
    
    <?php
    $this->registerJs("

        /*
        listener to handle click event of view interaction item
        */
        $('#interactions-widget tbody tr').click(function (e) {
            var thisRow = $(this);
            var id = $(this).data('id');
            var modal_content = $('#interaction-modal').find('#interaction-modal-content');
            if(id != undefined) {
                modal_content.html('').load( '".Url::to(['inbound-interaction/view'])."?id=' + id, function() {
                    $('#interaction-modal').modal('show');
                });

                
            }
        });

        /*
        listener to handle click event of create interaction button
        */
        $('#create-interaction-modal-button').click(function() {
            var btn = $(this);
            btn.button('loading');
            var modal_content = $('#interaction-modal').find('#interaction-modal-content');
            modal_content.html('').load( $(this).attr('value'), function() {
                $('#interaction-modal').modal('show');
                btn.button('reset');
            });
        });

    ");
    ?>
    <?php \yii\widgets\Pjax::end(); ?>

</div>



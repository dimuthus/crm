<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::$app->name . ' - Customer REPORT';
?>
<div class="">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">
                <span class="glyphicon glyphicon-th"></span>
                Customer Report
            </h3>
        </div>
        <div class="panel-body">
            <table>
                <tr>
                    <td>
                        <?=
                        $this->render('customer_filter', [
                            'searchModel' => $searchModel,
                        ])
                        ?>
                    </td>
                </tr>
                <tr>
                    <td id="report-generated" style="display:none">
                        <?=
                        $this->render(Url::to('customer_result'), [
                            'dataProvider' => $dataProvider,
                        ])
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
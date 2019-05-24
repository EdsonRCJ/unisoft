<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Produtos */

$this->title = Yii::t('app', 'Atualizar Produtos: {name}', [
    'name' => $model->produto_nome,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Produtos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Atualizar');
?>
<div class="produtos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

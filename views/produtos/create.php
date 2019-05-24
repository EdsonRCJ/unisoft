<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Produtos */

$this->title = Yii::t('app', 'Criar Produto');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Produtos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produtos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use app\models\Categorias;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Produtos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produtos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'produto_nome')->textInput() ?>

    <?= $form->field($model, 'produto_categoria_id')->dropDownList(ArrayHelper::map(Categorias::find()->orderBy('ID')->all(), 'ID', 'categoria_nome'))->label('Categorias') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Salvar'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Voltar'), '/produtos/' , ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produtos".
 *
 * @property int $ID
 * @property string $produto_nome
 * @property int $produto_categoria_id
 *
 * @property Categorias $produtoCategoria
 */
class Produtos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produtos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['produto_nome'], 'required'],
            [['produto_categoria_id'], 'default', 'value' => null],
            [['produto_categoria_id'], 'integer'],
            [['produto_nome'], 'string'],
            [['produto_categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['produto_categoria_id' => 'ID']],
            [['produtoCategoria.categoria_nome'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'produto_nome' => Yii::t('app', 'Nome'),
            'produto_categoria_id' => Yii::t('app', 'ID Categorias'),
            'produtoCategoria.categoria_nome' => Yii::t('app', 'Categorias'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutoCategoria()
    {
        return $this->hasOne(Categorias::className(), ['ID' => 'produto_categoria_id']);
    }
}

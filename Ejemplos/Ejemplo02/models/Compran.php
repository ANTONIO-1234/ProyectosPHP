<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "compran".
 *
 * @property int $idCompran
 * @property int|null $idCliente
 * @property int|null $idProducto
 * @property string|null $fecha
 * @property int|null $cantidad
 *
 * @property Clientes $idCliente0
 * @property Productos $idProducto0
 */
class Compran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'compran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCliente', 'idProducto', 'cantidad'], 'integer'],
            [['fecha'], 'safe'],
            [['idCliente', 'idProducto', 'fecha'], 'unique', 'targetAttribute' => ['idCliente', 'idProducto', 'fecha']],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::class, 'targetAttribute' => ['idCliente' => 'id']],
            [['idProducto'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::class, 'targetAttribute' => ['idProducto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCompran' => 'Id Compran',
            'idCliente' => 'Id Cliente',
            'idProducto' => 'Id Producto',
            'fecha' => 'Fecha',
            'cantidad' => 'Cantidad',
        ];
    }

    /**
     * Gets query for [[IdCliente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente0()
    {
        return $this->hasOne(Clientes::class, ['id' => 'idCliente']);
    }

    /**
     * Gets query for [[IdProducto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdProducto0()
    {
        return $this->hasOne(Productos::class, ['id' => 'idProducto']);
    }
}

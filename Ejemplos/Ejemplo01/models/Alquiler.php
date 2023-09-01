<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alquiler".
 *
 * @property int $idAlquiler
 * @property string|null $cliente
 * @property string|null $coche
 * @property string|null $fechaAlquiler
 *
 * @property Clientes $cliente0
 * @property Coches $coche0
 */
class Alquiler extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alquiler';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fechaAlquiler'], 'safe'],
            [['cliente', 'coche'], 'string', 'max' => 10],
            [['cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::class, 'targetAttribute' => ['cliente' => 'nif']],
            [['coche'], 'exist', 'skipOnError' => true, 'targetClass' => Coches::class, 'targetAttribute' => ['coche' => 'bastidor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idAlquiler' => 'Id Alquiler',
            'cliente' => 'Cliente',
            'coche' => 'Coche',
            'fechaAlquiler' => 'Fecha Alquiler',
        ];
    }

    /**
     * Gets query for [[Cliente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente0()
    {
        return $this->hasOne(Clientes::class, ['nif' => 'cliente']);
    }

    /**
     * Gets query for [[Coche0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCoche0()
    {
        return $this->hasOne(Coches::class, ['bastidor' => 'coche']);
    }
}

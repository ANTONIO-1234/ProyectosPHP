<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $id
 * @property string|null $nombre
 * @property float|null $peso
 *
 * @property Compran[] $comprans
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['peso'], 'number'],
            [['nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'peso' => 'Peso',
        ];
    }

    /**
     * Gets query for [[Comprans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComprans()
    {
        return $this->hasMany(Compran::class, ['idProducto' => 'id']);
    }
    
    public static function dropDown(){
        $consulta= Productos::find()->all();
 
        return \yii\helpers\ArrayHelper::map($consulta, "id", "nombre");
    }
}

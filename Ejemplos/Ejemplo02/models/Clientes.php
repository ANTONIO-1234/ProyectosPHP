<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $id
 * @property string|null $nombre
 *
 * @property Compran[] $comprans
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
        ];
    }

    /**
     * Gets query for [[Comprans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComprans()
    {
        return $this->hasMany(Compran::class, ['idCliente' => 'id']);
    }
    
    public static function dropDown(){
        $consulta= Clientes::find(); // ACTIVEQUERY
        $resultado=$consulta->all(); // ARRAY DE ACTIVERECORD
//  CREAR UN ARRAY QUE PUEDA UTILIZAR EL WIDGET DROPDOWN  
        return \yii\helpers\ArrayHelper::map($resultado, "id", "nombre");
    }
}

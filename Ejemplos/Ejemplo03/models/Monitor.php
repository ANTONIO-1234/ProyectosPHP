<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "monitor".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $imagen
 * @property string|null $telefono
 * @property string|null $correo
 *
 * @property Realizan[] $realizans
 */
class Monitor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'monitor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'imagen'], 'string', 'max' => 100],
            [['telefono'], 'string', 'max' => 9],
            [['correo'], 'string', 'max' => 50],
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
            'imagen' => 'Imagen',
            'telefono' => 'Telefono',
            'correo' => 'Correo',
        ];
    }

    /**
     * Gets query for [[Realizans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRealizans()
    {
        return $this->hasMany(Realizan::class, ['monitor' => 'id']);
    }
    
    public static function dropDown(){
        $consulta= Monitor::find()->all();
 
        return \yii\helpers\ArrayHelper::map($consulta, "id", "nombre");
    }
}

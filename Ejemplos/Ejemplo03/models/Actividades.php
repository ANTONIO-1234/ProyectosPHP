<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actividades".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property string|null $imagen
 * @property int|null $duracion
 *
 * @property Realizan[] $realizans
 */
class Actividades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actividades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['duracion'], 'integer'],
            [['nombre', 'imagen'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 200],
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
            'descripcion' => 'Descripcion',
            'imagen' => 'Imagen',
            'duracion' => 'Duracion',
        ];
    }

    /**
     * Gets query for [[Realizans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRealizans()
    {
        return $this->hasMany(Realizan::class, ['actividad' => 'id']);
    }
    
    public static function dropDown(){
        $consulta= Actividades::find()->all();
 
        return \yii\helpers\ArrayHelper::map($consulta, "id", "nombre");
    }
}

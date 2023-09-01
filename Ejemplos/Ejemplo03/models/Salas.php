<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salas".
 *
 * @property int $id
 * @property string|null $nombre
 * @property int|null $plazas
 * @property string|null $descripcion
 * @property string|null $imagen
 *
 * @property Realizan[] $realizans
 */
class Salas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plazas'], 'integer'],
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
            'plazas' => 'Plazas',
            'descripcion' => 'Descripcion',
            'imagen' => 'Imagen',
        ];
    }

    /**
     * Gets query for [[Realizans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRealizans()
    {
        return $this->hasMany(Realizan::class, ['sala' => 'id']);
    }
    
    public static function dropDown(){
        $consulta= Salas::find()->all();
 
        return \yii\helpers\ArrayHelper::map($consulta, "id", "nombre");
    }
    
    public static function todas($ejecutar=true){
        if ($ejecutar){
            $consulta= Salas::find()->all;
        }
        else { 
            $consulta= Salas::find();            
        }
        return $consulta;
    }
}

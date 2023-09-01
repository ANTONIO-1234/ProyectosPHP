<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property string $nif
 * @property string|null $nombre
 * @property string|null $apellidos
 * @property string|null $poblacion
 * @property string $telefono
 * @property string $correo
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
            [['nif', 'telefono', 'correo'], 'required'],
            [['nif'], 'string', 'max' => 10],
            [['nombre', 'apellidos', 'poblacion', 'telefono', 'correo'], 'string', 'max' => 100],
            [['correo'], 'unique'],
            [['nif'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nif' => 'Nif',
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
            'poblacion' => 'Poblacion',
            'telefono' => 'Telefono',
            'correo' => 'Correo',
        ];
    }
    public static function dropDown() {
        $clientes=Clientes::find()->all();
        return \yii\helpers\ArrayHelper::map($clientes,"nif","nombre");
    }
}

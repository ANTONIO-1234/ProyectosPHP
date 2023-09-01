<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "coches".
 *
 * @property string $bastidor
 * @property string $matricula
 * @property string|null $modelo
 * @property string $marca
 * @property int|null $cilindrada
 * @property string|null $tipo
 * @property string|null $fechaCompra
 */
class Coches extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coches';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bastidor', 'matricula', 'marca'], 'required'],
            [['cilindrada'], 'integer'],
            [['tipo'], 'string'],
            [['fechaCompra'], 'safe'],
            [['bastidor'], 'string', 'max' => 10],
            [['matricula'], 'string', 'max' => 8],
            [['modelo', 'marca'], 'string', 'max' => 100],
            [['matricula'], 'unique'],
            [['bastidor'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bastidor' => 'Bastidor',
            'matricula' => 'Matricula',
            'modelo' => 'Modelo',
            'marca' => 'Marca',
            'cilindrada' => 'Cilindrada',
            'tipo' => 'Tipo',
            'fechaCompra' => 'Fecha Compra',
        ];
    }
    
    public static function Dropdown(){
        $coches=Coches::find()->select("`bastidor`, concat_ws(' ', `marca`, `modelo`) modelo")->all();
        return ArrayHelper::map($coches,"bastidor","modelo");
    }
    
}

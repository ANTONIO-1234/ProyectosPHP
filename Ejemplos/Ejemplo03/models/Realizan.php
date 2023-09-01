<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "realizan".
 *
 * @property int $id
 * @property int|null $actividad
 * @property int|null $sala
 * @property int|null $monitor
 * @property string|null $fechahora
 *
 * @property Actividades $actividad0
 * @property Monitor $monitor0
 * @property Salas $sala0
 */
class Realizan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'realizan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['actividad', 'sala', 'monitor'], 'required'],
            [['actividad', 'sala', 'monitor'], 'integer'],
            [['fechahora'], 'safe'],
            [['actividad'], 'exist', 'skipOnError' => true, 'targetClass' => Actividades::class, 'targetAttribute' => ['actividad' => 'id']],
            [['monitor'], 'exist', 'skipOnError' => true, 'targetClass' => Monitor::class, 'targetAttribute' => ['monitor' => 'id']],
            [['sala'], 'exist', 'skipOnError' => true, 'targetClass' => Salas::class, 'targetAttribute' => ['sala' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'actividad' => 'Actividad',
            'sala' => 'Sala',
            'monitor' => 'Monitor',
            'fechahora' => 'Fechahora',
        ];
    }

    /**
     * Gets query for [[Actividad0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActividad0()
    {
        return $this->hasOne(Actividades::class, ['id' => 'actividad']);
    }

    /**
     * Gets query for [[Monitor0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMonitor0()
    {
        return $this->hasOne(Monitor::class, ['id' => 'monitor']);
    }

    /**
     * Gets query for [[Sala0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSala0()
    {
        return $this->hasOne(Salas::class, ['id' => 'sala']);
    }
}

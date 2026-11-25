<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dokter".
 *
 * @property int $id_dokter
 * @property string|null $no_str
 * @property int|null $id_pengguna
 * @property string|null $spesialisasi
 *
 * @property Pengguna $pengguna
 */
class Dokter extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dokter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_str', 'id_pengguna', 'spesialisasi'], 'default', 'value' => null],
            [['id_pengguna'], 'integer'],
            [['no_str'], 'string', 'max' => 20],
            [['spesialisasi'], 'string', 'max' => 16],
            [['id_pengguna'], 'exist', 'skipOnError' => true, 'targetClass' => Pengguna::class, 'targetAttribute' => ['id_pengguna' => 'id_pengguna']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_dokter' => 'Id Dokter',
            'no_str' => 'No Str',
            'id_pengguna' => 'Id Pengguna',
            'spesialisasi' => 'Spesialisasi',
        ];
    }

    /**
     * Gets query for [[Pengguna]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPengguna()
    {
        return $this->hasOne(Pengguna::class, ['id_pengguna' => 'id_pengguna']);
    }

}

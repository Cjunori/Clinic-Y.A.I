<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "petugas_pendaftaran".
 *
 * @property int $id_petugas
 * @property int|null $id_pengguna
 *
 * @property Pengguna $pengguna
 */
class PetugasPendaftaran extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'petugas_pendaftaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pengguna'], 'default', 'value' => null],
            [['id_pengguna'], 'integer'],
            [['id_pengguna'], 'exist', 'skipOnError' => true, 'targetClass' => Pengguna::class, 'targetAttribute' => ['id_pengguna' => 'id_pengguna']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_petugas' => 'Id Petugas',
            'id_pengguna' => 'Id Pengguna',
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

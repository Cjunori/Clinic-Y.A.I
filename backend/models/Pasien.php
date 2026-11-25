<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int|null $id_pengguna
 * @property int $nik
 * @property string|null $alamat
 * @property string|null $tgl_lahir
 * @property int|null $no_telp
 *
 * @property Pengguna $pengguna
 */
class Pasien extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pengguna', 'alamat', 'tgl_lahir', 'no_telp'], 'default', 'value' => null],
            [['id_pengguna', 'nik', 'no_telp'], 'integer'],
            [['nik'], 'required'],
            [['tgl_lahir'], 'safe'],
            [['alamat'], 'string', 'max' => 32],
            [['nik'], 'unique'],
            [['id_pengguna'], 'exist', 'skipOnError' => true, 'targetClass' => Pengguna::class, 'targetAttribute' => ['id_pengguna' => 'id_pengguna']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pengguna' => 'Id Pengguna',
            'nik' => 'Nik',
            'alamat' => 'Alamat',
            'tgl_lahir' => 'Tgl Lahir',
            'no_telp' => 'No Telp',
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

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengguna".
 *
 * @property int $id_pengguna
 * @property string|null $nama
 * @property string|null $email
 * @property string|null $password_hash
 * @property string|null $peran
 *
 * @property AdminKlinik[] $adminKliniks
 * @property Dokter[] $dokters
 * @property Pasien[] $pasiens
 * @property PetugasPendaftaran[] $petugasPendaftarans
 */
class Pengguna extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengguna';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'email', 'password_hash', 'peran'], 'default', 'value' => null],
            [['nama'], 'string', 'max' => 64],
            [['email', 'peran'], 'string', 'max' => 32],
            [['password_hash'], 'string', 'max' => 999],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pengguna' => 'Id Pengguna',
            'nama' => 'Nama',
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'peran' => 'Peran',
        ];
    }

    /**
     * Gets query for [[AdminKliniks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdminKliniks()
    {
        return $this->hasMany(AdminKlinik::class, ['id_pengguna' => 'id_pengguna']);
    }

    /**
     * Gets query for [[Dokters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDokters()
    {
        return $this->hasMany(Dokter::class, ['id_pengguna' => 'id_pengguna']);
    }

    /**
     * Gets query for [[Pasiens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasiens()
    {
        return $this->hasMany(Pasien::class, ['id_pengguna' => 'id_pengguna']);
    }

    /**
     * Gets query for [[PetugasPendaftarans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPetugasPendaftarans()
    {
        return $this->hasMany(PetugasPendaftaran::class, ['id_pengguna' => 'id_pengguna']);
    }

}

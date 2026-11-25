<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "admin_klinik".
 *
 * @property int $id_admin
 * @property int|null $id_pengguna
 *
 * @property Pengguna $pengguna
 */
class AdminKlinik extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_klinik';
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
            'id_admin' => 'Id Admin',
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

<?php

namespace models\base;



/**
 * This is the model class for table "money.device".
 *
 * @property string $device_id
 * @property string $user_id
 * @property string $imei
 * @property string $name
 * @property string $status
 * @property string $changed
 *
 * @property \models\User $user
 */
class BaseDevice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'money.device';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[BaseDevicePeer::USER_ID, BaseDevicePeer::IMEI], 'required'],
            [[BaseDevicePeer::USER_ID, BaseDevicePeer::IMEI], 'integer'],
            [[BaseDevicePeer::STATUS], 'string'],
            [[BaseDevicePeer::CHANGED], 'safe'],
            [[BaseDevicePeer::NAME], 'string', 'max' => 256],
            [[BaseDevicePeer::USER_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseUser::className(), 'targetAttribute' => [BaseDevicePeer::USER_ID => BaseUserPeer::USER_ID]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            BaseDevicePeer::DEVICE_ID => 'Device ID',
            BaseDevicePeer::USER_ID => 'User ID',
            BaseDevicePeer::IMEI => 'Imei',
            BaseDevicePeer::NAME => 'Name',
            BaseDevicePeer::STATUS => 'Status',
            BaseDevicePeer::CHANGED => 'Changed',
        ];
    }
    /**
     * @return \models\UserQuery
     */
    public function getUser() {
        return $this->hasOne(\models\User::className(), [BaseUserPeer::USER_ID => BaseDevicePeer::USER_ID]);
    }
    
    /**
     * @inheritdoc
     * @return \models\DeviceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \models\DeviceQuery(get_called_class());
    }
}

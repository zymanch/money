<?php

namespace models\base;



/**
 * This is the model class for table "money.user".
 *
 * @property string $user_id
 * @property string $advertiser_id
 * @property string $protection_id
 * @property string $email
 * @property string $login
 * @property string $password
 * @property integer $min_payout
 * @property integer $max_payout
 * @property integer $max_payout_per_day
 * @property integer $rate
 * @property string $type
 * @property string $status
 * @property string $changed
 *
 * @property \models\Campaign[] $campaigns
 * @property \models\Device[] $devices
 * @property \models\Hit[] $hits
 * @property \models\Advertiser $advertiser
 * @property \models\Protection $protection
 */
class BaseUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'money.user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[BaseUserPeer::ADVERTISER_ID, BaseUserPeer::PROTECTION_ID, BaseUserPeer::MIN_PAYOUT, BaseUserPeer::MAX_PAYOUT, BaseUserPeer::MAX_PAYOUT_PER_DAY, BaseUserPeer::RATE], 'integer'],
            [[BaseUserPeer::PROTECTION_ID, BaseUserPeer::EMAIL, BaseUserPeer::LOGIN, BaseUserPeer::PASSWORD], 'required'],
            [[BaseUserPeer::TYPE, BaseUserPeer::STATUS], 'string'],
            [[BaseUserPeer::CHANGED], 'safe'],
            [[BaseUserPeer::EMAIL, BaseUserPeer::LOGIN, BaseUserPeer::PASSWORD], 'string', 'max' => 64],
            [[BaseUserPeer::ADVERTISER_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseAdvertiser::className(), 'targetAttribute' => [BaseUserPeer::ADVERTISER_ID => BaseAdvertiserPeer::ADVERTISER_ID]],
            [[BaseUserPeer::PROTECTION_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseProtection::className(), 'targetAttribute' => [BaseUserPeer::PROTECTION_ID => BaseProtectionPeer::PROTECTION_ID]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            BaseUserPeer::USER_ID => 'User ID',
            BaseUserPeer::ADVERTISER_ID => 'Advertiser ID',
            BaseUserPeer::PROTECTION_ID => 'Protection ID',
            BaseUserPeer::EMAIL => 'Email',
            BaseUserPeer::LOGIN => 'Login',
            BaseUserPeer::PASSWORD => 'Password',
            BaseUserPeer::MIN_PAYOUT => 'Min Payout',
            BaseUserPeer::MAX_PAYOUT => 'Max Payout',
            BaseUserPeer::MAX_PAYOUT_PER_DAY => 'Max Payout Per Day',
            BaseUserPeer::RATE => 'Rate',
            BaseUserPeer::TYPE => 'Type',
            BaseUserPeer::STATUS => 'Status',
            BaseUserPeer::CHANGED => 'Changed',
        ];
    }
    /**
     * @return \models\CampaignQuery
     */
    public function getCampaigns() {
        return $this->hasMany(\models\Campaign::className(), [BaseCampaignPeer::USER_ID => BaseUserPeer::USER_ID]);
    }
        /**
     * @return \models\DeviceQuery
     */
    public function getDevices() {
        return $this->hasMany(\models\Device::className(), [BaseDevicePeer::USER_ID => BaseUserPeer::USER_ID]);
    }
        /**
     * @return \models\HitQuery
     */
    public function getHits() {
        return $this->hasMany(\models\Hit::className(), [BaseHitPeer::USER_ID => BaseUserPeer::USER_ID]);
    }
        /**
     * @return \models\AdvertiserQuery
     */
    public function getAdvertiser() {
        return $this->hasOne(\models\Advertiser::className(), [BaseAdvertiserPeer::ADVERTISER_ID => BaseUserPeer::ADVERTISER_ID]);
    }
        /**
     * @return \models\ProtectionQuery
     */
    public function getProtection() {
        return $this->hasOne(\models\Protection::className(), [BaseProtectionPeer::PROTECTION_ID => BaseUserPeer::PROTECTION_ID]);
    }
    
    /**
     * @inheritdoc
     * @return \models\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \models\UserQuery(get_called_class());
    }
}

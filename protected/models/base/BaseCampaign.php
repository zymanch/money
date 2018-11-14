<?php

namespace models\base;



/**
 * This is the model class for table "money.campaign".
 *
 * @property string $campaign_id
 * @property string $user_id
 * @property string $advertiser_id
 * @property string $name
 * @property string $total_balance
 * @property string $current_balance
 * @property string $protection_id
 * @property string $address_id
 * @property string $status
 * @property string $changed
 *
 * @property \models\Banner[] $banners
 * @property \models\Address $address
 * @property \models\Advertiser $advertiser
 * @property \models\Protection $protection
 * @property \models\User $user
 * @property \models\Hit[] $hits
 */
class BaseCampaign extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'money.campaign';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[BaseCampaignPeer::USER_ID, BaseCampaignPeer::ADVERTISER_ID, BaseCampaignPeer::TOTAL_BALANCE, BaseCampaignPeer::CURRENT_BALANCE, BaseCampaignPeer::PROTECTION_ID, BaseCampaignPeer::ADDRESS_ID], 'required'],
            [[BaseCampaignPeer::USER_ID, BaseCampaignPeer::ADVERTISER_ID, BaseCampaignPeer::TOTAL_BALANCE, BaseCampaignPeer::CURRENT_BALANCE, BaseCampaignPeer::PROTECTION_ID, BaseCampaignPeer::ADDRESS_ID], 'integer'],
            [[BaseCampaignPeer::STATUS], 'string'],
            [[BaseCampaignPeer::CHANGED], 'safe'],
            [[BaseCampaignPeer::NAME], 'string', 'max' => 256],
            [[BaseCampaignPeer::ADDRESS_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseAddress::className(), 'targetAttribute' => [BaseCampaignPeer::ADDRESS_ID => BaseAddressPeer::ADDRESS_ID]],
            [[BaseCampaignPeer::ADVERTISER_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseAdvertiser::className(), 'targetAttribute' => [BaseCampaignPeer::ADVERTISER_ID => BaseAdvertiserPeer::ADVERTISER_ID]],
            [[BaseCampaignPeer::PROTECTION_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseProtection::className(), 'targetAttribute' => [BaseCampaignPeer::PROTECTION_ID => BaseProtectionPeer::PROTECTION_ID]],
            [[BaseCampaignPeer::USER_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseUser::className(), 'targetAttribute' => [BaseCampaignPeer::USER_ID => BaseUserPeer::USER_ID]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            BaseCampaignPeer::CAMPAIGN_ID => 'Campaign ID',
            BaseCampaignPeer::USER_ID => 'User ID',
            BaseCampaignPeer::ADVERTISER_ID => 'Advertiser ID',
            BaseCampaignPeer::NAME => 'Name',
            BaseCampaignPeer::TOTAL_BALANCE => 'Total Balance',
            BaseCampaignPeer::CURRENT_BALANCE => 'Current Balance',
            BaseCampaignPeer::PROTECTION_ID => 'Protection ID',
            BaseCampaignPeer::ADDRESS_ID => 'Address ID',
            BaseCampaignPeer::STATUS => 'Status',
            BaseCampaignPeer::CHANGED => 'Changed',
        ];
    }
    /**
     * @return \models\BannerQuery
     */
    public function getBanners() {
        return $this->hasMany(\models\Banner::className(), [BaseBannerPeer::CAMPAIGN_ID => BaseCampaignPeer::CAMPAIGN_ID]);
    }
        /**
     * @return \models\AddressQuery
     */
    public function getAddress() {
        return $this->hasOne(\models\Address::className(), [BaseAddressPeer::ADDRESS_ID => BaseCampaignPeer::ADDRESS_ID]);
    }
        /**
     * @return \models\AdvertiserQuery
     */
    public function getAdvertiser() {
        return $this->hasOne(\models\Advertiser::className(), [BaseAdvertiserPeer::ADVERTISER_ID => BaseCampaignPeer::ADVERTISER_ID]);
    }
        /**
     * @return \models\ProtectionQuery
     */
    public function getProtection() {
        return $this->hasOne(\models\Protection::className(), [BaseProtectionPeer::PROTECTION_ID => BaseCampaignPeer::PROTECTION_ID]);
    }
        /**
     * @return \models\UserQuery
     */
    public function getUser() {
        return $this->hasOne(\models\User::className(), [BaseUserPeer::USER_ID => BaseCampaignPeer::USER_ID]);
    }
        /**
     * @return \models\HitQuery
     */
    public function getHits() {
        return $this->hasMany(\models\Hit::className(), [BaseHitPeer::CAMPAIGN_ID => BaseCampaignPeer::CAMPAIGN_ID]);
    }
    
    /**
     * @inheritdoc
     * @return \models\CampaignQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \models\CampaignQuery(get_called_class());
    }
}

<?php

namespace models\base;



/**
 * This is the model class for table "money.address".
 *
 * @property string $address_id
 * @property string $advertiser_id
 * @property string $name
 * @property string $address
 * @property string $latitude
 * @property string $longitude
 * @property string $phone
 * @property string $site
 * @property string $status
 * @property string $changed
 *
 * @property \models\Advertiser $advertiser
 * @property \models\Campaign[] $campaigns
 */
class BaseAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'money.address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[BaseAddressPeer::ADVERTISER_ID], 'required'],
            [[BaseAddressPeer::ADVERTISER_ID, BaseAddressPeer::PHONE], 'integer'],
            [[BaseAddressPeer::ADDRESS, BaseAddressPeer::STATUS], 'string'],
            [[BaseAddressPeer::LATITUDE, BaseAddressPeer::LONGITUDE], 'number'],
            [[BaseAddressPeer::CHANGED], 'safe'],
            [[BaseAddressPeer::NAME], 'string', 'max' => 256],
            [[BaseAddressPeer::SITE], 'string', 'max' => 128],
            [[BaseAddressPeer::ADVERTISER_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseAdvertiser::className(), 'targetAttribute' => [BaseAddressPeer::ADVERTISER_ID => BaseAdvertiserPeer::ADVERTISER_ID]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            BaseAddressPeer::ADDRESS_ID => 'Address ID',
            BaseAddressPeer::ADVERTISER_ID => 'Advertiser ID',
            BaseAddressPeer::NAME => 'Name',
            BaseAddressPeer::ADDRESS => 'Address',
            BaseAddressPeer::LATITUDE => 'Latitude',
            BaseAddressPeer::LONGITUDE => 'Longitude',
            BaseAddressPeer::PHONE => 'Phone',
            BaseAddressPeer::SITE => 'Site',
            BaseAddressPeer::STATUS => 'Status',
            BaseAddressPeer::CHANGED => 'Changed',
        ];
    }
    /**
     * @return \models\AdvertiserQuery
     */
    public function getAdvertiser() {
        return $this->hasOne(\models\Advertiser::className(), [BaseAdvertiserPeer::ADVERTISER_ID => BaseAddressPeer::ADVERTISER_ID]);
    }
        /**
     * @return \models\CampaignQuery
     */
    public function getCampaigns() {
        return $this->hasMany(\models\Campaign::className(), [BaseCampaignPeer::ADDRESS_ID => BaseAddressPeer::ADDRESS_ID]);
    }
    
    /**
     * @inheritdoc
     * @return \models\AddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \models\AddressQuery(get_called_class());
    }
}

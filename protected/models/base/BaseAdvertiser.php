<?php

namespace models\base;



/**
 * This is the model class for table "money.advertiser".
 *
 * @property string $advertiser_id
 * @property string $balance
 * @property string $spent
 * @property string $name
 * @property string $status
 * @property string $changed
 *
 * @property \models\Address[] $addresses
 * @property \models\Campaign[] $campaigns
 * @property \models\User[] $users
 */
class BaseAdvertiser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'money.advertiser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[BaseAdvertiserPeer::BALANCE, BaseAdvertiserPeer::SPENT], 'required'],
            [[BaseAdvertiserPeer::BALANCE, BaseAdvertiserPeer::SPENT], 'number'],
            [[BaseAdvertiserPeer::STATUS], 'string'],
            [[BaseAdvertiserPeer::CHANGED], 'safe'],
            [[BaseAdvertiserPeer::NAME], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            BaseAdvertiserPeer::ADVERTISER_ID => 'Advertiser ID',
            BaseAdvertiserPeer::BALANCE => 'Balance',
            BaseAdvertiserPeer::SPENT => 'Spent',
            BaseAdvertiserPeer::NAME => 'Name',
            BaseAdvertiserPeer::STATUS => 'Status',
            BaseAdvertiserPeer::CHANGED => 'Changed',
        ];
    }
    /**
     * @return \models\AddressQuery
     */
    public function getAddresses() {
        return $this->hasMany(\models\Address::className(), [BaseAddressPeer::ADVERTISER_ID => BaseAdvertiserPeer::ADVERTISER_ID]);
    }
        /**
     * @return \models\CampaignQuery
     */
    public function getCampaigns() {
        return $this->hasMany(\models\Campaign::className(), [BaseCampaignPeer::ADVERTISER_ID => BaseAdvertiserPeer::ADVERTISER_ID]);
    }
        /**
     * @return \models\UserQuery
     */
    public function getUsers() {
        return $this->hasMany(\models\User::className(), [BaseUserPeer::ADVERTISER_ID => BaseAdvertiserPeer::ADVERTISER_ID]);
    }
    
    /**
     * @inheritdoc
     * @return \models\AdvertiserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \models\AdvertiserQuery(get_called_class());
    }
}

<?php

namespace models\base;



/**
 * This is the model class for table "money.hit".
 *
 * @property string $hit_id
 * @property string $user_id
 * @property string $campaign_id
 * @property string $banner_id
 * @property string $user_obtain
 * @property string $advertiser_spent
 * @property string $status
 * @property string $changed
 *
 * @property \models\Banner $banner
 * @property \models\Campaign $campaign
 * @property \models\User $user
 */
class BaseHit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'money.hit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[BaseHitPeer::USER_ID, BaseHitPeer::CAMPAIGN_ID, BaseHitPeer::BANNER_ID, BaseHitPeer::USER_OBTAIN, BaseHitPeer::ADVERTISER_SPENT], 'required'],
            [[BaseHitPeer::USER_ID, BaseHitPeer::CAMPAIGN_ID, BaseHitPeer::BANNER_ID], 'integer'],
            [[BaseHitPeer::USER_OBTAIN, BaseHitPeer::ADVERTISER_SPENT], 'number'],
            [[BaseHitPeer::STATUS], 'string'],
            [[BaseHitPeer::CHANGED], 'safe'],
            [[BaseHitPeer::BANNER_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseBanner::className(), 'targetAttribute' => [BaseHitPeer::BANNER_ID => BaseBannerPeer::BANNER_ID]],
            [[BaseHitPeer::CAMPAIGN_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseCampaign::className(), 'targetAttribute' => [BaseHitPeer::CAMPAIGN_ID => BaseCampaignPeer::CAMPAIGN_ID]],
            [[BaseHitPeer::USER_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseUser::className(), 'targetAttribute' => [BaseHitPeer::USER_ID => BaseUserPeer::USER_ID]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            BaseHitPeer::HIT_ID => 'Hit ID',
            BaseHitPeer::USER_ID => 'User ID',
            BaseHitPeer::CAMPAIGN_ID => 'Campaign ID',
            BaseHitPeer::BANNER_ID => 'Banner ID',
            BaseHitPeer::USER_OBTAIN => 'User Obtain',
            BaseHitPeer::ADVERTISER_SPENT => 'Advertiser Spent',
            BaseHitPeer::STATUS => 'Status',
            BaseHitPeer::CHANGED => 'Changed',
        ];
    }
    /**
     * @return \models\BannerQuery
     */
    public function getBanner() {
        return $this->hasOne(\models\Banner::className(), [BaseBannerPeer::BANNER_ID => BaseHitPeer::BANNER_ID]);
    }
        /**
     * @return \models\CampaignQuery
     */
    public function getCampaign() {
        return $this->hasOne(\models\Campaign::className(), [BaseCampaignPeer::CAMPAIGN_ID => BaseHitPeer::CAMPAIGN_ID]);
    }
        /**
     * @return \models\UserQuery
     */
    public function getUser() {
        return $this->hasOne(\models\User::className(), [BaseUserPeer::USER_ID => BaseHitPeer::USER_ID]);
    }
    
    /**
     * @inheritdoc
     * @return \models\HitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \models\HitQuery(get_called_class());
    }
}

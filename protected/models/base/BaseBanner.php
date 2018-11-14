<?php

namespace models\base;



/**
 * This is the model class for table "money.banner".
 *
 * @property string $banner_id
 * @property string $campaign_id
 * @property string $name
 * @property string $filename
 * @property string $width
 * @property string $height
 * @property string $duration
 * @property string $last_show
 * @property string $status
 * @property string $changed
 *
 * @property \models\Campaign $campaign
 * @property \models\Hit[] $hits
 */
class BaseBanner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'money.banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[BaseBannerPeer::CAMPAIGN_ID, BaseBannerPeer::FILENAME, BaseBannerPeer::WIDTH, BaseBannerPeer::HEIGHT], 'required'],
            [[BaseBannerPeer::CAMPAIGN_ID, BaseBannerPeer::WIDTH, BaseBannerPeer::HEIGHT, BaseBannerPeer::DURATION], 'integer'],
            [[BaseBannerPeer::LAST_SHOW, BaseBannerPeer::CHANGED], 'safe'],
            [[BaseBannerPeer::STATUS], 'string'],
            [[BaseBannerPeer::NAME], 'string', 'max' => 256],
            [[BaseBannerPeer::FILENAME], 'string', 'max' => 128],
            [[BaseBannerPeer::CAMPAIGN_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseCampaign::className(), 'targetAttribute' => [BaseBannerPeer::CAMPAIGN_ID => BaseCampaignPeer::CAMPAIGN_ID]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            BaseBannerPeer::BANNER_ID => 'Banner ID',
            BaseBannerPeer::CAMPAIGN_ID => 'Campaign ID',
            BaseBannerPeer::NAME => 'Name',
            BaseBannerPeer::FILENAME => 'Filename',
            BaseBannerPeer::WIDTH => 'Width',
            BaseBannerPeer::HEIGHT => 'Height',
            BaseBannerPeer::DURATION => 'Duration',
            BaseBannerPeer::LAST_SHOW => 'Last Show',
            BaseBannerPeer::STATUS => 'Status',
            BaseBannerPeer::CHANGED => 'Changed',
        ];
    }
    /**
     * @return \models\CampaignQuery
     */
    public function getCampaign() {
        return $this->hasOne(\models\Campaign::className(), [BaseCampaignPeer::CAMPAIGN_ID => BaseBannerPeer::CAMPAIGN_ID]);
    }
        /**
     * @return \models\HitQuery
     */
    public function getHits() {
        return $this->hasMany(\models\Hit::className(), [BaseHitPeer::BANNER_ID => BaseBannerPeer::BANNER_ID]);
    }
    
    /**
     * @inheritdoc
     * @return \models\BannerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \models\BannerQuery(get_called_class());
    }
}

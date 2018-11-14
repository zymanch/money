<?php

namespace models\base;



/**
 * This is the model class for table "money.protection".
 *
 * @property string $protection_id
 * @property string $total_min
 * @property string $total_max
 * @property string $total_current
 * @property string $day_max
 * @property string $day_current
 * @property string $day
 * @property string $status
 * @property string $changed
 *
 * @property \models\Campaign[] $campaigns
 * @property \models\User[] $users
 */
class BaseProtection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'money.protection';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[BaseProtectionPeer::TOTAL_MIN, BaseProtectionPeer::TOTAL_MAX, BaseProtectionPeer::TOTAL_CURRENT, BaseProtectionPeer::DAY_MAX, BaseProtectionPeer::DAY_CURRENT], 'number'],
            [[BaseProtectionPeer::TOTAL_MAX, BaseProtectionPeer::TOTAL_CURRENT, BaseProtectionPeer::DAY_MAX, BaseProtectionPeer::DAY_CURRENT], 'required'],
            [[BaseProtectionPeer::DAY, BaseProtectionPeer::CHANGED], 'safe'],
            [[BaseProtectionPeer::STATUS], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            BaseProtectionPeer::PROTECTION_ID => 'Protection ID',
            BaseProtectionPeer::TOTAL_MIN => 'Total Min',
            BaseProtectionPeer::TOTAL_MAX => 'Total Max',
            BaseProtectionPeer::TOTAL_CURRENT => 'Total Current',
            BaseProtectionPeer::DAY_MAX => 'Day Max',
            BaseProtectionPeer::DAY_CURRENT => 'Day Current',
            BaseProtectionPeer::DAY => 'Day',
            BaseProtectionPeer::STATUS => 'Status',
            BaseProtectionPeer::CHANGED => 'Changed',
        ];
    }
    /**
     * @return \models\CampaignQuery
     */
    public function getCampaigns() {
        return $this->hasMany(\models\Campaign::className(), [BaseCampaignPeer::PROTECTION_ID => BaseProtectionPeer::PROTECTION_ID]);
    }
        /**
     * @return \models\UserQuery
     */
    public function getUsers() {
        return $this->hasMany(\models\User::className(), [BaseUserPeer::PROTECTION_ID => BaseProtectionPeer::PROTECTION_ID]);
    }
    
    /**
     * @inheritdoc
     * @return \models\ProtectionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \models\ProtectionQuery(get_called_class());
    }
}

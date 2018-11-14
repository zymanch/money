<?php

namespace models\base;
use ActiveGenerator\Criteria;
use models\AdvertiserQuery;

/**
 * This is the ActiveQuery class for [[models\Advertiser]].
 * @method AdvertiserQuery filterByAdvertiserId($value, $criteria = null)
 * @method AdvertiserQuery filterByBalance($value, $criteria = null)
 * @method AdvertiserQuery filterBySpent($value, $criteria = null)
 * @method AdvertiserQuery filterByName($value, $criteria = null)
 * @method AdvertiserQuery filterByStatus($value, $criteria = null)
 * @method AdvertiserQuery filterByChanged($value, $criteria = null)
  * @method AdvertiserQuery orderByAdvertiserId($order = Criteria::ASC)
  * @method AdvertiserQuery orderByBalance($order = Criteria::ASC)
  * @method AdvertiserQuery orderBySpent($order = Criteria::ASC)
  * @method AdvertiserQuery orderByName($order = Criteria::ASC)
  * @method AdvertiserQuery orderByStatus($order = Criteria::ASC)
  * @method AdvertiserQuery orderByChanged($order = Criteria::ASC)
  * @method AdvertiserQuery withAddresses($params = [])
  * @method AdvertiserQuery joinWithAddresses($params = null, $joinType = 'LEFT JOIN')
  * @method AdvertiserQuery withCampaigns($params = [])
  * @method AdvertiserQuery joinWithCampaigns($params = null, $joinType = 'LEFT JOIN')
  * @method AdvertiserQuery withUsers($params = [])
  * @method AdvertiserQuery joinWithUsers($params = null, $joinType = 'LEFT JOIN')
 */
class BaseAdvertiserQuery extends \yii\db\ActiveQuery
{


    use \ActiveGenerator\base\RichActiveMethods;

    /**
     * @inheritdoc
     * @return \models\Advertiser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \models\Advertiser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return \models\AdvertiserQuery     */
    public static function model()
    {
        return new \models\AdvertiserQuery(\models\Advertiser::class);
    }
}

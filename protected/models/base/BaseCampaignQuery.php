<?php

namespace models\base;
use ActiveGenerator\Criteria;
use models\CampaignQuery;

/**
 * This is the ActiveQuery class for [[models\Campaign]].
 * @method CampaignQuery filterByCampaignId($value, $criteria = null)
 * @method CampaignQuery filterByUserId($value, $criteria = null)
 * @method CampaignQuery filterByAdvertiserId($value, $criteria = null)
 * @method CampaignQuery filterByName($value, $criteria = null)
 * @method CampaignQuery filterByTotalBalance($value, $criteria = null)
 * @method CampaignQuery filterByCurrentBalance($value, $criteria = null)
 * @method CampaignQuery filterByProtectionId($value, $criteria = null)
 * @method CampaignQuery filterByAddressId($value, $criteria = null)
 * @method CampaignQuery filterByStatus($value, $criteria = null)
 * @method CampaignQuery filterByChanged($value, $criteria = null)
  * @method CampaignQuery orderByCampaignId($order = Criteria::ASC)
  * @method CampaignQuery orderByUserId($order = Criteria::ASC)
  * @method CampaignQuery orderByAdvertiserId($order = Criteria::ASC)
  * @method CampaignQuery orderByName($order = Criteria::ASC)
  * @method CampaignQuery orderByTotalBalance($order = Criteria::ASC)
  * @method CampaignQuery orderByCurrentBalance($order = Criteria::ASC)
  * @method CampaignQuery orderByProtectionId($order = Criteria::ASC)
  * @method CampaignQuery orderByAddressId($order = Criteria::ASC)
  * @method CampaignQuery orderByStatus($order = Criteria::ASC)
  * @method CampaignQuery orderByChanged($order = Criteria::ASC)
  * @method CampaignQuery withBanners($params = [])
  * @method CampaignQuery joinWithBanners($params = null, $joinType = 'LEFT JOIN')
  * @method CampaignQuery withAddress($params = [])
  * @method CampaignQuery joinWithAddress($params = null, $joinType = 'LEFT JOIN')
  * @method CampaignQuery withAdvertiser($params = [])
  * @method CampaignQuery joinWithAdvertiser($params = null, $joinType = 'LEFT JOIN')
  * @method CampaignQuery withProtection($params = [])
  * @method CampaignQuery joinWithProtection($params = null, $joinType = 'LEFT JOIN')
  * @method CampaignQuery withUser($params = [])
  * @method CampaignQuery joinWithUser($params = null, $joinType = 'LEFT JOIN')
  * @method CampaignQuery withHits($params = [])
  * @method CampaignQuery joinWithHits($params = null, $joinType = 'LEFT JOIN')
 */
class BaseCampaignQuery extends \yii\db\ActiveQuery
{


    use \ActiveGenerator\base\RichActiveMethods;

    /**
     * @inheritdoc
     * @return \models\Campaign[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \models\Campaign|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return \models\CampaignQuery     */
    public static function model()
    {
        return new \models\CampaignQuery(\models\Campaign::class);
    }
}

<?php

namespace models\base;
use ActiveGenerator\Criteria;
use models\HitQuery;

/**
 * This is the ActiveQuery class for [[models\Hit]].
 * @method HitQuery filterByHitId($value, $criteria = null)
 * @method HitQuery filterByUserId($value, $criteria = null)
 * @method HitQuery filterByCampaignId($value, $criteria = null)
 * @method HitQuery filterByBannerId($value, $criteria = null)
 * @method HitQuery filterByUserObtain($value, $criteria = null)
 * @method HitQuery filterByAdvertiserSpent($value, $criteria = null)
 * @method HitQuery filterByStatus($value, $criteria = null)
 * @method HitQuery filterByChanged($value, $criteria = null)
  * @method HitQuery orderByHitId($order = Criteria::ASC)
  * @method HitQuery orderByUserId($order = Criteria::ASC)
  * @method HitQuery orderByCampaignId($order = Criteria::ASC)
  * @method HitQuery orderByBannerId($order = Criteria::ASC)
  * @method HitQuery orderByUserObtain($order = Criteria::ASC)
  * @method HitQuery orderByAdvertiserSpent($order = Criteria::ASC)
  * @method HitQuery orderByStatus($order = Criteria::ASC)
  * @method HitQuery orderByChanged($order = Criteria::ASC)
  * @method HitQuery withBanner($params = [])
  * @method HitQuery joinWithBanner($params = null, $joinType = 'LEFT JOIN')
  * @method HitQuery withCampaign($params = [])
  * @method HitQuery joinWithCampaign($params = null, $joinType = 'LEFT JOIN')
  * @method HitQuery withUser($params = [])
  * @method HitQuery joinWithUser($params = null, $joinType = 'LEFT JOIN')
 */
class BaseHitQuery extends \yii\db\ActiveQuery
{


    use \ActiveGenerator\base\RichActiveMethods;

    /**
     * @inheritdoc
     * @return \models\Hit[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \models\Hit|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return \models\HitQuery     */
    public static function model()
    {
        return new \models\HitQuery(\models\Hit::class);
    }
}

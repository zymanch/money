<?php

namespace models\base;
use ActiveGenerator\Criteria;
use models\UserQuery;

/**
 * This is the ActiveQuery class for [[models\User]].
 * @method UserQuery filterByUserId($value, $criteria = null)
 * @method UserQuery filterByAdvertiserId($value, $criteria = null)
 * @method UserQuery filterByProtectionId($value, $criteria = null)
 * @method UserQuery filterByEmail($value, $criteria = null)
 * @method UserQuery filterByLogin($value, $criteria = null)
 * @method UserQuery filterByPassword($value, $criteria = null)
 * @method UserQuery filterByMinPayout($value, $criteria = null)
 * @method UserQuery filterByMaxPayout($value, $criteria = null)
 * @method UserQuery filterByMaxPayoutPerDay($value, $criteria = null)
 * @method UserQuery filterByRate($value, $criteria = null)
 * @method UserQuery filterByType($value, $criteria = null)
 * @method UserQuery filterByStatus($value, $criteria = null)
 * @method UserQuery filterByChanged($value, $criteria = null)
  * @method UserQuery orderByUserId($order = Criteria::ASC)
  * @method UserQuery orderByAdvertiserId($order = Criteria::ASC)
  * @method UserQuery orderByProtectionId($order = Criteria::ASC)
  * @method UserQuery orderByEmail($order = Criteria::ASC)
  * @method UserQuery orderByLogin($order = Criteria::ASC)
  * @method UserQuery orderByPassword($order = Criteria::ASC)
  * @method UserQuery orderByMinPayout($order = Criteria::ASC)
  * @method UserQuery orderByMaxPayout($order = Criteria::ASC)
  * @method UserQuery orderByMaxPayoutPerDay($order = Criteria::ASC)
  * @method UserQuery orderByRate($order = Criteria::ASC)
  * @method UserQuery orderByType($order = Criteria::ASC)
  * @method UserQuery orderByStatus($order = Criteria::ASC)
  * @method UserQuery orderByChanged($order = Criteria::ASC)
  * @method UserQuery withCampaigns($params = [])
  * @method UserQuery joinWithCampaigns($params = null, $joinType = 'LEFT JOIN')
  * @method UserQuery withDevices($params = [])
  * @method UserQuery joinWithDevices($params = null, $joinType = 'LEFT JOIN')
  * @method UserQuery withHits($params = [])
  * @method UserQuery joinWithHits($params = null, $joinType = 'LEFT JOIN')
  * @method UserQuery withAdvertiser($params = [])
  * @method UserQuery joinWithAdvertiser($params = null, $joinType = 'LEFT JOIN')
  * @method UserQuery withProtection($params = [])
  * @method UserQuery joinWithProtection($params = null, $joinType = 'LEFT JOIN')
 */
class BaseUserQuery extends \yii\db\ActiveQuery
{


    use \ActiveGenerator\base\RichActiveMethods;

    /**
     * @inheritdoc
     * @return \models\User[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \models\User|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return \models\UserQuery     */
    public static function model()
    {
        return new \models\UserQuery(\models\User::class);
    }
}

<?php

namespace models\base;
use ActiveGenerator\Criteria;
use models\ProtectionQuery;

/**
 * This is the ActiveQuery class for [[models\Protection]].
 * @method ProtectionQuery filterByProtectionId($value, $criteria = null)
 * @method ProtectionQuery filterByTotalMin($value, $criteria = null)
 * @method ProtectionQuery filterByTotalMax($value, $criteria = null)
 * @method ProtectionQuery filterByTotalCurrent($value, $criteria = null)
 * @method ProtectionQuery filterByDayMax($value, $criteria = null)
 * @method ProtectionQuery filterByDayCurrent($value, $criteria = null)
 * @method ProtectionQuery filterByDay($value, $criteria = null)
 * @method ProtectionQuery filterByStatus($value, $criteria = null)
 * @method ProtectionQuery filterByChanged($value, $criteria = null)
  * @method ProtectionQuery orderByProtectionId($order = Criteria::ASC)
  * @method ProtectionQuery orderByTotalMin($order = Criteria::ASC)
  * @method ProtectionQuery orderByTotalMax($order = Criteria::ASC)
  * @method ProtectionQuery orderByTotalCurrent($order = Criteria::ASC)
  * @method ProtectionQuery orderByDayMax($order = Criteria::ASC)
  * @method ProtectionQuery orderByDayCurrent($order = Criteria::ASC)
  * @method ProtectionQuery orderByDay($order = Criteria::ASC)
  * @method ProtectionQuery orderByStatus($order = Criteria::ASC)
  * @method ProtectionQuery orderByChanged($order = Criteria::ASC)
  * @method ProtectionQuery withCampaigns($params = [])
  * @method ProtectionQuery joinWithCampaigns($params = null, $joinType = 'LEFT JOIN')
  * @method ProtectionQuery withUsers($params = [])
  * @method ProtectionQuery joinWithUsers($params = null, $joinType = 'LEFT JOIN')
 */
class BaseProtectionQuery extends \yii\db\ActiveQuery
{


    use \ActiveGenerator\base\RichActiveMethods;

    /**
     * @inheritdoc
     * @return \models\Protection[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \models\Protection|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return \models\ProtectionQuery     */
    public static function model()
    {
        return new \models\ProtectionQuery(\models\Protection::class);
    }
}

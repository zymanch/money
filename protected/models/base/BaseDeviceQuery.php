<?php

namespace models\base;
use ActiveGenerator\Criteria;
use models\DeviceQuery;

/**
 * This is the ActiveQuery class for [[models\Device]].
 * @method DeviceQuery filterByDeviceId($value, $criteria = null)
 * @method DeviceQuery filterByUserId($value, $criteria = null)
 * @method DeviceQuery filterByImei($value, $criteria = null)
 * @method DeviceQuery filterByName($value, $criteria = null)
 * @method DeviceQuery filterByStatus($value, $criteria = null)
 * @method DeviceQuery filterByChanged($value, $criteria = null)
  * @method DeviceQuery orderByDeviceId($order = Criteria::ASC)
  * @method DeviceQuery orderByUserId($order = Criteria::ASC)
  * @method DeviceQuery orderByImei($order = Criteria::ASC)
  * @method DeviceQuery orderByName($order = Criteria::ASC)
  * @method DeviceQuery orderByStatus($order = Criteria::ASC)
  * @method DeviceQuery orderByChanged($order = Criteria::ASC)
  * @method DeviceQuery withUser($params = [])
  * @method DeviceQuery joinWithUser($params = null, $joinType = 'LEFT JOIN')
 */
class BaseDeviceQuery extends \yii\db\ActiveQuery
{


    use \ActiveGenerator\base\RichActiveMethods;

    /**
     * @inheritdoc
     * @return \models\Device[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \models\Device|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return \models\DeviceQuery     */
    public static function model()
    {
        return new \models\DeviceQuery(\models\Device::class);
    }
}

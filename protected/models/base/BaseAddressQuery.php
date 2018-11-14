<?php

namespace models\base;
use ActiveGenerator\Criteria;
use models\AddressQuery;

/**
 * This is the ActiveQuery class for [[models\Address]].
 * @method AddressQuery filterByAddressId($value, $criteria = null)
 * @method AddressQuery filterByAdvertiserId($value, $criteria = null)
 * @method AddressQuery filterByName($value, $criteria = null)
 * @method AddressQuery filterByAddress($value, $criteria = null)
 * @method AddressQuery filterByLatitude($value, $criteria = null)
 * @method AddressQuery filterByLongitude($value, $criteria = null)
 * @method AddressQuery filterByPhone($value, $criteria = null)
 * @method AddressQuery filterBySite($value, $criteria = null)
 * @method AddressQuery filterByStatus($value, $criteria = null)
 * @method AddressQuery filterByChanged($value, $criteria = null)
  * @method AddressQuery orderByAddressId($order = Criteria::ASC)
  * @method AddressQuery orderByAdvertiserId($order = Criteria::ASC)
  * @method AddressQuery orderByName($order = Criteria::ASC)
  * @method AddressQuery orderByAddress($order = Criteria::ASC)
  * @method AddressQuery orderByLatitude($order = Criteria::ASC)
  * @method AddressQuery orderByLongitude($order = Criteria::ASC)
  * @method AddressQuery orderByPhone($order = Criteria::ASC)
  * @method AddressQuery orderBySite($order = Criteria::ASC)
  * @method AddressQuery orderByStatus($order = Criteria::ASC)
  * @method AddressQuery orderByChanged($order = Criteria::ASC)
  * @method AddressQuery withAdvertiser($params = [])
  * @method AddressQuery joinWithAdvertiser($params = null, $joinType = 'LEFT JOIN')
  * @method AddressQuery withCampaigns($params = [])
  * @method AddressQuery joinWithCampaigns($params = null, $joinType = 'LEFT JOIN')
 */
class BaseAddressQuery extends \yii\db\ActiveQuery
{


    use \ActiveGenerator\base\RichActiveMethods;

    /**
     * @inheritdoc
     * @return \models\Address[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \models\Address|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return \models\AddressQuery     */
    public static function model()
    {
        return new \models\AddressQuery(\models\Address::class);
    }
}

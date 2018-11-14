<?php

namespace models\base;
use ActiveGenerator\Criteria;
use models\BannerQuery;

/**
 * This is the ActiveQuery class for [[models\Banner]].
 * @method BannerQuery filterByBannerId($value, $criteria = null)
 * @method BannerQuery filterByCampaignId($value, $criteria = null)
 * @method BannerQuery filterByName($value, $criteria = null)
 * @method BannerQuery filterByFilename($value, $criteria = null)
 * @method BannerQuery filterByWidth($value, $criteria = null)
 * @method BannerQuery filterByHeight($value, $criteria = null)
 * @method BannerQuery filterByDuration($value, $criteria = null)
 * @method BannerQuery filterByLastShow($value, $criteria = null)
 * @method BannerQuery filterByStatus($value, $criteria = null)
 * @method BannerQuery filterByChanged($value, $criteria = null)
  * @method BannerQuery orderByBannerId($order = Criteria::ASC)
  * @method BannerQuery orderByCampaignId($order = Criteria::ASC)
  * @method BannerQuery orderByName($order = Criteria::ASC)
  * @method BannerQuery orderByFilename($order = Criteria::ASC)
  * @method BannerQuery orderByWidth($order = Criteria::ASC)
  * @method BannerQuery orderByHeight($order = Criteria::ASC)
  * @method BannerQuery orderByDuration($order = Criteria::ASC)
  * @method BannerQuery orderByLastShow($order = Criteria::ASC)
  * @method BannerQuery orderByStatus($order = Criteria::ASC)
  * @method BannerQuery orderByChanged($order = Criteria::ASC)
  * @method BannerQuery withCampaign($params = [])
  * @method BannerQuery joinWithCampaign($params = null, $joinType = 'LEFT JOIN')
  * @method BannerQuery withHits($params = [])
  * @method BannerQuery joinWithHits($params = null, $joinType = 'LEFT JOIN')
 */
class BaseBannerQuery extends \yii\db\ActiveQuery
{


    use \ActiveGenerator\base\RichActiveMethods;

    /**
     * @inheritdoc
     * @return \models\Banner[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \models\Banner|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return \models\BannerQuery     */
    public static function model()
    {
        return new \models\BannerQuery(\models\Banner::class);
    }
}

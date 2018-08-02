<?php
/**
 * Created by PhpStorm.
 * User: royalwang
 * Date: 2018/8/2
 * Time: 1:02 PM
 */

namespace Ecjia\App\Market\Prize;


class PrizeType
{

    /**
     * 未中奖
     */
    const TYPE_NONE     = 0;


    /**
     * 礼券红包
     */
    const TYPE_BONUS    = 1;

    /**
     * 实物奖品
     */
    const TYPE_REAL     = 2;

    /**
     * 积分奖励
     */
    const TYPE_INTEGRAL  = 3;

    /**
     * 商品展示
     */
    const TYPE_GOODS    = 4;

    /**
     * 店铺展示
     */
    const TYPE_STORE    = 5;

    /**
     * 现金红包
     */
    const TYPE_BALANCE  = 6;


    protected static $typeNames = [
        TYPE_NONE       => '未中奖',
        TYPE_BONUS      => '礼券红包',
        TYPE_REAL       => '实物奖品',
        TYPE_INTEGRAL   => '积分奖励',
        TYPE_GOODS      => '商品展示',
        TYPE_STORE      => '店铺展示',
        TYPE_BALANCE    => '现金红包',
    ];


    public static function getPrizeTypes()
    {
        return self::$typeNames;
    }


}
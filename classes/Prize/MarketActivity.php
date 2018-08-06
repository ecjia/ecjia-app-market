<?php
/**
 * Created by PhpStorm.
 * User: royalwang
 * Date: 2018/8/6
 * Time: 10:12 AM
 */

namespace Ecjia\App\Market\Prize;

use Ecjia\App\Market\Models\MarketActivityModel;
use Ecjia\App\Market\Models\MarketActivityLotteryModel;

class MarketActivity
{

    protected $wechat_id;

    protected $store_id;

    protected $activity_code;


    protected $model;

    protected $prize;


    public function __construct($activity_code, $store_id = 0, $wechat_id = 0)
    {
        $this->activity_code = $activity_code;
        $this->store_id = $store_id;
        $this->wechat_id = $wechat_id;

        $this->model = $this->getMarketActivity();

        $this->prize = new ActivityPrize($this->model);
    }

    public function getMarketActivity()
    {
        return MarketActivityModel::where('store_id', $this->store_id)->where('wechat_id', $this->wechat_id)->where('activity_group', $this->activity_code)->first();
    }

    /**
     * 获取用户的抽奖次数
     * @param $openid
     * @return int
     */
    public function getLotteryCount($openid)
    {
        if ($this->model->limit_num > 0) {
            $starttime = $this->model->start_time;
            $endtime = $this->model->end_time;
            $time = RC_Time::gmtime();

            $time_limit = $time - $this->model->limit_time * 60;

            $market_activity_lottery = $this->model->MarketActivityLottery()->where('user_id', $openid)
                ->where('update_time', '<=', $time)
                ->where('add_time', '>=', $time_limit)
                ->first();

            //限定时间已抽取的次数
            $has_used_count = $market_activity_lottery->lottery_num;

            //剩余可抽取的次数
            $prize_num = $this->model->limit_num - $has_used_count;

        } else {
            $prize_num = -1; //无限次
        }

        return $prize_num;
    }

    /**
     * 获取活动的奖品
     */
    public function getPrizes()
    {
        return $this->prize->getPrizes();
    }


    public function getCanWinningPrizes()
    {
        return $this->prize->getCanWinningPrizes();
    }

    /**
     * 获取活动中奖的记录
     */
    public function getActivityWinningLog()
    {
        $types = $this->getCanWinningPrizes();

        $model = $this->model;

        $data = MarketActivityModel::with(['MarketActivityLog' => function ($query) use ($types, $model) {
            $query->whereIn('market_activity_log.prize_id', $types)
                ->where('market_activity_log.add_time', '>=', $model->start_time)
                ->where('market_activity_log.add_time', '<=', $model->end_time)
                ->orderBy('market_activity_log.add_time', 'DESC')
                ->take(10);
        }])->where('market_activity.store_id', $this->store_id)
            ->where('market_activity.wechat_id', $this->wechat_id)
            ->where('market_activity.activity_group', $this->activity_code)
            ->first();


        $prize = $this->prize;

        $newdata = $data->MarketActivityLog->map(function ($item) use (& $bound_ids, $prize) {
            //奖品为红包的时候，查询红包信息
            if ($item->MarketActivityPrize->prize_type == PrizeType::TYPE_BONUS) {

                $bonus = $item->MarketActivityPrize->BonusType;
                $prize_value = $bonus->type_money;
                $prize_value = ecjia_price_format($prize_value, false);
                $item->prize_value = $prize_value;

            } else {
                $item->prize_value = $item->MarketActivityPrize->prize_value;
            }

            return $item;
        });

        return $newdata;

    }


}
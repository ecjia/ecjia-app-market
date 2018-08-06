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

        $this->prize = new ActivityPrize($this->model);

        return $this->prize->getPrizes();
    }

    /**
     * 获取活动中奖的记录
     */
    public function getActivityWinningLog()
    {
        $types = PrizeType::getCanPrizeType();
//        dd($this->model);
        $data = $this->model->MarketActivityLog()->whereIn('prize_type', $types)
            ->where('add_time', '>=', $this->model->start_time)
            ->where('add_time', '<=', $this->model->end_time)
            ->take(10)
            ->get();

//        $data = $this->model->whereHas('MarketActivityLog', function ($query) use ($types) {
//            $query->whereIn('prize_type', $types)
//                ->where('add_time', '>=', $this->model->start_time)
//                ->where('add_time', '<=', $this->model->end_time)
//                ->take(10)
//                ->get();
//        })->get();

        dd($data);

        $bound_ids = [];
        $data->map(function ($item) use (& $bound_ids) {
            if ($item->MarketActivityPrize->prize_type == PrizeType::TYPE_BONUS) {
                $bound_ids[] = $item->MarketActivityPrize->prize_id;
                $bonus = $item->MarketActivityPrize->BonusType();

                dd($bonus);
            }
        });



    }


}
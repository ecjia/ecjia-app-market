<?php
/**
 * Created by PhpStorm.
 * User: royalwang
 * Date: 2018/7/23
 * Time: 11:56 AM
 */

namespace Ecjia\App\Market\Activities;


use Ecjia\App\Market\AbstractActivity;

class MobileShake extends AbstractActivity
{

    /**
     * 代号标识
     * @var string
     */
    protected $code = 'mobile_shake';

    /**
     * 名称
     * @var string
     */
    protected $name = '手机摇一摇';

    /**
     * 描述
     * @var string
     */
    protected $description = '通过手机摇一摇参与活动';

    /**
     * 图标
     * @var string
     */
    protected $icon = '/statics/images/icon/mobile_shake.png'; //图片未添加


    public function run() {



    }


}
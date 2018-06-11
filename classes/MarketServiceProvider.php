<?php

namespace Ecjia\App\Market;

use Royalcms\Component\App\AppServiceProvider;

class MarketServiceProvider extends  AppServiceProvider
{
    
    public function boot()
    {
        $this->package('ecjia/app-market');
    }
    
    public function register()
    {
        
    }
    
    
    
}
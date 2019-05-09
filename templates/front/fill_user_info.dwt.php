{nocache}
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0"/>
<meta http-equiv="X-UA-Compatible" content="IE=8,IE=9,IE=10,IE=11"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head lang="zh-CN">
		<title>{t domain="market"}填写地址{/t}</title>
		<link rel="stylesheet" type="text/css" href="{$front_url}/css/touch.css" />
		<link rel="stylesheet" type="text/css" href="{$front_url}/css/style.css" />
		<link rel="stylesheet" type="text/css" href="{$front_url}/css/models.css" />
	</head>
	
	<body>
		<div>
			<ul class="ecjia-suggest-store">
				<li class="store-info">
					<div class="basic-info">
						<div class="store-left">
							<img src="{$prize_info.icon}">
						</div>
						<div class="store-right">
							<div class="store-title">
								<span class="activity-name">[{$prize_info.activity_name}]</span>
								<span class="activity-name">
									{if $prize_info.prize_type eq '2'}
										{t domain="market"}实物奖励{/t}
									{elseif $prize_info.prize_type eq '3'}
										{t domain="market"}积分奖励{/t}
									{else}
										{t domain="market"}红包奖励{/t}
									{/if}
								</span>
							</div>
							<div class="store-title store-title-middle">
								<span class="prize-content">{$prize_info.prize_value_label}</span>
							</div>
							<div class="store-title">
								<span>{$prize_info.formated_add_time}</span>
							</div>
						</div>
						<div class="clear_both"></div>
					</div>
				</li>
			</ul>
		</div>
		{if !$has_filled}
	   	<div class="ecjia-form ecjia-login">
	   		<p class="text-st">{t domain="market"}收货人{/t}</p>
	   		 <div class="form-group margin-right-left">
	    		<label class="input-1">
	    			<input name="user_name" type="text" value="{$prize_info.user_name}" placeholder='{t domain="market"}请输入收货人姓名{/t}' />
	    		</label>
	    	</div>
        	<p class="text-st">{t domain="market"}手机号{/t}</p>
	    	<div class="form-group margin-right-left">
	    		<label class="input-1">
	    			<input name="mobile" type="text" value="{$prize_info.mobile}" placeholder='{t domain="market"}请输入收货人手机号{/t}' />
	    		</label>
	    	</div>
	    	<p class="text-st">{t domain="market"}收货地址{/t}</p>
	    	<div class="form-group margin-right-left">
	    		<label class="input-1">
	    			<input name="address" type="text" value="{$prize_info.address}" placeholder='{t domain="market"}请输入详细收货地址{/t}' />
	    		</label>
	    	</div>
		</div> 
		<div class="around">
    	  <a class="submit_user_info btn ecjia-login-margin-top external" href='{url path="market/mobile_prize/submit_user_info" args="log_id={$prize_info.id}"}'>{t domain="market"}提交{/t}</a>
    	 </div>
    	{else}
	    	<div class="ecjia-form ecjia-login">
		   		<p class="text-st">&nbsp;&nbsp;&nbsp;&nbsp;{t domain="market"}收货人：{/t}<span style="margin-left:10px;">{$prize_info.user_name}</span></p>
	        	<p class="text-st">&nbsp;&nbsp;&nbsp;&nbsp;{t domain="market"}手机号：{/t}<span style="margin-left:10px;">{$prize_info.mobile}</span></p>
	        	<p class="text-st"><span style="disply:inline-block;padding-right:1px;"></span>{t domain="market"}收货地址：{/t}<span style="margin-left:10px;">{$prize_info.address}</span></p>
			</div> 
		{/if}
		<script src="{$system_statics_url}/js/jquery.min.js" type="text/javascript"></script>
        <script src="{$system_statics_url}/lib/ecjia_js/ecjia.js" type="text/javascript"></script>
        
        <script src="{$front_url}/js/user_info.js" type="text/javascript"></script>
        
        <script src="{$system_statics_url}/lib/chosen/chosen.jquery.min.js" type="text/javascript"></script>
        <script src="{$system_statics_url}/js/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="{$system_statics_url}/lib/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="{$system_statics_url}/lib/smoke/smoke.min.js" type="text/javascript"></script>
        <script src="{$system_statics_url}/js/jquery-cookie.min.js" type="text/javascript"></script>
        <script src="{$front_url}/js/framework7.min.js" type="text/javascript"></script>
        <script type="text/javascript">
       		 ecjia.user_info.init();
        </script>
	</body>
</html>
{/nocache}
<?php defined('IN_ECJIA') or exit('No permission resources.');?>
<!-- {extends file="ecjia-platform.dwt.php"} -->

<!-- {block name="footer"} -->
<script type="text/javascript">
	//ecjia.platform.prize_list.init();
</script>
<style>
.wookmark .thumbnail{
	width: 29%;
}
/*.wookmark .bd{
	height:115px;
}*/
.wookmark.warehouse .more{
	height:150px;
}
/*.wookmark .b{
	line-height:none;
}*/
.wookmark .bd_new{
	line-height:none;
}
.wookmark.media_captcha .thumbnail .input{
	opacity: 1;
}
.wookmark.warehouse .thumbnail .input{
	opacity: 1;
}
.wookmark .thumbnail{
	margin-right: 4%;
	border-radius: 15px;
}
.wookmark.warehouse .more i{
	top: 25%;
}
.wookmark .thumbnail:nth-child(4n){
	margin-right: 4%;
}
</style>
<!-- {/block} -->

<!-- {block name="home-content"} -->

<div class="row">
    <div class="col-12">
        <div class="card">
			<div class="card-header">
                <h4 class="card-title">{$ur_here}</h4>
               	{if $action_link}
					<a class="btn btn-outline-primary plus_or_reply data-pjax float-right" href="{$action_link.href}" id="sticky_a"><i class="fa fa-reply"></i> {$action_link.text}</a>
				{/if}
            </div>
            <div class="card-content">
				<div class="card-body">
					<div class="span12">
						<form method="post" action="{$form_action}" name="listForm">
						<div class="list-div list media_captcha wookmark warehouse" id="listDiv">
						  	<ul>
							<!-- {foreach from=$prize_list item=prize} -->
								<li class="thumbnail">
									<div style="height:150px;">
										<div class="model-title ware_name" style="background-color:#87CEFA;">
											<span style="font-size:16px;color:#fff;">
												{if $prize.prize_level eq '0'}
													[特等奖]
												{elseif $prize.prize_level eq '1'}	
													[一等奖]
												{elseif $prize.prize_level eq '2'}
													[二等奖]
												{elseif $prize.prize_level eq '3'}
													[三等奖]
												{elseif $prize.prize_level eq '4'}
													[四等奖]
												{elseif $prize.prize_level eq '5'}
													[五等奖]
												{/if}
												{$prize.prize_name}
											</span><br>
											<span style="color:#fff;">奖品内容：{$prize.prize_value_label}</span>
										</div>
										<p style="padding-top:12px;background-color:#4682B4;">
											<span style="color:#fff;">奖品数量：{$prize.prize_number}&nbsp;/&nbsp;获奖概率：{$prize.prize_prob}%</span><br>
											<span style="color:#fff;">奖品类型：
												{if $prize.prize_type eq '0'}
													未中奖
												{elseif $prize.prize_type eq '1'}
													礼券红包
												{elseif $prize.prize_type eq '2'}
													实物奖品
												{elseif $prize.prize_type eq '3'}
													送积分
												{elseif $prize.prize_type eq '4'}
													推荐商品
												{elseif $prize.prize_type eq '5'}
													推荐店铺
												{elseif $prize.prize_type eq '6'}
													现金红包
												{/if}
											</span>
										</p>
										
									</div>
				
									<div class="input" style="background-color: #efefef;">
										<a class="data-pjax" title="{t}编辑{/t}" href='{RC_Uri::url("market/platform/activity_prize_edit", "code={$code}&p_id={$prize.prize_id}")}'><i class="ft-edit"></i></a>
									</div>
								</li>
								<!-- {/foreach} -->
								<li class="thumbnail add-ware-house">
									<a class="more data-pjax"  href='{RC_Uri::url("market/platform/activity_prize_add", "code={$code}")}'>
										<i class="ft-plus"></i>
									</a>
								</li>

							</ul>
						  <!-- {$region_list.page} -->
						</div>
						</form>
					</div>
				</div>
			</div>
      
        </div>
    </div>
</div>
<!-- {/block} -->
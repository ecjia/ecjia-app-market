<?php defined('IN_ECJIA') or exit('No permission resources.');?>
<!-- {extends file="ecjia-platform.dwt.php"} -->

<!-- {block name="footer"} -->
<script type="text/javascript">
	ecjia.platform.platform_activity.init();
</script>
<!-- {/block} -->

<!-- {block name="home-content"} -->

<div class="row">
    <div class="col-12">
        <div class="card">
			<div class="card-header">
                <h4 class="card-title">
                	{$ur_here}
	               	{if $action_link}
					<a class="btn btn-outline-primary plus_or_reply data-pjax float-right" href="{$action_link.href}" id="sticky_a"><i class="fa fa-reply"></i> {$action_link.text}</a>
					{/if}
                </h4>
            </div>
            <div class="col-lg-12">
				<form class="form" method="post" name="theForm" action="{$form_action}">
					<div class="card-body">
						<div class="form-body">
							<div class="form-group row">
								<label class="col-lg-2 label-control text-right">奖品等级：</label>
								<div class="col-lg-8 controls">
									<select name="prize_level" class=" select2 form-control" >
										<option value="">请选择...</option>
										<option value="0" {if $activity_prize.prize_level eq '0'}selected{/if}>特等奖</option>
										<option value="1" {if $activity_prize.prize_level eq 1}selected{/if}>一等奖</option>
										<option value="2" {if $activity_prize.prize_level eq 2}selected{/if}>二等奖</option>
										<option value="3" {if $activity_prize.prize_level eq 3}selected{/if}>三等奖</option>
										<option value="4" {if $activity_prize.prize_level eq 4}selected{/if}>四等奖</option>
										<option value="5" {if $activity_prize.prize_level eq 5}selected{/if}>五等奖</option>
									</select>
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-lg-2 label-control text-right">奖品名称:</label>
								<div class="col-lg-8 controls">
									<input class="input-xlarge form-control" name="prize_name" type="text" value="{$activity_prize.prize_name}" maxlength="4"/>
								</div>
							</div>
	
							<div class="form-group row">
								<label class="col-lg-2 label-control text-right">奖品类型：</label>
								<div class="col-lg-8 controls">
									<select name="prize_type" class=" select2 form-control" >
										<option value="">请选择...</option>
										<option value="0" {if $activity_prize.prize_type eq '0'}selected{/if}>未中奖</option>
										<option value="1" {if $activity_prize.prize_type eq 1}selected{/if}>礼券红包</option>
										<option value="2" {if $activity_prize.prize_type eq 2}selected{/if}>实物奖品</option>
										<option value="3" {if $activity_prize.prize_type eq 3}selected{/if}>积分</option>
										<option value="4" {if $activity_prize.prize_type eq 4}selected{/if}>推荐商品</option>
										<option value="5" {if $activity_prize.prize_type eq 5}selected{/if}>推荐店铺</option>
										<option value="6" {if $activity_prize.prize_type eq 6}selected{/if}>现金红包</option>
									</select>
								</div>
							</div>
							
							<div class="form-group row prize_value_bonus">
								<label class="col-lg-2 label-control text-right">礼券奖品内容：</label>
								<div class="col-lg-8 controls">
									<select name="prize_value" class=" select2 form-control" >
										<option value="">{lang key='market::market.please_select'}</option>
										<!-- {foreach from=$bonus_list item=bonus } -->
											<option value="{$bonus.type_id}" {if $activity_prize.prize_value eq $bonus.type_id}selected{/if}>{$bonus.type_name}</option>
										<!-- {/foreach} -->
									</select>
									<span class="help-block">当奖品类型选择礼券红包时需要选择此项</span>
								</div>
							</div>
							
							<div class="form-group row prize_value_other">
								<label class="col-lg-2 label-control text-right">其他奖品内容：</label>
								<div class="col-lg-8 controls">
									<input class="input-xlarge form-control" name="prize_value_other" type="text" value="{$activity_prize.prize_value}"/>
									<span class="help-block">当奖品类型选择非礼券红包时需要填写此项</span>
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-lg-2 label-control text-right">奖品数量：</label>
								<div class="col-lg-8 controls">
									<input class="input-xlarge form-control" name="prize_number" type="text" value="{$activity_prize.prize_number}"/>
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-lg-2 label-control text-right">获奖概率：</label>
								<div class="col-lg-8 controls">
									<input class="input-xlarge form-control"  type='text' name='prize_prob' value="{$activity_prize.prize_prob}"/>
								</div>
							</div>
						</div>
					</div>
	
					<div class="modal-footer justify-content-center">
						<input type="hidden" name="p_id" value="{$activity_prize.prize_id}" />
						<input type="hidden" name="code" value="{$code}" />
						{if $p_id}
							<input type="submit" class="btn btn-outline-primary" value="更新" />
						{else}
							<input type="submit" class="btn btn-outline-primary" value="确定" />
						{/if}
						
					</div>
				</form>	
            </div>
        </div>
    </div>
</div>

<!-- {/block} -->
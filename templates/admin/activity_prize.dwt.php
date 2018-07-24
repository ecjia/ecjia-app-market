<?php defined('IN_ECJIA') or exit('No permission resources.');?>
<!-- {extends file="ecjia.dwt.php"} -->

<!-- {block name="footer"} -->
<script type="text/javascript">
	ecjia.admin.activity.prize_init();
</script>
<!-- {/block} -->

<!-- {block name="main_content"} -->
<div>
	<h3 class="heading">
		<!-- {if $ur_here}{$ur_here}{/if} -->
		<!-- {if $action_link} -->
		<a class="btn data-pjax" href="{$action_link.href}" id="sticky_a" style="float:right;margin-top:-3px;"><i class="fontello-icon-reply"></i>{$action_link.text}</a>
		<!-- {/if} -->
	</h3>
</div>

<div class="row-fluid">
	<div class="span12">
		<div class="func-detail">
			<p class="m_b15 title-size">功能详情</p>
			<div class="detail">
				<div class="func-detail-margin">
					{if $info}
						<a class="ajaxremove f_r btn btn-danger activity-open-btn" data-toggle="ajaxremove" data-msg="您确定要关闭营销活动【{$activity_detail.name}】吗？" href='{url path="market/admin/close_activity" args="code={$activity_detail.code}"}' title="关闭">关闭</a>	
					{else}
						<a class="ajaxremove f_r btn btn-gebo activity-open-btn" data-toggle="ajaxremove" data-msg="您确定要开通营销活动【{$activity_detail.name}】吗？" href='{url path="market/admin/open_activity" args="code={$activity_detail.code}"}' title="开通">开通</a>
					{/if}
					<div class="fonticon-container">
						<div class="fonticon-img-wrap">
							<img class="activity-icon" src="{if $activity_detail.icon}{$activity_detail.icon}{else}{$images_url}extend.png{/if}"/>
						</div>
						<div class="f_l literal-wrap">
							<h3 class="title">{$activity_detail.name}</h3>
							<p class="desc">
								{if $info}该功能已开通，设置完活动即可正常使用{else}<span>未开通</span>{/if}
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="func-intrduction">
			<p class="m_b15 title-size">功能介绍</p>
			<p class="intrduction">{$activity_detail.description}</p>
		</div>
		<hr>
		<div class="tabbable">
			<ul class="nav nav-tabs">
				<!-- {foreach from=$tags item=tag} -->
					<li{if $tag.active} class="active"{/if}><a{if $tag.active} href="javascript:;"{else}{if $tag.pjax} class="data-pjax"{/if} href='{$tag.href}'{/if}><!-- {$tag.name} --></a></li>
				<!-- {/foreach} -->
			</ul>
		</div>
		<form method="post" action="{$form_action}" name="theForm">
			<div class="row-fluid">
				<div class="control-group formSep">
                    <table class="market_activity">
                    	<tr>
							<td class="w100">{lang key='market::market.prize_level'}</td>
							<td>{lang key='market::market.prize_name'}</td>
							<td class="w100">{lang key='market::market.prize_type'}</td>
							<td class="w120">{lang key='market::market.prize_content'}</td>
							<td>{lang key='market::market.prize_num'}</td>
							<td>{lang key='market::market.get_prize_probability'}</td>
							<td>&nbsp;</td>
						</tr>
						<!-- {foreach from=$prize_list item=prize name=foo_prize} -->
						<tr class="activity_prize">
							<td>
								<select name="prize_level[]" class="span12">
									<option value="" >{lang key='market::market.please_select'}</option>
									<option value="0" {if $prize.prize_level eq 0}selected{/if}>{lang key='market::market.grand_prize'}</option>
									<option value="1" {if $prize.prize_level eq 1}selected{/if}>{lang key='market::market.first_prize'}</option>
									<option value="2" {if $prize.prize_level eq 2}selected{/if}>{lang key='market::market.second_prize'}</option>
									<option value="3" {if $prize.prize_level eq 3}selected{/if}>{lang key='market::market.third_prize'}</option>
									<option value="4" {if $prize.prize_level eq 4}selected{/if}>{lang key='market::market.fourth_prize'}</option>
									<option value="5" {if $prize.prize_level eq 5}selected{/if}>{lang key='market::market.fifth_prize'}</option>
                                </select>
							</td>
							<td><input type='text' name='prize_name[]' value="{$prize.prize_name}" /></td>
							
							<td>
								<select name="prize_type[]" class="span12">
									<option value="" >{lang key='market::market.please_select'}</option>
									<option value="1" {if $prize.prize_type eq 1}selected{/if}>{lang key='market::market.bonus'}</option>
									<option value="3" {if $prize.prize_type eq 3}selected{/if}>{lang key='market::market.integral'}</option>
									<option value="4" {if $prize.prize_type eq 4}selected{/if}>{lang key='market::market.goods_info'}</option>
									<option value="5" {if $prize.prize_type eq 5}selected{/if}>{lang key='market::market.store_info'}</option>
									<option value="0" {if $prize.prize_type eq 0}selected{/if}>{lang key='market::market.no_prize'}</option>
                                </select>
							</td>
							<td class="prize_value">
								<span {if $prize.prize_type neq 1}class="ecjiaf-dn"{/if}>
									<select name="prize_value[]" class="span12">
										<option value="">{lang key='market::market.please_select'}</option>
										<!-- {foreach from=$bonus_list item=bonus } -->
											<option value="{$bonus.type_id}" {if $prize.prize_value eq $bonus.type_id}selected{/if}>{$bonus.type_name}</option>
										<!-- {/foreach} -->
	                                </select>
                                </span>
                                <span  {if $prize.prize_type eq 1}class="ecjiaf-dn"{/if}>
									<input class="span12" type='text' name='prize_value_other[]' value="{$prize.prize_value}"/>
								</span>
							</td>
							<td><input class="w100" type='text' name='prize_number[]' value="{$prize.prize_number}"/></td>
							<td><input class="w100"  type='text' name='prize_prob[]' value="{$prize.prize_prob}"/></td>
							<td>
								<!-- {if $smarty.foreach.foo_prize.first} -->
								<a class="no-underline" data-toggle="clone-obj" data-parent=".activity_prize" href="javascript:;"><i class="fontello-icon-plus"></i></a>
                                <!-- {else} -->
                                <a class="no-underline" data-toggle="remove-obj" data-parent=".activity_prize" href="javascript:;"><i class="fontello-icon-cancel ecjiafc-red"></i></a>
                                <!-- {/if} -->
							</td>
							<td><input type="hidden" name="prize_id[]" value="{$prize.prize_id}" /></td>
						</tr>
						<!-- {foreachelse} -->
						<tr class="activity_prize">
							<td>
								<select name="prize_level[]" class="span12">
									<option value="" selected>{lang key='market::market.please_select'}</option>
									<option value="0">{lang key='market::market.grand_prize'}</option>
									<option value="1">{lang key='market::market.first_prize'}</option>
									<option value="2">{lang key='market::market.second_prize'}</option>
									<option value="3">{lang key='market::market.third_prize'}</option>
									<option value="4">{lang key='market::market.fourth_prize'}</option>
									<option value="5">{lang key='market::market.fifth_prize'}</option>
                                </select>
							</td>
							<td><input type='text' name='prize_name[]' /></td>
							<td>
								<select name="prize_type[]" class="span12">
									<option value="" selected>{lang key='market::market.please_select'}</option>
									<option value="1">{lang key='market::market.bonus'}</option>
									<option value="3">{lang key='market::market.integral'}</option>
									<option value="4">{lang key='market::market.goods_info'}</option>
									<option value="5">{lang key='market::market.store_info'}</option>
									<option value="0">{lang key='market::market.no_prize'}</option>
                                </select>
							</td>
							<td class="prize_value w120">
								<span class="ecjiaf-dn">
									<select name="prize_value[]" class="w120">
										<option value="" selected>{lang key='market::market.please_select'}</option>
										<!-- {foreach from=$bonus_list item=bonus } -->
											<option value="{$bonus.type_id}">{$bonus.type_name}</option>
										<!-- {/foreach} -->
	                                </select>
                                </span>
                                <span>
									<input style="width:106px;" type='text' name='prize_value_other[]'/>
								</span>
							</td>
							<td><input class="w100" type='text' name='prize_number[]'/></td>
							<td><input class="w100"  type='text' name='prize_prob[]' /></td>
							<td><a class="no-underline" data-toggle="clone-obj" data-parent=".activity_prize" href="javascript:;"><i class="fontello-icon-plus"></i></a></td>
						</tr>
						<!-- {/foreach} -->
                    </table>	
				</div>
				<div class="control-group">
					<div class="controls">
						<input type="hidden" name="id" value="{$id}"/>
						<input type="submit" name="submit" value="{lang key='system::system.button_submit'}" class="btn btn-gebo" />
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- {/block} -->
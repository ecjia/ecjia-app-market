<?php defined('IN_ECJIA') or exit('No permission resources.');?>
<!-- {extends file="ecjia.dwt.php"} -->

<!-- {block name="footer"} -->
<script type="text/javascript">
	ecjia.admin.activity.init();
</script>
<!-- {/block} -->

<!-- {block name="main_content"} -->
<div>
	<h3 class="heading">
		<!-- {if $ur_here}{$ur_here}{/if} -->
		<!-- {if $action_link} -->
		<a class="data-pjax btn plus_or_reply" id="sticky_a" href="{$action_link.href}"><i class="fontello-icon-reply"></i>{$action_link.text}</a>
		<!-- {/if} -->
	</h3>
</div>

<div class="row-fluid edit-page">
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
		<!-- {if $info} -->
			<hr>
			<div class="tabbable">
		    	<ul class="nav nav-tabs">
					<!-- {foreach from=$tags item=tag} -->
					<li{if $tag.active} class="active"{/if}><a{if $tag.active} href="javascript:;"{else}{if $tag.pjax} class="data-pjax"{/if} href='{$tag.href}'{/if}><!-- {$tag.name} --></a></li>
					<!-- {/foreach} -->
				</ul>
		  		<form class="form-horizontal" id="form-privilege" name="theForm" action="{$form_action}" method="post" enctype="multipart/form-data" >
					<fieldset>
						<div class="control-group formSep">
							<label class="control-label">{lang key='market::market.label_activity_name'}</label>
							<div class="controls">
								<input class="span4" name="activity_name" type="text" value="{$activity_info.activity_name}" size="40" />
								<span class="input-must">{lang key='system::system.require_field'}</span>
							</div>
						</div>
						<div class="control-group formSep" >
							<label class="control-label">{lang key='market::market.label_activity_way'}</label>
						     <div class="controls chk_radio">
		                           <input type="radio" name="activity_group"  value="{$activity_info.activity_group}" {if $activity_info.activity_group || !$activity_info} checked="true" {/if} />
		                           <span>{lang key='market::market.shake'}</span>
		                     </div>
						</div>
						<div class="control-group formSep">
		                    <label class="control-label">{lang key='market::market.join_platform'}</label>
		                    <div class="controls chk_radio">
		                         <input type="radio" name="activity_object" value="1" {if $activity_info.activity_object eq 1 || !$activity_info} checked="true" {/if} />
		                         <span>APP</span>
		                         <input type="radio" name="activity_object"  value="2" {if $activity_info.activity_object eq 2} checked="true" {/if} />
		                         <span>PC</span>
		                         <input type="radio" name="activity_object"  value="3" {if $activity_info.activity_object eq 3} checked="true" {/if} />
		                         <span>Touch</span>
		                    </div>
		                </div>
		                <!-- <div class="control-group formSep" >
							<label class="control-label">{lang key='market::market.label_is_open'}</label>
						   	<div class="controls">
					            <div id="info-toggle-button">
					                <input class="nouniform" name="enabled" type="checkbox"  {if $activity_info.enabled eq 1}checked="checked"{/if}  value="1"/>
					            </div>
					        </div>
						</div> -->
		                <div class="control-group formSep">
							<label class="control-label">{lang key='market::market.label_activity_restrict_num'}</label>
							<div class="controls">
								<input class="" name="limit_num" type="text" value="{$activity_info.limit_num|default:0}" maxlength="4"/>
								<span class="help-block">{lang key='market::market.restrict_num_tips'}</span>
							</div>
						</div>
						<div class="control-group formSep">
							<label class="control-label">{lang key='market::market.label_activity_time_restrict'}</label>
							<div class="controls">
								<input class="" name="limit_time" type="text" value="{$activity_info.limit_time|default:0}" placeholder="" maxlength="4"/>
								<span class="help-block">{lang key='market::market.time_restrict_tips'}</span>
							</div>
						</div>
						<div class="control-group formSep">
							<label class="control-label">{lang key='market::market.label_start_date'}</label>
							<div class="controls">
								<input class="time" name="start_time" type="text" value="{$activity_info.start_time}" />
								<span class="input-must">{lang key='system::system.require_field'}</span>
							</div>
						</div>
						<div class="control-group formSep">
							<label class="control-label">{lang key='market::market.label_end_date'}</label>
							<div class="controls">
								<input class="time" name="end_time" type="text" value="{$activity_info.end_time}"/>
								<span class="input-must">{lang key='system::system.require_field'}</span>
							</div>
						</div>
						<div class="control-group formSep" >
							<label class="control-label">{lang key='market::market.label_rule_desc'}</label>
							<div class="controls">
								<textarea class="span8" name="activity_desc" cols="40" rows="3">{$activity_info.activity_desc}</textarea>
							</div>
						</div>
					
						<div class="control-group">
							<div class="controls">
								<input type="hidden" name="id" value="{$activity_info.activity_id}" />
								<input type="hidden" name="activity_code" value="{$activity_info.activity_group}" />
								{if $activity_info.activity_id eq ''}
								<input type="submit" class="btn btn-gebo" value="{lang key='system::system.button_submit'}" />
								{else}
								<input type="submit" class="btn btn-gebo" value="{lang key='market::market.update'}" />
								{/if}
							</div>
						</div>
					</fieldset>
				</form>
		  	</div>
		<!-- {/if} -->
	  </div>
</div>
<!-- {/block} -->
<?php defined('IN_ECJIA') or exit('No permission resources.');?>
<!-- {extends file="ecjia.dwt.php"} -->

<!-- {block name="footer"} -->

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
		<form method="post" action="{$form_action}" name="listForm" data-edit-url="{RC_Uri::url('bonus/admin/bonus_list')}">
			<table class="table table-striped smpl_tbl">
				<thead>
					<tr>
						<th>{lang key='market::market.member_name'}</th>
						<th>{lang key='market::market.prize_name'}</th>
						<th>{lang key='market::market.assign_status'}</th>
						<th>{lang key='market::market.source'}</th>
						<th>{lang key='market::market.assign_time'}</th>
						<th>{lang key='market::market.draw_time'}</th>
					</tr>    
				</thead>
				<tbody>
					<!--{foreach from=$activity_record_list.item item=record} -->
					<tr>
						<td>{if $record.username}<a href='{RC_Uri::url("user/admin/info", "id={$record.user_id}")}' target="_blank">{$record.username}</a>{else}{$record.username}{/if}</td>
						<td>{$record.prize_name}</td>
						<td>
							{if $record.issue_status eq '0'}{lang key='market::market.unreleased'}{else}{lang key='market::market.issued'}{/if}
						</td>
						<td>{$record.source}</td>
						<td>{$record.issue_time}</td>
						<td>{$record.add_time}</td>
					</tr>
					<!-- {foreachelse} -->
					<tr><td class="no-records" colspan="6">{lang key='system::system.no_records'}</td></tr>
					<!-- {/foreach} -->
				</tbody>
			</table>
			<!-- {$activity_record_list.page} -->
		</form>
	</div>
</div>
<!-- {/block} -->
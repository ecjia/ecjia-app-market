<?php defined('IN_ECJIA') or exit('No permission resources.');?>
<!-- {extends file="ecjia-platform.dwt.php"} -->

<!-- {block name="footer"} -->
<script type="text/javascript">
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
						<div class="highlight_box global icon_wrap group" id="js_apply_btn">
							{if $info}
								<a class="ajaxremove f_r btn btn-danger btn-min-width extend_handle" data-toggle="ajaxremove" data-msg="您确定要关闭营销活动【{$activity_detail.name}】吗？" href='{url path="market/platform/close_activity" args="code={$activity_detail.code}"}' title="关闭">关闭</a>	
							{else}
								<a class="ajaxremove f_r btn btn-success btn-min-width extend_handle" data-toggle="ajaxremove" data-msg="您确定要开通营销活动【{$activity_detail.name}】吗？" href='{url path="market/platform/open_activity" args="code={$activity_detail.code}"}' title="开通">开通</a>
							{/if}
							<div class="fonticon-container">
								<div class="fonticon-wrap">
									<img class="icon-extend" src="{if $activity_detail.icon}{$activity_detail.icon}{else}{$images_url}extend.png{/if}" />
								</div>
							</div>
							<h4 class="title">{$activity_detail.name}</h4>
							<p class="desc" id="js_status">
								{if $info}该功能已开通，设置完活动即可正常使用{else}<span>未开通</span>{/if}
							</p>
						</div>
						<div class="carkticket_index">
							<div class="intro">
								<dl>
									<dt><span class="ico_intro ico ico_1 l"></span>
										<h4 class="card-title">功能介绍</h4>
									</dt>
									<dd>{$activity_detail.description}</dd>
								</dl>
							</div>
						</div>
					<!-- {if $info} -->
						<div class="form-body">
							<h4 class="card-title" style="padding-top:13px;">活动信息<hr></h4>
							<div class="form-group row">
								<label class="col-lg-2 label-control text-right">{lang key='market::market.join_platform'}</label>
								<div class="col-lg-8 controls l_h30">
				                    <span>{$activity_info.activity_object}</span>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-2 label-control text-right">{lang key='market::market.label_activity_restrict_num'}</label>
								<div class="col-lg-8 controls l_h30">
									{$activity_info.limit_num|default:0}
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-2 label-control text-right">{lang key='market::market.label_activity_time_restrict'}</label>
								<div class="col-lg-8 controls l_h30">
									{$activity_info.limit_time|default:0}
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-2 label-control text-right">{lang key='market::market.label_activity_time_restrict'}</label>
								<div class="col-lg-8 controls l_h30">
									{lang key='market::market.label_start_date'}{$activity_info.start_time}  <span style="margin-left:50px;">{lang key='market::market.label_end_date'}{$activity_info.end_time}</span>
								</div>
							</div>
							
						</div>
					</div>
					<div class="modal-footer justify-content-center">
						<input type="hidden" name="id" value="{$activity_info.activity_id}" />
	                    <a class="btn btn-outline-primary data-pjax" href="{$action_edit}">{t}编辑活动{/t}</a>
						<a class="btn btn-outline-primary data-pjax" href="{$action_prize}" style="margin:0px 10px;">{t}活动奖品池{/t}</a>
						<a class="btn btn-outline-primary data-pjax" href="{$action_record}">{t}活动记录{/t}</a>
					</div>
				<!-- {/if} -->
				</form>	
            </div>
        </div>
    </div>
</div>

<!-- {/block} -->
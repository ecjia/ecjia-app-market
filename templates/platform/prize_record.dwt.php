<?php defined('IN_ECJIA') or exit('No permission resources.');?>
<!-- {extends file="ecjia-platform.dwt.php"} -->

<!-- {block name="footer"} -->
<script type="text/javascript">
	ecjia.platform.prize_list.init();
</script>
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
					<div class="nav-vertical">
						<ul class="nav nav-tabs nav-left flex-column">
							<li class="nav-item">
								<a class="nav-link active" id="baseVerticalLeft-tab1" data-toggle="tab" aria-controls="tabVerticalLeft1" href="component-tabs-component.html#tabVerticalLeft1" aria-expanded="true">Tab 1</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="baseVerticalLeft-tab2" data-toggle="tab" aria-controls="tabVerticalLeft2" href="component-tabs-component.html#tabVerticalLeft2" aria-expanded="false">Tab 2</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="baseVerticalLeft-tab3" data-toggle="tab" aria-controls="tabVerticalLeft3" href="component-tabs-component.html#tabVerticalLeft3" aria-expanded="false">Tab 3 </a>
							</li>
						</ul>
						<div class="tab-content px-1">
							<div role="tabpanel" class="tab-pane active" id="tabVerticalLeft1" aria-expanded="true" aria-labelledby="baseVerticalLeft-tab1">
								<p>活动一记录</p>
							</div>
							<div class="tab-pane" id="tabVerticalLeft2" aria-labelledby="baseVerticalLeft-tab2">
								<p>活动二记录</p>
							</div>
							<div class="tab-pane" id="tabVerticalLeft3" aria-labelledby="baseVerticalLeft-tab3">
								<p>活动二记录</p>
							</div>
						</div>
					</div>
				</div>
			</div>
      
        </div>
    </div>
</div>
<!-- {/block} -->
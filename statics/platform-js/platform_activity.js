// JavaScript Document
;(function(app, $) {
	app.platform_activity = {
		init : function() {
			/* 加载日期控件 */
			$.fn.datetimepicker.dates['zh'] = {  
	                days:       ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六","星期日"],  
	                daysShort:  ["日", "一", "二", "三", "四", "五", "六","日"],  
	                daysMin:    ["日", "一", "二", "三", "四", "五", "六","日"],  
	                months:     ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月","十二月"],  
	                monthsShort:  ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月","十二月"], 
	                meridiem:    ["上午", "下午"],  
	                today:       "今天"  
		        };
	            $(".time").datetimepicker({
	                format: "yyyy-mm-dd hh:ii",
	                language: 'zh',  
	                weekStart: 1,
	                todayBtn: 1,
	                autoclose: 1,
	                todayHighlight: 1,
	                startView: 2,
	                forceParse: 0,
	                minuteStep: 1
	            });
			app.platform_activity.submit();
			app.platform_activity.prize_init();
		},
		submit : function(formobj) {
			var $form = $("form[name='theForm']");
			var option = {
					rules : {
						'activity_name' : { required : true },
						'start_time' : { required : true },
						'end_time' : { required : true },
					},
					messages : {
						'activity_name' : { required : js_lang.fill_activity_name },
						'start_time' : { required : js_lang.fill_start_time },
						'end_time' : { required : js_lang.fill_end_time },
					},
					submitHandler : function() {
						$form.ajaxSubmit({
							dataType : "json",
							success : function(data) {
								ecjia.platform.showmessage(data);
							}
						});
						
					}
				}
			var options = $.extend(ecjia.platform.defaultOptions.validate, option);
			$form.validate(options);
		},
		
		prize_init: function () {
			$('select[name^="prize_type"]').on('change', function () {
                if ($(this).val() == '1') {
                    $(this).parent().siblings('.prize_value').children().eq(1).hide();
                    $(this).parent().siblings('.prize_value').children().eq(0).show();
                } else {
                    $(this).parent().siblings('.prize_value').children().eq(0).hide();
                    $(this).parent().siblings('.prize_value').children().eq(1).show();
                }
            });
			
			$('[data-toggle="clone-obj-prize"]').off('click').on('click', function(e) {
				e.preventDefault();

				$('.activity_prize').find('select').select2('destroy');
				var $this		= $(this),
					$parentobj	= $this.parents($this.attr('data-parent')),
					before		= $this.attr('data-before') || 'after',
					options		= {parentobj : $parentobj, before : before};
				
				var tmpObj = options.parentobj.clone();
				tmpObj.find('[data-toggle="clone-obj-prize"]')
					.attr('data-toggle','remove-obj-prize').on('click', function(){tmpObj.remove();})
					.find('i').attr('class', 'fa fa-times ecjiafc-red');

				options.parentobj.after(tmpObj);
				$('select').select2();
			});
			
            $("input[type='submit']").on('click', function () {
                var $this = $("form[name='editForm']");
                var option = {
                    submitHandler: function () {
                        $this.ajaxSubmit({
                            dataType: "json",
                            success: function (data) {
                            	ecjia.platform.showmessage(data);
                            }
                        });
                    }
                }
                var options = $.extend(ecjia.platform.defaultOptions.validate, option);
                $this.validate(options);
            });
            
        	
        },
	};
})(ecjia.platform, jQuery);

// end
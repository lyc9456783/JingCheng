//商品小图切换
$(function(){
	//图片切换
	$("#item-thumbs li a").click(function(){
		$("#item-thumbs li").removeClass("current");
		$(this).parent().addClass("current");

	})


})






//页面商品下方快速导航
$(function(){
	$(".J_scrollcomment").click(function(){
		$("html,body").animate({scrollTop:$("#goodsComment").offset().top-70},200);
	})	

	function tabs(){//滚动自动切换选项卡
		var arr=[];
		$(window).scroll(function(){
			var top=$(document).scrollTop();
			
			$(".goods_con_item").each(function(i){
				arr[i]=$(this).offset().top-60;
			})
			if(top>=arr[0]+60){
				$(".goods-sub-bar").css("top",0);
			}else{
				$(".goods-sub-bar").css("top",-71);
			}
			
			$.each(arr,function(k,v){
				if(top>=v){
					li.removeClass("on").eq(k).addClass("on");
					li2.removeClass("on").eq(k).addClass("on");
				}
			});
		});
		
		var li=$(".goods-detail-nav").find("li");
		var li2=$(".goods-sub-bar").find("li");
		li.click(function(){
			fn(this,li);
		});
		li2.click(function(){
			fn(this,li2);
		});
		var fn=function(obj,li){
			var i=li.index(obj);
			$(obj).addClass("on").siblings("li").removeClass("on");
			$("body,html").animate({scrollTop:arr[i]});
		}
	}
	tabs();	
	
	//评论列表回复框
	$(".J_commentAnswerInput").focus(function(){
		$(this).parents(".user-comment-self-input").addClass("showIn");
	}).blur(function(){
		$(this).parents(".user-comment-self-input").removeClass("showIn");
	});
	
});
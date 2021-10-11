# jQuery


## 常用到的jQuery插件

|  插件  |  功能  | 地址  | 说明  |
|---|---|---|---|
| highcharts  | 可视化图表组件 | [官网](https://www.hcharts.cn/) | |










###自定义滚动条插件

* mCustomScrollbar 

###分页插件

* pagination

###无刷新排序插件

* MixItUp



检测IE浏览器

　　在进行CSS设计时，IE浏览器对开发者及设计师而言无疑是个麻烦。尽管IE6的黑暗时代已经过去，IE浏览器家族的人气亦在不断下滑，但我们仍然有必要对其进行检测。当然，以下片段亦可用于检测其它浏览器。
	
$(document).ready(function() { 
  
      if (navigator.userAgent.match(/msie/i) ){ 
  
        alert('I am an old fashioned Internet Explorer'); 
  
      } 
  
}); 

　　来源: Stack Overflow
　　平滑滚动至页面顶部

　　以下是jQuery最为常见的一种实现效果：点击一条链接以平滑滚动至页面顶部。虽然没什么新鲜感可言，但每位开发者几乎都用得上。
	
$("a[href='#top']").click(function() { 
  
  $("html, body").animate({ scrollTop: 0 }, "slow"); 
  
  return false; 
  
}); 

　　来源: Stalk Overflow
　　保持始终处于顶部

　　以下代码片段允许某一元素始终处于页面顶部。可以想见，其非常适合处理导航菜单、工具栏或者其它重要信息。

$(function(){ 
  
var $win = $(window) 
  
var $nav = $('.mytoolbar'); 
  
var navTop = $('.mytoolbar').length && $('.mytoolbar').offset().top; 
  
var isFixed=0; 
  
processScroll() 
  
$win.on('scroll', processScroll) 
  
function processScroll() { 
  
var i, scrollTop = $win.scrollTop() 
  
if (scrollTop >= navTop && !isFixed) { 
  
isFixed = 1 
  
$nav.addClass('subnav-fixed') 
  
} else if (scrollTop <= navTop && isFixed) { 
  
isFixed = 0 
  
 $nav.removeClass('subnav-fixed') 
  
} 
  
}

　　来源: DesignBump
　　替换html标签

　　jQuery能够非常轻松地实现html标签替换，而这也将为我们带来更多新的可能。
1
2
3
4
5
	
$('li').replaceWith(function(){ 
  
  return $("<div />").append($(this).contents()); 
  
});

　　来源: Allure Web Solutions
　　检测屏幕宽度

　　现在移动设备的人气几乎已经超过了传统计算机，因此对小型屏幕的尺寸进行检测就变得非常重要。幸运的是，我们可以利用jQuery轻松实现这项功能。
	
var responsive_viewport = $(window).width(); 
  
/* if is below 481px */
  
if (responsive_viewport < 481) { 
  
    alert('Viewport is smaller than 481px.'); 
  
} /* end smallest screen */

　　来源: jQuery Rain
　　自动修复损坏图片

　　如果大家的站点非常庞大而且已经上线数年，那么其中或多或少会出现图片损坏的情况。这项功能可以检测损坏图片并根据我们的选择加以替换。
	
$('img').error(function(){ 
  
$(this).attr('src', 'img/broken.png'); 
  
});

　　来源: WebDesignerDepot
　　检测复制、粘贴与剪切操作

　　利用jQuery，大家可以非常轻松地检测到选定元素的复制、粘贴与剪切操作。
	
$("#textA").bind('copy', function() { 
  
    $('span').text('copy behaviour detected!') 
  
}); 
  
$("#textA").bind('paste', function() { 
  
    $('span').text('paste behaviour detected!') 
  
}); 
  
$("#textA").bind('cut', function() { 
  
    $('span').text('cut behaviour detected!') 
  
});

　　来源: Snipplr
　　自动为外部链接添加target=“blank”属性

　　在链接至外部站点时，大家可能希望使用target="blank"属性以确保在新的选项卡中打开页面。问题在于，target="blank"属性并未经过W3C认证。jQuery能够帮上大忙：以下片段能够检测当前链接是否指向外部，如果是则自动为其添加target="blank"属性。
	
var root = location.protocol + '//' + location.host; 
  
$('a').not(':contains(root)').click(function(){ 
  
    this.target = "_blank"; 
  
});

　　来源: jQuery Rain
　　悬停时淡入/淡出

　　又是另一项“经典”效果，大家可以利用以下片段随时加以运用。
	
$(document).ready(function(){ 
  
    $(".thumbs img").fadeTo("slow", 0.6); // This sets the opacity of the thumbs to fade down to 60% when the page loads 
  
    $(".thumbs img").hover(function(){ 
  
        $(this).fadeTo("slow", 1.0); // This should set the opacity to 100% on hover 
  
    },function(){ 
  
        $(this).fadeTo("slow", 0.6); // This should set the opacity back to 60% on mouseout 
  
    }); 
  
});

　　来源: Snipplr
　　禁用文本/密码输入中的空格

　　无论是电子邮件、用户名还是密码，很多常见字段都不需要使用空格。以下代码能够轻松禁用选定输入内容中的全部空格。
	
$('input.nospace').keydown(function(e) { 
  
if (e.keyCode == 32) { 
  
return false; 
  
} 
  
});

　　原文标题：10 jQuery Snippets for Efficient Web Development
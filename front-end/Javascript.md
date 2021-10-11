## 全局ajax捕捉错误

    $(document).ajaxError(function(event, XMLHttpRequest, ajaxOptions, thrownError) {
        if (XMLHttpRequest.status == "401") {
            layer.confirm('长时间未操作，请重新登录', {
                closeBtn: 0,
                btn: ['确定']
              }, function(index) {
                layer.close(index);
                window.location.reload();
              });
            return;
        }
        if (XMLHttpRequest.status == "403") {
            layer.confirm('您无此页面权限，请进行刷新', {
                closeBtn: 0,
                btn: ['确定']
              }, function(index) {
                layer.close(index);
                window.location.reload();
              });
            return;
        }
        //$( "div.log" ).text( "Triggered ajaxError handler." );
        //window.alert("请求服务器发生错误，请重试，如果失败请联系管理员。");
        //layer.msg('请求服务器发生错误，请重试，如果失败请联系管理员。');
    });

##js一些写法

    var _w = window;
    var _d = document;
    var _h = _d.head || _d.getElementsByTagName("head")[0];
    var _b = _d.body;
    obj.onclick = function(e) {
        e = e || window.event;
        var target = e.srcElement || e.target;
        var clickobj = target.parentNode;
        click(clickobj);
    };
    function getByClass(node, className) {
        if (node.querySelectorAll) {
            return node.querySelectorAll("." + className)
        } else {
            if (node.getElementsByClassName) {
                return node.getElementsByClassName(className)
            } else {
                return (function getElementsByClass(searchClass, node) {
                    if (node == null) {
                        node = document
                    }
                    var classElements = [],
                        els = node.getElementsByTagName("*"),
                        elsLen = els.length,
                        pattern = new RegExp("(^|\\s)" + searchClass + "(\\s|$)"),
                        i, j;
                    for (i = 0, j = 0; i < elsLen; i++) {
                        if (pattern.test(els[i].className)) {
                            classElements[j] = els[i];
                            j++
                        }
                    }
                    return classElements
                })(className, node)
            }
        }
    }
  
### JSON字符串 <=> 数组/JSON对象

> JSON字符串 = JSON.stringify(数组/JSON对象);

> 数组/JSON对象 = JSON.parse(JSON字符串);

str.indexOf('xxx');

num.toFixed(2) 两位小数

escape()
unescape()

编码函数：encodeURIComponent()
解码函数：decodeURIComponent() 

###手机端跳转

```
<script>
  (function() {
      try{
          var ua = navigator.userAgent.toLowerCase();
          var is_iPd = ua.match(/(ipad|ipod|iphone)/i) != null;
          var is_mobile=!!ua.match(/applewebkit.*mobile.*/);
          var is_mobi = ua.toLowerCase().match(/(ipod|iphone|android|coolpad|mmp|smartphone|midp|wap|xoom|symbian|j2me|blackberry|win ce)/i) != null;
          is_mobi = is_mobi || is_mobile;
          if(is_mobi && window.location.search.indexOf("mv=fp")<0){
          javascript:window.location.href=location.href.match(/.+\/\/.+\.com\/.+\//) + "wap/"; 
          }
      } catch(e){
      }
  })();
  (function(){
    try{
       var is_iPd = navigator.userAgent.match(/(iPad|iPod|iPhone)/i) != null;
       var is_mobi = navigator.userAgent.toLowerCase().match(/(ipod|iphone|android|coolpad|mmp|smartphone|midp|wap|xoom|symbian|j2me|blackberry|win ce)/i) != null;
       if(is_mobi && window.location.search.indexOf("mv=fp")<0){
         javascript:window.location.href="/";  
       }
    } catch(e){
    }
  })();
</script>
```

navigator.appName

###QQ对话链接：

http://wpa.qq.com/msgrd?v=3&uin=QQ号&site=qq&menu=yes

###阻止事件向上冒泡：

    e.stopPropagation();//非IE
    window.event.cancelBubble=true;//IE
    var stopBubble = function(e){
        if(e&&e.stopPropagation){e.stopPropagation();}else{window.event.cancelBubble=true;}
    } 

###设为首页

    function setHomepage(url){
        if (document.all){
            document.body.style.behavior='url(#default#homepage)';
            document.body.setHomePage(url);
        }else if (window.sidebar){
            if(window.netscape){
                try{  
                    netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");  
                }catch (e) {  
                    alert( "抱歉！您的浏览器不支持直接设为首页。\n请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为“true”，点击“加入收藏”后忽略安全提示，即可设置成功。" );  
                }
            } 
            var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components. interfaces.nsIPrefBranch);
            prefs.setCharPref('browser.startup.homepage',url);
        }
    }

###加入收藏

    function addToFavorite(sURL, sTitle){
        try{
            window.external.addFavorite(sURL, sTitle);
        }catch (e){
            try{
                window.sidebar.addPanel(sTitle, sURL, "");
            }catch (e){
                alert("加入收藏失败，请使用Ctrl+D进行添加");
            }
        }
    } 

### 自定义根据ID选择元素方法

    function getID(ID) {
        return document.getElementById(ID);
    }

### 自定义COOKIE方法

    function setCookie(cookieName, cookieValue, seconds) {
        var expires = new Date();
        expires.setTime(expires.getTime() + parseInt(seconds) * 1000);
        document.cookie = escape(cookieName) + '=' + escape(cookieValue) + (seconds ? ('; expires=' + expires.toGMTString()) : "") + '; path=/; domain=51wan.la;';
    }
    function getCookie(cname) {
        var cookie_start = document.cookie.indexOf(cname);
        var cookie_end = document.cookie.indexOf(";", cookie_start);
        return cookie_start == -1 ? '': decodeURI(document.cookie.substring(cookie_start + cname.length + 1, (cookie_end > cookie_start ? cookie_end: document.cookie.length)));
    }

### 返回顶部

    $(window).scroll(function(){
          $("#backToTop").click(function(){
            $(document).scrollTop(0);
          });
          var _top = $(document).scrollTop();
          if( _top > 0 ){
            $("#backToTop").show();
          }else{
            $("#backToTop").hide();
          }
    });

### 鼠标滚动事件

    var scrollFun=function(e){
        e=e || window.event;
        e.wheelDelta//IE/Opera/Chrome -120|120
        e.detail//Firefox 3|-3
    } 
    if(document.addEventListener){
        document.addEventListener('DOMMouseScroll',scrollFun,false); 
    }
    window.onmousewheel=document.onmousewheel=scrollFun;

### 输入框焦点事件

    $('.input').bind({
    	focus:function(){
    		if (this.value == this.defaultValue){
    			this.value="";
    			$(this).css("color","#000");
    		}
    	},
    	blur:function(){
    		if (this.value == ""){
    			this.value = this.defaultValue;
    			$(this).css("color","#999");
    		}
    	}
    });
    <input type="text" class="in_txt" value="帐号：" id="user_name" onBlur="if (value ==''){value='帐号：';}" onClick="if(this.value=='帐号：'){this.value='';}"/>
    <input type="password" class="in_txt" value="密码：" id="user_pwd" onBlur="if (value ==''){value='密码：';}" onClick="if(this.value=='密码：'){this.value='';}"/>

##回车事件

    document.onkeydown = function(e){
      if(!e) e = window.event;
      if((e.keyCode || e.which) == 13){$("#search-btn").trigger('click');}  
    }

### 让指定的DIV始终显示在屏幕正中间  

    function setDivCenter(divName){  
        var top = ($(window).height() - $(divName).height())/2;  
        var left = ($(window).width() - $(divName).width())/2;  
        var scrollTop = $(document).scrollTop();  
        var scrollLeft = $(document).scrollLeft();  
        $(divName).css( { position : 'absolute', 'top' : top + scrollTop, left : left + scrollLeft } ).show(); 
    } 


    jQuery.extend( jQuery.fn, {
        within: function( pSelector ) {
            return this.filter(function(){
                return $(this).closest( pSelector ).length;
            });
        }
    });

###闭包计数器

    function createCounter(counterName) {
      var counter = 0;
     
      function display() {
        console.log("Number of " + counterName + ": " + counter);
      }
     
      function increment() {
        counter = counter + 1;
        display();
      };
     
      function decrement() {
        counter = counter - 1;
        display();
      };
     
      return {
        increment : increment,
        decrement : decrement
      };
    }
     
    var dogsCounter = createCounter("dogs");
    dogsCounter.increment(); // Number of dogs: 1
    dogsCounter.increment(); // Number of dogs: 2
    dogsCounter.decrement(); // Number of dogs: 1


###2323wan服务器列表分页

    var li       = $('#my-game-list').find('li');
    var li_cache = {};
    var size     = li.size();
    var count    = 1;
    li.each(function(){
      li_cache[size-count++] = $(this);
    });
    var index     = 0;
    count = 0;
    for(var i in li_cache){
      if(count++%40==0){
        $('.list_cont').prepend('<ul class="server-list-ul" id="list-'+(++index)+'"></ul>');
        $('.list_nav').prepend('<li><a tar="list-'+index+'">'+count+'-<span></span>服</a></li>')
      }
      li_cache[i].find('font').remove();
      $('.list_cont ul#list-'+index).prepend(li_cache[i].clone());
      $('.list_nav a[tar=list-'+index+']').find('span').html(count);
    }
    $('.list_nav a').mouseover(function(){
      $('#'+$(this).attr('tar')).show().siblings().hide();
      $('.list_nav a').removeClass('on');
      $(this).addClass('on');
    });
    $('.server-list-ul:first').show();
    $('.list_nav a:first').addClass('on');
    $('.li_bg a').each(function(){
      $(this).attr('href',$(this).attr('href').replace('gamelogin','gamelogin1')+'&client=1');
    });
    $('.list_nav a:first').mouseover();
    //2323wan服务器列表分页css
    .list_nav{
        float: left;
        height: auto;
        margin: 17px auto 0;
        padding-left: 40px;
        width: 615px;
    }
    .list_nav li {
        background-color: #bcfff8;
        float: left;
        font-weight: bold;
        height: 27px;
        line-height: 27px;
        margin: 0 12px 5px 0;
        text-align: center;
        width: 76px;
    }
    .list_nav li a {
        color: green;
    }
    .list_nav li a:hover{
        color: red;
        text-decoration: none;
    }

//悬浮图片广告

  jQuery.fn.float= function(settings){
    if(typeof settings == "object"){
      settings = jQuery.extend({
        //延迟
        delay : 1000,
        //位置偏移
        offset : {
          left : 0,
          right : 0,
          top : 0,
          bottom : 0
        },
        style : null, //样式
        width:100,  //宽度
        height:200, //高度
        position:"rm" //位置
      }, settings || {}); 
      var winW = $(window).width();
      var winH = $(window).height();
      
       //根据参数获取位置数值
      function getPosition($applyTo,position){
        var _pos = null;
        switch(position){
          case "rm" : 
            $applyTo.data("offset","right");
            $applyTo.data("offsetPostion",settings.offset.right);
            _pos = {right:settings.offset.right,top:winH/1.4-$applyTo.innerHeight()/1};
          break;
          case "lm" :
            $applyTo.data("offset","left");
            $applyTo.data("offsetPostion",settings.offset.left);
            _pos = {left:settings.offset.left,top:winH/1.4-$applyTo.innerHeight()/1};
          break;
          case "rb" :
            _pos = {right:settings.offset.right,top:winH - $applyTo.innerHeight()};
          break;
          case "lb" :
            _pos = {left:settings.offset.left,top:winH - $applyTo.innerHeight()};
          break;
          case "l" : 
            _pos = {left:settings.offset.left,top:settings.offset.top};
          break;
          case "r" : 
            _pos = {right:settings.offset.right,top:settings.offset.top};
          break;        
          case "t" :
            $applyTo.data("offset","top");
            $applyTo.data("offsetPostion",settings.offset.top);         
            _pos = {left:settings.offset.left,top:settings.offset.top};
          break;
          case "b" :
            $applyTo.data("offset","bottom");
            $applyTo.data("offsetPostion",settings.offset.bottom);          
            _pos = {left:settings.offset.left,top:winH - $applyTo.innerHeight()};       
          break;
        }
        return _pos;
      }
      //设置容器位置
      function setPosition($applyTo,position,isUseAnimate){
        var scrollTop = $(window).scrollTop();
        var scrollLeft = $(window).scrollLeft();
        var _pos = getPosition($applyTo,position);
        _pos.top += scrollTop;
        isUseAnimate && $applyTo.stop().animate(_pos,settings.delay) || $applyTo.css(_pos);
      } 

      return this.each(function(){
        var $this =  $(this);
        $this.css("position","absolute");
        settings.style && $this.css(settings.style);
        setPosition($this,settings.position);
        $(this).data("isAllowScroll",true);
        $(window).scroll(function(){
          $this.data("isAllowScroll") && setPosition($this,settings.position,true);
        });
      })  
    }else{
      var speed = arguments.length > 1 && arguments[1] || "fast"; 
      this.each(function(){      
        if(settings == "clearOffset"){
            var _c = {};
            if($(this).data("offset")){
               _c[$(this).data("offset")] = 0; 
               $(this).data("isAllowScroll",false);
               $(this).stop().animate(_c,speed);
            }
        }else if(settings == "addOffset"){
            var _c = {};
            if($(this).data("offset") && $(this).data("offsetPostion")){
               _c[$(this).data("offset")] = $(this).data("offsetPostion"); 
               $(this).stop().animate(_c,speed);
               $(this).data("isAllowScroll",true);
            }
                       
        }else if(settings == "setScrollDisable"){
          $(this).data("isAllowScroll",false);
        }else if(settings == "setScrollUsable"){
          $(this).data("isAllowScroll",true); 
        }
      })
    }
  }

  $("#ad1").float({
      delay : 500,//延迟
      position:"lm" //位置
  });

  //悬浮图片广告end


###最简单jquery幻灯

  <link rel="stylesheet" type="text/css" href="/css/lrtk.css">
  <script type="text/javascript" src="/js/pptBox.js"></script>          
  <div id="xxx">          
         <script>
                var box =new PPTBox();
                box.width = 378; //宽度
                box.height = 246;//高度
                box.autoplayer = 3;//自动播放间隔时间
                  box.add({"title":"","href":"","url":""});
                box.show();
          </script>
  </div> 

###获取时间戳

  time: function(){
      return new Date().getTime();
  },
  //时间戳转为date日期
  date: function (format,timestamp)   { 
      var   now    = new   Date(parseInt(timestamp)*1000);  
      var   year   = now.getFullYear();
      var   month  = (now.getMonth()+1)<10?'0'+(now.getMonth()+1):(now.getMonth()+1);
      var   date   = now.getDate()<10?'0'+now.getDate():now.getDate();     
      var   hour   = now.getHours()<10?'0'+now.getHours():now.getHours();     
      var   minute = now.getMinutes()<10?'0'+now.getMinutes():now.getMinutes();     
      var   second = now.getSeconds()<10?'0'+now.getSeconds():now.getSeconds(); 
      var   dateformat = format.toLowerCase().replace(/y/g,year).replace(/m/g,month).replace(/d/g,date).replace(/h/g,hour).replace(/i/g,minute).replace(/s/g,second);
      return  dateformat;     
  } 
    
###根据地址栏QueryString参数名称获取值(可以用于控制导航)

  var getQueryParm =  function(name){
    var result = location.search.match(new RegExp("[\?\&]" + name+ "=([^\&]+)","i"));
    if(result == null || result.length < 1){
    return "";
    }
    return result[1];
  }

###获取script中src地址的参数

  var getScriptParm = function(name) {
    var obj = document.scripts?document.scripts:document.getElementsByTagName('script');
    var string = "?"+obj[obj.length-1].src.split("\?")[1];
    var result = string.match(new RegExp("[\?\&]" + name+ "=([^\&]+)","i"));
    if(result == null || result.length < 1){return "";}
    return result[1];
  }

###定时器

  <script type="text/javascript">
  //循环执行，每隔3秒钟执行一次showalert（）
  window.setInterval(showalert, 3000);
  function showalert(){alert(“aaaaa”);}
  //定时执行，5秒后执行show()
  window.setTimeout(show,5000);
  function show(){alert(“bbb”);}
  </script> 

###jquery.pagination.js插件分页

  <div class="pagination" id="Pagination"></div>
  <link type="text/css" href="http://www.2323wan.com/css/pagination.css" rel="stylesheet">
  <script type="text/javascript" src="http://www.2323wan.com/js/jquery.pagination.js"></script>
  <script type="text/javascript">
      var pageIndex = 0;     //页面索引初始值  
      var pageSize = 10;     //每页显示条数初始化，修改显示条数，修改这里即可  
      var pageCount = $('#card-table tr').length;
       
      $(function() {         
          InitTable(0);    //Load事件，初始化表格数据，页面索引为0（第一页）  
                                                                
          //分页，PageCount是总条目数，这是必选参数，其它参数都是可选  
          $("#Pagination").pagination(pageCount, {  
              callback: PageCallback,  
              prev_text: '上一页',       //上一页按钮里text  
              next_text: '下一页',       //下一页按钮里text  
              items_per_page: pageSize,  //显示条数  
              num_display_entries: 6,    //连续分页主体部分分页条目数  
              current_page: pageIndex,   //当前页索引  
              num_edge_entries: 2        //两侧首尾分页条目数  
          });  
                
          //翻页调用  
          function PageCallback(index, jq) {             
              InitTable(index);  
          }  
          //显示 
          function InitTable(pageIndex) {
            $('#card-table tr:not(#title)').hide();
            for(var i=pageIndex*pageSize;i<(pageIndex+1)*pageSize;i++){
              $('#card-table tr:not(#title)').eq(i).show();  
            }                                          
          }  
            
      }); 
  </script>
  //jquery.pagination.js插件分页end





1、oncontextmenu="window.event.returnValue=false" 将彻底屏蔽鼠标右键
      <table border oncontextmenu=return(false)><td>no</table> 可用于Table

2、 <body onselectstart="return false"> 取消选取、防止复制

3、oncopy="return false;" oncut="return false;" 防止复制

4、 onpaste="return false" 不准粘贴

5、 <link rel="Shortcut Icon" href="http://cmc1020.blog.163.com/blog/favicon.ico">

       IE地址栏前换成自己的图标

6、 <link rel="Bookmark" href="http://cmc1020.blog.163.com/blog/favicon.ico">

      可以在收藏夹中显示出你的图标

7、 <input style="ime-mode:disabled"> 关闭输入法

8、 永远都会带着框架

            <script language="JavaScript"> 

                  if (window == top)   top.location.href="http://cmc1020.blog.163.com/blog/frames.htm"; //frames.htm为框架网页 

                     </script> 


9、 防止被人frame

    <script>if (top.location != self.location)top.location=self.location;</script> 

12、删除时确认

    <a href="http://cmc1020.blog.163.com/blog/"  javascript :if(confirm("确实要删除吗?"))location="boos.asp?&areyou=删除&page=1"">删除</a>

13、 取得控件的绝对位置

    <script language="Javascript"> 

    function getIE(e){ 

    var t=e.offsetTop;
    var l=e.offsetLeft;
    while(e=e.offsetParent){ 

    t+=e.offsetTop;
    l+=e.offsetLeft; 

    }
    alert("top="+t+"/nleft="+l); 

    }
    </script> 


14、 光标是停在文本框文字的最后

    <script language="javascript"> 

    function cc()
    {
    var e = event.srcElement;
    var r =e.createTextRange();
    r.moveStart("character",e.value.length);
    r.collapse(true);
    r.select();
    }

    </script>
    <input type=text name=text1 value="123" onfocus="cc()">

15、判断上一页的来源
          javascript :document.referrer
16、最小化、最大化、关闭窗口

<object id=hh1 classid="clsid:ADB880A6-D8FF-11CF-9377-00AA003B7A11"><param name="Command" value="Minimize"></object>
<object id=hh2 classid="clsid:ADB880A6-D8FF-11CF-9377-00AA003B7A11"><param name="Command" value="Maximize"></object>
<objectid=hh3 classid="clsid:adb880a6-d8ff-11cf-9377-00aa003b7a11"><PARAM NAME="Command" value="/Close"></OBJECT>
<input type=button value="/最小化 onclick=hh1.Click()>
<input type=button value="/blog/最大化 onclick=hh2.Click()>
<input type=button value=关闭 onclick=hh3.Click()>


本例适用于IE
17.屏蔽功能键Shift,Alt,Ctrl

  <script>
  function look(){
     if(event.shiftKey)
        alert("禁止按Shift键!"); //可以换成ALT CTRL
     }
     document.onkeydown=look;
  </script>


18. 网页不会被缓存

    <META HTTP-EQUIV="pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate">
    <META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:21:57 GMT">
    或者<META HTTP-EQUIV="expires" CONTENT="0">

19.怎样让表单没有凹凸感?

    <input type=text style="""border:1 solid #000000">
    或<input type=text style="border-left:none; border-right:none; border-top:none; border-bottom:
    1 solid #000000"></textarea>

20.<div><span>&<layer>的区别?

    <div>(division)用来定义大段的页面元素,会产生转行
    <span>用来定义同一行内的元素,跟<div>的唯一区别是不产生转行
    <layer>是ns的标记,ie不支持,相当于<div>

21.让弹出窗口总是在最上面:
<body onblur="this.focus();">
22.不要滚动条?
让竖条没有:
<body style="overflow:scroll;overflow-y:hidden">
</body>
让横条没有:
<body style="overflow:scroll;overflow-x:hidden">
</body>
两个都去掉?更简单了
<body scroll="no">
</body>
23.怎样去掉图片链接点击后,图片周围的虚线?
<a href="http://cmc1020.blog.163.com/blog/#" onFocus="this.blur()"><img src="/logo.jpg" border=0></a>
24.电子邮件处理提交表单

    <form name="form1" method="post" action=mailto:com
    enctype="text/plain">
    <input type=submit>
    </form>

25.在打开的子窗口刷新父窗口的代码里如何写?

    window.opener.location.reload()


26.如何设定打开页面的大小

    <body onload="top.resizeTo(300,200);">

打开页面的位置

    <body onload="top.moveBy(300,200);">

27.在页面中如何加入不是满铺的背景图片,拉动页面时背景图不动

    <STYLE>
    body
    {background-image:url(/logo.gif); background-repeat:no-repeat;
    background-position:center;background-attachment: fixed}
    </STYLE>

28. 检查一段字符串是否全由数字组成

    <script language="Javascript"><!--
    function checkNum(str){return str.match(//D/)==null}
    alert(checkNum("1232142141"))
    alert(checkNum("123214214a1"))
    // --></script>

29. 获得一个窗口的大小
document.body.clientWidth; document.body.clientHeight
30. 怎么判断是否是字符

    if (/[^/x00-/xff]/g.test(s)) alert("含有汉字");
    else alert("全是字符");

31.TEXTAREA自适应文字行数的多少

    <textarea rows=1 name=s1 cols=27 onpropertychange
    ="this.style.posHeight=this.scrollHeight">
    </textarea>

32. 日期减去天数等于第二个日期

    <script language=Javascript>
    function cc(dd,dadd)
    {
    //可以加上错误处理
    var a = new Date(dd)
    a = a.valueOf()
    a = a - dadd * 24 * 60 * 60 * 1000
    a = new Date(a)
    alert(a.getFullYear() + "年" + (a.getMonth() + 1) + "月" + a.getDate() + "日")
    }
    cc("12/23/2002",2)
    </script>

33. 选择了哪一个Radio
<HTML><script language="vbscript">
function checkme()
for each ob in radio1
if ob.checked then
window.alert ob.value
next
end function
</script><BODY>
<INPUT name="radio1" type="radio" value="/style" checked>Style
<INPUT name="radio1" type="radio" value="/blog/barcode">Barcode
<INPUT type="button" value="check" onclick="checkme()">
</BODY></HTML>
34.脚本永不出错
<SCRIPT LANGUAGE="JavaScript">
<!-- Hide
function killErrors() {
return true;
}
window.onerror = killErrors;
// -->
</SCRIPT>
35.ENTER键可以让光标移到下一个输入框
<input onkeydown="if(event.keyCode==13)event.keyCode=9">




































































































1、原生JavaScript实现字符串长度截取

    function cutstr(str, len) {
        var temp;
        var icount = 0;
        var patrn = /[^\x00-\xff]/;
        var strre = "";
        for (var i = 0; i < str.length; i++) {
            if (icount < len - 1) {
                temp = str.substr(i, 1);
                if (patrn.exec(temp) == null) {
                    icount = icount + 1
                } else {
                    icount = icount + 2
                }
                strre += temp
            } else {
                break
            }
        }
        return strre + "..."
    }

2、原生JavaScript获取域名主机

    function getHost(url) {
        var host = "null";
        if(typeof url == "undefined"|| null == url) {
            url = window.location.href;
        }
        var regex = /^\w+\:\/\/([^\/]*).*/;
        var match = url.match(regex);
        if(typeof match != "undefined" && null != match) {
            host = match[1];
        }
        return host;
    }

3、原生JavaScript清除空格

    String.prototype.trim = function() {
        var reExtraSpace = /^\s*(.*?)\s+$/;
        return this.replace(reExtraSpace, "$1")
    }

4、原生JavaScript替换全部

    String.prototype.replaceAll = function(s1, s2) {
        return this.replace(new RegExp(s1, "gm"), s2)
    }

5、原生JavaScript转义html标签

    function HtmlEncode(text) {
        return text.replace(/&/g, '&').replace(/\"/g, '"').replace(/</g, '<').replace(/>/g, '>')
    }

6、原生JavaScript还原html标签

    function HtmlDecode(text) {
        return text.replace(/&/g, '&').replace(/"/g, '\"').replace(/</g, '<').replace(/>/g, '>')
    }

7、原生JavaScript时间日期格式转换

    Date.prototype.Format = function(formatStr) {
        var str = formatStr;
        var Week = ['日', '一', '二', '三', '四', '五', '六'];
        str = str.replace(/yyyy|YYYY/, this.getFullYear());
        str = str.replace(/yy|YY/, (this.getYear() % 100) > 9 ? (this.getYear() % 100).toString() : '0' + (this.getYear() % 100));
        str = str.replace(/MM/, (this.getMonth() + 1) > 9 ? (this.getMonth() + 1).toString() : '0' + (this.getMonth() + 1));
        str = str.replace(/M/g, (this.getMonth() + 1));
        str = str.replace(/w|W/g, Week[this.getDay()]);
        str = str.replace(/dd|DD/, this.getDate() > 9 ? this.getDate().toString() : '0' + this.getDate());
        str = str.replace(/d|D/g, this.getDate());
        str = str.replace(/hh|HH/, this.getHours() > 9 ? this.getHours().toString() : '0' + this.getHours());
        str = str.replace(/h|H/g, this.getHours());
        str = str.replace(/mm/, this.getMinutes() > 9 ? this.getMinutes().toString() : '0' + this.getMinutes());
        str = str.replace(/m/g, this.getMinutes());
        str = str.replace(/ss|SS/, this.getSeconds() > 9 ? this.getSeconds().toString() : '0' + this.getSeconds());
        str = str.replace(/s|S/g, this.getSeconds());
        return str
    }

8、原生JavaScript判断是否为数字类型

    function isDigit(value) {
        var patrn = /^[0-9]*$/;
        if (patrn.exec(value) == null || value == "") {
            return false
        } else {
            return true
        }
    }

9、原生JavaScript设置cookie值

    function setCookie(name, value, Hours) {
        var d = new Date();
        var offset = 8;
        var utc = d.getTime() + (d.getTimezoneOffset() * 60000);
        var nd = utc + (3600000 * offset);
        var exp = new Date(nd);
        exp.setTime(exp.getTime() + Hours * 60 * 60 * 1000);
        document.cookie = name + "=" + escape(value) + ";path=/;expires=" + exp.toGMTString() + ";domain=360doc.com;"
    }

10、原生JavaScript获取cookie值

    function getCookie(name) {
        var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
        if (arr != null) return unescape(arr[2]);
        return null
    }

11、原生JavaScript加入收藏夹

    function AddFavorite(sURL, sTitle) {
        try {
            window.external.addFavorite(sURL, sTitle)
        } catch(e) {
            try {
                window.sidebar.addPanel(sTitle, sURL, "")
            } catch(e) {
                alert("加入收藏失败，请使用Ctrl+D进行添加")
            }
        }
    }

12、原生JavaScript设为首页

    function setHomepage() {
        if (document.all) {
            document.body.style.behavior = 'url(#default#homepage)';
            document.body.setHomePage('http://9iphp.com')
        } else if (window.sidebar) {
            if (window.netscape) {
                try {
                    netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect")
                } catch(e) {
                    alert("该操作被浏览器拒绝，如果想启用该功能，请在地址栏内输入 about:config,然后将项 signed.applets.codebase_principal_support 值该为true")
                }
            }
            var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
            prefs.setCharPref('browser.startup.homepage', 'http://9iphp.com')
        }
    }

13、原生JavaScript判断IE6

    var ua = navigator.userAgent.toLowerCase();
    var isIE6 = ua.indexOf("msie 6") > -1;
    if (isIE6) {
        try {
            document.execCommand("BackgroundImageCache", false, true)
        } catch(e) {}
    }

14、原生JavaScript加载样式文件

    function LoadStyle(url) {
        try {
            document.createStyleSheet(url)
        } catch(e) {
            var cssLink = document.createElement('link');
            cssLink.rel = 'stylesheet';
            cssLink.type = 'text/css';
            cssLink.href = url;
            var head = document.getElementsByTagName('head')[0];
            head.appendChild(cssLink)
        }
    }

15、原生JavaScript返回脚本内容

    function evalscript(s) {
      if(s.indexOf('<script') == -1) return s;
      var p = /<script[^\>]*?>([^\x00]*?)<\/script>/ig;
      var arr = [];
      while(arr = p.exec(s)) {
        var p1 = /<script[^\>]*?src=\"([^\>]*?)\"[^\>]*?(reload=\"1\")?(?:charset=\"([\w\-]+?)\")?><\/script>/i;
        var arr1 = [];
        arr1 = p1.exec(arr[0]);
        if(arr1) {
          appendscript(arr1[1], '', arr1[2], arr1[3]);
        } else {
          p1 = /<script(.*?)>([^\x00]+?)<\/script>/i;
          arr1 = p1.exec(arr[0]);
          appendscript('', arr1[2], arr1[1].indexOf('reload=') != -1);
        }
      }
      return s;
    }

16、原生JavaScript清除脚本内容

    function stripscript(s) {
      return s.replace(/<script.*?>.*?<\/script>/ig, '');
    }

17、原生JavaScript动态加载脚本文件

    function appendscript(src, text, reload, charset) {
      var id = hash(src + text);
      if(!reload && in_array(id, evalscripts)) return;
      if(reload && $(id)) {
        $(id).parentNode.removeChild($(id));
      }
     
      evalscripts.push(id);
      var scriptNode = document.createElement("script");
      scriptNode.type = "text/javascript";
      scriptNode.id = id;
      scriptNode.charset = charset ? charset : (BROWSER.firefox ? document.characterSet : document.charset);
      try {
        if(src) {
          scriptNode.src=\'#\'"  = false;
          scriptNode.onload = function () {
            scriptNode. = true;
            JSLOADED[src] = 1;
          };
          scriptNode.onreadystatechange = function () {
            if((scriptNode.readyState == 'loaded' || scriptNode.readyState == 'complete') && !scriptNode. {
              scriptNode. = true;
              JSLOADED[src] = 1;
            }
          };
        } else if(text){
          scriptNode.text = text;
        }
        document.getElementsByTagName('head')[0].appendChild(scriptNode);
      } catch(e) {}
    }

18、原生JavaScript返回按ID检索的元素对象

    function $(id) {
      return !id ? null : document.getElementById(id);
    }

19、原生JavaScript返回浏览器版本内容

    function browserVersion(types) {
      var other = 1;
      for(i in types) {
        var v = types[i] ? types[i] : i;
        if(USERAGENT.indexOf(v) != -1) {
          var re = new RegExp(v + '(\\/|\\s)([\\d\\.]+)', 'ig');
          var matches = re.exec(USERAGENT);
          var ver = matches != null ? matches[2] : 0;
          other = ver !== 0 && v != 'mozilla' ? 0 : other;
        }else {
          var ver = 0;
        }
        eval('BROWSER.' + i + '= ver');
      }
      BROWSER.other = other;
    }

20、原生JavaScript元素显示的通用方法

    function $(id) {
      return !id ? null : document.getElementById(id);
    }
    function display(id) {
      var obj = $(id);
      if(obj.style.visibility) {
        obj.style.visibility = obj.style.visibility == 'visible' ? 'hidden' : 'visible';
      } else {
        obj.style.display = obj.style.display == '' ? 'none' : '';
      }
    }

21、原生JavaScript中有insertBefore方法,可惜却没有insertAfter方法?用如下函数实现

    function insertAfter(newChild,refChild){ 
      var parElem=refChild.parentNode; 
      if(parElem.lastChild==refChild){ 
        refChild.appendChild(newChild); 
      }else{ 
        parElem.insertBefore(newChild,refChild.nextSibling); 
      } 
    }

22、原生JavaScript中兼容浏览器绑定元素事件

    function addEventSamp(obj,evt,fn){ 
      if (obj.addEventListener) { 
        obj.addEventListener(evt, fn, false); 
      }else if(obj.attachEvent){ 
        obj.attachEvent('on'+evt,fn); 
      } 
    }

23、原生JavaScript光标停在文字的后面，文本框获得焦点时调用

    function focusLast(){ 
      var e = event.srcElement; 
      var r =e.createTextRange(); 
      r.moveStart('character',e.value.length); 
      r.collapse(true); 
      r.select(); 
    }

24、原生JavaScript检验URL链接是否有效

    function getUrlState(URL){ 
      var xmlhttp = new ActiveXObject("microsoft.xmlhttp"); 
      xmlhttp.Open("GET",URL, false);  
      try{  
        xmlhttp.Send(); 
      }catch(e){
      }finally{ 
        var result = xmlhttp.responseText; 
        if(result){ 
          if(xmlhttp.Status==200){ 
            return(true); 
          }else{ 
            return(false); 
          } 
        }else{ 
          return(false); 
        } 
      } 
    }

25、原生JavaScript格式化CSS样式代码

    function formatCss(s){//格式化代码
      s = s.replace(/\s*([\{\}\:\;\,])\s*/g, "$1");
      s = s.replace(/;\s*;/g, ";"); //清除连续分号
      s = s.replace(/\,[\s\.\#\d]*{/g, "{");
      s = s.replace(/([^\s])\{([^\s])/g, "$1 {\n\t$2");
      s = s.replace(/([^\s])\}([^\n]*)/g, "$1\n}\n$2");
      s = s.replace(/([^\s]);([^\s\}])/g, "$1;\n\t$2");
      return s;
    }

26、原生JavaScript压缩CSS样式代码

    function yasuoCss (s) {//压缩代码
      s = s.replace(/\/\*(.|\n)*?\*\//g, ""); //删除注释
      s = s.replace(/\s*([\{\}\:\;\,])\s*/g, "$1");
      s = s.replace(/\,[\s\.\#\d]*\{/g, "{"); //容错处理
      s = s.replace(/;\s*;/g, ";"); //清除连续分号
      s = s.match(/^\s*(\S+(\s+\S+)*)\s*$/); //去掉首尾空白
      return (s == null) ? "" : s[1];
    }

27、原生JavaScript获取当前路径

    var currentPageUrl = "";
    if (typeof this.href === "undefined") {
        currentPageUrl = document.location.toString().toLowerCase();
    }
    else {
        currentPageUrl = this.href.toString().toLowerCase();
    }

28、原生JavaScriptIP转成整型

    function _ip2int(ip){
        var num = 0;
        ip = ip.split(".");
        num = Number(ip[0]) * 256 * 256 * 256 + Number(ip[1]) * 256 * 256 + Number(ip[2]) * 256 + Number(ip[3]);
        num = num >>> 0;
        return num;
    }

29、原生JavaScript整型解析为IP地址

    function _int2iP(num){
        var str;
        var tt = new Array();
        tt[0] = (num >>> 24) >>> 0;
        tt[1] = ((num << 8) >>> 24) >>> 0;
        tt[2] = (num << 16) >>> 24;
        tt[3] = (num << 24) >>> 24;
        str = String(tt[0]) + "." + String(tt[1]) + "." + String(tt[2]) + "." + String(tt[3]);
        return str;
    }

30、原生JavaScript实现checkbox全选与全不选

    function checkAll() {
      var selectall = document.getElementById("selectall");
      var allbox = document.getElementsByName("allbox");
      if (selectall.checked) {
        for (var i = 0; i < allbox.length; i++) {
          allbox[i].checked = true;
        }
      } else {
        for (var i = 0; i < allbox.length; i++) {
          allbox[i].checked = false;
        }
      }
    }

(31~40)移动篇
31、原生JavaScript判断是否移动设备

    function isMobile(){
      if (typeof this._isMobile === 'boolean'){
        return this._isMobile;
      }
      var screenWidth = this.getScreenWidth();
      var fixViewPortsExperiment = rendererModel.runningExperiments.FixViewport || rendererModel.runningExperiments.fixviewport;
      var fixViewPortsExperimentRunning = fixViewPortsExperiment && (fixViewPortsExperiment.toLowerCase() === "new");
      if(!fixViewPortsExperiment){
        if(!this.isAppleMobileDevice()){
          screenWidth = screenWidth/window.devicePixelRatio;
        }
      }
      var isMobileScreenSize = screenWidth < 600;
      var isMobileUserAgent = false;
      this._isMobile = isMobileScreenSize && this.isTouchScreen();
      return this._isMobile;
    }

32、原生JavaScript判断是否移动设备访问

    function isMobileUserAgent(){
      return (/iphone|ipod|android.*mobile|windows.*phone|blackberry.*mobile/i.test(window.navigator.userAgent.toLowerCase()));
    }

33、原生JavaScript判断是否苹果移动设备访问

    function isAppleMobileDevice(){
      return (/iphone|ipod|ipad|Macintosh/i.test(navigator.userAgent.toLowerCase()));
    }

34、原生JavaScript判断是否安卓移动设备访问

    function isAndroidMobileDevice(){
      return (/android/i.test(navigator.userAgent.toLowerCase()));
    }

35、原生JavaScript判断是否Touch屏幕

    function isTouchScreen(){
      return (('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch);
    }

36、原生JavaScript判断是否在安卓上的谷歌浏览器

    function isNewChromeOnAndroid(){
      if(this.isAndroidMobileDevice()){
        var userAgent = navigator.userAgent.toLowerCase();
        if((/chrome/i.test(userAgent))){
          var parts = userAgent.split('chrome/');
     
          var fullVersionString = parts[1].split(" ")[0];
          var versionString = fullVersionString.split('.')[0];
          var version = parseInt(versionString);
     
          if(version >= 27){
            return true;
          }
        }
      }
      return false;
    }

37、原生JavaScript判断是否打开视窗

    function isViewportOpen() {
      return !!document.getElementById('wixMobileViewport');
    }

38、原生JavaScript获取移动设备初始化大小

    function getInitZoom(){
      if(!this._initZoom){
        var screenWidth = Math.min(screen.height, screen.width);
        if(this.isAndroidMobileDevice() && !this.isNewChromeOnAndroid()){
          screenWidth = screenWidth/window.devicePixelRatio;
        }
        this._initZoom = screenWidth /document.body.offsetWidth;
      }
      return this._initZoom;
    }

39、原生JavaScript获取移动设备最大化大小

    function getZoom(){
      var screenWidth = (Math.abs(window.orientation) === 90) ? Math.max(screen.height, screen.width) : Math.min(screen.height, screen.width);
      if(this.isAndroidMobileDevice() && !this.isNewChromeOnAndroid()){
        screenWidth = screenWidth/window.devicePixelRatio;
      }
      var FixViewPortsExperiment = rendererModel.runningExperiments.FixViewport || rendererModel.runningExperiments.fixviewport;
      var FixViewPortsExperimentRunning = FixViewPortsExperiment && (FixViewPortsExperiment === "New" || FixViewPortsExperiment === "new");
      if(FixViewPortsExperimentRunning){
        return screenWidth / window.innerWidth;
      }else{
        return screenWidth / document.body.offsetWidth;
      }
    }

40、原生JavaScript获取移动设备屏幕宽度

    function getScreenWidth(){
      var smallerSide = Math.min(screen.width, screen.height);
      var fixViewPortsExperiment = rendererModel.runningExperiments.FixViewport || rendererModel.runningExperiments.fixviewport;
      var fixViewPortsExperimentRunning = fixViewPortsExperiment && (fixViewPortsExperiment.toLowerCase() === "new");
      if(fixViewPortsExperiment){
        if(this.isAndroidMobileDevice() && !this.isNewChromeOnAndroid()){
          smallerSide = smallerSide/window.devicePixelRatio;
        }
      }
      return smallerSide;
    }

41、原生JavaScript完美判断是否为网址

    function IsURL(strUrl) {
        var regular = /^\b(((https?|ftp):\/\/)?[-a-z0-9]+(\.[-a-z0-9]+)*\.(?:com|edu|gov|int|mil|net|org|biz|info|name|museum|asia|coop|aero|[a-z][a-z]|((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]\d)|\d))\b(\/[-a-z0-9_:\@&?=+,.!\/~%\$]*)?)$/i
        if (regular.test(strUrl)) {
            return true;
        }
        else {
            return false;
        }
    }

42、原生JavaScript根据样式名称检索元素对象

    function getElementsByClassName(name) {
        var tags = document.getElementsByTagName('*') || document.all;
        var els = [];
        for (var i = 0; i < tags.length; i++) {
            if (tags[i].className) {
                var cs = tags[i].className.split(' ');
                for (var j = 0; j < cs.length; j++) {
                    if (name == cs[j]) {
                        els.push(tags[i]);
                        break
                    }
                }
            }
        }
        return els
    }

43、原生JavaScript判断是否以某个字符串开头

    String.prototype.startWith = function (s) {
        return this.indexOf(s) == 0
    }

44、原生JavaScript判断是否以某个字符串结束

    String.prototype.endWith = function (s) {
        var d = this.length - s.length;
        return (d >= 0 && this.lastIndexOf(s) == d)
    }

45、原生JavaScript返回IE浏览器的版本号

    function getIE(){
        if (window.ActiveXObject){
            var v = navigator.userAgent.match(/MSIE ([^;]+)/)[1];
            return parseFloat(v.substring(0, v.indexOf(".")))
        }
        return false
    }

46、原生JavaScript获取页面高度

    function getPageHeight(){
      var g = document, a = g.body, f = g.documentElement, d = g.compatMode == "BackCompat"
          ? a
          : g.documentElement;
      return Math.max(f.scrollHeight, a.scrollHeight, d.clientHeight);
    }

47、原生JavaScript获取页面scrollLeft

    function getPageScrollLeft(){
      var a = document;
      return a.documentElement.scrollLeft || a.body.scrollLeft;
    }

48、原生JavaScript获取页面可视宽度

    function getPageViewWidth(){
      var d = document, a = d.compatMode == "BackCompat"
          ? d.body
          : d.documentElement;
      return a.clientWidth;
    }

49、原生JavaScript获取页面宽度

    function getPageWidth(){
      var g = document, a = g.body, f = g.documentElement, d = g.compatMode == "BackCompat"
          ? a
          : g.documentElement;
      return Math.max(f.scrollWidth, a.scrollWidth, d.clientWidth);
    }

50、原生JavaScript获取页面scrollTop

    function getPageScrollTop(){
      var a = document;
      return a.documentElement.scrollTop || a.body.scrollTop;
    }

51、原生JavaScript获取页面可视高度

    function getPageViewHeight() {
      var d = document, a = d.compatMode == "BackCompat"
          ? d.body
          : d.documentElement;
      return a.clientHeight;
    }

52、原生JavaScript跨浏览器添加事件

    function addEvt(oTarget,sEvtType,fnHandle){
      if(!oTarget){return;}
      if(oTarget.addEventListener){
        oTarget.addEventListener(sEvtType,fnHandle,false);
      }else if(oTarget.attachEvent){
        oTarget.attachEvent("on" + sEvtType,fnHandle);
      }else{
        oTarget["on" + sEvtType] = fnHandle;
      }
    }

53、原生JavaScript跨浏览器删除事件

    function delEvt(oTarget,sEvtType,fnHandle){
      if(!oTarget){return;}
      if(oTarget.addEventListener){
        oTarget.addEventListener(sEvtType,fnHandle,false);
      }else if(oTarget.attachEvent){
        oTarget.attachEvent("on" + sEvtType,fnHandle);
      }else{
        oTarget["on" + sEvtType] = fnHandle;
      }
    }

54、原生JavaScript去掉url前缀

    function removeUrlPrefix(a){
      a=a.replace(/：/g,":").replace(/．/g,".").replace(/／/g,"/");
      while(trim(a).toLowerCase().indexOf("http://")==0){
        a=trim(a.replace(/http:\/\//i,""));
      }
      return a;
    }

55、原生JavaScript随机数时间戳

    function uniqueId(){
      var a=Math.random,b=parseInt;
      return Number(new Date()).toString()+b(10*a())+b(10*a())+b(10*a());
    }

56、原生JavaScript全角半角转换,iCase: 0全到半，1半到全，其他不转化

    function chgCase(sStr,iCase){
      if(typeof sStr != "string" || sStr.length <= 0 || !(iCase === 0 || iCase == 1)){
        return sStr;
      }
      var i,oRs=[],iCode;
      if(iCase){/*半->全*/
        for(i=0; i<sStr.length;i+=1){ 
          iCode = sStr.charCodeAt(i);
          if(iCode == 32){
            iCode = 12288;        
          }else if(iCode < 127){
            iCode += 65248;
          }
          oRs.push(String.fromCharCode(iCode)); 
        }   
      }else{/*全->半*/
        for(i=0; i<sStr.length;i+=1){ 
          iCode = sStr.charCodeAt(i);
          if(iCode == 12288){
            iCode = 32;
          }else if(iCode > 65280 && iCode < 65375){
            iCode -= 65248;       
          }
          oRs.push(String.fromCharCode(iCode)); 
        }   
      }   
      return oRs.join("");    
    }

57、原生JavaScript确认是否键盘有效输入值

    function checkKey(iKey){
      if(iKey == 32 || iKey == 229){return true;}/*空格和异常*/
      if(iKey>47 && iKey < 58){return true;}/*数字*/
      if(iKey>64 && iKey < 91){return true;}/*字母*/
      if(iKey>95 && iKey < 108){return true;}/*数字键盘1*/
      if(iKey>108 && iKey < 112){return true;}/*数字键盘2*/
      if(iKey>185 && iKey < 193){return true;}/*符号1*/
      if(iKey>218 && iKey < 223){return true;}/*符号2*/
      return false;
    }

58、原生JavaScript获取网页被卷去的位置

    function getScrollXY() {
        return document.body.scrollTop ? {
            x: document.body.scrollLeft,
            y: document.body.scrollTop
        }: {
            x: document.documentElement.scrollLeft,
            y: document.documentElement.scrollTop
        }
    }

59、原生JavaScript另一种正则日期格式化函数+调用方法

    Date.prototype.format = function(format){ //author: meizz
      var o = {
        "M+" : this.getMonth()+1, //month
        "d+" : this.getDate(),    //day
        "h+" : this.getHours(),   //hour
        "m+" : this.getMinutes(), //minute
        "s+" : this.getSeconds(), //second
        "q+" : Math.floor((this.getMonth()+3)/3),  //quarter
        "S" : this.getMilliseconds() //millisecond
      }
      if(/(y+)/.test(format)) format=format.replace(RegExp.$1,
        (this.getFullYear()+"").substr(4 - RegExp.$1.length));
      for(var k in o)if(new RegExp("("+ k +")").test(format))
        format = format.replace(RegExp.$1,
          RegExp.$1.length==1 ? o[k] :
            ("00"+ o[k]).substr((""+ o[k]).length));
      return format;
    }
    alert(new Date().format("yyyy-MM-dd hh:mm:ss"));

60、原生JavaScript时间个性化输出功能

    /*
    1、< 60s, 显示为“刚刚”
    2、>= 1min && < 60 min, 显示与当前时间差“XX分钟前”
    3、>= 60min && < 1day, 显示与当前时间差“今天 XX:XX”
    4、>= 1day && < 1year, 显示日期“XX月XX日 XX:XX”
    5、>= 1year, 显示具体日期“XXXX年XX月XX日 XX:XX”
     */
    function timeFormat(time){
      var date = new Date(time)
        , curDate = new Date()
        , year = date.getFullYear()
        , month = date.getMonth() + 1
        , day = date.getDate()
        , hour = date.getHours()
        , minute = date.getMinutes()
        , curYear = curDate.getFullYear()
        , curHour = curDate.getHours()
        , timeStr;
     
      if(year < curYear){
        timeStr = year +'年'+ month +'月'+ day +'日 '+ hour +':'+ minute;
      }else{
        var pastTime = curDate - date
          , pastH = pastTime/3600000;
     
        if(pastH > curHour){
          timeStr = month +'月'+ day +'日 '+ hour +':'+ minute;
        }else if(pastH >= 1){
          timeStr = '今天 ' + hour +':'+ minute +'分';
        }else{
          var pastM = curDate.getMinutes() - minute;
          if(pastM > 1){
            timeStr = pastM +'分钟前';
          }else{
            timeStr = '刚刚';
          }
        }
      }
      return timeStr;
    }

61、原生JavaScript解决offsetX兼容性问题

    // 针对火狐不支持offsetX/Y
    function getOffset(e){
      var target = e.target, // 当前触发的目标对象
          eventCoord,
          pageCoord,
          offsetCoord;
     
      // 计算当前触发元素到文档的距离
      pageCoord = getPageCoord(target);
     
      // 计算光标到文档的距离
      eventCoord = {
        X : window.pageXOffset + e.clientX,
        Y : window.pageYOffset + e.clientY
      };
     
      // 相减获取光标到第一个定位的父元素的坐标
      offsetCoord = {
        X : eventCoord.X - pageCoord.X,
        Y : eventCoord.Y - pageCoord.Y
      };
      return offsetCoord;
    }
     
    function getPageCoord(element){
      var coord = { X : 0, Y : 0 };
      // 计算从当前触发元素到根节点为止，
      // 各级 offsetParent 元素的 offsetLeft 或 offsetTop 值之和
      while (element){
        coord.X += element.offsetLeft;
        coord.Y += element.offsetTop;
        element = element.offsetParent;
      }
      return coord;
    }

62、原生JavaScript常用的正则表达式

    //正整数
    /^[0-9]*[1-9][0-9]*$/;
    //负整数
    /^-[0-9]*[1-9][0-9]*$/;
    //正浮点数
    /^(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$/;   
    //负浮点数
    /^(-(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*)))$/;  
    //浮点数
    /^(-?\d+)(\.\d+)?$/;
    //email地址
    /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
    //url地址
    /^[a-zA-z]+://(\w+(-\w+)*)(\.(\w+(-\w+)*))*(\?\S*)?$/;
    //年/月/日（年-月-日、年.月.日）
    /^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$/;
    //匹配中文字符
    /[\u4e00-\u9fa5]/;
    //匹配帐号是否合法(字母开头，允许5-10字节，允许字母数字下划线)
    /^[a-zA-Z][a-zA-Z0-9_]{4,9}$/;
    //匹配空白行的正则表达式
    /\n\s*\r/;
    //匹配中国邮政编码
    /[1-9]\d{5}(?!\d)/;
    //匹配身份证
    /\d{15}|\d{18}/;
    //匹配国内电话号码
    /(\d{3}-|\d{4}-)?(\d{8}|\d{7})?/;
    //匹配IP地址
    /((2[0-4]\d|25[0-5]|[01]?\d\d?)\.){3}(2[0-4]\d|25[0-5]|[01]?\d\d?)/;
    //匹配首尾空白字符的正则表达式
    /^\s*|\s*$/;
    //匹配HTML标记的正则表达式
    < (\S*?)[^>]*>.*?|< .*? />;

63、原生JavaScript实现返回顶部的通用方法

    function backTop(btnId) {
      var btn = document.getElementById(btnId);
      var d = document.documentElement;
      var b = document.body;
      window.onscroll = set;
      btn.style.display = "none";
      btn.onclick = function() {
        btn.style.display = "none";
        window.onscroll = null;
        this.timer = setInterval(function() {
          d.scrollTop -= Math.ceil((d.scrollTop + b.scrollTop) * 0.1);
          b.scrollTop -= Math.ceil((d.scrollTop + b.scrollTop) * 0.1);
          if ((d.scrollTop + b.scrollTop) == 0) clearInterval(btn.timer, window.onscroll = set);
        },
        10);
      };
      function set() {
        btn.style.display = (d.scrollTop + b.scrollTop > 100) ? 'block': "none"
      }
    };
    backTop('goTop');

64、原生JavaScript获得URL中GET参数值

    // 用法：如果地址是 test.htm?t1=1&t2=2&t3=3, 那么能取得：GET["t1"], GET["t2"], GET["t3"]
    function get_get(){ 
      querystr = window.location.href.split("?")
      if(querystr[1]){
        GETs = querystr[1].split("&")
        GET =new Array()
        for(i=0;i<GETs.length;i++){
          tmp_arr = GETs[i].split("=")
          key=tmp_arr[0]
          GET[key] = tmp_arr[1]
        }
      }
      return querystr[1];
    }

65、原生JavaScript实现全选通用方法

    function checkall(form, prefix, checkall) {
      var checkall = checkall ? checkall : 'chkall';
      for(var i = 0; i < form.elements.length; i++) {
        var e = form.elements[i];
        if(e.type=="checkbox"){
          e.checked = form.elements[checkall].checked;
        }
      }
    }

66、原生JavaScript实现全部取消选择通用方法

    function uncheckAll(form) {
      for (var i=0;i<form.elements.length;i++){
        var e = form.elements[i];
        if (e.name != 'chkall')
        e.checked=!e.checked;
      }
    }

67、原生JavaScript实现打开一个窗体通用方法

    function openWindow(url,windowName,width,height){
        var x = parseInt(screen.width / 2.0) - (width / 2.0); 
        var y = parseInt(screen.height / 2.0) - (height / 2.0);
        var isMSIE= (navigator.appName == "Microsoft Internet Explorer");
        if (isMSIE) {
          var p = "resizable=1,location=no,scrollbars=no,width=";
          p = p+width;
          p = p+",height=";
          p = p+height;
          p = p+",left=";
          p = p+x;
          p = p+",top=";
          p = p+y;
            retval = window.open(url, windowName, p);
        } else {
            var win = window.open(url, "ZyiisPopup", "top=" + y + ",left=" + x + ",scrollbars=" + scrollbars + ",dialog=yes,modal=yes,width=" + width + ",height=" + height + ",resizable=no" );
            eval("try { win.resizeTo(width, height); } catch(e) { }");
            win.focus();
        }
    }

68、原生JavaScript判断是否为客户端设备

    function client(o){ 
           var b = navigator.userAgent.toLowerCase();   
         var t = false;
         if (o == 'isOP'){
           t = b.indexOf('opera') > -1;
         }
         if (o == 'isIE'){
           t = b.indexOf('msie') > -1;
         }
         if (o == 'isFF'){
           t = b.indexOf('firefox') > -1;
         }
           return t;
    }

69、原生JavaScript获取单选按钮的值

    function get_radio_value(field){
      if(field&&field.length){  
        for(var i=0;i<field.length;i++){    
          if(field[i].checked){     
            return field[i].value;                
          }     
        }   
      }else {   
        return ;        
      } 
    }

70、原生JavaScript获取复选框的值

    function get_checkbox_value(field){ 
      if(field&&field.length){  
        for(var i=0;i<field.length;i++){      
          if(field[i].checked && !field[i].disabled){
            return field[i].value;
          }
        }   
      }else {
        return;
      }     
    }

(71~80)验证篇这一篇文章主要是10个比较常用表单验证功能，包括了邮箱、危险字符、验证长度、验证网址、验证小数、整数、浮点数等常用的验证，有了这些代码片段，平时的表单验证也可以不需要jquery的验证插件了，希望可以帮到大家。。。

71、原生JavaScript判断是否为邮箱

    function isEmail(str){
        var re=/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/; 
      if (re.test(str) != true) {
        return false;
      }else{
        return true;
      } 
    }

72、原生JavaScript判断是否有列表中的危险字符

    function isValidReg(chars){
      var re=/<|>|\[|\]|\{|\}|『|』|※|○|●|◎|§|△|▲|☆|★|◇|◆|□|▼|㊣|﹋|⊕|⊙|〒|ㄅ|ㄆ|ㄇ|ㄈ|ㄉ|ㄊ|ㄋ|ㄌ|ㄍ|ㄎ|ㄏ|ㄐ|ㄑ|ㄒ|ㄓ|ㄔ|ㄕ|ㄖ|ㄗ|ㄘ|ㄙ|ㄚ|ㄛ|ㄜ|ㄝ|ㄞ|ㄟ|ㄢ|ㄣ|ㄤ|ㄥ|ㄦ|ㄧ|ㄨ|ㄩ|■|▄|▆|\*|@|#|\^|\\/;
      if (re.test( chars) == true) {
        return false;
      }else{
        return true;
      } 
    }

73、原生JavaScript判断字符串是否大于规定的长度

    function isValidLength(chars, len) {
      if (chars.length < len) {
        return false;
      }
      return true;
    }

74、原生JavaScript判断字符串是为网址不区分大小写

    function isValidURL( chars ) {
      var re=/^([hH][tT]{2}[pP]:\/\/|[hH][tT]{2}[pP][sS]:\/\/)(\S+\.\S+)$/;
      if (!isNULL(chars)) {
        chars = jsTrim(chars);
        if (chars.match(re) == null)
          return false;
        else
          return true;
      }
      return false;
    }

75、原生JavaScript判断字符串是否为小数

    function isValidDecimal( chars ) {
      var re=/^\d*\.?\d{1,2}$/;
      if (chars.match(re) == null)
        return false;
      else
        return true;
    }

76、原生JavaScript判断字符串是否为整数

    function isNumber( chars ) {
      var re=/^\d*$/;
      if (chars.match(re) == null)
        return false;
      else
        return true;
    }

77、原生JavaScript判断字符串是否为浮点数

    function isFloat( str ) {
      for(i=0;i<str.length;i++)  {
         if ((str.charAt(i)<"0" || str.charAt(i)>"9")&& str.charAt(i) != '.'){
          return false;
         }
      }
      return true;
    }

78、原生JavaScript判断字符是否为A-Za-z英文字母

    function isLetters( str ){
      var re=/^[A-Za-z]+$/;
      if (str.match(re) == null)
        return false;
      else
        return true;
    }

79、原生JavaScript判断字符串是否邮政编码

    function isValidPost( chars ) {
      var re=/^\d{6}$/;
      if (chars.match(re) == null)
        return false;
      else
        return true;
    }

80、原生JavaScript判断字符是否空NULL

    function isNULL( chars ) {
      if (chars == null)
        return true;
      if (jsTrim(chars).length==0)
        return true;
      return false;
    }

81、原生JavaScript用正则表达式提取页面代码中所有网址

    var aa = document.documentElement.outerHTML.match(/(url\(|src=\'#\'"  ]+)[\"\'\)]*|(http:\/\/[\w\-\.]+[^\"\'\(\)\<\>\[\] ]+)/ig).join("\r\n").replace(/^(src=\'#\'" ) ]*$/igm,"");
    alert(aa)

82、原生JavaScript用正则表达式清除相同的数组(低效率)

    Array.prototype.unique=function(){
      return this.reverse().join(",").match(/([^,]+)(?!.*\1)/ig).reverse();
    }

83、原生JavaScript用正则表达式清除相同的数组(高效率)

    String.prototype.unique=function(){
      var x=this.split(/[\r\n]+/);
      var y='';
      for(var i=0;i<x.length;i++){
        if(!new RegExp("^"+x[i].replace(/([^\w])/ig,"\\$1")+"$","igm").test(y)){
          y+=x[i]+"\r\n"
        }
      }
      return y
    }

84、原生JavaScript用正则表达式按字母排序，对每行进行数组排序

    function SetSort(){
      var text=K1.value.split(/[\r\n]/).sort().join("\r\n");//顺序
      var test=K1.value.split(/[\r\n]/).sort().reverse().join("\r\n");//反序
      K1.value=K1.value!=text?text:test;
    }

85、原生JavaScript字符串反序

    function IsReverse(text){
      return text.split('').reverse().join('');
    }

86、原生JavaScript用正则表达式清除html代码中的脚本

    function clear_script(){
      K1.value=K1.value.replace(/<script.*?>[\s\S]*?<\/script>|\s+on[a-zA-Z]{3,16}\s?=\s?"[\s\S]*?"|\s+on[a-zA-Z]{3,16}\s?=\s?'[\s\S]*?'|\s+on[a-zA-Z]{3,16}\s?=[^ >]+/ig,"");
    }

87、原生JavaScript动态执行JavaScript脚本

    function javascript(){
      try{
        eval(K1.value);
      }catch(e){
        alert(e.message);
      }
    }

88、原生JavaScript动态执行VBScript脚本

    function vbscript(){
      try{
        var script=document.getElementById("K1").value;
        if(script.trim()=="")return;
        window.execScript('On Error Resume Next \n'+script+'\n If Err.Number<>0 Then \n MsgBox "请输入正确的VBScript脚本!",48,"脚本错误!" \n End If',"vbscript")
      }catch(e){
        alert(e.message);
      }
    }

89、原生JavaScript实现金额大写转换函数

    function transform(tranvalue) {
      try {
        var i = 1;
        var dw2 = new Array("", "万", "亿"); //大单位
        var dw1 = new Array("拾", "佰", "仟"); //小单位
        var dw = new Array("零", "壹", "贰", "叁", "肆", "伍", "陆", "柒", "捌", "玖"); //整数部分用
        //以下是小写转换成大写显示在合计大写的文本框中     
        //分离整数与小数
        var source = splits(tranvalue);
        var num = source[0];
        var dig = source[1];
        //转换整数部分
        var k1 = 0; //计小单位
        var k2 = 0; //计大单位
        var sum = 0;
        var str = "";
        var len = source[0].length; //整数的长度
        for (i = 1; i <= len; i++) {
          var n = source[0].charAt(len - i); //取得某个位数上的数字
          var bn = 0;
          if (len - i - 1 >= 0) {
            bn = source[0].charAt(len - i - 1); //取得某个位数前一位上的数字
          }
          sum = sum + Number(n);
          if (sum != 0) {
            str = dw[Number(n)].concat(str); //取得该数字对应的大写数字，并插入到str字符串的前面
            if (n == '0') sum = 0;
          }
          if (len - i - 1 >= 0) { //在数字范围内
            if (k1 != 3) { //加小单位
              if (bn != 0) {
                str = dw1[k1].concat(str);
              }
              k1++;
            } else { //不加小单位，加大单位
              k1 = 0;
              var temp = str.charAt(0);
              if (temp == "万" || temp == "亿") //若大单位前没有数字则舍去大单位
              str = str.substr(1, str.length - 1);
              str = dw2[k2].concat(str);
              sum = 0;
            }
          }
          if (k1 == 3) //小单位到千则大单位进一
          {
            k2++;
          }
        }
        //转换小数部分
        var strdig = "";
        if (dig != "") {
          var n = dig.charAt(0);
          if (n != 0) {
            strdig += dw[Number(n)] + "角"; //加数字
          }
          var n = dig.charAt(1);
          if (n != 0) {
            strdig += dw[Number(n)] + "分"; //加数字
          }
        }
        str += "元" + strdig;
      } catch(e) {
        return "0元";
      }
      return str;
    }
    //拆分整数与小数
    function splits(tranvalue) {
      var value = new Array('', '');
      temp = tranvalue.split(".");
      for (var i = 0; i < temp.length; i++) {
        value[i] = temp[i];
      }
      return value;
    }

90、原生JavaScript常用的正则表达式大收集

    匹配中文字符的正则表达式： [\u4e00-\u9fa5] 
    匹配双字节字符（包括汉字在内）：[^\x00-\xff] 
    匹配空行的正则表达式：\n[\s| ]*\r 
    匹配 HTML 标记的正则表达式：<(.*)>.*<\/\1>|<(.*) \/>
    匹配首尾空格的正则表达式：(^\s*)|(\s*$) 
    匹配 IP 地址的正则表达式：/(\d+)\.(\d+)\.(\d+)\.(\d+)/g
    匹配 Email 地址的正则表达式：\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*
    匹配网址 URL 的正则表达式：http://(/[\w-]+\.)+[\w-]+(/[\w- ./?%&=]*)?
    sql 语句：^(select|drop|delete|create|update|insert).*$ 
    非负整数：^\d+$ 
    正整数：^[0-9]*[1-9][0-9]*$ 
    非正整数：^((-\d+)|(0+))$ 
    负整数：^-[0-9]*[1-9][0-9]*$ 
    整数：^-?\d+$ 
    非负浮点数：^\d+(\.\d+)?$ 
    正浮点数：^((0-9)+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$ 
    非正浮点数：^((-\d+\.\d+)?)|(0+(\.0+)?))$ 
    英文字符串：^[A-Za-z]+$ 
    英文大写串：^[A-Z]+$ 
    英文小写串：^[a-z]+$ 
    英文字符数字串：^[A-Za-z0-9]+$ 
    英数字加下划线串：^\w+$ 
    E-mail地址：^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$ 
    URL：^[a-zA-Z]+://(\w+(-\w+)*)(\.(\w+(-\w+)*))*(\?\s*)?$ 或：^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*$ 
    邮政编码：^[1-9]\d{5}$ 
    电话号码：^((\(\d{2,3}\))|(\d{3}\-))?(\(0\d{2,3}\)|0\d{2,3}-)?[1-9]\d{6,7}(\-\d{1,4})?$ 
    手机号码：^((\(\d{2,3}\))|(\d{3}\-))?13\d{9}$ 
    双字节字符（包括汉字在内）：^\x00-\xff 
    匹配首尾空格：(^\s*)|(\s*$)
    匹配 HTML 标记：<(.*)>.*<\/\1>|<(.*) \/> 
    匹配空行：\n[\s| ]*\r 
    提取信息中的网络链接：(h|H)(r|R)(e|E)(f|F) *= *('|")?(\w|\\|\/|\.)+('|"| *|>)? 
    提取信息中的邮件地址：\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)* 
    提取信息中的图片链接：(s|S)(r|R)(c|C) *= *('|")?(\w|\\|\/|\.)+('|"| *|>)? 
    提取信息中的 IP 地址：(\d+)\.(\d+)\.(\d+)\.(\d+) 
    提取信息中的中国手机号码：(86)*0*13\d{9} 
    提取信息中的中国固定电话号码：(\(\d{3,4}\)|\d{3,4}-|\s)?\d{8} 
    提取信息中的中国电话号码（包括移动和固定电话）：(\(\d{3,4}\)|\d{3,4}-|\s)?\d{7,14} 
    提取信息中的中国邮政编码：[1-9]{1}(\d+){5} 
    提取信息中的浮点数（即小数）：(-?\d*)\.?\d+ 
    提取信息中的任何数字 ：(-?\d*)(\.\d+)? 
    IP：(\d+)\.(\d+)\.(\d+)\.(\d+) 
    电话区号：^0\d{2,3}$
    腾讯 QQ 号：^[1-9]*[1-9][0-9]*$ 
    帐号（字母开头，允许 5-16 字节，允许字母数字下划线）：^[a-zA-Z][a-zA-Z0-9_]{4,15}$ 
    中文、英文、数字及下划线：^[\u4e00-\u9fa5_a-zA-Z0-9]+$

91、原生JavaScript实现窗体改变事件resize的操作（兼容所以的浏览器）

    (function(){
      var fn = function(){
        var w = document.documentElement ? document.documentElement.clientWidth : document.body.clientWidth
          ,r = 1255
          ,b = Element.extend(document.body)
          ,classname = b.className;
        if(w < r){
          //当窗体的宽度小于1255的时候执行相应的操作
        }else{
          //当窗体的宽度大于1255的时候执行相应的操作
        }
      }
      if(window.addEventListener){
        window.addEventListener('resize', function(){ fn(); });
      }else if(window.attachEvent){
        window.attachEvent('onresize', function(){ fn(); });
      }
      fn();
    })();

92、原生JavaScript用正则清除空格分左右

    function ltrim(s){ return s.replace( /^(\s*|　*)/, ""); } 
    function rtrim(s){ return s.replace( /(\s*|　*)$/, ""); } 
    function trim(s){ return ltrim(rtrim(s));}

93、原生JavaScript判断变量是否空值

    /**
     * 判断变量是否空值
     * undefined, null, '', false, 0, [], {} 均返回true，否则返回false
     */
    function empty(v){
        switch (typeof v){
            case 'undefined' : return true;
            case 'string'    : if(trim(v).length == 0) return true; break;
            case 'boolean'   : if(!v) return true; break;
            case 'number'    : if(0 === v) return true; break;
            case 'object'    : 
                if(null === v) return true;
                if(undefined !== v.length && v.length==0) return true;
                for(var k in v){return false;} return true;
                break;
        }
        return false;
    }

94、原生JavaScript实现base64解码

    function base64_decode(data){
      var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
      var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,ac = 0,dec = "",tmp_arr = [];
      if (!data) { return data; }
      data += '';
      do { 
        h1 = b64.indexOf(data.charAt(i++));
        h2 = b64.indexOf(data.charAt(i++));
        h3 = b64.indexOf(data.charAt(i++));
        h4 = b64.indexOf(data.charAt(i++));
        bits = h1 << 18 | h2 << 12 | h3 << 6 | h4;
        o1 = bits >> 16 & 0xff;
        o2 = bits >> 8 & 0xff;
        o3 = bits & 0xff;
        if (h3 == 64) {
          tmp_arr[ac++] = String.fromCharCode(o1);
        } else if (h4 == 64) {
          tmp_arr[ac++] = String.fromCharCode(o1, o2);
        } else {
          tmp_arr[ac++] = String.fromCharCode(o1, o2, o3);
        }
      } while (i < data.length);
      dec = tmp_arr.join('');
      dec = utf8_decode(dec);
      return dec;
    }

95、原生JavaScript实现utf8解码

    function utf8_decode(str_data){
      var tmp_arr = [],i = 0,ac = 0,c1 = 0,c2 = 0,c3 = 0;str_data += '';
      while (i < str_data.length) {
        c1 = str_data.charCodeAt(i);
        if (c1 < 128) {
          tmp_arr[ac++] = String.fromCharCode(c1);
          i++;
        } else if (c1 > 191 && c1 < 224) {       
          c2 = str_data.charCodeAt(i + 1);
          tmp_arr[ac++] = String.fromCharCode(((c1 & 31) << 6) | (c2 & 63));
          i += 2;
        } else {
          c2 = str_data.charCodeAt(i + 1);
          c3 = str_data.charCodeAt(i + 2);
          tmp_arr[ac++] = String.fromCharCode(((c1 & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
          i += 3;
        }
      } 
      return tmp_arr.join('');
    }

96、原生JavaScript获取窗体可见范围的宽与高

    function getViewSize(){
      var de=document.documentElement;
      var db=document.body;
      var viewW=de.clientWidth==0 ?  db.clientWidth : de.clientWidth;
      var viewH=de.clientHeight==0 ?  db.clientHeight : de.clientHeight;
      return Array(viewW ,viewH);
    }

97、原生JavaScript判断IE版本号（既简洁、又向后兼容！）

    var _IE = (function(){
        var v = 3, div = document.createElement('div'), all = div.getElementsByTagName('i');
        while (
            div.innerHTML = '<!--[if gt IE ' + (++v) + ']><i></i><![endif]-->',
            all[0]
        );
        return v > 4 ? v : false ;
    }());

98、原生JavaScript获取浏览器版本号

    function browserVersion(types) {
        var other = 1;
        for (i in types) {
            var v = types[i] ? types[i] : i;
            if (USERAGENT.indexOf(v) != -1) {
                var re = new RegExp(v + '(\\/|\\s|:)([\\d\\.]+)', 'ig');
                var matches = re.exec(USERAGENT);
                var ver = matches != null ? matches[2] : 0;
                other = ver !== 0 && v != 'mozilla' ? 0 : other;
            } else {
                var ver = 0;
            }
            eval('BROWSER.' + i + '= ver');
        }
        BROWSER.other = other;
    }

99、原生JavaScript半角转换为全角函数

    function ToDBC(str){
      var result = '';
      for(var i=0; i < str.length; i++){
        code = str.charCodeAt(i);
        if(code >= 33 && code <= 126){
          result += String.fromCharCode(str.charCodeAt(i) + 65248);
        }else if (code == 32){
          result += String.fromCharCode(str.charCodeAt(i) + 12288 - 32);
        }else{
          result += str.charAt(i);
        }
      }
     return result;
    }

100、原生JavaScript全角转换为半角函数

    function ToCDB(str){
      var result = '';
      for(var i=0; i < str.length; i++){
        code = str.charCodeAt(i);
        if(code >= 65281 && code <= 65374){
          result += String.fromCharCode(str.charCodeAt(i) - 65248);
        }else if (code == 12288){
          result += String.fromCharCode(str.charCodeAt(i) - 12288 + 32);
        }else{
          result += str.charAt(i);
        }
      }
     return result;
    }







javascript原生的api本来就支持,Base64,但是由于之前的javascript局限性，导致Base64基本中看不中用。当前html5标准正式化之际，Base64将有较大的转型空间,对于Html5 Api中出现的如FileReader Api, 拖拽上传,甚至是Canvas,Video截图都可以实现。
好了，前言说了一大堆，开发者需要重视：
一.我们来看看，在javascript中如何使用Base64转码
var str = 'javascript';

window.btoa(str)
//转码结果 "amF2YXNjcmlwdA=="

window.atob("amF2YXNjcmlwdA==")
//解码结果 "javascript"
二.对于转码来说，Base64转码的对象只能是字符串，因此来说，对于其他数据还有这一定的局限性，在此特别需要注意的是对Unicode转码。
var str = "China，中国"
window.btoa(str)
Uncaught DOMException: Failed to execute 'btoa' on 'Window': The string to be encoded contains characters outside of the Latin1 range.
很明显，这种方式是不行的，那么如何让他支持汉字呢，这就要使用window.encodeURIComponent和window.decodeURIComponent
var str = "China，中国";

window.btoa(window.encodeURIComponent(str))
//"Q2hpbmElRUYlQkMlOEMlRTQlQjglQUQlRTUlOUIlQkQ="

window.decodeURIComponent(window.atob('Q2hpbmElRUYlQkMlOEMlRTQlQjglQUQlRTUlOUIlQkQ='))
//"China，中国"
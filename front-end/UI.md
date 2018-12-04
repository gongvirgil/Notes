<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<style>
    pre {max-height: 100px;}
</style>

#小点

##普通小圆点

###示例：

<a class="UI-common-little-circle circle-default"></a>
<a class="UI-common-little-circle circle-primary"></a>
<a class="UI-common-little-circle circle-success"></a>
<a class="UI-common-little-circle circle-info"></a>
<a class="UI-common-little-circle circle-warning"></a>
<a class="UI-common-little-circle circle-danger"></a>
<style>
    .UI-common-little-circle {background-color: currentcolor; border: 1px solid currentcolor; border-radius: 50%; color: #c2c2c2; display: inline-block; padding: 10px; text-decoration: none;}
    .circle-primary {color: #1ab394;}
    .circle-success {color: #1c84c6;}
    .circle-info {color: #23c6c8;}
    .circle-warning {color: #f8ac59;}
    .circle-danger {color: #ed5565;}
</style>

###代码：
```
    <a class="little-circle"></a>
    <style>
        .little-circle {background-color: currentcolor; border: 1px solid currentcolor; border-radius: 50%; color: #c2c2c2; display: inline-block; padding: 10px; text-decoration: none;}
    </style>
```

#按钮

##色块按钮

###示例：    
<a class="UI-btn btn-color-block btn-default">btn-default</a>
<a class="UI-btn btn-color-block btn-primary">btn-primary</a>
<a class="UI-btn btn-color-block btn-success">btn-success</a>
<a class="UI-btn btn-color-block btn-info">btn-info</a>
<a class="UI-btn btn-color-block btn-warning">btn-warning</a>
<a class="UI-btn btn-color-block btn-danger">btn-danger</a>

###代码：
```
    <a class="btn">按钮</a>
    <style>
        .btn {background-color: #c2c2c2; border: 1px solid transparent; border-radius: 4px; color: #fff; cursor: pointer; display: inline-block; font-size: 14px; font-weight: 400; line-height: 1.5; margin-bottom: 0; padding: 6px 12px; text-align: center; text-decoration: none; vertical-align: middle; white-space: nowrap;}
        .btn:active,.btn:hover {background-color:#bababa; border-color:#bababa;}
    </style>
```

##线框按钮

###示例： 
<a class="UI-btn btn-border-block btn-default">默认</a>
<a class="UI-btn btn-border-block btn-primary">主要</a>
<a class="UI-btn btn-border-block btn-success">成功</a>
<a class="UI-btn btn-border-block btn-info">信息</a>
<a class="UI-btn btn-border-block btn-warning">警告</a>
<a class="UI-btn btn-border-block btn-danger">危险</a>

###代码：
```
    <a class="btn">按钮</a>
    <style>
        .btn {color: #c2c2c2;border-radius: 3px; border: 1px solid #c2c2c2; border-radius: 4px; cursor: pointer; display: inline-block; font-size: 14px; font-weight: 400; line-height: 1.5; margin-bottom: 0; padding: 6px 12px; text-align: center; vertical-align: middle; white-space: nowrap; text-decoration: none; }
        .btn:active,.btn:hover {background-color:#bababa; border-color:#bababa; color:#fff;}
    </style>
```

##3D按钮

###示例： 
<a class="UI-btn btn-3d-block btn-default">默认</a>
<a class="UI-btn btn-3d-block btn-primary">主要</a>
<a class="UI-btn btn-3d-block btn-success">成功</a>
<a class="UI-btn btn-3d-block btn-info">信息</a>
<a class="UI-btn btn-3d-block btn-warning">警告</a>
<a class="UI-btn btn-3d-block btn-danger">危险</a>

###代码：
```
    <a class="btn">按钮</a>
    <style>
        .btn {border: 1px solid #c2c2c2; border-radius: 4px; box-shadow: 0 0 0 #c2c2c2 inset, 0 5px 0 0 #c2c2c2, 0 10px 5px #999; color: #c2c2c2; cursor: pointer; display: inline-block; font-size: 14px; font-weight: 400; line-height: 1.5; margin-bottom: 0; padding: 6px 12px; text-align: center; text-decoration: none; vertical-align: middle; white-space: nowrap;}
        .btn:active,.btn:hover {background-color:#bababa; border-color:#bababa; color:#fff;} 
    </style>
```

##按钮组

###示例： 
<div class="UI-btn-group">
    <a class="UI-btn-group-btn btn-left">左</a>
    <a class="UI-btn-group-btn">中</a>
    <a class="UI-btn-group-btn active">中</a>
    <a class="UI-btn-group-btn">中</a>
    <a class="UI-btn-group-btn btn-right">右</a>
</div>  
<br>

###代码：
```
    <div class="btn-group">
        <a class="btn btn-left">左</a>
        <a class="btn">中</a>
        <a class="btn active">中</a>
        <a class="btn">中</a>
        <a class="btn btn-right">右</a>
    </div>
    <style>
        .btn-group>.btn {background: #fff none repeat scroll 0 0; border: 1px solid #e7eaec; cursor: pointer; display: inline-block; float: left; font-size: 14px; font-weight: 400; line-height: 1.5; margin-left: -1px; padding: 6px 12px; position: relative; text-align: center; text-decoration: none; vertical-align: middle; white-space: nowrap;}
        .btn-group>.btn:active, .btn-group>.btn:hover {z-index:2;border-color: #d2d2d2;}
        .btn-group>.btn.active{z-index:2;border-color: #d2d2d2;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15) inset;}
        .btn-group>.btn.btn-left {border-bottom-left-radius: 4px; border-top-left-radius: 4px; margin-left:0;}
        .btn-group>.btn.btn-right {border-bottom-right-radius: 4px; border-top-right-radius: 4px;}
    </style>
```

#进度条

##基本进度条

###示例：
<div class="progress">
    <div class="progress-bar">60%</div>
</div>
<style>
.progress {
    background-color: #f5f5f5;
    border-radius: 4px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset;
    height: 20px;
    margin-bottom: 20px;
    overflow: hidden;
}
.progress-bar {
    background-color: #2fa4e7;
    box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.15) inset;
    color: #ffffff;
    float: left;
    font-size: 12px;
    height: 100%;
    line-height: 20px;
    text-align: center;
    transition: width 0.6s ease 0s;
    width: 60%;
}
</style>
###代码：
```
    <div class="progress">
        <div class="progress-bar">60%</div>
    </div>
    <style>
    .progress {background-color: #f5f5f5; border-radius: 4px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset; height: 20px; margin-bottom: 20px; overflow: hidden; }
    .progress-bar {background-color: #2fa4e7; box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.15) inset; color: #ffffff; float: left; font-size: 12px; height: 100%; line-height: 20px; text-align: center; transition: width 0.6s ease 0s; width: 60%; }
    </style>
```

#选项卡

##横向选项卡切换

###示例： 
<div class="UI-tabs">
    <ul class="UI-tabs-nav">
        <li class="active"><a>第一个选项卡</a></li>
        <li><a>第二个选项卡</a></li>
    </ul>
    <div class="UI-tabs-content">
        <div class="UI-tab tab-1 active">
            <div class="UI-tab-body">
                <p>如何让你遇见我 在我最美丽的时刻 为这 我已在佛前求了五百年 求佛让我们结一段尘缘 佛于是把我化做一棵树 长在你必经的路旁 阳光下 慎重地开满了花 朵朵都是我前世的盼望 当你走近 请你细听 那颤抖的叶 是我等 待的热情 而当你终于无视地走过 在你身后落了一地的 朋友啊 那不是花瓣 是我凋零的心</p>
            </div>
        </div>
        <div class="UI-tab tab-2">
            <div class="UI-tab-body">
                <p> 这时候，也方才明白：原来这样的爱并不悲哀。没有尘世的牵绊，没有罗嗦的尾巴，没有俗艳的锦绣，也没有混浊的泥汁。简明，利落，干净，完全。这种爱，古典得像一千年前的庙，晶莹得像一弯星星搭起的桥，鲜美得像春天初生的一抹鹅黄的草。 这样的爱，真的也很好。</p>
            </div>
        </div>
    </div>
</div>
<br>

###代码：
```
    <div class="tabs">
        <ul class="tabs-nav">
            <li class="active"><a>第一个选项卡</a></li>
            <li><a>第二个选项卡</a></li>
        </ul>
        <div class="tabs-content">
            <div class="tab tab-1 active">
                <div class="tab-body">内容1</div>
            </div>
            <div class="tab tab-2">
                <div class="tab-body">内容2</div>
            </div>
        </div>
    </div>
    <style>
        .tabs{background-color: #f3f3f3;}
        .tabs>.tabs-nav {border-bottom: 1px solid #e7eaec; display: table; margin-bottom: 0; padding-left: 0;}
        .tabs>.tabs-nav>li {display: block; float: left; margin-bottom: -1px;}
        .tabs>.tabs-nav>li>a {border: 1px solid transparent; border-radius: 4px 4px 0 0; color: #a7b1c2; cursor: pointer; display: block; font-weight: 600; line-height: 1.5; margin-right: 2px; padding: 10px 20px 10px 25px; text-decoration: none;}
        .tabs>.tabs-nav>li.active>a {background-color: #fff; border-color: #e7eaec transparent #e7eaec #e7eaec; border-width: 1px; color: #555; cursor: default;}
        .tabs>.tabs-content>.tab {display: none;}
        .tabs>.tabs-content>.tab.active {display: block;}
        .tabs>.tabs-content>.tab>.UI-tab-body {background: #fff none repeat scroll 0 0; border-color: transparent #e7eaec #e7eaec; border-radius: 2px; border-style: solid; border-width: 1px; padding: 20px;}
    </style>
    <script>
        $(document).ready(function(){
            $('.tabs-nav').on('click', 'li>a:not(".active")', function(){
                $(this).parent('li').addClass('active').siblings('li').removeClass('active');
                $('.tab.tab-'+($(this).parent('li').index()+1)).addClass('active').siblings('.tab').removeClass('active');
            });
        });
    </script>
```

##竖向选项卡切换

###示例： 
<div class="UI-vertical-tabs">
    <ul class="UI-tabs-nav">
        <li class="active"><a>第一个选项卡</a></li>
        <li><a>第二个选项卡</a></li>
    </ul>
    <div class="UI-tabs-content">
        <div class="UI-tab tab-1 active">
            <div class="UI-tab-body">
                <p>如何让你遇见我 在我最美丽的时刻 为这 我已在佛前求了五百年 求佛让我们结一段尘缘 佛于是把我化做一棵树 长在你必经的路旁 阳光下 慎重地开满了花 朵朵都是我前世的盼望 当你走近 请你细听 那颤抖的叶 是我等 待的热情 而当你终于无视地走过 在你身后落了一地的 朋友啊 那不是花瓣 是我凋零的心</p>
            </div>
        </div>
        <div class="UI-tab tab-2">
            <div class="UI-tab-body">
                <p> 这时候，也方才明白：原来这样的爱并不悲哀。没有尘世的牵绊，没有罗嗦的尾巴，没有俗艳的锦绣，也没有混浊的泥汁。简明，利落，干净，完全。这种爱，古典得像一千年前的庙，晶莹得像一弯星星搭起的桥，鲜美得像春天初生的一抹鹅黄的草。 这样的爱，真的也很好。</p>
            </div>
        </div>
    </div>
</div>
<br>

###代码：
```
    <div class="vertical-tabs">
        <ul class="tabs-nav">
            <li class="active"><a>第一个选项卡</a></li>
            <li><a>第二个选项卡</a></li>
        </ul>
        <div class="tabs-content">
            <div class="tab tab-1 active">
                <div class="tab-body">内容1</div>
            </div>
            <div class="tab tab-2">
                <div class="tab-body">内容2</div>
            </div>
        </div>
    </div>
    <style>
        .vertical-tabs {background-color: #f3f3f3;}
        .vertical-tabs>.tabs-nav {width: 20%;float: left;padding-left: 0;}
        .vertical-tabs>.tabs-nav>li {position: relative;display: block;margin-right: -1px;background: rgba(0, 0, 0, 0) none repeat scroll 0 0;}
        .vertical-tabs>.tabs-nav>li>a {border: 1px solid transparent; border-radius: 4px 0 0 4px; color: #a7b1c2; cursor: pointer; display: block; font-weight: 600; line-height: 1.5; margin-bottom: 3px; min-width: 74px; padding: 10px 20px 10px 25px; text-decoration: none;}
        .vertical-tabs>.tabs-nav>li.active>a {background-color: #fff; border-color: #e7eaec transparent #e7eaec #e7eaec; border-width: 1px; color: #555; cursor: default;}
        .vertical-tabs>.tabs-content>.tab {display: none;}
        .vertical-tabs>.tabs-content>.tab.active {display: block;}
        .vertical-tabs>.tabs-content>.tab>.tab-body {background: #fff none repeat scroll 0 0; border: 1px solid #e7eaec; border-radius: 2px; margin-left: 20%; padding: 20px; width: 80%;}
    </style>
    <script>
        $(document).ready(function(){
            $('.tabs-nav').on('click', 'li>a:not(".active")', function(){
                $(this).parent('li').addClass('active').siblings('li').removeClass('active');
                $('.tab.tab-'+($(this).parent('li').index()+1)).addClass('active').siblings('.tab').removeClass('active');
            });
        });
    </script>
```

#面板

##Bootstrap面板

###示例：

<div class="UI-panel UI-panel-default">
    <div class="UI-panel-heading">默认面板</div>
    <div class="UI-panel-body">
        <p>爱情，是超现实的。或许，这已是当今社会中唯一超现实的存在了。但是这唯一的存在已在逐渐消失，往往相爱的人不能相聚，反倒是金钱的培养，能开出共聚的花朵。</p>
    </div>
</div>
<div class="UI-panel UI-panel-primary">
    <div class="UI-panel-heading">主要</div>
    <div class="UI-panel-body">
        <p>爱情，是超现实的。或许，这已是当今社会中唯一超现实的存在了。但是这唯一的存在已在逐渐消失，往往相爱的人不能相聚，反倒是金钱的培养，能开出共聚的花朵。</p>
    </div>
</div>
<div class="UI-panel UI-panel-success">
    <div class="UI-panel-heading">成功</div>
    <div class="UI-panel-body">
        <p>爱情，是超现实的。或许，这已是当今社会中唯一超现实的存在了。但是这唯一的存在已在逐渐消失，往往相爱的人不能相聚，反倒是金钱的培养，能开出共聚的花朵。</p>
    </div>
</div>
<div class="UI-panel UI-panel-info">
    <div class="UI-panel-heading">信息</div>
    <div class="UI-panel-body">
        <p>爱情，是超现实的。或许，这已是当今社会中唯一超现实的存在了。但是这唯一的存在已在逐渐消失，往往相爱的人不能相聚，反倒是金钱的培养，能开出共聚的花朵。</p>
    </div>
</div>
<div class="UI-panel UI-panel-warning">
    <div class="UI-panel-heading">警告</div>
    <div class="UI-panel-body">
        <p>爱情，是超现实的。或许，这已是当今社会中唯一超现实的存在了。但是这唯一的存在已在逐渐消失，往往相爱的人不能相聚，反倒是金钱的培养，能开出共聚的花朵。</p>
    </div>
</div>
<div class="UI-panel UI-panel-danger">
    <div class="UI-panel-heading">危险</div>
    <div class="UI-panel-body">
        <p>爱情，是超现实的。或许，这已是当今社会中唯一超现实的存在了。但是这唯一的存在已在逐渐消失，往往相爱的人不能相聚，反倒是金钱的培养，能开出共聚的花朵。</p>
    </div>
</div>
<div style="clear: both;"></div>
<br>

###代码：
```
    <div class="panel">
        <div class="panel-heading">默认面板</div>
        <div class="panel-body">
            <p></p>
        </div>
    </div>
    <style>
        .panel {background-color: #fff; border: 1px solid #ddd; border-radius: 4px; margin-bottom: 20px;width: 45%;float: left;margin-right: 2%;}
        .panel>.panel-heading {border-bottom: 1px solid transparent;border-top-left-radius: 3px; border-top-right-radius: 3px; padding: 10px 15px; background-color: #ddd; border-color: #ddd; color: #333;}
        .panel>.panel-body{padding: 15px;}
        .panel>.panel-body>p {margin: 0 0 10px;}
    </style>
```

##折叠面板

###示例：

<div class="UI-collapse-panels">
    <div class="UI-collapse-panel">
        <div class="UI-collapse-panel-heading">
            <h5 class="UI-collapse-panel-title"><a>标题#1</a></h5>
        </div>
        <div class="UI-collapse-panel-body">
            大学时的好友假期出游，顺路来看我，就在家中住了几天。正遇上老公出差，孩子感冒，我忙得不可开交。几天下来，她感慨道：“看见你这样忙忙碌碌、身不由己，我是绝不敢要孩子了。”
        </div>
    </div>
    <div class="UI-collapse-panel">
        <div class="UI-collapse-panel-heading">
            <h5 class="UI-collapse-panel-title"><a>标题#2</a></h5>
        </div>
        <div class="UI-collapse-panel-body">
            我一愣：“你都看见什么了？”她同情地说：“看见你一日三餐洗煮烧煎，比保姆还辛苦;看见你栉风沐雨，又接送孩子上学，又忙工作，几乎变成机器人;看见你凌晨两点还不能安歇，要给孩子喂药喂水，像个苦役犯;还看见你的皱纹与眼袋，看见你无穷无尽的付出。”
        </div>
    </div>
    <div class="UI-collapse-panel">
        <div class="UI-collapse-panel-heading">
            <h5 class="UI-collapse-panel-title"><a>标题#3</a></h5>
        </div>
        <div class="UI-collapse-panel-body">
            她叹息：“女人最好的年华就这样交付掉了，人生还有什么乐趣。你看我，工作时无忧无虑，出游时无牵无挂，多好。”我笑了，对她说：“你什么都看见了，可唯独没有看见我的快乐和幸福。”
        </div>
    </div>
</div>

###代码：
```
    <div class="collapse-panels">
        <div class="collapse-panel">
            <div class="collapse-panel-heading"><h5 class="collapse-panel-title"><a>标题#1</a></h5></div>
            <div class="collapse-panel-body">内容#1</div>
        </div>
        <div class="collapse-panel">
            <div class="collapse-panel-heading"><h5 class="collapse-panel-title"><a>标题#2</a></h5></div>
            <div class="collapse-panel-body">内容#2</div>
        </div>
        <div class="collapse-panel">
            <div class="collapse-panel-heading"><h5 class="collapse-panel-title"><a>标题#3</a></h5></div>
            <div class="collapse-panel-body">内容#3</div>
        </div>
    </div>
    <style>
        .collapse-panels>.collapse-panel { background-color: #fff; border: 1px solid #ddd; border-radius: 4px; margin-top: 5px;}
        .collapse-panels>.collapse-panel>.collapse-panel-heading{background-color: #f5f5f5; border-bottom: 1px solid #ddd; border-top-left-radius: 3px; border-top-right-radius: 3px; color: #333; padding: 10px 15px;}
        .collapse-panels>.collapse-panel>.collapse-panel-heading>.collapse-panel-title{font-size: 13px; margin-bottom: 0; margin-top: 5px;}
        .collapse-panels>.collapse-panel>.collapse-panel-heading>.collapse-panel-title>a{cursor: pointer; text-decoration: none;} 
        .collapse-panels>.collapse-panel>.collapse-panel-body{border-top-color: #ddd; display: none; padding: 15px;}
    </style>
    <script>
        $(document).ready(function() {
            $('.collapse-panels>.collapse-panel>.collapse-panel-heading>.collapse-panel-title').on('click', 'a', function() {
                $(this).parents('.collapse-panel').find('.collapse-panel-body').toggle('slow')
                $(this).parents('.collapse-panel').siblings('.collapse-panel').find('.collapse-panel-body').hide('slow');
            });
        });
    </script>
```

#END



<!-- 按钮-样式表 -->
<style>
    /*---- btn-color-block ----*/

        .UI-btn.btn-color-block {background-color: #c2c2c2; border: 1px solid transparent; border-radius: 4px; color: #fff; cursor: pointer; display: inline-block; font-size: 14px; font-weight: 400; line-height: 1.5; margin-bottom: 0; padding: 6px 12px; text-align: center; text-decoration: none; vertical-align: middle; white-space: nowrap;}
        .UI-btn.btn-color-block.btn-default:active, .UI-btn.btn-color-block.btn-default:hover {background-color:#bababa; border-color:#bababa; } 
        .UI-btn.btn-color-block.btn-primary {background-color: #1ab394; border-color: #1ab394; }
        .UI-btn.btn-color-block.btn-primary:active, .UI-btn.btn-color-block.btn-primary:hover {background-color:#18a689; border-color:#18a689; }
        .UI-btn.btn-color-block.btn-success {background-color: #1c84c6; border-color: #1c84c6; }
        .UI-btn.btn-color-block.btn-success:active, .UI-btn.btn-color-block.btn-success:hover {background-color:#1a7bb9; border-color:#1a7bb9; }
        .UI-btn.btn-color-block.btn-info {background-color: #23c6c8; border-color: #23c6c8; }
        .UI-btn.btn-color-block.btn-info:active, .UI-btn.btn-color-block.btn-info:hover {background-color: #21b9bb; border-color: #21b9bb; } 
        .UI-btn.btn-color-block.btn-warning {background-color: #f8ac59; border-color: #f8ac59; } 
        .UI-btn.btn-color-block.btn-warning:active, .UI-btn.btn-color-block.btn-warning:hover {background-color: #f7a54a; border-color: #f7a54a; } 
        .UI-btn.btn-color-block.btn-danger {background-color: #ed5565; border-color: #ed5565; } 
        .UI-btn.btn-color-block.btn-danger:active, .UI-btn.btn-color-block.btn-danger:hover {background-color: #ec4758; border-color: #ec4758; }

    /*---- btn-border-block ----*/

        .UI-btn.btn-border-block {border: 1px solid #c2c2c2; border-radius: 4px; color: #c2c2c2; cursor: pointer; display: inline-block; font-size: 14px; font-weight: 400; line-height: 1.5; margin-bottom: 0; padding: 6px 12px; text-align: center; text-decoration: none; vertical-align: middle; white-space: nowrap;}
        .UI-btn.btn-border-block.btn-primary {color: #1ab394; border-color: #1ab394; }
        .UI-btn.btn-border-block.btn-primary:active, .UI-btn.btn-border-block.btn-primary:hover {background-color:#18a689; border-color:#18a689; color:#fff;} 
        .UI-btn.btn-border-block.btn-success {color: #1c84c6; border-color: #1c84c6; }
        .UI-btn.btn-border-block.btn-success:active, .UI-btn.btn-border-block.btn-success:hover {background-color:#1a7bb9; border-color:#1a7bb9; color:#fff;} 
        .UI-btn.btn-border-block.btn-info {color: #23c6c8; border-color: #23c6c8; }
        .UI-btn.btn-border-block.btn-info:active, .UI-btn.btn-border-block.btn-info:hover {background-color: #21b9bb; border-color: #21b9bb; color:#fff;} 
        .UI-btn.btn-border-block.btn-warning {color: #f8ac59; border-color: #f8ac59; } 
        .UI-btn.btn-border-block.btn-warning:active, .UI-btn.btn-border-block.btn-warning:hover {background-color: #f7a54a; border-color: #f7a54a; color:#fff;} 
        .UI-btn.btn-border-block.btn-danger {color: #ed5565; border-color: #ed5565; } 
        .UI-btn.btn-border-block.btn-danger:active, .UI-btn.btn-border-block.btn-danger:hover {background-color: #ec4758; border-color: #ec4758; color:#fff;} 

    /*---- btn-3d-block ----*/

        .UI-btn.btn-3d-block {border: 1px solid #c2c2c2; border-radius: 4px; box-shadow: 0 0 0 #c2c2c2 inset, 0 5px 0 0 #c2c2c2, 0 10px 5px #999; color: #c2c2c2; cursor: pointer; display: inline-block; font-size: 14px; font-weight: 400; line-height: 1.5; margin-bottom: 0; padding: 6px 12px; text-align: center; text-decoration: none; vertical-align: middle; white-space: nowrap;}
        .UI-btn.btn-3d-block.btn-default:active, .UI-btn.btn-3d-block.btn-default:hover {background-color:#bababa; border-color:#bababa; color:#fff;} 
        .UI-btn.btn-3d-block.btn-primary {color: #1ab394; border-color: #1ab394; box-shadow: 0 0 0 #16987e inset, 0 5px 0 0 #16987e, 0 10px 5px #999;}
        .UI-btn.btn-3d-block.btn-primary:active, .UI-btn.btn-3d-block.btn-primary:hover {background-color:#18a689; border-color:#18a689; color:#fff;} 
        .UI-btn.btn-3d-block.btn-success {color: #1c84c6; border-color: #1c84c6; box-shadow: 0 0 0 #1c84c6 inset, 0 5px 0 0 #1c84c6, 0 10px 5px #999;}
        .UI-btn.btn-3d-block.btn-success:active, .UI-btn.btn-3d-block.btn-success:hover {background-color:#1a7bb9; border-color:#1a7bb9; color:#fff;} 
        .UI-btn.btn-3d-block.btn-info {color: #23c6c8; border-color: #23c6c8; box-shadow: 0 0 0 #23c6c8 inset, 0 5px 0 0 #23c6c8, 0 10px 5px #999;}
        .UI-btn.btn-3d-block.btn-info:active, .UI-btn.btn-3d-block.btn-info:hover {background-color: #21b9bb; border-color: #21b9bb; color:#fff;} 
        .UI-btn.btn-3d-block.btn-warning {color: #f8ac59; border-color: #f8ac59; box-shadow: 0 0 0 #f8ac59 inset, 0 5px 0 0 #f8ac59, 0 10px 5px #999;} 
        .UI-btn.btn-3d-block.btn-warning:active, .UI-btn.btn-3d-block.btn-warning:hover {background-color: #f7a54a; border-color: #f7a54a; color:#fff;} 
        .UI-btn.btn-3d-block.btn-danger {color: #ed5565; border-color: #ed5565; box-shadow: 0 0 0 #ed5565 inset, 0 5px 0 0 #ed5565, 0 10px 5px #999;} 
        .UI-btn.btn-3d-block.btn-danger:active, .UI-btn.btn-3d-block.btn-danger:hover {background-color: #ec4758; border-color: #ec4758; color:#fff;} 

    /*---- UI-btn-group ----*/

        .UI-btn-group>.UI-btn-group-btn {background: #fff none repeat scroll 0 0; border: 1px solid #e7eaec; cursor: pointer; display: inline-block; float: left; font-size: 14px; font-weight: 400; line-height: 1.5; margin-left: -1px; padding: 6px 12px; position: relative; text-align: center; text-decoration: none; vertical-align: middle; white-space: nowrap;}
        .UI-btn-group>.UI-btn-group-btn:active, .UI-btn-group>.UI-btn-group-btn:hover {z-index:2;border-color: #d2d2d2;}
        .UI-btn-group>.UI-btn-group-btn.active{z-index:2;border-color: #d2d2d2;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15) inset;}
        .UI-btn-group>.UI-btn-group-btn.btn-left {border-bottom-left-radius: 4px; border-top-left-radius: 4px; margin-left:0;}
        .UI-btn-group>.UI-btn-group-btn.btn-middle {}
        .UI-btn-group>.UI-btn-group-btn.btn-right {border-bottom-right-radius: 4px; border-top-right-radius: 4px;}
</style>


<!-- 选项卡-样式表 -->
<style>
    /*---- 横向选项卡 ----*/

    .UI-tabs{background-color: #f3f3f3;}
    .UI-tabs>.UI-tabs-nav {border-bottom: 1px solid #e7eaec; display: table; margin-bottom: 0; padding-left: 0;}
    .UI-tabs>.UI-tabs-nav>li {display: block; float: left; margin-bottom: -1px;}
    .UI-tabs>.UI-tabs-nav>li>a {border: 1px solid transparent; border-radius: 4px 4px 0 0; color: #a7b1c2; cursor: pointer; display: block; font-weight: 600; line-height: 1.5; margin-right: 2px; padding: 10px 20px 10px 25px; text-decoration: none;}
    .UI-tabs>.UI-tabs-nav>li.active>a {background-color: #fff; border-color: #e7eaec #e7eaec transparent; border-style: solid; border-width: 1px; color: #555; cursor: default;}
    .UI-tabs>.UI-tabs-content>.UI-tab {display: none;}
    .UI-tabs>.UI-tabs-content>.UI-tab.active {display: block;} 
    .UI-tabs>.UI-tabs-content>.UI-tab>.UI-tab-body {background: #fff none repeat scroll 0 0; border-color: transparent #e7eaec #e7eaec; border-radius: 2px; border-style: solid; border-width: 1px; padding: 20px;}

    /*---- 竖向选项卡 ----*/

    .UI-vertical-tabs {background-color: #f3f3f3;}
    .UI-vertical-tabs>.UI-tabs-nav {width: 20%;float: left;padding-left: 0;}
    .UI-vertical-tabs>.UI-tabs-nav>li {position: relative;display: block;margin-right: -1px;background: rgba(0, 0, 0, 0) none repeat scroll 0 0;}
    .UI-vertical-tabs>.UI-tabs-nav>li>a {border: 1px solid transparent; border-radius: 4px 0 0 4px; color: #a7b1c2; cursor: pointer; display: block; font-weight: 600; line-height: 1.5; margin-bottom: 3px; min-width: 74px; padding: 10px 20px 10px 25px; text-decoration: none;}
    .UI-vertical-tabs>.UI-tabs-nav>li.active>a {background-color: #fff; border-color: #e7eaec transparent #e7eaec #e7eaec; border-width: 1px; color: #555; cursor: default;}
    .UI-vertical-tabs>.UI-tabs-content>.UI-tab {display: none;}
    .UI-vertical-tabs>.UI-tabs-content>.UI-tab.active {display: block;}
    .UI-vertical-tabs>.UI-tabs-content>.UI-tab>.UI-tab-body {background: #fff none repeat scroll 0 0; border: 1px solid #e7eaec; border-radius: 2px; margin-left: 20%; padding: 20px; width: 80%;}
</style>
<!-- 选项卡-JS -->
<script>
    $(document).ready(function(){
        $('.UI-tabs-nav').on('click', 'li>a:not(".active")', function(){
            $(this).parent('li').addClass('active').siblings('li').removeClass('active');
            $('.UI-tab.tab-'+($(this).parent('li').index()+1)).addClass('active').siblings('.UI-tab').removeClass('active');
        });
    });
</script>


<!-- 面板-样式表 -->
<style>
    /*---- panel-default ----*/
    .UI-panel {background-color: #fff; border: 1px solid #ddd; border-radius: 4px; margin-bottom: 20px;width: 45%;float: left;margin-right: 2%;}
    .UI-panel>.UI-panel-heading {border-bottom: 1px solid transparent;border-top-left-radius: 3px; border-top-right-radius: 3px; padding: 10px 15px; background-color: #f5f5f5; border-color: #ddd; color: #333;}
    .UI-panel>.UI-panel-body{padding: 15px;}
    .UI-panel>.UI-panel-body>p {margin: 0 0 10px;}

    /*---- panel-primary ----*/
    .UI-panel.UI-panel-primary {border: 1px solid #1ab394;}
    .UI-panel.UI-panel-primary>.UI-panel-heading {background-color: #1ab394; border-color: #1ab394; color: #fff;}

    /*---- panel-success ----*/
    .UI-panel.UI-panel-success {border: 1px solid #1c84c6;}
    .UI-panel.UI-panel-success>.UI-panel-heading {background-color: #1c84c6; border-color: #1c84c6; color: #fff;}

    /*---- panel-info ----*/
    .UI-panel.UI-panel-info {border: 1px solid #23c6c8;}
    .UI-panel.UI-panel-info>.UI-panel-heading {background-color: #23c6c8; border-color: #23c6c8; color: #fff;}

    /*---- panel-warning ----*/
    .UI-panel.UI-panel-warning {border: 1px solid #f8ac59;}
    .UI-panel.UI-panel-warning>.UI-panel-heading {background-color: #f8ac59; border-color: #f8ac59; color: #fff;}

    /*---- panel-danger ----*/
    .UI-panel.UI-panel-danger {border: 1px solid #ed5565;}
    .UI-panel.UI-panel-danger>.UI-panel-heading {background-color: #ed5565; border-color: #ed5565; color: #fff;}

    /*---- collapse-panels ----*/
    .UI-collapse-panels>.UI-collapse-panel { background-color: #fff; border: 1px solid #ddd; border-radius: 4px; margin-top: 5px;}
    .UI-collapse-panels>.UI-collapse-panel>.UI-collapse-panel-heading{background-color: #f5f5f5; border-bottom: 1px solid #ddd; border-top-left-radius: 3px; border-top-right-radius: 3px; color: #333; padding: 10px 15px;}
    .UI-collapse-panels>.UI-collapse-panel>.UI-collapse-panel-heading>.UI-collapse-panel-title{font-size: 13px; margin-bottom: 0; margin-top: 5px;}
    .UI-collapse-panels>.UI-collapse-panel>.UI-collapse-panel-heading>.UI-collapse-panel-title>a{cursor: pointer; text-decoration: none;} 
    .UI-collapse-panels>.UI-collapse-panel>.UI-collapse-panel-body{border-top-color: #ddd; display: none; padding: 15px;}
</style>
<!-- 面板-JS -->
<script>
    $(document).ready(function() {
        $('.UI-collapse-panels>.UI-collapse-panel>.UI-collapse-panel-heading>.UI-collapse-panel-title').on('click', 'a', function() {
            $(this).parents('.UI-collapse-panel').find('.UI-collapse-panel-body').toggle('slow')
            $(this).parents('.UI-collapse-panel').siblings('.UI-collapse-panel').find('.UI-collapse-panel-body').hide('slow');
        });
    });
</script>
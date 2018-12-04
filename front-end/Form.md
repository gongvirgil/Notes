<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<style>
    pre {max-height: 100px;}
</style>

##基本表单

#####示例：
<form class="form form-base">
    <div class="form-head">
        <h5>登录表单(⊙o⊙)</h5>
    </div>
    <div class="form-content">
        <div class="form-group">
            <label class="form-label">用户名：</label>
            <div class="form-item">
                <input type="text" class="form-input" placeholder="用户名">
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">密码：</label>
            <div class="form-item">
                <input type="password" class="form-input" placeholder="密码">
            </div>
        </div>
        <div class="form-group">
            <div class="form-item">
                <button type="submit" class="form-btn">登 录</button>
            </div>
        </div> 
    </div>
</form>
#####代码：
    <form class="form form-base">
        <div class="form-head">
            <h5>登录表单(⊙o⊙)</h5>
        </div>
        <div class="form-content">
            <div class="form-group">
                <label class="form-label">用户名：</label>
                <div class="form-item">
                    <input type="text" class="form-input" placeholder="用户名">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">密码：</label>
                <div class="form-item">
                    <input type="password" class="form-input" placeholder="密码">
                </div>
            </div>
            <div class="form-group">
                <div class="form-item">
                    <button type="submit" class="form-btn">登 录</button>
                </div>
            </div> 
        </div>
    </form>
    <style>
        .form {border: 1px solid #E5E6E7; border-radius: 3px; width: 50%; } 
        .form-head {padding: 1px 15px; border-bottom: 1px solid #e7eaec; } 
        .form-content {width: 80%; margin: 20px auto; padding: 10px; } 
        .form-group {margin-bottom: 15px; } 
        .form-label {width: 25%; margin-bottom: 0; padding-top: 7px; text-align: right; display: inline-block; font-weight: 700; float: left; } 
        .form-item {margin-left: 25%; width: 75%; } 
        .form-input {height: 34px; line-height: 1.5; border: 1px solid #E5E6E7; border-radius: 3px; font-size: 14px; padding: 6px 12px; transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s; width: 100%; } 
        .form-btn {background-color: #fff; border: 1px solid #e7eaec; border-radius: 3px; font-size: 12px; font-weight: 400; line-height: 1.5; padding: 5px 10px; cursor: pointer; } 
        .form-btn:hover {border-color: #d2d2d2; } 
    </style>

<!-- 按钮-样式表 -->
<style>
    /*---- form-base ----*/

    .form.form-base {border: 1px solid #E5E6E7; border-radius: 3px; width: 50%; } 
    .form.form-base .form-head {padding: 1px 15px; border-bottom: 1px solid #e7eaec; } 
    .form.form-base .form-content {width: 80%; margin: 20px auto; padding: 10px; } 
    .form.form-base .form-group {margin-bottom: 15px; } 
    .form.form-base .form-label {width: 25%; margin-bottom: 0; padding-top: 7px; text-align: right; display: inline-block; font-weight: 700; float: left; } 
    .form.form-base .form-item {margin-left: 25%; width: 75%; } 
    .form.form-base .form-input {height: 34px; line-height: 1.5; border: 1px solid #E5E6E7; border-radius: 3px; font-size: 14px; padding: 6px 12px; transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s; width: 100%; } 
    .form.form-base .form-btn {background-color: #fff; border: 1px solid #e7eaec; border-radius: 3px; font-size: 12px; font-weight: 400; line-height: 1.5; padding: 5px 10px; cursor: pointer; } 
    .form.form-base .form-btn:hover {border-color: #d2d2d2; } 
</style>
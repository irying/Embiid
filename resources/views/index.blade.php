<!DOCTYPE html>
<html lang="zh-CN" ng-app="xiaohu">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!-- Bootstrap CSS 文件 -->
    {{--<link rel="stylesheet" href="./static/bootstrap/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="/node_modules/normalize-css/normalize.css">
    <link rel="stylesheet" href="/css/base.css">
</head>
<body>
<div class="navbar">
    <div class="fl">
        <div class="navbar-item">item1</div>
        <div class="navbar-item">item2</div>
    </div>
    <div class="fr">
        <a ui-sref="home" class="navbar-item">首页</a>
        <a ui-sref="login" class="navbar-item">登录</a>
        <a ui-sref="signup" class="navbar-item">注册</a>
    </div>
    <a href="" ui-sref="home">首页</a>
    <a href="" ui-sref="login">登录</a>
</div>
<div ui-view></div>
<script src="/node_modules/jquery/dist/jquery.js"></script>
<script src="/node_modules/angular/angular.js"></script>
<script src="/node_modules/angular-ui-router/release/angular-ui-router.js"></script>
<script src="/js/base.js"></script>
<script type="text/ng-template" id="home.tpl">
<div>
    <h1>lady</h1>
</div>
</script>
<script type="text/ng-template" id="signup.tpl">
    <div ng-controller="SignupController" class="home container">
        <div class="card">
            <h1>注册</h1>
            <form name="signup_form" ng-submit="User.signup()">
                <div>
                    <label>用户名：</label>
                    <input name="username" type="text" ng-minlength="4" ng-maxlength="16" ng-model="User.signup_data.username" ng-model-options="{debounce: 300}" required>
                </div>
                <div ng-if="signup_form.username.$touched" class="input-error-set">
                    <div ng-if="signup_form.username.$error.required">用户名为必填项</div>
                    <div ng-if="signup_form.username.$error.maxlength || signup_form.username.$error.minlength ">用户名长度介于4到16位之间</div>
                    <div ng-if="User.signup_username_exists">用户名已存在</div>
                </div>
                <div>
                    <label>密码：</label>
                    <input name="password" type="password" ng-minlength="6" required ng-model="User.signup_data.password">
                </div>
                <div ng-if="signup_form.password.$touched" class="input-error-set">
                    <div ng-if="signup_form.password.$error.required">密码为必填项</div>
                    <div ng-if="signup_form.password.$error.maxlength || signup_form.password.$error.minlength ">用户名长度介于6位以上</div>
                </div>
                <button type="submit" ng-disabled="signup_form.$invalid">注册</button>
            </form>
        </div>
    </div>
</script>
</body>
</html>
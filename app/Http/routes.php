<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// API 相关
Route::group(['prefix' => 'api', 'namespace' => 'Api'], function(){
    Route::any('router', 'RouterController@index');  // API 入口
});

function user_ins(){
    return new App\User;
}

function question_ins(){
    return new App\Question;
}

function answer_ins(){
    return new App\Answer;
}

function comment_ins(){
    return new App\Comment;
}

function pagination($page = 1, $limit = 16)
{
    $limit = $limit ?: 16;
    $skip = ($page ? $page - 1 : 0) * $limit;
    return [$limit, $skip];
}

function rq($key, $default = null)
{
    if (!$key) return Request::all();
    return Request::get($key, $default);
}

function err($msg = null)
{
    return ['status' => 0, 'msg' => $msg];
}

function suc($data = null)
{
    $default = ['status' => 1];
    if ($data)
        return array_merge($default, $data);
    return $default;
}

Route::get('/', function () {
    return view('index');
});

Route::any('api', function(){
    return ['version' => '1.0'];
});

Route::any('api/user', function(){
    return user_ins()->signUp();
});

Route::any('api/login', function(){
    return user_ins()->login();
});

Route::any('api/question/add', function(){
    return question_ins()->add();
});

Route::any('api/question/read', function(){
    return question_ins()->read();
});

Route::any('api/answer/add', function(){
    return answer_ins()->add();
});

Route::any('api/comment/add', function(){
    return comment_ins()->add();
});

Route::any('api/comment/read', function(){
    return comment_ins()->read();
});

Route::any('api/answer/vote', function(){
    return answer_ins()->vote();
});

Route::get('common/timeline', ['uses' => 'CommonController@timeline']);
Route::get('student/index', ['uses' => 'StudentController@index']);
//Route::get('studen/inde', ['uses' => 'StudentController@index']);
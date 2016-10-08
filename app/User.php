<?php

namespace App;

use Hash;
use Request;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
//    protected $dateFormat = 'U';
    protected $fillable = ['username', 'password'];
    public function signUp()
    {
        $check = $this->hasUserNameAndPassword();
        if(!$check)
            return ['status' => 0, 'msg' => '用户名和密码皆不可为空'];
        list($username, $password) = $check;
        $user_exist = $this
            ->where('username', $username)
            ->exists();

        if ($user_exist)
            return ['status' => 0, 'msg' => '用户名已存在'];

        $hashed_password = Hash::make($password);
        $user = $this;
        $user->password = $hashed_password;
        $user->username = $username;
        if ($user->save())
            return ['status' => 1, 'id' => $user->id];
        else
            return ['status' => 0, 'msg' => 'Insert Fail'];
    }

    public function login()
    {
        $check = $this->hasUserNameAndPassword();
        if(!$check)
            return ['status' => 0, 'msg' => '用户名和密码皆不可为空'];
        list($username, $password) = $check;
        $user = $this->where('username', $username)->first();
        if(!$user)
            return ['status' => 0, 'msg' => '用户不存在'];

        $hashed_password = $user->password;
        if(!Hash::check($password, $hashed_password))
            return ['status' => 0, 'msg' => '密码错误'];

        session()->put('username', $user->username);
        session()->put('user_id', $user->id);
    }

    public function resetPassword()
    {

    }

    public function hasUserNameAndPassword()
    {
        $username = Request::get('username');
        $password = Request::get('password');

        if (!($username && $password))
            return false;
        else
            return [$username, $password];
    }

    public function isLogined()
    {
        return session('user_id') ?: false;
    }

    public function isRobot($time = 10)
    {
        if (!session('last_sms_time'))
            return false;
        $currentTime = time();
        $lastTime = session('last_sms_time');
        $elapsed = $currentTime - $lastTime;
        return !($elapsed > $time);
    }

    public function updateRobotTime()
    {
        session()->set('last_sms_time', time());
    }
}

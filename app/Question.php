<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    public function add()
    {
        if(!user_ins()->isLogined())
            return ['status' => 0, 'msg' => 'login required'];

        if (!rq('title'))
            return ['status' => 0, 'msg' => 'title required'];

        $this->title = rq('title');
        $this->user_id = session('user_id');
        if(rq('desc'))
            $this->desc = rq('desc');

        return $this->save() ? ['status' => 1, 'id' => $this->id] : ['status' => 0, 'msg' => 'insert failed'];
    }

    public function read()
    {
        if(rq('id'))
            return ['status' => 1, 'data' => $this->find(rq('id'))];

        $limit = rq('limit') ?: 1;
        $skip = (rq('page') ?: 1) * $limit;

        $r = $this
            ->orderBy('created_at')
            ->limit($limit)
//            ->skip($skip)
            ->get(['id', 'title', 'desc', 'user_id', 'created_at'])
            ->keyBy('id');
        return ['status' => 1, 'data' => $r];
    }
}

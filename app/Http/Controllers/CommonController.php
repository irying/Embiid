<?php

namespace App\Http\Controllers;


class CommonController extends Controller
{
    public function timeline()
    {
        list($limit, $skip) = pagination(rq('page'), rq('limit'));
        $questions = question_ins()
            ->limit($limit)
            ->skip($skip)
            ->orderBy('created_at', 'desc')
            ->get();

        $answers = answer_ins()
            ->limit($limit)
            ->skip($skip)
            ->orderBy('created_at', 'desc')
            ->get();

//        $merge = $questions->merge($answers);
        $merge = $answers->merge($questions);
//        $data = $merge->sortByDesc(function ($item){
//            return $item->created_at;
//        });
//        return $merge->values()->all();
        dd($questions,$answers,$merge);
//        dd($questions,$answers,$data);
    }
}
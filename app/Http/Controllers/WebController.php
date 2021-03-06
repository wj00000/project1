<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function init(Request $request)
    {
        $data      = $request->all();
        $signature = $data['signature'];
        $timestamp = $data['timestamp'];
        $nonce     = $data['nonce'];
        $echostr   = $data['echostr'];
        $token     = "WVq4zq8C4eczdTPc8cteMS88yn5GsCjS";
        $tmpArr    = [$token, $timestamp, $nonce];
        sort($tmpArr,SORT_STRING);
        $tmpStr    = implode($tmpArr);
        $hashcode  = sha1($tmpStr);
        if ($hashcode == $signature){
            return $echostr;
        }else{
            return false;
        }
    }
}

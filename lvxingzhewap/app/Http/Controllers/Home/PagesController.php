<?php

namespace App\Http\Controllers\Home;

use App\Model\Evaluate;
use App\Model\Pages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class PagesController extends Controller
{
    //
    public function company()
    {
        $info = Pages::where('status', 1)->first();

        return view('home.pages.index', [
            'info' => $info,
            'id' => Cache::get('id')
        ]);
    }

    public function brand()
    {
        $info = Pages::where('status', 2)->first();

        return view('home.pages.index', [
            'info' => $info,
            'id' => Cache::get('id')
        ]);
    }

    public function base()
    {
        $info = Pages::where('status', 3)->first();

        return view('home.pages.index', [
            'info' => $info,
            'id' => Cache::get('id')
        ]);
    }

    public function evaluate()
    {
        return view('home.pages.index',[
            'id' => Cache::get('id')
        ]);
    }

    public function evaluateStore(Request $request)
    {
        $evaluate = new Evaluate();

        $evaluate->star = $request->star;
        $evaluate->feedback = $request->feedback;
        $evaluate->message = $request->message;

        if ($evaluate->save()) {
            return [
                'code' => 'SN200',
                'message' => '添加成功'
            ];
        }

        return [
            'code' => 'SN400',
            'message' => '添加失败'
        ];
    }
}

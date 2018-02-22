<?php

namespace App\Http\Controllers\Home;

use App\Model\Evaluate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class EvaluateCotroller extends Controller
{
    //
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'star' => 'required|int',
            'feedback' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }

        // 数据添加
        $evaluate = new Evaluate();

        $evaluate->star = $request->star;
        $evaluate->feedback = $request->feedback;
        $evaluate->message = $request->feedback;

        if ($evaluate->save()) {
            return [
                'code' => 'SN200',
                'message' => '提交成功'
            ];
        }

        return [
            'code' => 'SN400',
            'message' => '提交失败'
        ];
    }
}

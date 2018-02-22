<?php

namespace App\Http\Controllers\Admin;

use App\Model\Pages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Pages::get();
        return view('admin.pages.index', [
            'pages' => $pages
        ]);
    }

    public function add()
    {
        return view('admin.pages.add');
    }

    // 修改追溯页面
    public function edit(Request $request)
    {
        $info = Pages::where('id' , $request->id)->first();
        return view('admin.pages.edit', [
            'info' => $info ? $info :  ''
        ]);
    }


    public function store(Request $request)
    {
        $pages = new  Pages();

        $pages->title = $request->title;

        $pages->status = $request->status;

        $pages->content = $request->editorValue;

        // 直接提交保存,不做任何验证
        if ($pages->save()) {
            return back();
        } else {
            return back();
        }
    }

    public function update(Request $request)
    {
        $pages = Pages::where('id', $request->id)->first();

        $pages->title = $request->title;

        $pages->content = $request->editorValue;

        // 直接提交保存,不做任何验证
        if ($pages->save()) {
            return back();
        } else {
            return back();
        }

    }
}

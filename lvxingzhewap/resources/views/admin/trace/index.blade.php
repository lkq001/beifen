@extends('admin.public.main')

@section('title', '绿行者追溯系统')

@section('title_first', '产品中心')
@section('title_secound', '产品列表')

@section('main-title', '添加产品')

@section('content')
    <div class="page-container">
        <form action="{{ route('admin.trace.index') }}" method="get">
            <div class="text-c"> 产品批次号：
                <input type="text" class="input-text" style="width:250px" placeholder="产品批次号" id="" name="code">
                <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i>
                    搜索
                </button>
            </div>
        </form>
        <div class="mt-20">

            <table class="table table-border table-bordered table-bg table-hover table-sort">

                <thead>
                <tr class="text-c">
                    <th width="40">ID</th>
                    <th>名称</th>
                    <th>产品批次号</th>
                    <th>操作</th>
                    <th>二维码</th>
                </tr>
                </thead>
                <tbody>
                @foreach($traceLists as $list)
                    <tr class="text-c va-m">

                        <td>{{$list->id}}</td>
                        <td>{{$list->title}}</td>
                        <td>{{$list->code}}</td>
                        <td class="td-manage">
                            <a href="{{ route('admin.trace.edit', ['id' => $list->id]) }}">编辑</a>
                        </td>

                        <td>
                            <img src="/qrcodes/{{$list->id}}.bmp" width="100px" height="100px" alt="">
                            {!! QrCode::format('png')->size(236)->margin(0)->generate($list->url,public_path('qrcodes/'.$list->id.'.png')) !!}
                            <a href="/qrcodes/{{$list->id}}.bmp" download="{{$list->id}}">点击下载</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection

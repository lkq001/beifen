@extends('admin.public.main')

@section('title', '绿行者追溯系统')

@section('title_first', '单页管理')
@section('title_secound', '单页列表')

@section('main-title', '列表')

@section('content')
    <div class="page-container">

        <div class="mt-20">
            <table class="table table-border table-bordered table-bg table-hover table-sort">
                <thead>
                <tr class="text-c">
                    <th width="40">ID</th>
                    <th>名称</th>
                    <th>类型</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as $v)
                    <tr class="text-c va-m">
                        <td>{{$v->id}}</td>
                        <td>{{$v->title}}</td>

                        <td>
                            @if($v->status == 1)
                                公司介绍
                            @elseif ($v->status == 2)
                                品牌介绍
                            @else
                                基地介绍
                            @endif
                        </td>

                        <td class="td-manage">
                            <a href="{{ route('admin.pages.edit', ['id' => $v->id]) }}">编辑</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
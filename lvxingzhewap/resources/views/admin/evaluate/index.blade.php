@extends('admin.public.main')

@section('title', '绿行者追溯系统')

@section('title_first', '评价管理')
@section('title_secound', '评价列表')

@section('main-title', '评价')

@section('content')
    <div class="page-container">

        <div class="mt-20">
            <table class="table table-border table-bordered table-bg table-hover table-sort">
                <thead>
                <tr class="text-c">
                    <th width="40">ID</th>
                    <th>整体评价</th>
                    <th>产品反馈</th>
                    <th>其他建议</th>
                </tr>
                </thead>
                <tbody>
                @foreach($infoLists as $info)
                    <tr class="text-c va-m">
                        <td width="40">{{ $info->id }}</td>
                        <td>
                            @if($info->star < 25)
                                很差
                            @elseif($info->star < 50)
                                不满意
                            @elseif($info->star < 75)
                                一般
                            @elseif($info->star < 100)
                                满意
                            @elseif($info->star == 100)
                                惊喜
                            @else
                                暂无评价
                            @endif
                        </td>
                        <td>
                            @if($info->feedback == 1)
                                太酸
                            @elseif($info->feedback == 2)
                                太甜
                            @elseif($info->feedback == 3)
                                酸甜适合
                            @elseif($info->feedback == 4)
                                浓郁番茄味
                            @elseif($info->feedback == 5)
                                无味
                            @elseif($info->feedback == 6)
                                味道奇怪
                            @elseif($info->feedback == 7)
                                新乡
                            @elseif($info->feedback == 8)
                                不新鲜
                            @else
                                其他
                            @endif
                        </td>
                        <td>{{$info->message}}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
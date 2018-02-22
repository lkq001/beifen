<aside class="Hui-aside">
    <div class="menu_dropdown bk_2">
        <dl id="menu-product">
            <dt><i class="Hui-iconfont">&#xe620;</i> 产品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="{{ route('admin.trace.index') }}">产品列表</a></li>
                    @if(Auth::user()->lavel == 1)
                        <li><a href="{{ route('admin.trace.add') }}">添加产品</a></li>
                    @endif
                </ul>
            </dd>
        </dl>

        <dl id="menu-product">
            <dt><i class="Hui-iconfont">&#xe620;</i> 单页管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="{{ route('admin.pages.index') }}">单页管理</a></li>
                    {{--<li><a href="{{ route('admin.pages.add') }}">添加单页</a></li>--}}
                </ul>
            </dd>
        </dl>
        <dl id="menu-product">
            <dt><i class="Hui-iconfont">&#xe620;</i> 评论管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="{{ route('admin.evaluate.index') }}">评论管理</a></li>
                </ul>
            </dd>
        </dl>
    </div>
</aside>
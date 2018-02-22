<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TraceBack extends Model
{
    //
    use SoftDeletes;
    protected $table = 'zs_products'; //表名
    protected $primaryKey = 'id'; //主键
    protected $datas = ['deleted_at'];
}

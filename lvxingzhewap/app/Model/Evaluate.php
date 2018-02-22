<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Evaluate extends Model
{
    //
    use SoftDeletes;
    protected $table = 'zs_evaluate'; //表名
    protected $primaryKey = 'id'; //主键
    protected $datas = ['deleted_at'];
}

<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\TraceBack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Milon\Barcode\DNS1D;

class IndexController extends Controller
{
    private static $DNS1D;

    /**
     * PrintController constructor.
     * @param DNS1D $DNS1D
     */
    public function __construct(DNS1D $DNS1D)
    {
        self::$DNS1D = $DNS1D;
    }
    //
    public function index(Request $request)
    {
        $cacheId = Cache::get('id');

        if ($request->id || $cacheId) {
            Cache::put('id', $request->id, '9999999');

            $info = TraceBack::where('id', $request->id)->first();
        } else {
            $info = TraceBack::first();
        }

        $info->enclosure = storage_path(). '/'.$info->enclosure;

        $info->image = 'http://' . config('filesystems.disks.qiniu.domains.default') .'/'. $info->image;

        $info->codeImage = '<img src="data:image/png;base64,' . self::$DNS1D->getBarcodePNG($info->code, "C39+") . '" alt="barcode"   />';

        return view('home.index.index', [
            'info' => $info,
            'id' => $cacheId ? $cacheId : ''
        ]);
    }
}

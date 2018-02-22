<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\TraceBack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Milon\Barcode\DNS1D;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Validator;
use zgldh\QiniuStorage\QiniuStorage;

class TraceController extends Controller
{
    private static $DNS1D;
    private static $qrCode;

    /**
     * PrintController constructor.
     * @param DNS1D $DNS1D
     */
    public function __construct(DNS1D $DNS1D, QrCode $qrCode)
    {
        self::$DNS1D = $DNS1D;
        self::$qrCode = $qrCode;
    }

    // 追溯列表
    public function index(Request $request)
    {
        if ($request->all()) {
            $where = $request->all();
            $traceLists = TraceBack::where($where)->orderBy('id', 'DESC')->get();
        } else {
            $traceLists = TraceBack::orderBy('id', 'DESC')->get();
        }

        if (collect($traceLists)->count() > 0) {
            foreach ($traceLists as $v) {
                if (file_exists(public_path() . '/qrcodes/' . $v->id . ".png")) {
                    $im = imagecreatefrompng(public_path() . '/qrcodes/' . $v->id . ".png");
                    $this->imagebmp($im, public_path() . '/qrcodes/' . $v->id . '.bmp', 32);
                }
                if ($v->code) {
                    // 生成条形码
                    '<img src="data:image/png;base64,' . self::$DNS1D->getBarcodePNGPath($v->code, "C39+") . '" alt="barcode"   />';
                }
            }
        }

        return view('admin.trace.index', [
            'traceLists' => $traceLists
        ]);
    }

    // 添加追溯页面
    public function add()
    {
        return view('admin.trace.add');
    }

    // 修改追溯页面
    public function edit(Request $request)
    {
        $info = TraceBack::where('id', $request->id)->first();

        $info->images = 'http://' . config('filesystems.disks.qiniu.domains.default') . '/' . $info->image;

        return view('admin.trace.edit', [
            'info' => $info ? $info : ''
        ]);
    }

    // 执行添加
    public function store(Request $request)
    {
        $input = $request->all();
        $rule = [
            'title' => 'required',
            'address' => 'required',
            'code' => 'required',
        ];

        $message = [
            'title.required' => '产品名称不能为空',
            'address.required' => '基地地址不能为空',
            'code.required' => '产品批次号不能为空',
        ];

        $validate = Validator::make($input, $rule, $message);

        if (!$validate->passes()) {
            return back()->withInput($request->all())->withErrors($validate);
        }

        $traceBack = new  TraceBack();

        $traceBack->title = $request->title;

        $traceBack->code = $request->code;
        $traceBack->address = $request->address;

        // 直接提交保存,不做任何验证
        if ($traceBack->save()) {

            $traceBackInfo = TraceBack::where('id', $traceBack->id)->first();

            $traceBackInfo->url = config('filesystems.disks.zhuisu.url') . '?id=' . $traceBackInfo->id;

            QrCode::format('png')->size(236)->margin(0)->generate($traceBackInfo->url,public_path('qrcodes/'.$traceBackInfo->id.'.png'));

            $traceBackInfo->save();

            return redirect('/admin/trace/index');
        } else {
            return back();
        }

    }

    public function update(Request $request)
    {
        $traceBack = TraceBack::where('id', $request->id)->first();
        if (Auth::user()->lavel == 1) {

            $input = $request->all();
            $rule = [
                'title' => 'required',
                'address' => 'required',
                'code' => 'required',
            ];

            $message = [
                'title.required' => '产品名称不能为空',
                'address.required' => '基地地址不能为空',
                'code.required' => '产品批次号不能为空',
            ];

            $validate = Validator::make($input, $rule, $message);

            if (!$validate->passes()) {
                return back()->withInput($request->all())->withErrors($validate);
            }

            $traceBack->title = $request->title;

            $traceBack->code = $request->code;

            $traceBack->address = $request->address;

        } elseif (Auth::user()->lavel == 2) {

            $input = $request->all();
            $rule = [
                'grow_seedlings_name' => 'required',
                'grow_seedlings' => 'required',
            ];

            $validate = Validator::make($input, $rule);

            if (!$validate->passes()) {
                return back()->withInput()->with('errors', '带*信息必须填写');
            }

            $traceBack->grow_seedlings_name = $request->grow_seedlings_name;
            $traceBack->grow_seedlings = $request->grow_seedlings;

            $traceBack->colonization_name = $request->colonization_name;
            $traceBack->colonization = $request->colonization;

            $traceBack->trim_crop_name = $request->trim_crop_name;
            $traceBack->trim_crop = $request->trim_crop;

            $traceBack->bloom_name = $request->bloom_name;
            $traceBack->bloom = $request->bloom;

            $traceBack->fertilization_name = $request->fertilization_name;
            $traceBack->fertilization = $request->fertilization;

            $traceBack->bear_fruit_name = $request->bear_fruit_name;
            $traceBack->bear_fruit = $request->bear_fruit;

            $traceBack->pest_control_name = $request->pest_control_name;
            $traceBack->pest_control = $request->pest_control;

            $traceBack->pick_name = $request->pick_name;
            $traceBack->pick = $request->pick;

            $traceBack->packing_name = $request->packing_name;
            $traceBack->packing = $request->packing;

            $traceBack->transport_name = $request->transport_name;
            $traceBack->transport = $request->transport;

            $traceBack->to_the_store_name = $request->to_the_store_name;
            $traceBack->to_the_store = $request->to_the_store;

            $traceBack->content = $request->editorValue;

            if ($request->enclosure) {

                $res = Storage::disk('public')->put('pdf', $request->enclosure);


                if ($res) {
                    // 文件是否上传成功
                    $traceBack->enclosure = $res;
                }
            }

            $traceBack->url = config('filesystems.disks.zhuisu.url') . '?id=' . $traceBack->id;

            if ($request->file('image')) {

                $disk = QiniuStorage::disk('qiniu');

                $path = $disk->put('image', $request->image);
                $traceBack->image = $path;
            }

        }
        // 直接提交保存,不做任何验证
        if ($traceBack->save()) {
            return back();
        } else {
            return back();
        }

    }

    function imagebmp(&$im, $filename = '', $bit = 8, $compression = 0)
    {
        if (!in_array($bit, array(1, 4, 8, 16, 24, 32))) {
            $bit = 8;
        } else if ($bit == 32) // todo:32 bit
        {
            $bit = 24;
        }


        $bits = pow(2, $bit);

        // 调整调色板
        imagetruecolortopalette($im, true, $bits);
        $width = imagesx($im);
        $height = imagesy($im);
        $colors_num = imagecolorstotal($im);
        $rgb_quad = '';
        if ($bit <= 8) {
            // 颜色索引
            //$rgb_quad = '';
            for ($i = 0; $i < $colors_num; $i++) {
                $colors = imagecolorsforindex($im, $i);
                $rgb_quad .= chr($colors['blue']) . chr($colors['green']) . chr($colors['red']) . "\0";
            }

            // 位图数据
            $bmp_data = '';


            // 非压缩
            if ($compression == 0 || $bit < 8) {
                if (!in_array($bit, array(1, 4, 8))) {
                    $bit = 8;
                }


                $compression = 0;

                // 每行字节数必须为4的倍数，补齐。
                $extra = '';
                $padding = 4 - ceil($width / (8 / $bit)) % 4;
                if ($padding % 4 != 0) {
                    $extra = str_repeat("\0", $padding);
                }

                for ($j = $height - 1; $j >= 0; $j--) {
                    $i = 0;
                    while ($i < $width) {
                        $bin = 0;
                        $limit = $width - $i < 8 / $bit ? (8 / $bit - $width + $i) * $bit : 0;


                        for ($k = 8 - $bit; $k >= $limit; $k -= $bit) {
                            $index = imagecolorat($im, $i, $j);
                            $bin |= $index << $k;
                            $i++;
                        }


                        $bmp_data .= chr($bin);
                    }

                    $bmp_data .= $extra;
                }
            } // RLE8 压缩
            else if ($compression == 1 && $bit == 8) {
                for ($j = $height - 1; $j >= 0; $j--) {
                    $last_index = "\0";
                    $same_num = 0;
                    for ($i = 0; $i <= $width; $i++) {
                        $index = imagecolorat($im, $i, $j);
                        if ($index !== $last_index || $same_num > 255) {
                            if ($same_num != 0) {
                                $bmp_data .= chr($same_num) . chr($last_index);
                            }


                            $last_index = $index;
                            $same_num = 1;
                        } else {
                            $same_num++;
                        }
                    }


                    $bmp_data .= "\0\0";
                }

                $bmp_data .= "\0\1";
            }


            $size_quad = strlen($rgb_quad);
            $size_data = strlen($bmp_data);
        } else {
            // 每行字节数必须为4的倍数，补齐。
            $extra = '';
            $padding = 4 - ($width * ($bit / 8)) % 4;
            if ($padding % 4 != 0) {
                $extra = str_repeat("\0", $padding);
            }


            // 位图数据
            $bmp_data = '';


            for ($j = $height - 1; $j >= 0; $j--) {
                for ($i = 0; $i < $width; $i++) {
                    $index = imagecolorat($im, $i, $j);
                    $colors = imagecolorsforindex($im, $index);

                    if ($bit == 16) {
                        $bin = 0 << $bit;


                        $bin |= ($colors['red'] >> 3) << 10;
                        $bin |= ($colors['green'] >> 3) << 5;
                        $bin |= $colors['blue'] >> 3;


                        $bmp_data .= pack("v", $bin);
                    } else {
                        $bmp_data .= pack("c*", $colors['blue'], $colors['green'], $colors['red']);
                    }

                    // todo: 32bit;
                }


                $bmp_data .= $extra;
            }


            $size_quad = 0;
            $size_data = strlen($bmp_data);
            $colors_num = 0;
        }


        // 位图文件头
        $file_header = "BM" . pack("V3", 54 + $size_quad + $size_data, 0, 54 + $size_quad);


        // 位图信息头
        $info_header = pack("V3v2V*", 0x28, $width, $height, 1, $bit, $compression, $size_data, 0, 0, $colors_num, 0);

        // 写入文件
        if ($filename != '') {
            $fp = fopen($filename, "wb");


            fwrite($fp, $file_header);
            fwrite($fp, $info_header);
            fwrite($fp, $rgb_quad);
            fwrite($fp, $bmp_data);
            fclose($fp);


            return 1;
        }

        // 浏览器输出
        header("Content-Type: image/bmp");
        echo $file_header . $info_header;
        echo $rgb_quad;
        echo $bmp_data;

        return 1;
    }

}

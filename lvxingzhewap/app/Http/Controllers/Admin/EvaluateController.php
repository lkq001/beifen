<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Evaluate;

class EvaluateController extends Controller
{
    //
    public function index()
    {
        $infoLists = Evaluate::paginate('10');

        return view('admin.evaluate.index', [
            'infoLists' => $infoLists
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Jobs\TestJob;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;

class TestController extends Controller
{
    public function index()
    {
        //$this->dispatch(new TestJob());
        $sql = "select * from users";
        //$record = DB::connection()->getPdo()->exec($sql);
        $record = DB::select(DB::raw($sql));
        //dd($record);
    }
}

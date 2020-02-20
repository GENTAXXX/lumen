<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Content;

class ContentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){

    }

    public function store(Request $request){
        $result = Content::create([
            'title' => $request->title,
            'text' =>$request->text
        ]);

        if ($result){
            $data['code'] = 200;
            $data['result'] = $result;
        }else{
            $data['code'] = 500;
            $data['result'] = 'Error';
        }
        return response($data);
    }
}

<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuscriberMailableFormRequest;
use App\Mail\SuscriberMailable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SuscriberMailableController extends Controller
{

    protected $data=[];

    public function getResponsetoAlert(SuscriberMailableFormRequest $request)
    {   
      
        Mail::to(request()->mail)->send(new SuscriberMailable());
        $data = [
            'alert' => 'success',
            'message' => 'Enviado satisfactoriamente!'
        ];
        return response()->json($data);
    }

}

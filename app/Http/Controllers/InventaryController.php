<?php

namespace App\Http\Controllers;
use App\Models\Inventary;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventaryController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand' => 'required',
            'user_id' => 'user_id',
            'model' => 'required',
            'car_name' => 'required',
            'year' => 'required',
            'milage' => 'required',
            'price' => 'required',
            'fuel_type' => 'required',
            'description' => 'required',
            'location' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->errors();
            $erro_msg = [];
            foreach ($messages->all() as $message) {
                array_push($erro_msg,$message);
            }
            return response(['status' => 201, 'msg' => $erro_msg]);
        }else{
            $Inventarys = Inventary::create($request->all());
            return response(['status' => 200, 'msg' => 'Inventary Added SuccessFully', 'data' => $Inventarys], 200);
        }
    }

    public function brandList(){
        $brandList = DB::table('brandmodels')->where('type', 'brand')->get();;
        return response(['status' => 200, 'data' => $brandList], 200);

    }

    public function modelLists(Request $request){

        $validator = Validator::make($request->all(), [
            'brand_id' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->errors();
            $erro_msg = [];
            foreach ($messages->all() as $message) {
                array_push($erro_msg,$message);
            }
            return response(['status' => 201, 'msg' => $erro_msg]);
        }else{
            $brandList = DB::table('brandmodels')->where('parent', $request->all()['brand_id'])->where('type', 'model')->get();;
            return response(['status' => 200, 'data' => $brandList], 200);

        }

    }


}

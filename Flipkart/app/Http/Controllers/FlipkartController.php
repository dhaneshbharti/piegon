<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\Workers;
use App\Models\Flipkart;



class FlipkartController extends Controller
{
    //
    public function create(Request $request){
        $data = $request->only('role_name','worker_name');
        $created = Flipkart::create($data);
        return response()->json(['data' => 'created'], 200);
    }
    public function role()
    {
        //
        $data = Roles::all();

        return response()->json(['data' => $data]);
    }
    public function worker($id){
        return response()->json(['data' => Workers::where('r_id', $id)->get()], 200);

    }

}

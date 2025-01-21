<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Division;
use App\Models\District;
use App\Models\Union;
use App\Models\Upazila;

class LocationController extends Controller
{
    public function index()
    {
        $data = DB::table('divisions')->orderBy('name','ASC')->get();
        $divisions = DB::table('divisions')->count('id');
        $districts = DB::table('districts')->count('id');
        $upazilas = DB::table('upazilas')->count('id');
        $unions = DB::table('unions')->count('id');

        $data = [
            'division' => $divisions,
            'divisions' => $data,
            'district' => $districts,
            'upazila' => $upazilas,
            'union' => $unions,
        ];

       return view('area')->with('data',$data); 
    }

    /**-------------------------------------------------------------------------
     * 
     * -------------------------------------------------------------------------
     */
    public function getDistricts(Request $request)
    {
        $division_id = $request->division_id;
        $districts = DB::table('districts')->orderBy('name','ASC')->where('division_id',$division_id)->get();
        return response()->json($districts);
    }

    public function getUpazilas(Request $request)
    {
        $district_id = $request->district_id;
        $upazilas = DB::table('upazilas')->orderBy('name','ASC')->where('district_id',$district_id)->get();
        return response()->json($upazilas);
    }

    public function getThanas(Request $request)
    {
        $upazila_id = $request->upazilas_id;
        $thanas = DB::table('unions')->orderBy('name','ASC')->where('upazila_id',$upazila_id)->get();
        return response()->json($thanas);
    }

    /**-------------------------------------------------------------------------
     * Ecommerce Using
     * -------------------------------------------------------------------------
     */
    public function getRegion(Request $request)
    {
        $divisionId = $request->division_id;
        $districts = District::with('upazila')->where('division_id', $divisionId)->orderBy('name', 'asc')->get()->toArray();
        
        return response()->json($districts);
    }

    public function getAreas(Request $request)
    {
        $cityId = $request->upazila_id;
        $areas = Union::where('upazila_id', $cityId)->orderBy('name', 'asc')->get();
        
        return response()->json($areas);
    }


}

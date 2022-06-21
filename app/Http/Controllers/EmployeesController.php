<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Support\Collection
     */
    public function index(Request $request)
    {
        //Log::info($request);
        $emps = Employee::paginate($request->perPage, ['FirstName', 'LastName', 'City', 'Region', 'PostalCode', 'Country', 'ReportsTo']);
        return $emps;

    }

    public function getAllSubordinates($id){
        return  Employee::with('subordinates')->find($id);
    }

    public function getAllBosses($id){
        return Employee::with('bosses')->find($id);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \response([
            'create' => true
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        Log::info($request);
        try {
            if ($request->images) {
                $folderPath = "storage/";
//                $folderPath = "../storage/app/uploads/";
                foreach ($request->images as $index=>$image) {
                    Log::info("index: $index");
                    $base64Image = explode(";base64,", $image);
                    $explodeImage = explode("image/", $base64Image[0]);
                    $imageType = $explodeImage[1];
                    $image_base64 = base64_decode($base64Image[1]);
                    $file = $folderPath . 'image' . $index . '.'.$imageType;
                    file_put_contents($file, $image_base64);
                }
            }else{
                return \response([
                    'not_found' => 'No se encontraron las imágenes.'
                ], 404);
            }
        }catch(\Exception $e){
            //Log::info($e);
            return \response([
                'error' => 'No se guardaron las imágenes.',
                'details' => $e->getMessage()
            ], 200);
        }
                return \response([
            'success' => true
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

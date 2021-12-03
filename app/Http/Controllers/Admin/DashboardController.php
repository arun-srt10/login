<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use Image;
use Carbon\Carbon;
use App\Models\{Country, State, City, Education};

class DashboardController extends Controller
{
    public function getUsersList(Request $request){
        if ($request->ajax()) {
            $status = !empty($request->get('statusFilter')) ? $request->get('statusFilter') : 'Active';
            $data = User::latest()
                ->where('status', '=', $status)
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" data-id="'.$row->id.'" id="viewBtn" class="btn btn-primary btn-sm">View</a> <a href="javascript:void(0)" data-id="'.$row->id.'" id="editBtn" class="edit btn btn-success btn-sm">Edit</a>';
                    if($row->status != 'Deleted'){
                        $actionBtn .= ' <a href="javascript:void(0)" data-id="'.$row->id.'" id="deleteBtn" class="delete btn btn-danger btn-sm">Delete</a>';
                    }
                    return $actionBtn;
                })
                ->addColumn('profile_photo_path', function ($row) {
                    $url= !empty($row->profile_photo_path) ? asset('userimages/thumbnail/'.$row->profile_photo_path) : asset($row->profile_photo_url) ;
                    return '<img src="'.$url.'" height="50" width="50" class="img-profile rounded-circle" align="center" />';
                })
                ->addColumn('dob', function ($row) {
                    $age = Carbon::parse($row->dob)->diff(Carbon::now())->y;
                    return $age;
                })
                ->rawColumns(['profile_photo_path', 'action'])
                ->only([
                    'id',
                    'profile_photo_path',
                    'name',
                    'email',
                    'dob',
                    'status',
                    'action'
                ])
                ->make(true);
        }
    }

    public function delete(Request $request){
        $outputData['error'] = '';
        $outputData['success'] = '';

        $requestData = $request->input();
        if($request->ajax() && !empty($requestData['id'])) {
            $dbData = User::find($requestData['id']);
            if ($dbData === null) {
                $outputData['error'] = "No records found, try again";
            }else{
                $dbData->status = 'Deleted';
                try{
                    $dbData->save();
                    $outputData['success'] = "Data Deleted Successfully";
                }
                catch(Exception $e){
                    $outputData['error']  = "Internal Server Error, try again";
                }
            }
        }else{
            $outputData['error']  = "Internal Server Error, try again";
        }
        return response()->json($outputData);
    }

    public function addUpdateFn(Request $request){

        $outputData['error'] = '';
        $outputData['success'] = '';

        $requestData = $request->input();
        if($request->ajax()){
            $validatedData = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required',
                    'dob' => 'required',
                    'address' => 'required',
                    'education' => 'required',
                    'country' => 'required',
                    'state' => 'required',
                    'city' => 'required',
                    'pincode' => 'required',
                    'status' => 'required',
                    'profileImage' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
                ]
            );

            if ($validatedData->fails()) {
                $outputData['error'] = $validatedData->errors();
            }elseif($requestData['operationType'] == 'update'){
                if(empty($requestData['id'])){
                    $outputData['error'] = "Id value is required";
                }
            }

            if(empty($outputData['error'])){
                $operationMsg = "Added";
                if($requestData['operationType'] == 'update'){
                    $data = User::find($requestData['id']);
                    $operationMsg = "Updated";
                }else{
                    $data = new User;
                }
                $data->name = $requestData['name'];
                $data->email = $requestData['email'];
                $data->dob = date('Y-m-d', strtotime($requestData['dob']));
                $data->education = $requestData['education'];
                $data->address = $requestData['address'];
                $data->country = $requestData['country'];
                $data->state = $requestData['state'];
                $data->city = $requestData['city'];
                $data->pincode = $requestData['pincode'];
                $data->status = $requestData['status'];
                // $data->password = 'testing';

                try{
                    if(!empty($request->profileImage)){

                            $image = $request->profileImage;
                            $imageName = time().'.'.$image->getClientOriginalExtension();

                            $thumbnailDestinationPath = public_path('userimages/thumbnail');
                            $imgFile = Image::make($image->getRealPath());
                            $imgFile->resize(150, 150, function ($constraint) {
                                $constraint->aspectRatio();
                            })->save($thumbnailDestinationPath.'/'.$imageName);
                            $destinationPath = public_path('userimages/');
                            $image->move($destinationPath, $imageName);
                            $data->profile_photo_path = $imageName;
                    }
                    $data->save();
                    $outputData['success'] = "Data $operationMsg Successfully";
                }
                catch(Exception $e){
                    $outputData['error'] = "Internal Server Error, try again";
                }
            }
        }else{
            $outputData['error'] = "Internal Server Error, try again";
        }
	    return response()->json($outputData);

    }

    public function getRowData(Request $request){
        $outputData['error'] = '';
        $outputData['success'] = '';
        $outputData['data'] = '';
        if(!empty($request->id) && $request->ajax()){
            $data = User::find($request->id);
            $data->dob = date('d-m-Y', strtotime($data['dob']));
            $outputData['countryData'] =  Country::get(["name", "id"]);
            $outputData['stateData'] = State::where("country_id",$data->country)->get(["name", "id"]);
            $outputData['cityData'] = City::where("state_id",$data->state)->get(["name", "id"]);

            $outputData['data'] = $data;
        }else{
            $outputData['error'] = "Id is required";
        }
        return response()->json($outputData);
    }

    public function getEducations(){
        $data['educations'] = Education::get(["name", "id"]);
        return response()->json($data);
    }
}

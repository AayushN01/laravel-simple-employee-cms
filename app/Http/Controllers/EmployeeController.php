<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File; 

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $employees = Employee::with('company')->orderBy('created_at','DESC')->get();
        return view('employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::get();
        return view('employee.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        if($image = $request->file('photo'))
        {
            $destinationPath = public_path('uploads/employee/');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $photo = $profileImage;
        }

        $input = [
            'company_id' => $request->company_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact_no' => $request->contact_no,
            'address' => $request->address,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'designation' => $request->designation,
            'photo' => $photo,
        ];

        Employee::create($input);

        return redirect()->route('employee.index')->withSuccess('Employee details has been saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $companies = Company::get();
        return view('employee.edit',compact('employee','companies'));
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
        $employee = Employee::find($id);
        if($image = $request->file('photo')){
            $file_path = public_path('uploads/employee/').$employee->photo;
            if(File::exists($file_path))
            {
                unlink($file_path);
            }
            $destinationPath = public_path('uploads/employee/');
            $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath,$profileImage);
            $employee_photo = $profileImage;
        } else {
            $employee_photo = $employee->photo;
        }
        
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->contact_no = $request->contact_no;
        $employee->address = $request->address;
        $employee->gender = $request->gender;
        $employee->dob = $request->dob;
        $employee->designation = $request->designation;
        $employee->photo = $employee_photo;
        $employee->save();

        return redirect()->route('employee.index')->withSuccess('Employee data has been updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $file_path = public_path('uploads/employee/').$employee->photo;
        if(File::exists($file_path))
        {
            unlink($file_path);
        }
        $employee->delete();
        return redirect()->back()->withSuccess('Employee data has been deleted Successfully!');
    }
}

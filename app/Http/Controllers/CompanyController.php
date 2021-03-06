<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File; 


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $companies = Company::orderBy('created_at','DESC')->get();
        return view('company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        if($image = $request->file('company_logo'))
        {
            $destinationPath = public_path('uploads/company/');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $company_logo = $profileImage;
        }

        $input = [
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'company_website' => $request->company_website,
            'company_contact_no' => $request->company_contact_no,
            'company_logo' => $company_logo,
        ];

        Company::create($input);
        return redirect()->route('company.index')->withSuccess('Company details has been stored Successfully!');

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
        $company = Company::find($id);
        return view('company.edit',compact('company'));
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
        $company = Company::find($id);
        if($image = $request->file('company_logo'))
        {
            $file_path = public_path('uploads/company/').$company->company_logo;
            if(File::exists($file_path)){
                unlink($file_path);
            }
            $destinationPath = public_path('uploads/company/');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $company_logo = $profileImage;
        }

        $company->company_name = $request->company_name;
        $company->company_address = $request->company_address;
        $company->company_website = $request->company_website;
        $company->company_contact_no = $request->company_contact_no;
        $company->company_logo = $company_logo;
        $company->save();
        return redirect()->route('company.index')->withSuccess('Company details has been updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $file_path = public_path('uploads/company/').$company->company_logo;
        if(File::exists($file_path)){
            unlink($file_path);
        }
        $company->delete();
        return redirect()->route('company.index')->withSuccess('Company details has been deleted Successfully!');

    }
}

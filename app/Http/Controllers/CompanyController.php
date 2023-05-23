<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $page = array(
            'name'  =>  'Companies',
            'title' =>  'Companies',
            'subtitle' => 'List of Companies',
            'crumb' =>  array(
                'Home' => '',
                'Companies' => '',
            )
        );

        $companies = Company::getAll();

        return view('companies.index', compact('page', 'companies'));
    }

    public function store(CompanyStoreRequest $request)
    {
        DB::beginTransaction();
        try {

            $company = new Company;
            $company->name = $request->name;
            $company->email = $request->email;
            $company->website_url = $request->website_url;

            if($request->hasFile('file')){

                $allowed_files = array('png', 'jpg', 'jpeg', 'gif');

                $extension = $request->file('file')->getClientOriginalExtension();
                if(!in_array($extension, $allowed_files)){
                    return back()->withInput()->withErrors("Unknown Filetype - ".$request->file('file')->getClientOriginalName());
                }
                // Get Filename with the extension
                $filenameWithExt = $request->file('file')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Get just ext
                $extension = $request->file('file')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;

                $path = $request->file('file')->storeAs('public', $fileNameToStore);

                $company->logo = $fileNameToStore;
            } 

            $company->save();

            DB::commit();
            return redirect('/companies')->withSuccess('Company has been added successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function update(CompanyUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $company = Company::find($id);

            $company_logo = $company->logo;
            $company->name = $request->name;
            $company->email = $request->email;
            $company->website_url = $request->website_url;

            if($request->hasFile('file')){

                $allowed_files = array('png', 'jpg', 'jpeg', 'gif');

                $extension = $request->file('file')->getClientOriginalExtension();
                if(!in_array($extension, $allowed_files)){
                    return back()->withInput()->withErrors("Unknown Filetype - ".$request->file('file')->getClientOriginalName());
                }
                // Get Filename with the extension
                $filenameWithExt = $request->file('file')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Get just ext
                $extension = $request->file('file')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;

                $path = $request->file('file')->storeAs('public', $fileNameToStore);

                $company->logo = $fileNameToStore;

                if($company_logo) {
                    Storage::delete('public/'.$company_logo);
                }
            } 

            $company->save();

            DB::commit();
            return redirect('/companies')->withSuccess('Company information has been updated successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function delete(Request $request, $id)
    {   
        $company = Company::findOrFail($id);

        DB::beginTransaction();
        try {
            $company->delete();
            
            DB::commit();
            return redirect('/companies')->withSuccess('Company has been deleted successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors($e->getMessage());
        }
    }
}

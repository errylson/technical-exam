<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Company;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $page = array(
            'name'  =>  'Employees',
            'title' =>  'Employees',
            'subtitle' => 'List of Employees',
            'crumb' =>  array(
                'Home' => '',
                'Employees' => '',
            )
        );

        $companies = Company::getAll();
        $employees = Employee::getAll();

        return view('employees.index', compact('page', 'companies', 'employees'));
    }

    public function store(EmployeeStoreRequest $request)
    {
        DB::beginTransaction();
        try {

            $employee = new Employee;
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->company_id = $request->company;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->save();

            DB::commit();
            return redirect('/employees')->withSuccess('Employee has been added successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function update(EmployeeUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {

            $employee = Employee::findOrFail($id);
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->company_id = $request->company;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->save();

            DB::commit();
            return redirect('/employees')->withSuccess('Employee information has been updated successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function delete(Request $request, $id)
    {   
        $employee = Employee::findOrFail($id);

        DB::beginTransaction();
        try {
            $employee->delete();
            
            DB::commit();
            return redirect('/employees')->withSuccess('Employee has been deleted successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors($e->getMessage());
        }
    }
}

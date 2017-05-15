<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Employee;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employee.view_employees',['employees' => $employees ]);   
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function create()
    {
        return view('employee.add_employee');
    }


    /**
     * Store new employee record
     * @param  Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
            'f_name'=> 'required',
            'l_name'=> 'required',
            'dob'=> 'required',
            'join_date'=> 'required',
            'dept'=> 'required',
            'emp_type'=> 'required',
        ]);

        //create new employee
        $employee = new Employee;
        $employee->f_name = $request->f_name;
        $employee->l_name = $request->l_name;
        $employee->dob = $request->dob;
        $employee->join_date = $request->join_date;
        $employee->dept = $request->dept;
        $employee->emp_type = $request->emp_type;

        $employee->save();

        return redirect()->route('employee.index')->with('alert-success','New employee successfully added!');
    }


}
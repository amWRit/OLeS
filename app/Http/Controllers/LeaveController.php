<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests;
use Illuminate\Http\Request;
// use App\Employee;
// use App\Leave;
// use App\Leave_type;
// use App\Leave_category;
//require('./vendor/bin/psysh');
// require('C:\xampp\htdocs\OLeS\vendor\bin\psysh');
// require('C:\xampp\htdocs\OLeS\vendor\composer\autoload_files.php');

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class LeaveController extends Controller
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

    //create leave
    /**
    *@return Response
    */

    public function index()
    {
        $leaves = App\Leave::all();
        return view('leave.view_leaves',['leaves' => $leaves ]);   
    }

        /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function create()
    {
    	$employees = App\Employee::all();
    	$leave_types = App\Leave_type::all();
    	$leave_categories = App\Leave_category::all();

        //return view('leave.add_leave',['employees' => $employees ,'leave_types' => $leave_types ,'leave_categories' => $leave_categories ]);
        return view('leave.add_leave',['employees' => $employees,'leave_types' => $leave_types,'leave_categories' => $leave_categories]);
    }


    /**
     * Store new leave record
     * @param  Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
            'emp_name'=> 'required',
            'leave_type'=> 'required',
            'leave_category'=> 'required',
            'fromDate'=> 'required',
            'toDate'=> 'required',
            'note'=> 'required',
        ]);

    	$f_name = $request->emp_name;
    	$leave_type_name = $request->leave_type;
    	$leave_cat_name = $request->leave_category;

        $emp = App\Employee::where('f_name','=', $f_name)->first();
        $leave_type = App\Leave_type::where('name','=', $leave_type_name)->first();
        $leave_category = App\Leave_category::where('name','=', $leave_cat_name)->first();

        $emp_id = $emp->id;
        $leave_type_id = $leave_type->id;
        $leave_cat_id = $leave_category->id;

        //create new leave
        $leave = new App\Leave;
        $leave->emp_id = $emp_id;
        $leave->leave_type_id = $leave_type_id;
        $leave->leave_cat_id = $leave_cat_id;
        $leave->from = $request->fromDate;
        $leave->to = $request->toDate;
        $leave->note = $request->note;

        // $leave = new Leave;
        // $leave->emp_id = 1;
        // $leave->leave_type_id = 1;
        // $leave->leave_cat_id = 1;
        // $leave->from = "2017-02-03";
        // $leave->to = "2017-02-05";
        // $leave->note = "this is a test";

        $leave->save();
        echo 'here';

        return redirect()->route('leave.index')->with('alert-success','New employee successfully added!');
    }

}

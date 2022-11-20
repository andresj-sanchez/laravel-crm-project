<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{

		function __construct(){
			$this->middleware('permission:admin.employees.index|admin.employees.show|admin.employees.create|admin.employees.edit|admin.employees.destroy', ['only'=>['index']]);
			$this->middleware('permission:admin.employees.create', ['only'=>['create','store']]);
			$this->middleware('permission:admin.employees.edit', ['only'=>['edit','update']]);
			$this->middleware('permission:admin.employees.destroy', ['only'=>['destroy']]);
		}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
				$employees = Employee::latest()->paginate(10);
				return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
				$companies = Company::all();
				return view('admin.employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
				request()->validate([
						'first_name' => ['required', 'string', 'min:3'],
						'last_name' => ['required', 'string', 'min:3'],
						'company_id' => ['required'],
						'email' => ['required','email', Rule::unique('employee', 'email')],
						'phone_number' => ['required'],
				]);

				Employee::create($request->all());
				return redirect()->route('employees.index')->with('message','Empleado creado exitosamente!');
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
				$employee = Employee::find($id);
				$companies = Company::all();
				return view('admin.employees.edit', compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
			request()->validate([
					'first_name' => ['required', 'string', 'min:3'],
					'last_name' => ['required', 'string', 'min:3'],
					'company_id' => ['required'],
					'email' => ['required','email'],
					'phone_number' => ['required'],
			]);

			$employee->update($request->all());
			return back()->with('message','Empleado actualizado exitosamente!');
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

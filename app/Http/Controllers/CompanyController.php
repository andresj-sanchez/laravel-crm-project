<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{

		function __construct(){
			$this->middleware('permission:admin.companies.index|admin.companies.show|admin.companies.create|admin.companies.edit|admin.companies.destroy', ['only'=>['index']]);
			$this->middleware('permission:admin.companies.create', ['only'=>['create','store']]);
			$this->middleware('permission:admin.companies.edit', ['only'=>['edit','update']]);
			$this->middleware('permission:admin.companies.destroy', ['only'=>['destroy']]);
		}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			// dd('hola');
				$companies = Company::latest()->paginate(10);
				return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

			$formFields = $request->validate([
				'name' => ['required', Rule::unique('company', 'name')],
				'email' => ['email', Rule::unique('company', 'email')],
				'logo' => ['image','dimensions:min_width=100,min_height=100'],
				'website' => 'required',
			]);
			

				if($request->hasFile('logo')){
					$formFields['logo'] = $request->file('logo')->store('logos','public');
				}

				Company::create($formFields);
				return redirect()->route('companies.index')->with('message','Compañia creada exitosamente!');
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
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
			$formFields = $request->validate([
				'name' => 'required',
				'email' => 'email',
				'logo' => ['image','dimensions:min_width=100,min_height=100'],
				'website' => 'required',
			]);
			

				if($request->hasFile('logo')){
					$formFields['logo'] = $request->file('logo')->store('logos','public');
				}

				$company->update($formFields);
				return back()->with('message','Compañia actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
				return redirect()->route('companies.index');
    }
}

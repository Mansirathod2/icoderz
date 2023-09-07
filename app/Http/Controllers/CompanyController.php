<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyAddRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Traits\ImageUploadTrait;

class CompanyController extends Controller
{
    use ImageUploadTrait;
    public function homePage() 
    {
      $companies = Company::paginate(10);
      return view('home',compact('companies'));
    }
     
    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.index',compact('companies'));
    }

    public function create(Request $request)
    {
       return view('company.create');
    }

    public function store(CompanyAddRequest $request)
    {
        
        $logo = "";
        if($request->hasFile('logo')){
            $logo = $this->uploadImage($request->file('logo'), 'companies');
        }
        $companies = [
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $logo,
            'website' => $request->website,
        ];
        
        Company::create($companies);

        return redirect()->route('home')->with(['message'=>'Inserted Successfully']);
    }

    public function show(Company $company)
    {
        //
    }

    public function edit(Company $company)
    {
        return view('company.edit',compact('company'));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $logo = "";
        if($request->hasFile('logo')){
            $logo = $this->uploadImage($request->file('logo'), 'companies');
        }else{
            $logo =  $company->logo;  
        }
        $companies = [
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $logo,
            'website' => $request->website,
        ];
        $company->update($companies);

        return redirect()->route('home')->with(['message'=>'Updated Successfully']);
    }

    public function destroy(Company $company)
    {
        if($company){
            $company->delete();
            return redirect()->route('home')->with(['message'=>'Deleted Successfully']);
        }else{
            return redirect()->route('home')->with(['error'=>'Something went wrong']);
        }
        
        
    }
}

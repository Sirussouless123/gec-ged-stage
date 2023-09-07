<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Department\DepartmentRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        return view('admin.department.index',[
            'departments'=>Department::Paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.department.form',[
        'department'=>new Department,
       ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $data = $request->validated();
        
        $department = Department::create(
           [ 'nomDep' =>$data['nom'],]
        );

        if ($department->exists){
            return to_route('admin.department.index')->with('success','Département crée');
        }
    }
   
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
       return view('admin.department.form',[
        'department'=> $department,
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Department $department , DepartmentRequest $request)
    {
        $data = $request->validated();
       $update =  DB::table('departments')
              ->where('idDep', $department->idDep)
              ->update(['nomDep' => $data['nom']]);
           
         if ($update == 1){
               return to_route('admin.department.index')->with( 'success','Département modifié avec succès');
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(  Department $department)
    {
        $delete = DB::table('departments')->where('idDep',$department->idDep)->delete();
         
        if ($delete == 1){
            return to_route('admin.department.index')->with('success','Département supprimé avec succès');
        }
    }
}

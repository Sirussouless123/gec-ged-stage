<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Service\ServiceRequest;

class ServiceController extends Controller
{
    public function index()
    {
       
        $services = DB::table('services')->join('departments','departments.idDep','=','services.department_id')->select('services.*','departments.nomDep as nom')->paginate(6);
      
        return view('admin.service.index',[
            'services'=>$services,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
       return view('admin.service.form',[
        'service'=>new Service,
        'departments'=>$departments,
       ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $data = $request->validated();
      
        $service = Service::create(
           [ 'nomSer' =>$data['nomSer'],'department_id'=>$data['department_id']]
        );

        if ($service->exists){
            return to_route('admin.service.index')->with('success','Service crée');
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
    public function edit(Service $service)
    {
        $departments = Department::all();
       return view('admin.service.form',[
        'service'=> $service,
        'departments'=>$departments,
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Service $service , ServiceRequest $request)
    {
        $data = $request->validated();
       
       $update =  DB::table('services')
              ->where('idSer', $service->idSer)
              ->update(['nomSer' => $data['nomSer'],'department_id'=>$data['department_id']]);
           
         if ($update == 1){
               return to_route('admin.service.index')->with( 'success','Service modifié avec succès');
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Service $service)
    {
        $delete = DB::table('services')->where('idSer',$service->idSer)->delete();
         
        if ($delete == 1){
            return to_route('admin.service.index')->with('success','Service supprimé avec succès');
        }
    }
}

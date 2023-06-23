<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
       
        return view('admin.category.index',[
            'categories'=>Category::Paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.category.form',[
        'category'=>new Category,
       ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
      
        $category = Category::create(
           [ 'nomCat' =>$data['nomCat'],'user_id'=>$data['user_id']]
        );

        if ($category->exists){
            return to_route('admin.category.index')->with('success','Catégorie crée');
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
    public function edit(Category $category)
    {
       return view('admin.category.form',[
        'category'=> $category,
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Category $category , CategoryRequest $request)
    {
        $data = $request->validated();
       
       $update =  DB::table('categories')
              ->where('idCat', $category->idCat)
              ->update(['nomCat' => $data['nomCat'],'user_id'=>$data['user_id']]);
           
         if ($update == 1){
               return to_route('admin.category.index')->with( 'success','Catégorie modifié avec succès');
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Category $category)
    {
        $delete = DB::table('categories')->where('idCat',$category->idCat)->delete();
         
        if ($delete == 1){
            return to_route('admin.category.index')->with('success','Catégorie supprimé avec succès');
        }
    }
}

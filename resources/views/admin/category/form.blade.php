@extends('admin.admin')

@section('title', $category->exists ? 'Modifier une catégorie' : 'Créer une catégorie')


@section('content')
        
          <h1 class="my-3">@yield('title')</h1>

        
          <form action="{{ route($category->exists ? 'admin.category.update' : 'admin.category.store',['category'=>$category] )}}" method="post" class="v-stack gap-2">
            @method($category->exists ? 'put' : 'post')
            @csrf
            <input type="hidden" name="user_id" value="0">
            @include('shared.input', ['type'=>'text','label'=>'Nom', 'name'=>'nomCat','value'=>$category->nomCat])
            <div class="mt-3"> 
                <button class="btn btn-success">
                        @if ($category->exists)
                            Modifier
                        @else 
                            Créer
                         @endif
             
                </button>
             
                </div>
          </form>
@endsection
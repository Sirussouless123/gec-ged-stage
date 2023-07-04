@extends('admin.admin')

@section('title', $category->exists ? 'Modifier une catégorie' : 'Créer une catégorie')


@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">

                            <div class="modal-content cs_modal">
                                <div class="modal-header">
                                    <h5 class="modal-title">@yield('title')</h5>
                                </div>
                                <div class="modal-body">
                                    <form
                                        action="{{ route($category->exists ? 'admin.category.update' : 'admin.category.store',['category'=>$category] )}}" method="post" class="gap-2 v-stack">
                                        @method($category->exists ? 'put' : 'post')
            @csrf
            <input type="hidden" name="user_id" value="0">
                                        <div class>
                                            @include('shared.input', ['type'=>'text','label'=>'Nom ', 'name'=>'nomCat','value'=>$category->nomCat])
                                                <button class="btn btn-success">
                                                        @if ($category->exists)
                                                            Modifier
                                                        @else 
                                                            Créer
                                                         @endif
                                                </button>                                       
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

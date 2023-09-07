@extends('admin.admin')

@section('title', $department->exists ? 'Modifier un département' : 'Créer un département')


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
                                        action="{{ route($department->exists ? 'admin.department.update' : 'admin.department.store', ['department' => $department]) }}"
                                        class="gap-2" method="POST">
                                        @csrf
                                        @method($department->exists ? 'put' : 'post')

                                        <div class>
                                            @include('shared.input', [
                                                'type' => 'text',
                                                'label' => 'Nom du département',
                                                'name' => 'nom',
                                                'value' => $department->nomDep,
                                            ])

                                            <button class="btn btn-success ">
                                                @if ($department->exists)
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

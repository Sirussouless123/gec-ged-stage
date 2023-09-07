@extends('admin.admin')

@section('title', 'Catégories')

@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">

            <div class="col-lg-12">
                <div class="white_box QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Liste des catégories </h4>
                        <div class="box_right d-flex lms_block">
                            <a class="btn_1 mb-2 btn-lg email-gradient gradient-9-hover email__btn waves-effect"
                                href="{{ route('admin.category.create') }}"><i class="icon-pencil"></i>Ajout</a>
                        </div>
                    </div>
                    <div class="QA_table ">
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert"">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <table class="table lms_table_active">
                            <thead>
                                <tr>


                                    <th scope="col">N°</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Modifier</th>
                                    <th scope="col">Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>


                                        <td>
                                            <div class="d-flex align-items-center">

                                                <div class="flex-grow-1 ms-3">
                                                    <p>{{ $category->idCat }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p>{{ $category->nomCat }}</p>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.category.edit', ['category' => $category]) }}"
                                                class="btn btn-dark text-white">Modifier</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.category.destroy', ['category' => $category]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ?')">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $categories->links() }}
    @endsection

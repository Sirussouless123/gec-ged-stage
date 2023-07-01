@extends('layouts.app')

@section('title', 'Courriers')
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/card.css') }}" />
@endsection
@section('content')



    @php
        
        $favorite = DB::table('categories')
            ->where('nomCat', 'Favoris')
            ->first();
        
        $report = DB::table('categories')
            ->Where('nomCat', 'Importants')
            ->first();
    @endphp


    <div class="container-fluid my-3">


        <div class="row g-5">

            @foreach ($mails as $mail)
                <div class="  col-lg-4 col-md-6 ">
                    <div class="card ">
                        <div class="image-content">
                            <span class="overlay"></span>
                            @php
                                $image = 'text-3.png';
                                if ($mail->formatMail == 'pdf') {
                                    $image = 'pdf-1.png';
                                } elseif ($mail->formatMail == 'docx') {
                                    $image = 'word-1.png';
                                } elseif ($mail->formatMail == 'xlsx') {
                                    $image = 'excel-1.png';
                                } elseif ($mail->formatMail == 'csv') {
                                    $image = 'csv-1.png';
                                } elseif ($mail->formatMail == 'xml') {
                                    $image = 'xml-2.png';
                                }
                            @endphp

                            <div class="card-image">
                                <img src="{{ asset('assets/img/' . $image) }}" alt="" class="card-img" />
                            </div>
                        </div>


                        <div class="card-content">
                            <h2 class="name">Mail</h2>

                            <p>Nom : {{ $mail->nomMail }}</p>



                            {{-- <div  x-data> --}}
                            {{-- <livewire:favorite  :mail='$mail->idMail' :favorite='$favorite->idCat' />
                      <livewire:report  :mail='$mail->idMail' :report='$report->idCat' /> --}}

                            {{-- </div>
             --}}
                            <div >

                                <livewire:favorite />
                            </div>
                            <div class="icone">
                                <a href="{{ route('user.mail.edit', ['mail' => $mail->idMail]) }}"
                                    style="text-decoration:none;color : white; " class='bx bxs-folder'>
                                </a>
                                <a href="{{ route('user.downloadingmail', ['mail' => $mail->idMail]) }}"
                                    style="text-decoration:none;color : white; " class='bx bxs-download'>
                                </a>
                                <form action="{{ route('user.mail.destroy', ['mail' => $mail->idMail]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class='bx bxs-trash'
                                        style=" background: none;
                        color: white;
                        border: none;
                        padding: 0;
                        font: inherit;
                        cursor: pointer;
                        outline: inherit; ">
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>



@endsection

@section('js')

@endsection

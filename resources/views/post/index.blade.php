<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Duyurular') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Laravel 8 Datatable Example</title>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
                    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
                    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
                    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
                    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
                </head>
                <body>

                <div class="container">
                    @if (session('status'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success" role="alert">
                                    <div class="alert-body">
                                        <strong>
                                            {{ session('status') }}
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">

                        <div class="col-md-12 mt-5">
                            <a type="button" class="btn btn-success btn-sm waves-effect waves-float waves-light float-right" href="{{route('post.add')}}">Yeni Ekle</a>
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Başlık</th>
                                    <th>İçerik</th>
                                    <th>Aktif</th>
                                    <th>Eylemler</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{!! $row->title !!} </td>
                                        <td>{!!  $row->content !!}</td>
                                        <td>{{ $row->active }}</td>
                                        <td>
                                            <a href="{{route('post.edit',$row->id)}}" class="btn btn-warning btn-sm waves-effect waves-light  ">Güncelle</a>
                                            <a href="{{route('post.delete',$row->id)}}" class="btn btn-danger btn-sm waves-effect  waves-light ">Sil</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Başlık</th>
                                    <th>İçerik</th>
                                    <th>Aktif</th>
                                    <th>Eylemler</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                </body>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#example').DataTable();
                    } );
                </script>
                </html>
            </div>
        </div>
    </div>
</x-app-layout>

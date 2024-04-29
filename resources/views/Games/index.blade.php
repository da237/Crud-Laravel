@extends('layout')

@section('title')
    -Listado
@endsection
@section('body')
@if ($msj = Session::get('success'))
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="alert alert-success">
                <p><i class="fa-solid fa-check"></i>{{$msj}}</p>
            </div>

        </div>
    </div>

@endif
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Niveles</th>
                            <th>Lanzamiento</th>
                            <th>Imagen</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games as $i => $row)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->levels }}</td>
                                <td>{{ $row->release }}</td>
                                <td>
                                    <img class="img-fluid" width="120" src="/storage/{{ $row->image }}" alt="">
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('games.edit', $row->id) }}">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('games.destroy', $row->id) }}" method="POST"
                                        id="frm_{{ $row->id }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <table>
            </div>
        </div>
    </div>
@endsection

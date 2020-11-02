@extends('adminlte::page')

@section('title','Admin - Categorias')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
<h1>
    Categorías
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-categoria">
        Crear
    </button>
</h1>
@stop

@section('content')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de categorías</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="categorias" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Categoría</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td>{{$categoria->id}}</td>
                                <td>{{$categoria->nombre}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-categoria-{{ $categoria->id }}">Editar</button>
                                    <button class="btn btn-danger">Borrar</button>
                                </td>
                            </tr>
                            <!-- modal - UPDATE CATEGORY -->
                            @include('admin.categorias.modal-update-categoria')
                            <!-- /.modal -->
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Categorias</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- modal -->
<div class="modal fade" id="modal-create-categoria">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            <form action="{{ route('admin.categorias.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Categoria</label>
                        <input type="text" name="nombre" class="form-control" id="categoria">
                    </div>   
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                </div>
            </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@stop
@endsection

@section('js')
<script>
$(document).ready(function() {
    $('#categorias').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
@stop

@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            @if ($errors->any())
                <div class="col-lg-12">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                </div>
            @endif

            @if (isset($info) && $info)
                <div class="col-lg-12">
                    @if (isset($info) && $info)
                        <div class="alert alert-info" role="alert">
                            {{$info}}
                        </div>
                    @endif
                </div>
                @endif
                        <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <p>
                <a href="{{route('admin.article.edit')}}" class="btn btn-default pull-right" role="button">Crear Nuevo Artículo</a>
            </p>
        </div>
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="8%">#</th>
                        <th>Título</th>
                        <th width="20%">Publicado</th>
                        <th width="10%">Visitas</th>
                        <th width="15%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $i => $article)
                    <tr>
                        <td>{{$articles->firstItem() + $i}}</td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->published_at->toFormattedDateString()}}</td>
                        <td>{{$article->viewed}}</td>
                        <td>
                            <a href="{{route('admin.article.edit', ['id' => $article->id])}}" class="btn btn-default btn-sm" role="button">Editar</a>
                            <a href="{{route('admin.article.remove', ['id' => $article->id])}}" class="btn btn-danger btn-sm" role="button">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row text-center">
            {!! $articles->render(); !!}
        </div>
    </div>
@endsection
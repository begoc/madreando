@extends('app')

@section('content')
    <div class="container">
        {!! Form::open(['class' => 'form-horizontal', 'route' => 'admin.article.save']) !!}
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Articulo</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {!! Form::label('title', 'Titulo', ['class' => 'col-sm-2 control-label text-left']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('title', $article->title, ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'Titulo']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12" id="paragraphs-editor">
                                @include('article.paragraph', ['num' => 1, 'content' => null, 'uri' => null])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-10 col-md-2 col-sm-offset-10 col-sm-2">
                                <button id="add-paragraph" type="button" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Párrafo
                                </button>
                                <span id="num-paragraphs" class="hidden">1</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Metadata</div>

                    <div class="panel-body">
                        @include('article.metadata')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @include('buttons.form')
        </div>
        {!! Form::close()  !!}
    </div>
@endsection
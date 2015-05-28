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
        {!! Form::open(['class' => 'form-horizontal', 'route' => 'admin.article.save', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Artículo</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {!! Form::label('title', 'Título', ['class' => 'col-sm-2 control-label text-left']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('title', $article->title, ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'Título']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12" id="paragraphs-editor">
                                @foreach($article->paragraphs->all() as $num => $paragraph)
                                    @include('article.paragraph', ['num' => ($num + 1), 'paragraph' => $paragraph])
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-10 col-md-2 col-sm-offset-10 col-sm-2">
                                <button id="add-paragraph" type="button" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Párrafo
                                </button>
                                <span id="num-paragraphs" class="hidden">{{count($article->paragraphs)}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Metadata</div>

                    <div class="panel-body">
                        @include('article.metadata', ['metadata' => $article->metadata])
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {!! Form::hidden('id', $article->id) !!}
            {!! Form::hidden('section_id', data_get($article, 'section_id', $sectionId)) !!}
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-2 text-right">
                        {!! Form::button('Guardar', [
                        'id' => 'save',
                        'type' => 'submit',
                        'class' => 'btn btn-outline btn-success btn-lg',
                        'data-loading-text' => 'Guradando ...'
                        ]) !!}
                    </div>
                    <div class="col-sm-2">
                        <a href="{{route('admin.article.list', ['sectionId' => $sectionId])}}" class="btn btn-outline btn-default btn-lg" role="button">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close()  !!}
    </div>
@endsection
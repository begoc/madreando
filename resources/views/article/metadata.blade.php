<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label class="col-sm-2 control-label text-left">ID</label>
            <div class="col-sm-10">
                <span>1</span>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('metadata.uri', 'uri', ['class' => 'col-sm-2 control-label text-left']) !!}
            <div class="col-sm-10">
                <button id="editUrlButton" class="btn btn-default collapsed" type="button" data-toggle="collapse" data-target="#editUrlPanel" aria-expanded="false" aria-controls="editUrlPanel">
                    Generar automáticamente
                </button>
            </div>
            <div class="col-sm-12">
                <div class="collapse" id="editUrlPanel">
                    <div class="well">
                        {!! Form::text('metadata[uri]', null, ['id' => 'metadata.uri', 'class' => 'form-control', 'placeholder' => 'uri']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('metadata.title', 'Titulo', ['class' => 'col-sm-2 control-label text-left']) !!}
            <div class="col-sm-10">
                {!! Form::text('metadata[title]', null, ['id' => 'metadata.title', 'class' => 'form-control', 'placeholder' => 'Titulo']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('metadata.description', 'Descripción', ['class' => 'col-sm-2 control-label text-left']) !!}
            <div class="col-lg-12">
                {!! Form::textarea('metadata[description]', null, [
                'id' => 'metadata.description',
                'class' => 'form-control',
                'placeholder' => 'Descripción del árticulo',
                'cols' => 10,
                'rows' => 5
                ]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('metadata.keywords', 'Palabras claves', ['class' => 'col-sm-2 control-label text-left']) !!}
            <div class="col-sm-10">
                {!! Form::text('metadata[keywords]', null, ['id' => 'metadata.keywords', 'class' => 'form-control', 'placeholder' => 'Palabras claves']) !!}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-uppercase col-sm-2"><small>Párrafo 1</small></h3>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {!! Form::label('paragraph.headline_1', 'Encabezado', ['class' => 'col-sm-2 control-label text-left']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('paragraphs[' . $num . '][headline]', null, ['id' => 'paragraph.headline_1', 'class' => 'form-control', 'placeholder' => 'Encabezdo párrafo '. $num]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        {!! Form::textarea('paragraphs[' . $num . '][content]', null, ['id' => 'paragraph_title_1', 'class' => 'form-control', 'placeholder' => 'Contenido párrafo ' . $num, 'cols' => 10]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <img class="img-rounded">
                    </div>
                    <div class="col-sm-6">
                        {!! Form::file('paragraphs[' . $num . '][image][uri]', ['id' => 'paragraph_image_uri_1', 'class' => 'col-sm-12', 'placeholder' => 'Image párrafo ' . $num]) !!}
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default">
                                <input type="radio" name="paragraphs[{{$num}}][image][position]" value='left' id="paragraph_image_position_1_1" autocomplete="off"> Izquierda
                            </label>
                            <label class="btn btn-default active">
                                <input type="radio" name="paragraphs[{{$num}}][image][position]" value='center' id="paragraph_image_position_1_2" autocomplete="off" checked> Centrado
                            </label>
                            <label class="btn btn-default">
                                <input type="radio" name="paragraphs[{{$num}}][image][position]" value='right' id="paragraph_image_position_1_3" autocomplete="off"> Derecha
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" id="paragraph_{{$num}}">
    <div class="col-lg-12">
        <div class="row paragraph-top">
            <div class="col-sm-12">
                <h3 class="text-uppercase col-sm-2"><small>Párrafo {{$num}}</small></h3>
                <button type="button" class="close hidden" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <div class="row paragraph-content">
            <div class="col-sm-12">
                <div class="form-group">
                    {!! Form::label('paragraph.headline_' . $num, 'Encabezado', ['class' => 'col-sm-2 control-label text-left']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('paragraphs[' . $num . '][headline]', $paragraph->headline, ['id' => 'paragraph.headline_' . $num, 'class' => 'form-control', 'placeholder' => 'Encabezdo párrafo '. $num]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        {!! Form::textarea('paragraphs[' . $num . '][content]', $paragraph->content, ['id' => 'paragraph_title_' .$num, 'class' => 'form-control', 'placeholder' => 'Contenido párrafo ' . $num, 'cols' => 10]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <img class="img-rounded">
                    </div>
                    <div class="col-sm-6">
                        {!! Form::file('paragraphs[' . $num . '][image][file]', ['id' => 'paragraph_image_uri_' . $num, 'class' => 'col-sm-12', 'placeholder' => 'Image párrafo ' . $num]) !!}
                        @if ($paragraph->image)
                            {!! Form::hidden('paragraphs[' . $num . '][image][uri]', $paragraph->image->uri) !!}
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default @if ($paragraph->image && $paragraph->image->position == 'left')active @endif">
                                <input type="radio" name="paragraphs[{{$num}}][image][position]" value='left' id="paragraph_image_position_{{$num}}_1"@if ($paragraph->image && $paragraph->image->position == 'left') checked @endif autocomplete="off"> Izquierda
                            </label>
                            <label class="btn btn-default @if ($paragraph->image && $paragraph->image->position == 'center')active @endif">
                                <input type="radio" name="paragraphs[{{$num}}][image][position]" value='center' id="paragraph_image_position_{{$num}}_2"@if ($paragraph->image && $paragraph->image->position == 'center') checked @endif autocomplete="off"> Centrado
                            </label>
                            <label class="btn btn-default @if ($paragraph->image && $paragraph->image->position == 'right')active @endif">
                                <input type="radio" name="paragraphs[{{$num}}][image][position]" value='right' id="paragraph_image_position_{{$num}}_3"@if ($paragraph->image && $paragraph->image->position == 'right') checked @endif autocomplete="off"> Derecha
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::hidden('paragraphs[' . $num . '][id]', $paragraph->id) !!}
</div>
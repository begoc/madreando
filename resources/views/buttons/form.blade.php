<div class="col-sm-12">
    <div class="form-group">
        <div class="col-sm-offset-8 col-sm-2 text-right">
            {!! Form::button('Guardar', [
            'id' => 'save',
            'type' => 'submit',
            'class' => 'btn btn-outline btn-success',
            'data-loading-text' => 'Guradando ...'
            ]) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::button('Cancelar', ['class' => 'btn btn-outline btn-default']) !!}
        </div>
    </div>
</div>
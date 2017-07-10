@extends(layoutTenant())

@section('content')
    <div class="container">
        <h3>Nova categoria</h3>

        {!! Form::open(['url'=>routeTenant('categories.store'), 'class'=>'form']) !!}

        @include('categories._form')

        <div class="form-group">
            {!! Form::submit('Criar categoria', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection
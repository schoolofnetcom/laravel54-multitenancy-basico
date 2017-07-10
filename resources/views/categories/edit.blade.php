@extends(layoutTenant())

@section('content')
    <div class="container">

        {!! Form::model($category, ['url'=>routeTenant('categories.update', [$category->id]),'method' => 'PUT']) !!}

        @include('categories._form')

        <div class="form-group">
            {!! Form::submit('Editar categoria', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection
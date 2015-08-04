@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Редактировать сайт</div>
                    @if($errors->any())
                        <ul class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="panel-body">
                        {!! Form::model($site, [
                            'route' => ['update', $site->id]
                        ]) !!}

                        <div class="form-group">
                            {!! Form::label('url', 'Url:', ['class' => 'control-label']) !!}
                            {!! Form::text('url', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                        {!! Form::submit('Сохранить изменения', ['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

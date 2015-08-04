@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Список сайтов</div>

                    <div class="panel-body">
                        @foreach($sites as $site)
                            <p><a href="{{$site->url}}">{{$site->url}}</a></p>
                            <p>
                                <a href="{{ route('edit', $site->id) }}" class="btn btn-info">Редактировать сайт</a>
                                <a href="{{ route('destroy', $site->id) }}" class="btn btn-danger">Удалить сайт</a>
                            </p>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

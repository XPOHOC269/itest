@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Мониторинг сайтов</div>

                    <div class="panel-body">
                        <p>
                            <a href="{{ route('check') }}" class="btn btn-info">Проверить сайты</a>
                            <a href="{{ route('clear')}}" class="btn btn-danger">Очистить таблицу</a>
                        </p>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>URL</th>
                                <th>Статус</th>
                                <th>Дата проверки</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($monitoring as $row)
                                <tr>
                                    <td><?= $strok++; ?></td>
                                    <td>{{$row->url}}</td>
                                    @if($row->status)
                                        <td>Доступен</td>
                                    @else
                                        <td>Не доступен</td>
                                    @endif
                                    <td>{{$row->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

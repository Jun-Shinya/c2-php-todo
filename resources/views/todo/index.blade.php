@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-10">
            <h2 class="text-muted py-3 float-left">やること一覧</h2>
            <div class="float-right my-3">
                <a href="/todo/create/" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>新規作成</a>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>タイトル</th>
                    <th>期限</th>
                    <th>ステータス</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($todo_list as $todo)
                    <tr>
                        <td>
                            <a href="/todo/{{ $todo->id }}">
                                {{ $todo->title }}
                            </a>
                        </td>
                        <td>{{ $todo->getDisplayDate() }}</td>
                        <td>{{$todo->getStatusText()}}</td>
                        <td><a href="/todo/{{ $todo->id }}/edit" class="btn btn-success">編集</a></td>
                        <td>
                            <form action="/todo/{{ $todo->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $todo_list->links() }}
        </div>
    </div>
@endsection
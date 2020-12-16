@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-10">
        <h2 class="text-muted py-3">{{ $todo->title }}</h2>
        <table class="table">
            <thead>
            <tr>
                <th>タイトル</th>
                <th>ステータス</th>
                <th>期限</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td  style="width: 300px">{{ $todo->title }}</td>
                <td>{{$todo->getStatusText()}}</td>
                <td>{{ $todo->due_date }}</td>
                <td><a href="/todo/{{ $todo->id }}/edit" class="btn btn-success">編集</a></td>
                <td>
                    <form action="/todo/{{ $todo->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">削除</button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
        @include('parts.button.back')
    </div>
@endsection 
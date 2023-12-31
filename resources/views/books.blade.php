@extends('layouts.app')
@section('content')
    @if (session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
    @endif
    <div class="card-body">
        <h3 class="card-title ml-3">
            本の登録
        </h3>
        <p class="ml-3 mb-3">読み終わった本を登録して積み上げよう！</p>

        @include('common.errors')

        <form action="{{ url('books') }}" method="POST" class="form-horizontal">
            @csrf
                <div class="form-group col-md-9">
                  <label for="book" class="col-sm-3 control-label">タイトル</label>
                  <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group col-md-9">
                  <label for="amount" class="col-sm-3 control-label">メモ</label>
                  <input type="text" name="note" class="form-control">
                </div>
                <div class="form-group col-md-9">
                  <label for="finished_date" class="col-sm-3 control-label">読了日</label>
                  <input type="date" name="finished_date" class="form-control">
                </div>

                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                    保存
                    </button>
                </div>
        </form>
    </div>

    @if (count($books) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>タイトル</th>
                        <th>メモ</th>
                        <th>読了日</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $book->title }}</div>
                                </td>

                                <td class="table-text">
                                    <div>{{ $book->note }}</div>
                                </td>

                                <td class="table-text">
                                    <div>{{ $book->finished_date }}</div>
                                </td>

                                <td>
                                    <form action="{{ url('booksedit/'.$book->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">
                                            更新
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <form action="{{ url('book/'.$book->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">
                                            削除
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    <div class="mt-4 ml-3">
      <form action="{{ url('/') }}" method="GET">
          <div class="form-group col-md-9">
              <label for="search" class="col-sm-3 control-label font-weight-bold">登録した本の検索</label>
              <input type="text" name="search" class="form-control" placeholder="タイトルを入力してください...">
              <button type="submit" class="btn btn-primary mt-2">
                  検索
              </button>
          </div>
      </form>
    </div>

@endsection
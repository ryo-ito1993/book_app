
@extends('layouts.app')
@section('content')
<div class="row container">
  <div class="col-md-12">
    @include('common.errors')
    <form action="{{ url('books/update') }}" method="POST">
      <div class="form-group">
        <label for="title">タイトル</label>
        <input type="text" name="title" class="form-control" value="{{$book->title}}">
      </div>

      <div class="form-group">
        <label for="note">メモ</label>
        <input type="text" name="note" class="form-control" value="{{$book->note}}">
      </div>

      <div class="form-group">
        <label for="finished_date">読了日</label>
        <input type="datetime" name="finished_date" class="form-control" value="{{$book->finished_date}}"/>
      </div>

      <div class="well well-sm">
          <button type="submit" class="btn btn-primary">Save</button>
          <a class="btn btn-link pull-right" href="{{ url('/') }}">
              Back
          </a>
      </div>
      <input type="hidden" name="id" value="{{$book->id}}">
      @csrf
    </form>
  </div>
</div>
@endsection

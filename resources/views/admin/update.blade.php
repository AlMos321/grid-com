@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Admin Panel</div>
                    <div class="panel-body">
                        Обновить товар
                        <form method="post" action="/post/catalog/update">
                            {{ csrf_field() }}
                            <input name="id" value="{{$catalog->id}}" type="hidden">

                            <div class="form-group">
                                <label>Название</label>
                                <input type="text" class="form-control" value="{{$catalog->name}}" name="name">
                            </div>

                            <div class="form-group">
                                <label>Описание</label>
                                <textarea class="form-control" value="{{$catalog->description}}" name="description"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Цена</label>
                                <input type="text" class="form-control" value="{{$catalog->price}}" name="price">
                            </div>

                            <div class="form-group">
                                <label>Ссылка на картинку</label>
                                <input type="text" class="form-control" value="{{$catalog->images}}" name="images">
                            </div>

                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

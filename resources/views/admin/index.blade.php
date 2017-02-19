@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Admin Panel</div>

                    <div class="panel-body">
                        Каталог товаров
                        <br>
                        <a class="btn btn-primary" href="/admin/create/catalog">Создать новый товар</a>
                        <hr>
                        @foreach($catalogs as $c)
                            <p>{{$c->name}} <span><a href="/remove/catalog?id={{$c->id}}">dell</a></span> <span><a href="/update/catalog?id={{$c->id}}">update</a></span></p>
                         @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

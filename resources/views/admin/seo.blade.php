@extends('layouts.app')

@section('css')
    <link href="/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container" style="width: 100%">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Admin Panel</div>

                    <div class="panel-body">
                        Cео по страницам
                        <br>
                        <a class="btn btn-primary" href="/add/seo/new">Добавить</a>
                        <table id="seo" class="display" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>name</th>
                                <th>slug</th>
                                <th>description</th>
                                <th>keywords</th>
                                <th>title</th>
                                <th>remove</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>name</th>
                                <th>slug</th>
                                <th>description</th>
                                <th>keywords</th>
                                <th>title</th>
                                <th>remove</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($seos as $o)
                                <tr class="tr-order-{{$o->id}}">
                                    <td><input value="{{$o->name}}" style="width: 200px;" onchange="changeSeo('{{$o->id}}', this, 'name')"></td>
                                    <td><input value="{{$o->slug}}" style="width: 200px;" onchange="changeSeo('{{$o->id}}', this, 'slug')"></td>
                                    <td><input value="{{$o->description}}" style="width: 200px;" onchange="changeSeo('{{$o->id}}', this, 'description')"></td>
                                    <td><input value="{{$o->keywords}}" style="width: 200px;" onchange="changeSeo('{{$o->id}}', this, 'keywords')"></td>
                                    <td><input value="{{$o->title}}" style="width: 200px;" onchange="changeSeo('{{$o->id}}', this, 'title')"></td>
                                    <td><span style="cursor: pointer;" class="glyphicon glyphicon-remove-circle" onclick="removeSeo('{{$o->id}}')"></span></td>
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

@section('js')
    <script src="/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#seo').DataTable();
        } );

        /**
         * change order value
         * @param id
         * @param element
         * @param column
         */
        function changeSeo(id, element, column) {
            var value = $(element).val();
            $.ajax({
                url: '{{url('/update/seo')}}',
                type: "post",
                data: {_token: window.Laravel.csrfToken , column: column, value: value, id: id},
            });
        }

        function removeSeo(id) {
            $.ajax({
                url: '{{url('/remove/seo')}}',
                type: "post",
                data: {_token: window.Laravel.csrfToken , id: id},
                success: function (data, textStatus) {
                    $('.tr-order-'+id).remove();
                }
            });
        }
    </script>

@endsection

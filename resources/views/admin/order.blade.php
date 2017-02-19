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
                        Заказы

                        <table id="orders" class="display" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>status</th>
                                <th>description</th>
                                <th>Создан</th>
                                <th>Обновлен</th>
                                <th>Удалить</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Имя заказчика</th>
                                <th>email</th>
                                <th>Телефон</th>
                                <th>Статус заказа</th>
                                <th>Описание</th>
                                <th>Создан</th>
                                <th>Обновлен</th>
                                <th>Удалить</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($orders as $o)
                                <tr class="tr-order-{{$o->id}}">
                                    <td>{{$o->name}}</td>
                                    <td>{{$o->email}}</td>
                                    <td>{{$o->phone}}</td>
                                    <td>
                                        <select onchange="changeOrder('{{$o->id}}', this, 'status')">
                                                <option value="new" @if($o->status == "new") selected @endif>Новый</option>
                                                <option value="old" @if($o->status == "old") selected @endif>Обработан</option>
                                                <option value="close" @if($o->status == "close") selected @endif>Закрыт</option>
                                        </select>
                                    <td><input value="{{$o->description}}" style="width: 200px;" onchange="changeOrder('{{$o->id}}', this, 'description')"></td>
                                    <td>{{$o->created_at}}</td>
                                    <td>{{$o->updated_at}}</td>
                                    <td><span style="cursor: pointer;" class="glyphicon glyphicon-remove-circle" onclick="removeOrder('{{$o->id}}')"></span></td>
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
            $('#orders').DataTable();
        } );

        /**
         * change order value
         * @param id
         * @param element
         * @param column
         */
        function changeOrder(id, element, column) {
            var value = $(element).val();
            $.ajax({
                url: '{{url('/update/order')}}',
                type: "post",
                data: {_token: window.Laravel.csrfToken , column: column, value: value, id: id},
            });
        }

        function removeOrder(id) {
            $.ajax({
                url: '{{url('/remove/order')}}',
                type: "post",
                data: {_token: window.Laravel.csrfToken , id: id},
                success: function (data, textStatus) {
                    $('.tr-order-'+id).remove();
                }
            });
        }
    </script>

@endsection

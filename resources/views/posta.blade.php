<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<?php
    $location = \App\ApiLocation::all();
    $catalogs = \App\Catalog::all();
?>

<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form method="post" action="{{url('/create/posta/order')}}">
                {{ csrf_field() }}
                <h3>{{trans('messages.sender')}}</h3>

                <div class="form-group">
                    <label for="name_poster">{{trans('messages.name_poster')}}</label>
                    <input class="form-control"  name="name_poster">
                </div>
                <div class="form-group">
                    <label for="phone_poster">{{trans('messages.phone_poster')}}</label>
                    <input class="form-control"  name="phone_poster">
                </div>

                <hr>
                <h3>{{trans('messages.recipient')}}</h3> <button class="btn btn-sm" onclick="someRecipient(); return false;">Как и зказчик</button>

                <div class="form-group">
                    <label for="name_poster">{{trans('messages.name_recipient')}}</label>
                    <input class="form-control"  name="name_recipient">
                </div>
                <div class="form-group">
                    <label for="phone_recipient">{{trans('messages.phone_recipient')}}</label>
                    <input class="form-control"  name="phone_recipient">
                </div>

                <hr>

                <div class="form-group">
                    <label for="city_poster">{{trans('messages.city_poster')}}</label>
                    <select id="city_poster" class="form-control" name="city_poster">
                        @foreach($location as $loc)
                            <option>{{$loc->description_ru}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="city-recipient">{{trans('messages.city-recipient')}}</label>
                    <select id="city-recipient" class="form-control" name="city_recipient">
                        @foreach($location as $loc)
                            <option>{{$loc->description_ru}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">{{trans('messages.type-of-services')}}</label>
                    <select id="city-recipient" class="form-control" name="type_of_services">
                        <option>Отделение-Отделение</option>
                        <option>Адрес-Адрес</option>
                        <option>Адрес-Отделение</option>
                        <option>Отделение-Адрес</option>
                    </select>
                </div>

                <button class="btn btn-primary" onclick="addVariant(); return false;">Добавить</button>

                <div class="container variant-first">
                    <div class="row">

                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="">{{trans('messages.product-type')}}</label>
                                <select id="product-type" class="form-control" name="product_type[]">
                                    @foreach($catalogs as $cat)
                                        <option>{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">{{trans('messages.product-count')}}</label>
                                <input id="product-count" class="form-control" name="product_count[]">
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-default">{{trans('messages.submit')}}</button>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
    /**
     * add variant to form
     */
    function addVariant(){
        $(".variant-first").after('' +
                '<div class="container">' +
                '<div class="row">'+
                '<div class="col-xs-6">'+
                '<div class="form-group">'+
                '<label for="">{{trans('messages.product-type')}}</label>'+
                '<select id="product-type" class="form-control" name="product_type[]">'+
                @foreach($catalogs as $cat)
                    '<option>{{$cat->name}}</option>'+
                @endforeach
                '</select>'+
                '</div>'+
                '</div>'+
                '<div class="col-xs-4">'+
                '<div class="form-group">'+
                '<label for="">{{trans('messages.product-count')}}</label>'+
                '<input id="product-count" class="form-control" name="product_count[]">'+
                '</div>'+
                '</div>'+
                '<div class="col-xs-2" style="padding-top: 28px;">'+
                '<button class="glyphicon glyphicon-remove" onclick="removeVariant(this); return false;"></button>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '');
    }

    /**
     * remove variant from form
     * @param element
     */
    function removeVariant(element) {
        $(element).parents( ".container" ).remove();
    }

    /**
     * set recipient value
     */
    function someRecipient(){
        $('input[name=name_recipient]').val($('input[name=name_poster]').val());
        $('input[name=phone_recipient]').val($('input[name=phone_poster]').val());
    }
</script>

</body>
</html>
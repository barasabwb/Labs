<!DOCTYPE html>
<html>

<head>
    <title>All Cars</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>
<body>
@include('messages')

<table class="table table-striped">
    <tr>
        <th>Car Id</th>
        <th>Make</th>
        <th>Model</th>
    </tr>
    @foreach($cars as $car)
        <tr>
            <td><a href="/car/{{$car->id}}">{{$car->id}}</a></td>
            <td><a href="/car/{{$car->id}}">{{$car->make}}</a></td>
            <td><a href="/car/{{$car->id}}">{{$car->model}}</a></td>
        </tr>

    @endforeach
</table>
<a href="/newcar">NEW CAR</a>


</body>
</html>

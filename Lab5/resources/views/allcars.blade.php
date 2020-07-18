<!DOCTYPE html>
<html>

<head>
    <title>All Cars</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>
<body>
<table class="table table-striped">
    <tr>
        <th>Car Id</th>
        <th>Make</th>
        <th>Model</th>
    </tr>
    @foreach($cars as $car)
        <tr>
            <td>{{$car->id}}</td>
            <td>{{$car->make}}</td>
            <td>{{$car->model}}</td>
        </tr>

    @endforeach
</table>


</body>
</html>

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

        <tr>
            <td>{{$cars->id}}</td>
            <td>{{$cars->make}}</td>
            <td>{{$cars->model}}</td>
        </tr>


</table>
<a href="/newcar">NEW CAR</a>
<br>
<br>
<div class="comments well">
    <h5>Reviews</h5>
    @if (count($cars->reviews)==0)
        <h5>No Reviews</h5>
    @endif
    @foreach($cars->reviews as $comment)
        <div class="card">
            <article>

                <li class="list-group-item">


                    <strong>
{{--                        {{$comment->fname}}  {{$comment->lname}}: &nbsp;--}}

                    </strong>
                    {{$comment->body}} &nbsp;
                    (
                    {{$comment->created_at->diffForHumans() }})



                </li>


            </article>


        </div>
    @endforeach
</div>

<div class="card-block">
    <form action="/blogs/{{$cars->id}}/reviews" method="POST">
        {{csrf_field()}}

        <div class="form-group">
            <textarea name="body" class="form-control" placeholder="Your Review here"></textarea>
        </div>
        <div class="form-group">
            {{{ Form::submit('Post Review', ['class' => 'btn btn-info']) }}}

        </div>

    </form>
</div>


</body>
</html>

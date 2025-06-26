<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="profile" method="post" enctype="multipart/form-data">
        @csrf

        @if( $errors->any() )
            <div>
                <ul>
                    @foreach( $errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <hr>

        <input type="file" name="photo">

        <button type="submit">Enviar Arhivo</button>
    </form>
</body>
</html>
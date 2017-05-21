<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>test</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

    <form method = POST action="/postm">
         {{csrf_field()}}

        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">price</label>
            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Price">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>
</html>

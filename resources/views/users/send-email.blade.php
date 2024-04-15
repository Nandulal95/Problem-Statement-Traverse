<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <p class="py-4">
        2. Write code to find your public IP address, map to city/state. Display IP address, city,
        state on a web page and then store it in a cookie.
    </p>
    <form action="{{ url('/send-email') }}" method="POST">
        @csrf
        @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">Recipient Email</label>
            <input type="email" name="recipient_email" class="form-control" id="recipient_email" aria-describedby="emailHelp">
            @error('recipient_email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">Recipient Message</label>
            <textarea name="recipient_message" class="form-control"></textarea>
            @error('recipient_message')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>

</div>
</body>
</html>

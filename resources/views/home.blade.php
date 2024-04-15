<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <p class="py-4">
        1.Create form with two fields and post it and save these values in DB with their script
        execution time (time to execute the code i.e., after posting data) for ex. TableName –
        Demo Fields – FirstName, LastName, ExecutionTime. <a href="{{ url('/users/create') }}">Click Here </a>
    </p>
    <p class="py-4">
        2. Write code to find your public IP address, map to city/state. Display IP address, city,
        state on a web page and then store it in a cookie. <a href="{{ url('/users/show') }}">Click Here </a>
    </p>
    <p class="py-4">
        3. https://opencontext.org/query/Asia/Turkey/Kenan+Tepe.json
        a. Traverse all the records in this to find all “id”.
        b. Store in excel file.
        c. Bonus if records are de-duplicated. <a href="{{ url('/opencontext/read') }}">Click Here </a>
    </p>
    <p class="py-4">
        4. Write code to accept recipient email id and message from a screen and send email using
        SMTP. <a href="{{ url('/send/email') }}">Click Here </a>
    </p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

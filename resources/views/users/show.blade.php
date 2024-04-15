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

    <div>
        <span>My public ip adress :</span> <span id="my_ip"></span><br>
        <span>My City :</span> <span id="my_city"></span> <br>
        <span>My State :</span> <span id="my_state"></span> <br>
        <span>My Country :</span> <span id="my_country"></span> <br>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    fetch('https://api.ipify.org?format=json')
        .then(response => response.json())
        .then(ipifyResponse => {
            console.log(ipifyResponse);
            // store data in cookie
            $("#my_ip").text(ipifyResponse.ip);
            // fetch address infortmation
            fetch(`http://www.geoplugin.net/json.gp?ip=${ipifyResponse.ip}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    $("#my_city").text(data.geoplugin_city);
                    $("#my_state").text(data.geoplugin_regionName);
                    $("#my_country").text(data.geoplugin_countryName);
                    // store data in cookie
                    document.cookie = `user_ip=${ipifyResponse.ip};`;
                    document.cookie = `user_city=${data.geoplugin_city};`;
                    document.cookie = `user_state=${data.geoplugin_regionName};`;
                    document.cookie = `user_country=${data.geoplugin_countryName};`;

                })
                .catch(error => {
                    console.log('Error:', error);
                });
        })
        .catch(error => {
            console.log('Error:', error);
        });

</script>
</body>
</html>

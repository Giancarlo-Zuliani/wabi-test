<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <div style="text-align:center;width:80%; margin:25px auto">
    <h2>{{$form['mailObject']}}</h2>
    <ul style="list-style: none">
        <li>Nome : {{$form['name']}}</li>
        <li>Nome azienda : {{$form['company-name']}}</li>
        <li>Mail : {{$form['mail']}}</li>
        <li>conosciuti da : {{$form['contact']}}</li>
    </ul>
    <div>
        <p>
            {{$form['message']}}
        </p>
    </div>
  </div>
</body>
</html>
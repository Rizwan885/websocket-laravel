<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
    
    <h1>Trade: <span id="trade-data"></span></h1>
    

    <script>
    Echo.channel('channel-trade').listen('NewTrade',(data)=>{
        document.getElementById('trade-data').innerHTML=data.message;
    });
    </script>
</body>
</html>
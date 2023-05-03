<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="{{asset('js/app.js')}}"></script>


</head>
<body>
    
<div id="start-chat">
    <form id="save-name">
        <input type="text" name="name" id="name" placeholder="Enter Your Name">

        <input type="submit" value="Let's Chat" />
    </form>
</div>

<div id="chat-part">
    <form id="chat-form">
        @csrf
      <input type="hidden" name="username" id="username">
      <input type="text" name="message" id="message" placeholder="Enter Message">
      <input type="submit" value="Send">
    </form>

<!-- Contains chats of all users ---  !-->
<div id="chat-container">
    
</div>
<!-- Contains chats of all users ---  !-->
</div>

<script>
    $('#chat-part').hide();
    $('#save-name').submit(function(event){
        event.preventDefault();
        $('#username').val($('#name').val());
        $('#start-chat').hide();
        $('#chat-part').show();
    });


    $('#chat-form').submit(function(event){
        event.preventDefault();
        var formdata=$(this).serialize();

        $.ajax({
            url:'{{route('broadcastMessage')}}',
            type: 'POST',
            data:formdata,

        });

        $('#message').val('');

    
    });
    
    Echo.channel('message').listen('MessageEvent',(e)=>{
            let html='<br/><b>'+e.username+':- </b><span>'+e.message+'</span>';

            $('#chat-container').append(html);
        });

</script>
</body>
</html>
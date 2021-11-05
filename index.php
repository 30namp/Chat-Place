<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/login_data.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat | Chat place</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="title">
            <p><?php echo ($_SESSION['username'] == $username1 ? $username2 : $username1); ?></p>
        </div>
        <div class="chat-place">
            
        </div>
        <div class="send-place">
            <input type='text' class="message-box" placeholder="type here..." id='send-box'>
            <button class="send-box" id='send-btn'>
                <i class="bi bi-send-fill"></i>
            </button>
        </div>
    </div>
    <a class="logout" href="/logout.php"><i class="bi bi-box-arrow-right"></i></a>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</body>
</html>


<script>

let can_scroll = 0;

$('.chat-place').mouseenter(() => {
    can_scroll = 1;
});

$('.chat-place').mouseleave(() => {
    can_scroll = 0;
});

$('#send-btn').click(() => {
    start_sending();
});

$(document).keypress(function(e){
    if(e.which == 13){//Enter key pressed
        start_sending();
    }
});

function start_sending(){

    $.post('send.php', {
        text: $('#send-box').val()
    });

    $('#send-box').val('');
}

setInterval(() => {
    $.post('show_messages.php', {}, (e) => {
        $('.chat-place').html(e);
    });
    if(!can_scroll){
        document.querySelector('.chat-place').scrollTop = document.querySelector('.chat-place').scrollHeight;
    }
}, 30);

</script>
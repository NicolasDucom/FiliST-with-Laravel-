$(function () {
    "use strict";

    var content = $('#tchat_container');
    var input = $('#input');
    var status = $('#status');

    window.WebSocket = window.WebSocket || window.MozWebSocket;

    // if browser doesn't support WebSocket, just show some notification and exit
    if (!window.WebSocket) {
        content.html($('<p>', { text: 'Sorry, but your browser doesn\'t support WebSockets.'} ));
        input.hide();
        $('span').hide();
        return;
    }

    var connection = new WebSocket('ws://azure.trenoncourt.fr:1330');

    connection.onopen = function () {
        connection.send(pseudo);
        status.text(pseudo + ' : ');
        input.removeAttr('disabled').focus();
    };

    connection.onerror = function (error) {
        content.html($('<p>', { text: "Nous n'arrivons pas à contacter le serveur pour le moment. Veuillez réessayer."} ));
    };

    connection.onmessage = function (message) {
        try {
            var json = JSON.parse(message.data);
        } catch (e) {
            console.log('This doesn\'t look like a valid JSON: ', message.data);
            return;
        }

        if (json.type === 'history') {
            for (var i=0; i < json.data.length; i++) {
                addMessage(json.data[i].author, json.data[i].text, new Date(json.data[i].time));
            }
        } else if (json.type === 'message') {
            input.removeAttr('disabled');
            addMessage(json.data.author, json.data.text, new Date(json.data.time));
        } else {
            console.log('Hmm..., I\'ve never seen JSON like this: ', json);
        }
    };

    input.keydown(function(e) {
        if (e.keyCode === 13) {
            var msg = $(this).val();
            if (!msg) {
                return;
            }
            console.log(msg);
            connection.send(msg);
            $(this).val('');

            if (pseudo === false) {
                pseudo = msg;
            }
        }
    });

    setInterval(function() {
        if (connection.readyState !== 1) {
            status.text('Error');
            input.attr('disabled', 'disabled').val('Impossible de communiquer avec le serveur.');
        }
    }, 3000);

    function addMessage(author, message, dt) {
        content.append('<p class="tchat_line"><span class="tchat_datetime">' +
             + (dt.getHours() < 10 ? '0' + dt.getHours() : dt.getHours()) + ':'
             + (dt.getMinutes() < 10 ? '0' + dt.getMinutes() : dt.getMinutes())
             + '</span> <span class="tchat_author">'+ author+'</span> : ' + message + '</p>');
        content.scrollTop(content[0].scrollHeight);
    }
});
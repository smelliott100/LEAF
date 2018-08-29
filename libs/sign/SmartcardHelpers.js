var Signer = function() {

    var stompClient = null;
    var isConnected = false;

    function connect(_callback) {
        var url = "https://localhost:8080/websocket";
        var socket = new SockJS(url);
        stompClient = Stomp.over(socket);
        stompClient.connect({}, function (frame) {
            isConnected = true;
            console.log('Connected: ' + frame);
            stompClient.subscribe('/wsbroker/controller', function (response) {
                showMessage(JSON.parse(response.body).content);
            });
            _callback();
        });
        socket.onclose = function() {
            console.log("Trying to reconnect");
            setTimeout(connect, 1000);
        };

    }

    function disconnect() {
        isConnected = false;
        stompClient.send("/app/close", {}, "");
    }

    function sendData(dataToSign) {
        stompClient.send("/app/sign", {}, JSON.stringify({'content': dataToSign}));
    }

    function showMessage(message) {
        alert(message);
    }

    var sign = function (dataToSign) {
        // if (!isConnected) {
        //     window.open("sign.jnlp");
        // }
        connect(function() {
            sendData(dataToSign);
            return dataToSign;
        });
    };

    var connection = function () {
        connect();
    };

    var disconnection = function () {
        disconnect();
    };

    return {
        sign: sign,
        connection: connection,
        disconnection: disconnection
    };

} ();
require('./bootstrap');

Echo.connector.socket.on('connect', function(e){
    console.log("Connected");
})

Echo.connector.socket.on('disconnect', function(e){
    console.log("Disconnected");
})



Echo.channel(`tweets`)
    .listen('NewTweetReceived', (e) => {
        console.log(e);
    });

require('./bootstrap');

Echo.channel('guides-channel')
    .listen('GuideCreated', (data) => {
        console.log(data)
    })

console.log('App.js');

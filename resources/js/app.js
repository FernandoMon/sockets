require('./bootstrap');

window.Echo.channel('guides-channel')
    .listen('.GuideCreated', (data) => {
        let guide_count = document.querySelector("#guides_count");
        guide_count.innerHTML = data.guides;
    })



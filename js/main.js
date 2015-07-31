$(function() {
    $('.flexslider_slider').flexslider({
      animation: "fade",
      directionNav: false,
      controlNav: false,
      animationSpeed: 350,
      slideshowSpeed: 8000,
      randomize:  true
    });

    $('.flexslider_feature_games').flexslider({
      animation: "slide",
      animationLoop: false,
      itemWidth: 300,
      itemMargin: 10
    });
});


var config5 = {
  "id": '619541223322206210',
  "domId": 'twitter_box',

  "enableLinks": true,
  "showUser": true,
  "showTime": true,
  "dateFunction": '',
  "showRetweet": false,
  "customCallback": handleTweets,
  "showInteraction": true
};

function handleTweets(tweets){
    var x = tweets.length;
    var n = 0;
    var element = document.getElementById('twitter_box');
    var html = '<ul>';
    while(n < x) {
      html += '<li>' + tweets[n].replace('hours', 'hr').replace('Posted ', '').replace('on ', '').replace(' ago', '') + '</li>';
      console.log(tweets[n]);
      n++;
    }
    html += '</ul>';


    element.innerHTML = html;
}

window.onload = function() {
    // all of your code goes in here
    // it runs after the DOM is built
}
twitterFetcher.fetch(config5);

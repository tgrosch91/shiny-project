//starts functions when document is loaded
$(document).ready(function(){

  const key = 'AIzaSyCIyOwCmKoZ5bbiCvOdC3gCFMGvrtvHsCA',
        type = 'video',
        part = 'snippet',
        maxResults = '10';

  var pageToken = '';

  $('.submit-youtube').on('click', function() {
    $('.results-youtube').empty();
    $('.more-youtube').html("More Videos?").removeClass('hidden');

    pageToken = '';
    var query = $('.input-youtube').val();
    var url = 'https://www.googleapis.com/youtube/v3/search?part='+part+'&type='+type+'&key='+key+'&q='+query+'&maxResults='+maxResults+'&pageToken='+pageToken;

    $.getJSON(url, function(data){

      pageToken = data.nextPageToken;

      data.items.forEach(function(item){
        var videoId = item.id.videoId,
            title = item.snippet.title,
            description = item.snippet.description,
            imageUrl = item.snippet.thumbnails.high.url,
            link = 'https://www.youtube.com/watch?v='+videoId;

        $('.results-youtube').append("<a class='item-youtube' style='background-image:linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(" + imageUrl + ");' href='"
                + link + "'><div class='details-youtube'><div class='title-youtube'>"
                + title + "</div><div class='description-youtube'>"
                + description + "</div></div></a>");

      });
    });
  });
  $('.more-youtube').on('click', function(){
    var query = $('.input-youtube').val();
    var url = 'https://www.googleapis.com/youtube/v3/search?part='+part+'&type='+type+'&key='+key+'&q='+query+'&maxResults='+maxResults+'&pageToken='+pageToken;

    $.getJSON(url, function(data){

      pageToken = data.nextPageToken;

      data.items.forEach(function(item){
        var videoId = item.id.videoId,
            title = item.snippet.title,
            description = item.snippet.description,
            imageUrl = item.snippet.thumbnails.high.url,
            link = 'https://www.youtube.com/watch?v='+videoId;

        $('.results-youtube').append("<a class='item-youtube' style='background-image:linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(" + imageUrl + ");' href='"
                + link + "'><div class='details-youtube'><div class='title-youtube'>"
                + title + "</div><div class='description-youtube'>"
                + description + "</div></div></a>");

      });
    });
  });
})

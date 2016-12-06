//starts functions when document is loaded
$(document).ready(function(){

 const  startIndex = '1',
        count = '10';

  var pageToken = '';
  $('.submit-ign').on('click', function() {
    $('.results-ign').empty();
    $('.more-ign').html("SEE MORE ARTICLES").removeClass('hidden');

    pageToken = '';
    var query = $('.input-ign').val();
    var url = "http://ign-apis.herokuapp.com/"
    $.getJSON(url, function(data){

      data.endpoints.forEach(function(endpoint){
        var endpointquest = endpoint;
        var url = "http://ign-apis.herokuapp.com"+endpointquest+"?startIndex="+startIndex+"&count="+count;

        $.getJSON(url, function(data){

          if (endpointquest == "/articles"){

          data.forEach(function(item){
            var imageUrl = item.thumbnail,
                slug = item.metadata.slug,
                longdate = item.metadata.publishDate,
                head = item.metadata.headline,
                subhead = item.metadata.subHeadline,
                shortdate = longdate.split(/[\d|-]+/),
                link = "http://www.ign.com/articles/"+shortdate+"/"+slug;


                $('.results-ign').append("<a class='item-ign' style='background-image:linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(" + imageUrl + ");' href='"
                        + link + "'><div class='details-ign'><div class='title-ign>"
                        + head + "</div><div class='description-youtube'>"
                        + subhead + "</div></div></a>");

          });
        };

          if (endpointquest == "/videos"){

            data.forEach(function(item){
              var imageUrl = item.thumbnail,
                  link = item.metadata.url,
                  head = item.metadata.name,
                  subhead = item.metadata.description,
                  time = item.metadata.duration;

                  $('.results-ign').append("<a class='item-ign' style='background-image:linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(" + imageUrl + ");' href='"
                          + link + "'><div class='details-ign'><div class='title-ign'>"
                          + head + "</div><div class='description-ign'>"
                          + subhead+ "</div></div></a>");
        });
      };
    });
});
});
});
});



/*
  $('.more-ign').on('click', function(){
    var url = "https://newsapi.org/v1/articles?source="+source+"&sortBy="+sortBy+"&apiKey="+key;

    $.getJSON(url, function(data){

      pageToken = data.nextPageToken;

      data.items.forEach(function(item){
        var videoId = item.id.videoId,
            title = item.snippet.title,
            description = item.snippet.description,
            imageUrl = item.snippet.thumbnails.high.url,


        $('.results-ign').append("<h2>Hi there.</h2>");

      });
    });
  });
  */

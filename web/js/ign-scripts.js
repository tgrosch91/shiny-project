//starts functions when document is loaded
$(document).ready(function(){

 const  startIndex = '1',
        count = '10';

  $('#article-choice').on('click', function() {
    $('.results-ign').empty();
    //$('.more-ign').html("SEE MORE ARTICLES").removeClass('hidden');

    var url = "http://ign-apis.herokuapp.com/articles?startIndex=1&count=10&callback=?"

        $.getJSON(url, function(data){

          data.data.forEach(function(item){
            var imageUrl = item.thumbnail,
                slug = item.metadata.slug,
                date = item.metadata.publishDate,
                head = item.metadata.headline,
                subhead = item.metadata.subHeadline,
                datearray = date.split(/-|[A-Z]/g),
                year = datearray[0],
                month = datearray[1],
                day = datearray[2],
                link = "http://www.ign.com/articles/"+year+"/"+month+"/"+day+"/"+slug;

                $('.results-ign').append("<a class='item-ign' style='background-image:linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(" + imageUrl + ");' href='"
                        + link + "'><div class='details-ign'><div class='title-ign'>"
                        + head + "</div><div class='description-youtube'>"
                        + subhead + "</div></div></a>");

          });
        });
      });
    });

/*
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
*/



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

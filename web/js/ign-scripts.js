//starts functions when document is loaded


// things to be fixed: make pretty, obviously. the view more buttons seem to switch back and forth. will go back and forth from getting the year to getting the video duration. also how do i get it to automatically view the articles. also have to convert dates and durations to acceptable format. also the hover thing.
$(document).ready(function(){

var startIndex = 1;

  $('#article-choice').on('click', function() {
    $('.results-ign').empty();
    $('.more-ign').html("SEE MORE ARTICLES").removeClass('hidden');

    var url = "http://ign-apis.herokuapp.com/articles?startIndex="+startIndex+"&count=10&callback=?"

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
                        + head + "</div><div class='description-ign'>"
                        + subhead + "</div><div class='title-ign'>"
                        + year + "</div></div></a>");

          });
        });


          $('.more-ign').on('click', function(){
            startIndex += 10;
            var url = "http://ign-apis.herokuapp.com/articles?startIndex="+startIndex+"&count=10&callback=?"

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
                                + head + "</div><div class='description-ign'>"
                                + subhead + "</div><div class='title-ign'>"
                                + year + "</div></div></a>");

                  });
                });
              });

      });

      $('#video-choice').on('click', function() {
        $('.results-ign').empty();
        $('.more-ign').html("SEE MORE VIDEOS").removeClass('hidden');

        var url = "http://ign-apis.herokuapp.com/videos?startIndex="+startIndex+"&count=10&callback=?"

            $.getJSON(url, function(data){

              data.data.forEach(function(item){
                var imageUrl = item.thumbnail,
                    link = item.metadata.url,
                    head = item.metadata.name,
                    subhead = item.metadata.description,
                    time = item.metadata.duration;

                    $('.results-ign').append("<a class='item-ign' style='background-image:linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(" + imageUrl + ");' href='"
                            + link + "'><div class='details-ign'><div class='title-ign'>"
                            + head + "</div><div class='description-ign'>"
                            + subhead+ "</div><div class='title-ign'>"
                            + time + "</div></div></a>");

              });
            });
            $('.more-ign').on('click', function(){
              startIndex += 10;
              var url = "http://ign-apis.herokuapp.com/videos?startIndex="+startIndex+"&count=10&callback=?"

                  $.getJSON(url, function(data){

                    data.data.forEach(function(item){
                      var imageUrl = item.thumbnail,
                          link = item.metadata.url,
                          head = item.metadata.name,
                          subhead = item.metadata.description,
                          time = item.metadata.duration;

                          $('.results-ign').append("<a class='item-ign' style='background-image:linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(" + imageUrl + ");' href='"
                                  + link + "'><div class='details-ign'><div class='title-ign'>"
                                  + head + "</div><div class='description-ign'>"
                                  + subhead+ "</div><div class='title-ign'>"
                                  + time + "</div></div></a>");

                    });
                  });
                });

          });

    });

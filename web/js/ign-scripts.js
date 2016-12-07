//starts functions when document is loaded


// things to be fixed: make pretty, obviously. also have to convert dates and durations to acceptable format. also the hover thing. also fix when subhead is undefined
$(document).ready(function(){


  $('#article-choice').on('click', function() {
    $('.results-article').empty();
    $('.results-video').empty();
    $('.results-article').removeClass('hidden');
    $('.results-video').addClass('hidden');
    $('.more-videos').addClass('hidden');
    $('.more-articles').html("SEE MORE ARTICLES").removeClass('hidden');
    var startIndex = 1;

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

                $('.results-article').append("<a class='item-ign' style='background-image:linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(" + imageUrl + ");' href='"
                        + link + "'><div class='details-ign'><div class='title-ign'>"
                        + head + "</div><div class='description-ign'>"
                        + subhead + "</div><div class='title-ign'>"
                        + year + "</div></div></a>");

          });
        });
      });


          $('.more-articles').on('click', function(){
            $('.results-video').empty();
            $('.results-video').addClass('hidden');
            $('.more-videos').addClass('hidden');

            var startIndex = $('.item-ign').size()+1;

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

                        $('.results-article').append("<a class='item-ign' style='background-image:linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(" + imageUrl + ");' href='"
                                + link + "'><div class='details-ign'><div class='title-ign'>"
                                + head + "</div><div class='description-ign'>"
                                + subhead + "</div><div class='title-ign'>"
                                + year + "</div></div></a>");

                  });
                });
              });

      $('#video-choice').on('click', function() {
        $('.results-video').empty();
        $('.results-article').empty();
        $('.results-video').removeClass('hidden');
        $('.results-articles').addClass('hidden');
        $('.more-videos').html("SEE MORE VIDEOS").removeClass('hidden');
        $('.more-articles').addClass('hidden');
        var startIndex = 1;


        var url = "http://ign-apis.herokuapp.com/videos?startIndex="+startIndex+"&count=10&callback=?"

            $.getJSON(url, function(data){

              data.data.forEach(function(item){
                var imageUrl = item.thumbnail,
                    link = item.metadata.url,
                    head = item.metadata.name,
                    subhead = item.metadata.description,
                    time = item.metadata.duration;

                    $('.results-video').append("<a class='item-ign' style='background-image:linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(" + imageUrl + ");' href='"
                            + link + "'><div class='details-ign'><div class='title-ign'>"
                            + head + "</div><div class='description-ign'>"
                            + subhead+ "</div><div class='title-ign'>"
                            + time + "</div></div></a>");

              });
            });
          });

            $('.more-videos').on('click', function(){
              $('.results-article').empty();
              $('.results-articles').addClass('hidden');
              $('.more-articles').addClass('hidden');
              var startIndex = $('.item-ign').size()+1;

              var url = "http://ign-apis.herokuapp.com/videos?startIndex="+startIndex+"&count=10&callback=?"

                  $.getJSON(url, function(data){

                    data.data.forEach(function(item){
                      var imageUrl = item.thumbnail,
                          link = item.metadata.url,
                          head = item.metadata.name,
                          subhead = item.metadata.description,
                          time = item.metadata.duration;

                          $('.results-video').append("<a class='item-ign' style='background-image:linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(" + imageUrl + ");' href='"
                                  + link + "'><div class='details-ign'><div class='title-ign'>"
                                  + head + "</div><div class='description-ign'>"
                                  + subhead+ "</div><div class='title-ign'>"
                                  + time + "</div></div></a>");

                    });
                  });
                });

    });

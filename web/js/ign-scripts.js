//starts functions when document is loaded


// things to be fixed: make pretty, obviously. also have to convert durations to acceptable format. also the hover thing.
$(document).ready(function(){
  $('a.item-ign').hover(
    function(){$('a.item-ign').removeClass('hidden');
  },
    function(){$('a.item-ign').addClass('hidden');
      });

  $('#article-choice').on('click', function() {
    $('.results-article').empty();
    $('.results-video').empty();
    $('.results-article').removeClass('hidden');
    $('.results-video').addClass('hidden');
    $('.btn-right').removeClass('btn-special-pushed');
    $('.btn-left').addClass('btn-special-pushed');
    $('.more-videos').addClass('hidden');
    $('.more-articles').html("SEE MORE ARTICLES").removeClass('hidden');
    var startIndex = 1;

    var url = "https://ign-apis.herokuapp.com/articles?startIndex="+startIndex+"&count=10&callback=?"

        $.getJSON(url, function(data){

          data.data.forEach(function(item){
            var imageUrl = item.thumbnail,
                slug = item.metadata.slug,
                date = item.metadata.publishDate,
                head = item.metadata.headline,
                subhead = item.metadata.subHeadline,
                datearray = date.split(/-|[A-Z]/g),
                year = datearray[0],
                month = parseInt(datearray[1]),
                day = datearray[2],
                link = "https://www.ign.com/articles/"+year+"/"+month+"/"+day+"/"+slug;

                if (subhead == null) {
                  subhead = head
                }
                var count = $('.item-ign').size()+1;
                count = count.toString();
                if (count.length == 1){
                  count = "0"+count
                }

                var months= {1:'Jan',2:'Feb',3:'Mar',4:'Apr',5:'May',6:'Jun',7:'Jul',8:'Aug',9:'Sep',10:'Oct',11:'Nov',12:'Dec'}

                $('.results-article').append("<a href='"+ link + "'><div class= 'item-ign'><div class= 'background-switch' style = 'background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(" + imageUrl + ")'><div class ='playlist-row'><div class='count'>"+count+"</div><div class= 'details-ign'><div class='title-ign'>"+ head + "</div><div class = 'description-ign'>"+ subhead + "</div></div><div class='date-ign'><div class = 'month'>"+ months[month]+"</div><div class = 'year'>"+ year + "</div></div></div></div></div></a>");


          });
        });
      });


          $('.more-articles').on('click', function(){
            $('.results-video').empty();
            $('.results-video').addClass('hidden');
            $('.more-videos').addClass('hidden');

            var startIndex = $('.item-ign').size()+1;

            var url = "https://ign-apis.herokuapp.com/articles?startIndex="+startIndex+"&count=10&callback=?"

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
                        link = "https://www.ign.com/articles/"+year+"/"+month+"/"+day+"/"+slug;

                        if (subhead == null) {
                          subhead = head
                        }
                        var count = $('.item-ign').size()+1;
                        count = count.toString();
                        if (count.length == 1){
                          count = "0"+count
                        }

                        var months= {1:'Jan',2:'Feb',3:'Mar',4:'Apr',5:'May',6:'Jun',7:'Jul',8:'Aug',9:'Sep',10:'Oct',11:'Nov',12:'Dec'}

                        $('.results-article').append("<a href='"+ link + "'><div class= 'item-ign'><div class= 'background-switch' style = 'background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(" + imageUrl + ")'><div class ='playlist-row'><div class='count'>"+count+"</div><div class= 'details-ign'><div class='title-ign'>"+ head + "</div><div class = 'description-ign'>"+ subhead + "</div></div><div class='date-ign'><div class = 'month'>"+ months[month]+"</div><div class = 'year'>"+ year + "</div></div></div></div></div></a>");


                  });
                });
              });

      $('#video-choice').on('click', function() {
        $('.results-video').empty();
        $('.results-article').empty();
        $('.results-video').removeClass('hidden');
        $('.results-articles').addClass('hidden');
        $('.btn-right').addClass('btn-special-pushed');
        $('.btn-left').removeClass('btn-special-pushed');
        $('.more-videos').html("SEE MORE VIDEOS").removeClass('hidden');
        $('.more-articles').addClass('hidden');
        var startIndex = 1;


        var url = "https://ign-apis.herokuapp.com/videos?startIndex="+startIndex+"&count=10&callback=?"

            $.getJSON(url, function(data){

              data.data.forEach(function(item){
                var imageUrl = item.thumbnail,
                    link = item.metadata.url,
                    head = item.metadata.name,
                    subhead = item.metadata.description,
                    time = item.metadata.duration;

                    if (subhead == null) {
                      subhead = head
                    }
                    var count = $('.item-ign').size()+1;
                    count = count.toString();
                    if (count.length == 1){
                      count = "0"+count
                    }

                    var minute = Math.floor(time/60),
                        second = (time%60).toString();

                    if (second.length == 1){
                      second = "0"+second;
                    }

                    time = minute+":"+second;

                    $('.results-video').append("<a href = '"+link+"'><div class= 'item-ign'><div class= 'background-switch' style = 'background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(" + imageUrl + ")'><div class ='playlist-row'><div class='count'>"+count+"</div><div class= 'details-ign'><div class='title-ign'>"+ head + "</div><div class = 'description-ign'>"+ subhead + "</div></div><div class='date-ign'><div class = 'month'>"+ time+"</div></div></div></div></div></a>");

              });
            });
          });

            $('.more-videos').on('click', function(){
              $('.results-article').empty();
              $('.results-articles').addClass('hidden');
              $('.more-articles').addClass('hidden');
              var startIndex = $('.item-ign').size()+1;

              var url = "https://ign-apis.herokuapp.com/videos?startIndex="+startIndex+"&count=10&callback=?"

                  $.getJSON(url, function(data){

                    data.data.forEach(function(item){
                      var imageUrl = item.thumbnail,
                          link = item.metadata.url,
                          head = item.metadata.name,
                          subhead = item.metadata.description,
                          time = item.metadata.duration;

                          if (subhead == null) {
                            subhead = head
                          }
                          var count = $('.item-ign').size()+1;
                          count = count.toString();
                          if (count.length == 1){
                            count = "0"+count
                          }

                          var minute = Math.floor(time/60),
                              second = (time%60).toString();
                          if (second.length == 1){
                            second = "0"+second;
                          }

                          time = minute+":"+second;

                          $('.results-video').append("<a href = '"+link+"'><div class= 'item-ign'><div class= 'background-switch' style = 'background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(" + imageUrl + ")'><div class ='playlist-row'><div class='count'>"+count+"</div><div class= 'details-ign'><div class='title-ign'>"+ head + "</div><div class = 'description-ign'>"+ subhead + "</div></div><div class='date-ign'><div class = 'month'>"+ time+"</div></div></div></div></div></a>");

                    });
                  });
                });




    });

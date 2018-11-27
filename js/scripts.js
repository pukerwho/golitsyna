
// function CountDownTimer(date, id) {
//      var end = new Date(date);

//      var _second = 1000;
//      var _minute = _second * 60;
//      var _hour = _minute * 60;
//      var _day = _hour * 24;
//      var timer;

//      function showRemaining() {
//          var now = new Date();
//          var distance = end - now;
//          if (distance < 0) {

//              clearInterval(timer);
//              document.getElementById(id).innerHTML = 'EXPIRED!';

//              return;
//          }
//          var days = Math.floor(distance / _day);
//          var hours = Math.floor((distance % _day) / _hour);
//          var minutes = Math.floor((distance % _hour) / _minute);
//          var seconds = Math.floor((distance % _minute) / _second);

//          document.getElementById(id).innerHTML = days + ' дней ';
//          document.getElementById(id).innerHTML += hours + ' часов ';
//          document.getElementById(id).innerHTML += minutes + ' минут ';
//          document.getElementById(id).innerHTML += seconds + ' секунд';
//      }

//      timer = setInterval(showRemaining, 1000);
//  }

// CountDownTimer('11/25/2018 2:30 PM', 'countdown');

// var tag = document.createElement('script');
//     tag.src = 'https://www.youtube.com/player_api';
// var firstScriptTag = document.getElementsByTagName('script')[0];
//     firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
// var tv,
//     playerDefaults = {autoplay: 0, autohide: 1, modestbranding: 0, rel: 0, showinfo: 0, controls: 0, disablekb: 1, enablejsapi: 0, iv_load_policy: 3};
// var vid = [
//       {'videoId': 'SrjG_4XfVN0', 'startSeconds': 0, 'endSeconds': 690, 'suggestedQuality': 'hd720'},
//       {'videoId': 'SrjG_4XfVN0', 'startSeconds': 0, 'endSeconds': 657, 'suggestedQuality': 'hd720'},
//       {'videoId': 'SrjG_4XfVN0', 'startSeconds': 0, 'endSeconds': 240, 'suggestedQuality': 'hd720'},
//       {'videoId': 'SrjG_4XfVN0', 'startSeconds': 0, 'endSeconds': 241, 'suggestedQuality': 'hd720'}
//     ],
//     randomVid = Math.floor(Math.random() * vid.length),
//     currVid = randomVid;

// $('.hi em:last-of-type').html(vid.length);

// function onYouTubePlayerAPIReady(){
//   tv = new YT.Player('tv', {events: {'onReady': onPlayerReady, 'onStateChange': onPlayerStateChange}, playerVars: playerDefaults});
// }

// function onPlayerReady(){
//   tv.loadVideoById(vid[currVid]);
//   tv.mute();
// }

// function onPlayerStateChange(e) {
//   if (e.data === 1){
//     $('#tv').addClass('active');
//     $('.hi em:nth-of-type(2)').html(currVid + 1);
//   } else if (e.data === 2){
//     $('#tv').removeClass('active');
//     if(currVid === vid.length - 1){
//       currVid = 0;
//     } else {
//       currVid++;  
//     }
//     tv.loadVideoById(vid[currVid]);
//     tv.seekTo(vid[currVid].startSeconds);
//   }
// }

// function vidRescale(){

//   var w = $(window).width()+200,
//     h = $(window).height()+200;

//   if (w/h > 16/9){
//     tv.setSize(w, w/16*9);
//     $('.tv .screen').css({'left': '0px'});
//   } else {
//     tv.setSize(h/9*16, h);
//     $('.tv .screen').css({'left': -($('.tv .screen').outerWidth()-w)/2});
//   }
// }

// $(window).on('load resize', function(){
//   vidRescale();
// });

// $('.header__buttons__sound').on('click', function(){
//   console.log('sound');
//   $('#tv').toggleClass('mute');
//   $('.header__buttons__sound .fa-volume-up').toggleClass('hidden');
//   $('.header__buttons__sound .fa-volume-off').toggleClass('hidden');

//   if($('#tv').hasClass('mute')){
//     tv.mute();
//   } else {
//     tv.unMute();
//   }
// });

// $('.hi span:last-of-type').on('click', function(){
//   $('.hi em:nth-of-type(2)').html('~');
//   tv.pauseVideo();
// });


//Плавный скролл
$(document).on('click', '.header a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
});

$(document).on('click', '.slider a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
});

//Открываем фотоальбомы
$('.photoalbum__button').on('click', function(){
    console.log($(this).attr("data-number") )
    var dataNumber = $(this).attr("data-number");
    $('.photoalbum__gallery[data-open=' + dataNumber + ']').addClass('photoalbum__gallery__show');
    $('body').addClass('gallery-open');
})

//Закрываем фотоальбомы
$('.photoalbum__gallery__close').on('click', function(){
    $('.photoalbum__gallery').removeClass('photoalbum__gallery__show');
    $('body').removeClass('gallery-open');
})

//Открываем афишу
$('.ticket .buy').on('click', function(){
    console.log($(this).attr("data-number") )
    var dataNumber = $(this).attr("data-number");
    $('.ticket__info[data-open=' + dataNumber + ']').addClass('ticket__info__show');
    $('body').addClass('gallery-open');
})

//Закрываем афишу
$('.ticket__info__close').on('click', function(){
    $('.ticket__info').removeClass('ticket__info__show');
    $('body').removeClass('gallery-open');
})


//Биография
$('.biography__button').on('click', function(){
    console.log('clickkkk');
    $('.biography__two').addClass('biography__two__active');
    $('.biography__button').addClass('biography__button__hidden')
})

//SWIPER SLIDER
if ($(document).width() > 960) {
  var mySwiper = new Swiper ('.swiper-slide', {
    slidesPerView: 'auto',
    spaceBetween: 30,
    loop: true,
    navigation: {
      nextEl: '.swiper-slide-button-next',
      prevEl: '.swiper-slide-button-prev',
    },
  });
};

if ($(document).width() < 960) {
  var mySwiperSlide = new Swiper ('.swiper-slide', {
    pagination: {
        el: '.swiper-slide-pagination',
        clickable: true,
    },
    slidesPerView: 'auto',
    loop: true,
    autoplay: {
        delay: 5000,
    },
  });
};

//SWIPER VIDEO
if ($(document).width() > 960) {
  var mySwiperVideo = new Swiper ('.swiper-video', {
    slidesPerView: 'auto',
    spaceBetween: 30,
    loop: true,
    navigation: {
      nextEl: '.swiper-video-button-next',
      prevEl: '.swiper-video-button-prev',
    },
  });
};


if ($(document).width() < 960) {
  var mySwiper = new Swiper ('.swiper-video', {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    navigation: {
      nextEl: '.swiper-video-button-next',
      prevEl: '.swiper-video-button-prev',
    },
  });
};

//AUDIO PLAYER
var supportsAudio = !!document.createElement('audio').canPlayType;
if (supportsAudio) {
  // initialize plyr
  var player = new Plyr('#audio1', {
    controls: [
      'restart',
      'play',
      'progress',
      'current-time',
      'duration',
      'mute',
      'volume'
    ]
  });
  // initialize playlist and controls
    var index = 0,
        playing = false,
        mediaPath = 'https://golitsyna.timeto.top/',
        extension = '',
        tracks = [{
            "track": 1,
            "name": "Одна на миллион",
            "duration": "4:21",
            "file": "song1",
            "youtube": "https://youtube.com" 
        }, {
            "track": 2,
            "name": "Как ты там",
            "duration": "3:32",
            "file": "02"
        }, {
            "track": 3,
            "name": "Фамилия",
            "duration": "3:32",
            "file": "03"
        }],
        buildPlaylist = $(tracks).each(function(key, value) {
            var trackNumber = value.track,
                trackName = value.name,
                trackDuration = value.duration;
                trackUrl = value.file;
                trackYoutube = value.youtube;
            if (trackNumber.toString().length === 1) {
                trackNumber = '0' + trackNumber;
            }
            $('#plList').append('<li> \
                <div class="plItem"> \
                    <span class="plyoutube"><a href="' + trackYoutube +'" target="_blank"><i class="fab fa-youtube"></i></a></span> \
                    <span class="pldownload"><a href="' + mediaPath + trackUrl +'.mp3" download><i class="fas fa-download"></i></a></span> \
                    <span class="plNum">' + trackNumber + '.</span> \
                    <span class="plTitle">' + trackName + '</span> \
                    <span class="plLength">' + trackDuration + '</span> \
                </div> \
            </li>');
        }),
        trackCount = tracks.length,
        npAction = $('#npAction'),
        npTitle = $('#npTitle'),
        audio = $('#audio1').on('play', function () {
            playing = true;
            npAction.text('Сейчас играет...');
        }).on('pause', function () {
            playing = false;
            npAction.text('Пауза...');
        }).on('ended', function () {
            npAction.text('Пауза...');
            if ((index + 1) < trackCount) {
                index++;
                loadTrack(index);
                audio.play();
            } else {
                audio.pause();
                index = 0;
                loadTrack(index);
            }
        }).get(0),
        btnPrev = $('#btnPrev').on('click', function () {
            if ((index - 1) > -1) {
                index--;
                loadTrack(index);
                if (playing) {
                    audio.play();
                }
            } else {
                audio.pause();
                index = 0;
                loadTrack(index);
            }
        }),
        btnNext = $('#btnNext').on('click', function () {
            if ((index + 1) < trackCount) {
                index++;
                loadTrack(index);
                if (playing) {
                    audio.play();
                }
            } else {
                audio.pause();
                index = 0;
                loadTrack(index);
            }
        }),
        li = $('#plList li').on('click', function () {
            var id = parseInt($(this).index());
            if (id !== index) {
                playTrack(id);
            }
        }),
        loadTrack = function (id) {
            $('.plSel').removeClass('plSel');
            $('#plList li:eq(' + id + ')').addClass('plSel');
            npTitle.text(tracks[id].name);
            index = id;
            audio.src = mediaPath + tracks[id].file + extension;
        },
        playTrack = function (id) {
            loadTrack(id);
            audio.play();
        };
    extension = audio.canPlayType('audio/mpeg') ? '.mp3' : audio.canPlayType('audio/ogg') ? '.ogg' : '';
    loadTrack(index);
} else {
    // boo hoo
    $('.column').addClass('hidden');
    var noSupport = $('#audio1').text();
    $('.container').append('<p class="no-support">' + noSupport + '</p>');
}

//Плавный скролл
$(document).on('click', '.header a[href^="#"]', function (event) {
    event.preventDefault();
    var target = $($.attr(this, 'href'));
    var targetScroll =  target.offset().top - 100
    $('html, body').animate({
        scrollTop: targetScroll
    }, 500);
});

$(document).on('click', '.slider a[href^="#"]', function (event) {
    event.preventDefault();
    var target = $($.attr(this, 'href'));
    var targetScroll =  target.offset().top - 100
    $('html, body').animate({
        scrollTop: targetScroll
    }, 500);
});

//Меняем цвет шапки
$(window).scroll(function(){
  var h_scroll = $(this).scrollTop();
  var header__height = $('header').height();
  if (h_scroll > header__height) {
    $('.header').addClass('header__fixed')
  } else {
    $('.header').removeClass('header__fixed')
  }
})

//АНИМАЦИЯ
AOS.init({
    disable: 'mobile'
});

//Открываем фотоальбомы
$(document).on('click', '.photoalbum__button', function(event){
    console.log($(this).attr("data-number") )
    var dataNumber = $(this).attr("data-number");
    $('.photoalbum__gallery[data-open=' + dataNumber + ']').addClass('photoalbum__gallery__show');
    $('body').addClass('gallery-open');
})

//Закрываем фотоальбомы
$(document).on('click', '.photoalbum__gallery__close', function(event){
    $('.photoalbum__gallery').removeClass('photoalbum__gallery__show');
    $('body').removeClass('gallery-open');
})

//Открываем афишу
$(document).on('click', '.ticket .buy', function(){
    console.log($(this).attr("data-number") )
    var dataNumber = $(this).attr("data-number");
    $('.ticket__info[data-open=' + dataNumber + ']').addClass('ticket__info__show');
    $('body').addClass('gallery-open');
})

//Закрываем афишу
$(document).on('click', '.ticket__info__close', function(){
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
    autoplay: {
        delay: 6000,
    },
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
        delay: 6000,
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
            "name": "Бессовестно счастливая",
            "duration": "4:04",
            "file": "bessovestno_schastlivaya",
            "youtube": "https://www.youtube.com/watch?v=dKjgGiH00l4" 
        }, {
            "track": 2,
            "name": "Чао, персик",
            "duration": "3:37",
            "file": "chao_persik"
        }, {
            "track": 3,
            "name": "Такая, как есть",
            "duration": "3:59",
            "file": "takaya_kak_est"
        }, {
            "track": 4,
            "name": "Любовь не бывает",
            "duration": "3:51",
            "file": "lubov_ne_bivaet",
            "youtube": "https://www.youtube.com/watch?v=Zu1ZR6m8AWs" 
        }, {
            "track": 5,
            "name": "Какая дама пропадает",
            "duration": "4:27",
            "file": "kakaya_dama_propadaet",
            "youtube": "https://www.youtube.com/watch?v=J5w4XfAJe6U"
        }, {
            "track": 6,
            "name": "В личном пространстве",
            "duration": "3:59",
            "file": "v_lichnom_prostranstve",
            "youtube": "https://www.youtube.com/watch?v=SrjG_4XfVN0"
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
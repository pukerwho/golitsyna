var tag = document.createElement('script');
    tag.src = 'https://www.youtube.com/player_api';
var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var tv,
    playerDefaults = {autoplay: 0, autohide: 1, modestbranding: 0, rel: 0, showinfo: 0, controls: 0, disablekb: 1, enablejsapi: 0, iv_load_policy: 3};
var vid = [
      {'videoId': 'SrjG_4XfVN0', 'startSeconds': 0, 'endSeconds': 690, 'suggestedQuality': 'hd720'},
      {'videoId': 'SrjG_4XfVN0', 'startSeconds': 0, 'endSeconds': 657, 'suggestedQuality': 'hd720'},
      {'videoId': 'SrjG_4XfVN0', 'startSeconds': 0, 'endSeconds': 240, 'suggestedQuality': 'hd720'},
      {'videoId': 'SrjG_4XfVN0', 'startSeconds': 0, 'endSeconds': 241, 'suggestedQuality': 'hd720'}
    ],
    randomVid = Math.floor(Math.random() * vid.length),
    currVid = randomVid;

$('.hi em:last-of-type').html(vid.length);

function onYouTubePlayerAPIReady(){
  tv = new YT.Player('tv', {events: {'onReady': onPlayerReady, 'onStateChange': onPlayerStateChange}, playerVars: playerDefaults});
}

function onPlayerReady(){
  tv.loadVideoById(vid[currVid]);
  tv.mute();
}

function onPlayerStateChange(e) {
  if (e.data === 1){
    $('#tv').addClass('active');
    $('.hi em:nth-of-type(2)').html(currVid + 1);
  } else if (e.data === 2){
    $('#tv').removeClass('active');
    if(currVid === vid.length - 1){
      currVid = 0;
    } else {
      currVid++;  
    }
    tv.loadVideoById(vid[currVid]);
    tv.seekTo(vid[currVid].startSeconds);
  }
}

function vidRescale(){

  var w = $(window).width()+200,
    h = $(window).height()+200;

  if (w/h > 16/9){
    tv.setSize(w, w/16*9);
    $('.tv .screen').css({'left': '0px'});
  } else {
    tv.setSize(h/9*16, h);
    $('.tv .screen').css({'left': -($('.tv .screen').outerWidth()-w)/2});
  }
}

$(window).on('load resize', function(){
  vidRescale();
});

$('.header__buttons__sound').on('click', function(){
  console.log('sound');
  $('#tv').toggleClass('mute');
  $('.header__buttons__sound .fa-volume-up').toggleClass('hidden');
  $('.header__buttons__sound .fa-volume-off').toggleClass('hidden');

  if($('#tv').hasClass('mute')){
    tv.mute();
  } else {
    tv.unMute();
  }
});

$('.hi span:last-of-type').on('click', function(){
  $('.hi em:nth-of-type(2)').html('~');
  tv.pauseVideo();
});

//SWIPER
if ($(document).width() > 960) {
  var mySwiper = new Swiper ('.swiper-video', {
    slidesPerView: 'auto',
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
        mediaPath = 'http://golitsyna.ru/content/mp3/2017/',
        extension = '',
        tracks = [{
            "track": 1,
            "name": "Катерина Голицына - Одна на миллион",
            "duration": "4:21",
            "file": "01"
        }, {
            "track": 2,
            "name": "Катерина Голицына - Как ты там",
            "duration": "3:32",
            "file": "02"
        }, {
            "track": 3,
            "name": "Катерина Голицына - Фамилия",
            "duration": "3:32",
            "file": "03"
        }],
        buildPlaylist = $(tracks).each(function(key, value) {
            var trackNumber = value.track,
                trackName = value.name,
                trackDuration = value.duration;
            if (trackNumber.toString().length === 1) {
                trackNumber = '0' + trackNumber;
            }
            $('#plList').append('<li> \
                <div class="plItem"> \
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
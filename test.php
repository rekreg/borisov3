<?php


function get_cn_from_string($cn) {
   // Выдергиваем кадастровый если есть буквы в строке
  if (preg_match("/[а-я]/i", $cn) || preg_match("/[a-z]/i", $cn)) {
    
    // Считаем количество двоеточий, чтобы убедится, что это кадастровый
    preg_match_all("/:/", $cn, $colons);
    
    if(isset($colons[0]) && count($colons[0]) === 3) {
      // Забираем кадастровый номер
      preg_match('/[0-9]{2}:[0-9]{2}:[0-9]{6,9}:[0-9]{1,35}/', $cn, $matches);
      if(isset($matches[0])) {
        return $matches[0];
      }
    }
      
  }
  return $cn;
}


function filter_cn($cn) {
  $cn = trim($cn, ".,_;№");
  $cn = preg_replace('/\s/', '', $cn);
  $cn = get_cn_from_string($cn);
  return $cn;
}

$cn = "50:11:0020214:4765, Российская Федерация, Московская область, г.о. Красногорск, д. Сабурово, ул. Парковая, дом 22, кв.88";


//echo filter_cn($cn);



?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>

<body>

<div class="countdown">
  <span id="time" class="time">00:00.00</span>
</div>
<div class="btn-wrap">
  <button id="start">Start</button>
  <button id="stop">Stop</button>
  <button id="reset">Reset</button>
</div>

</body>

<script   src="https://code.jquery.com/jquery-3.4.1.min.js"   integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="   crossorigin="anonymous"></script>
<script>
 function Countdown(elem, seconds) {
  var that = {};

  that.elem = elem;
  that.seconds = seconds;
  that.totalTime = seconds * 100;
  that.usedTime = 0;
  that.startTime = +new Date();
  that.timer = null;

  that.count = function() {
    that.usedTime = Math.floor((+new Date() - that.startTime) / 10);

    var tt = that.totalTime - that.usedTime;
    if (tt <= 0) {
      that.elem.innerHTML = '00:00.00';
      clearInterval(that.timer);
      alert("Закончился таймер");
    } else {
      var mi = Math.floor(tt / (60 * 100));
      var ss = Math.floor((tt - mi * 60 * 100) / 100);
      var ms = tt - Math.floor(tt / 100) * 100;

      that.elem.innerHTML = that.fillZero(mi) + ":" + that.fillZero(ss) + "." + that.fillZero(ms);
    }
  };
  
  that.init = function() {
    if(that.timer){
      clearInterval(that.timer);
      that.elem.innerHTML = '00:00.00';
      that.totalTime = seconds * 100;
      that.usedTime = 0;
      that.startTime = +new Date();
      that.timer = null;
    }
  };

  that.start = function() {
    if(!that.timer){
       that.timer = setInterval(that.count, 10);
    }
  };

  that.stop = function() {
    console.log('usedTime = ' + countdown.usedTime);
    if (that.timer) clearInterval(that.timer);
  };

  that.fillZero = function(num) {
    return num < 10 ? '0' + num : num;
  };

  return that;
}

var span = document.getElementById('time');
var countdown = new Countdown(span, 10);

$('#start').on('click', function(){
  countdown.start();
});

$('#stop').on('click', function(){
  countdown.stop();
});

$('#reset').on('click', function(){
  countdown.init();
});
</script>

</html>

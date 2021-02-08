/******/ (() => { // webpackBootstrap
/*!********************************!*\
  !*** ./resources/js/recipe.js ***!
  \********************************/
function stateChange() {
  var stateList = document.getElementsByName('stateList');
  var recipe = document.querySelectorAll('.recipeCard');
  var mouse = document.querySelectorAll('.mouse');
  var cookie = document.querySelectorAll('.cookie');
  var choco = document.querySelectorAll('.choco');
  var season = document.querySelectorAll('.season');
  var pan = document.querySelectorAll('.pan');
  var el = document.querySelectorAll('.el'); // ラジオボタン押した時の内部処理（displayをnoneにするためのもの）

  function mouseChoco($i1, $i2, $i3) {
    mouse.forEach(function (item) {
      item.closest('.recipeCard').style.display = $i1;
    });
    cookie.forEach(function (item) {
      item.closest('.recipeCard').style.display = $i2;
    });
    choco.forEach(function (item) {
      item.closest('.recipeCard').style.display = $i3;
    });
  }

  function seasonEl($i4, $i5, $i6) {
    season.forEach(function (item) {
      item.closest('.recipeCard').style.display = $i4;
    });
    pan.forEach(function (item) {
      item.closest('.recipeCard').style.display = $i5;
    });
    el.forEach(function (item) {
      item.closest('.recipeCard').style.display = $i6;
    });
  } //ラジオボタン押した時の処理１〜６


  if (stateList[1].checked) {
    mouseChoco('', 'none', 'none');
    seasonEl('none', 'none', 'none');
  } else if (stateList[2].checked) {
    mouseChoco('none', '', 'none');
    seasonEl('none', 'none', 'none');
  } else if (stateList[3].checked) {
    mouseChoco('none', 'none', '');
    seasonEl('none', 'none', 'none');
  } else if (stateList[4].checked) {
    mouseChoco('none', 'none', 'none');
    seasonEl('', 'none', 'none');
  } else if (stateList[5].checked) {
    mouseChoco('none', 'none', 'none');
    seasonEl('none', '', 'none');
  } else if (stateList[6].checked) {
    mouseChoco('none', 'none', 'none');
    seasonEl('none', 'none', '');
  } else {
    recipe.forEach(function (item) {
      item.style.display = '';
    });
  }
}

document.getElementsByName('stateList').forEach(function (radio) {
  radio.addEventListener('click', stateChange);
});
/******/ })()
;
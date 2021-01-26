/******/ (() => { // webpackBootstrap
/*!********************************!*\
  !*** ./resources/js/recipe.js ***!
  \********************************/
function stateChange() {
  var stateList = document.getElementsByName('stateList');
  var oneState = document.querySelectorAll('.oneState'); //let value = oneState.getAttribute('value');

  var recipe = document.querySelectorAll('.recipeCard');
  var mouse = document.querySelectorAll('.mouse');
  var cookie = document.querySelectorAll('.cookie');
  var choco = document.querySelectorAll('.choco');
  var season = document.querySelectorAll('.season');
  var pan = document.querySelectorAll('.pan');
  var el = document.querySelectorAll('.el');

  if (stateList[1].checked) {
    mouse.forEach(function (item) {
      item.closest('.recipeCard').style.display = '';
    });
    cookie.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    choco.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    season.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    pan.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    el.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
  } else if (stateList[2].checked) {
    mouse.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    cookie.forEach(function (item) {
      item.closest('.recipeCard').style.display = '';
    });
    choco.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    season.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    pan.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    el.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
  } else if (stateList[3].checked) {
    mouse.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    cookie.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    choco.forEach(function (item) {
      item.closest('.recipeCard').style.display = '';
    });
    season.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    pan.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    el.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
  } else if (stateList[4].checked) {
    mouse.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    cookie.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    choco.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    season.forEach(function (item) {
      item.closest('.recipeCard').style.display = '';
    });
    pan.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    el.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
  } else if (stateList[5].checked) {
    mouse.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    cookie.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    choco.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    season.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    pan.forEach(function (item) {
      item.closest('.recipeCard').style.display = '';
    });
    el.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
  } else if (stateList[6].checked) {
    mouse.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    cookie.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    choco.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    season.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    pan.forEach(function (item) {
      item.closest('.recipeCard').style.display = 'none';
    });
    el.forEach(function (item) {
      item.closest('.recipeCard').style.display = '';
    });
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
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
var i = 1;

function addForm() {
  var input_data = document.createElement('input');
  input_data.type = 'text';
  input_data.name = 'material_' + i;
  var input_data_1 = document.createElement('input');
  input_data_1.type = 'text';
  input_data_1.name = 'volume_' + i;
  var select = document.createElement('select');
  select.name = 'unit_' + i;
  select.add(new Option("g"));
  select.add(new Option("個"));
  select.add(new Option("ml"));
  select.add(new Option("適量"));
  var parent = document.getElementById('form_area');
  parent.appendChild(input_data);
  parent.appendChild(input_data_1);
  parent.appendChild(select);
  i++;
}

document.getElementById('addInput').addEventListener('click', addForm);
/******/ })()
;
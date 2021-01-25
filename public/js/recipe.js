/******/ (() => { // webpackBootstrap
/*!********************************!*\
  !*** ./resources/js/recipe.js ***!
  \********************************/
function stateChange() {
  var stateList = document.getElementsByName('stateList');
  var oneState = document.querySelectorAll('.oneState'); //let value = oneState.getAttribute('value');

  var recipe = document.querySelectorAll('.recipeCard');

  if (stateList[1].checked) {
    console.log(recipe); // if(value === 1){
    //   recipe.forEach(item => {
    //     item.style.display = '';
    //   });
    // }else {
    //   recipe.forEach(item => {
    //     item.style.display = 'none';
    //   });
    // }
  } else if (stateList[2].checked) {} else if (stateList[3].checked) {} else if (stateList[4].checked) {} else if (stateList[5].checked) {} else if (stateList[6].checked) {} else {}
}

document.getElementsByName('stateList').forEach(function (radio) {
  radio.addEventListener('click', stateChange);
});
/******/ })()
;
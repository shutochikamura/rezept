function stateChange(){
  const stateList = document.getElementsByName('stateList');
  const oneState = document.querySelectorAll('.oneState');
//let value = oneState.getAttribute('value');
  const recipe = document.querySelectorAll('.recipeCard');

  if (stateList[1].checked){
console.log(recipe);
    // if(value === 1){
    //   recipe.forEach(item => {
    //     item.style.display = '';
    //   });
    // }else {
    //   recipe.forEach(item => {
    //     item.style.display = 'none';
    //   });
    // }

  }else if (stateList[2].checked){

  }else if (stateList[3].checked){

  }else if (stateList[4].checked){

  }else if (stateList[5].checked){

  }else if (stateList[6].checked){

  }else {

  }


}
document.getElementsByName('stateList').forEach(radio => {
radio.addEventListener('click', stateChange);
});

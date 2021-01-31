let i = 1;
const editButton = document.getElementById('editInput');
const deleteButton = document.getElementById('deleteInput');
function addForm(){
  const divElement = document.createElement('div');
  divElement.className = 'input-wrapper';
  //Materialの三つの単位を入れてる（material ,volume,unit)
  divElement.innerHTML = '<table><tr><th><input type="text" name="digit_'
  + i +'"></th><th><input type="text" name="volume_'
  + i + '"></th><td><select name="unit_'
  + i + '"><option value="1">g</option><option value="2">個</option><option value="3">ml</option><option value="4">適量</option><option value="0">削除する</option></select></td></tr></table>';

  const parent = document.getElementById('form_area');
  parent.appendChild(divElement);
  i++ ;
  let inputCount = document.getElementsByClassName('input-wrapper').length;
  if(inputCount === 50){
    editButton.disabled = true;
  }else if (inputCount === 1){
    deleteButton.disabled = false;
  }
}
function deleteForm(){
  const inputDivs = document.getElementsByClassName('input-wrapper');

  const parent = document.getElementById("form_area");
  parent.removeChild(inputDivs[inputDivs.length-1]);

  let inputCount = document.getElementsByClassName('input-wrapper').length;

  if (inputCount === 49) {
    editButton.disabled = false;  // + をクリックできるようにする。
  } else if (inputCount === 0) {
    deleteButton.disabled = true; // - をクリックできないようにする。
  }
}
editButton.addEventListener('click', addForm);
deleteButton.addEventListener('click', deleteForm);

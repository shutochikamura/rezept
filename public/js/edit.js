let i = 23000;
const editButton = document.getElementById('editInput');
const deleteButton = document.getElementById('deleteInput');
function addForm(){
  const divElement = document.createElement('div');
  divElement.className = 'input-wrapper';
  //Materialの三つの単位を入れてる（material ,volume,unit)
  divElement.innerHTML = '<input class="material-input mr-1" type="text" name="digit_'
  + i +'"><input class="volume-input mr-1" type="text" name="volume_'
  + i + '"><select class="unit-select mr-1" name="unit_'
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

function delete_alert(e){
   if(!window.confirm('本当に削除しますか？')){
      window.alert('キャンセルされました');
      return false;
   }
   document.deleteform.submit();
};
editButton.addEventListener('click', addForm);
deleteButton.addEventListener('click', deleteForm);

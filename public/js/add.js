let i = 1;
const addButton = document.getElementById('addInput');
const deleteButton = document.getElementById('deleteInput');

function addForm(){
const divElement = document.createElement("div");
divElement.className = ' input-wrapper';
divElement.innerHTML = '<input class="material-input mr-1" type="text" name="material_'
 + i +'" ><input class="volume-input mr-1" type="text" name="volume_'
 + i + '"><select class="unit-select mr-1" name="unit_'
 + i + '"><option value="1">g</option><option value="2">個</option><option value="3">ml</option><option value="4">適量</option></select>';

  const parent = document.getElementById('form_area');
  parent.appendChild(divElement);
  i++ ;
  let inputCount = document.getElementsByClassName('input-wrapper').length;
  if(inputCount === 50){
    addButton.disabled = true;
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
    addButton.disabled = false;  // + をクリックできるようにする。
  } else if (inputCount === 0) {
    deleteButton.disabled = true; // - をクリックできないようにする。
  }
}

addButton.addEventListener('click', addForm)
deleteButton.addEventListener('click', deleteForm)

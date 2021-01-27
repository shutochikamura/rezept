function stateChange(){
  const stateList = document.getElementsByName('stateList');
  const recipe = document.querySelectorAll('.recipeCard');
  const mouse = document.querySelectorAll('.mouse');
  const cookie = document.querySelectorAll('.cookie');
  const choco = document.querySelectorAll('.choco');
  const season = document.querySelectorAll('.season');
  const pan = document.querySelectorAll('.pan');
  const el = document.querySelectorAll('.el');

  if (stateList[1].checked){
    mouse.forEach(item => {
      item.closest('.recipeCard').style.display = '';
    });
    cookie.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    choco.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    season.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    pan.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    el.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });

  }else if (stateList[2].checked){
    mouse.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    cookie.forEach(item => {
      item.closest('.recipeCard').style.display = '';
    });
    choco.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    season.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    pan.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    el.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
  }else if (stateList[3].checked){
    mouse.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    cookie.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    choco.forEach(item => {
      item.closest('.recipeCard').style.display = '';
    });
    season.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    pan.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    el.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
  }else if (stateList[4].checked){
    mouse.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    cookie.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    choco.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    season.forEach(item => {
      item.closest('.recipeCard').style.display = '';
    });
    pan.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    el.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
  }else if (stateList[5].checked){
    mouse.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    cookie.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    choco.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    season.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    pan.forEach(item => {
      item.closest('.recipeCard').style.display = '';
    });
    el.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
  }else if (stateList[6].checked){
    mouse.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    cookie.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    choco.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    season.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    pan.forEach(item => {
      item.closest('.recipeCard').style.display = 'none';
    });
    el.forEach(item => {
      item.closest('.recipeCard').style.display = '';
    });
  }else {
    recipe.forEach(item => {
      item.style.display = '';
    });

  }

}
document.getElementsByName('stateList').forEach(radio => {
radio.addEventListener('click', stateChange);
});
let i = 1;
function addForm(){
  const input_data = document.createElement('input');
  input_data.type = 'text';
  input_data.name = 'material_' + i;
  const input_data_1 = document.createElement('input');
  input_data_1.type = 'text';
  input_data_1.name = 'volume_' + i;
  const select = document.createElement('select');
  select.name = 'unit_' + i;
  select.add( (new Option("g")));
  select.add( (new Option("個")));
  select.add( (new Option("ml")));
  select.add( (new Option("適量")));
  const parent = document.getElementById('form_area');
  parent.appendChild(input_data);
  parent.appendChild(input_data_1);
  parent.appendChild(select);
  i++ ;
}
document.getElementById('addInput').addEventListener('click', addForm)

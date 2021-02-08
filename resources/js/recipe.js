function stateChange(){
  const stateList = document.getElementsByName('stateList');
  const recipe = document.querySelectorAll('.recipeCard');
  const mouse = document.querySelectorAll('.mouse');
  const cookie = document.querySelectorAll('.cookie');
  const choco = document.querySelectorAll('.choco');
  const season = document.querySelectorAll('.season');
  const pan = document.querySelectorAll('.pan');
  const el = document.querySelectorAll('.el');

// ラジオボタン押した時の内部処理（displayをnoneにするためのもの）
  function mouseChoco($i1, $i2, $i3){
    mouse.forEach(item => {
      item.closest('.recipeCard').style.display = $i1;
    });
    cookie.forEach(item => {
      item.closest('.recipeCard').style.display = $i2;
    });
    choco.forEach(item => {
      item.closest('.recipeCard').style.display = $i3;
    });
  }

  function seasonEl($i4, $i5, $i6){
    season.forEach(item => {
      item.closest('.recipeCard').style.display = $i4;
    });
    pan.forEach(item => {
      item.closest('.recipeCard').style.display = $i5;
    });
    el.forEach(item => {
      item.closest('.recipeCard').style.display = $i6;
    });
  }
//ラジオボタン押した時の処理１〜６
  if (stateList[1].checked){
    mouseChoco('', 'none', 'none');
    seasonEl('none', 'none', 'none');
  }else if (stateList[2].checked){
    mouseChoco('none', '', 'none');
    seasonEl('none', 'none', 'none');
  }else if (stateList[3].checked){
    mouseChoco('none', 'none', '');
    seasonEl('none', 'none', 'none');
  }else if (stateList[4].checked){
    mouseChoco('none', 'none', 'none');
    seasonEl('', 'none', 'none');
  }else if (stateList[5].checked){
    mouseChoco('none', 'none', 'none');
    seasonEl('none', '', 'none');
  }else if (stateList[6].checked){
    mouseChoco('none', 'none', 'none');
    seasonEl('none', 'none', '');
  }else {
    recipe.forEach(item => {
      item.style.display = '';
    });

  }

}
document.getElementsByName('stateList').forEach(radio => {
radio.addEventListener('click', stateChange);
});

function delete_alert(e){
  if(!window.confirm('本当に退会しますか？レシピのデータは全て消去されます')){
     window.alert('キャンセルされました');
     return false;
  }
  document.deleteform.submit();
};

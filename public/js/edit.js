let i = 1;
function addForm(){
  const input_data_0 = document.createElement('input');
  input_data_0.type = 'hidden';
  input_data_0.name = 'digit_' + i;
  const input_data_1 = document.createElement('input');
  input_data_1.type = 'text';
  input_data_1.name = 'material_' + i;
  const input_data_2 = document.createElement('input');
  input_data_2.type = 'text';
  input_data_2.name = 'volume_' + i;
  const select = document.createElement('select');
  select.name = 'unit_' + i;
  select.add( (new Option("g")));
  select.add( (new Option("個")));
  select.add( (new Option("ml")));
  select.add( (new Option("適量")));
  const parent = document.getElementById('form_area');
  parent.appendChild(input_data_0);
  parent.appendChild(input_data_1);
  parent.appendChild(input_data_2);
  parent.appendChild(select);
  i++ ;
}
document.getElementById('editInput').addEventListener('click', addForm)

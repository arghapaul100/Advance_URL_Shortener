const textBox = document.getElementById('myInput'),
filter = document.getElementById('myInput').value.toUpperCase(),
data_container = document.getElementById('data_containers'),
boxes = data_containers.querySelectorAll('#box'),
short_url_link = document.getElementById('short_url_link'),
copy_anchor = document.getElementById('copy_anchor');

const filterDiv = () => {
	for(let i = 0; i < boxes.length; i++){
		let getVal = boxes[i].querySelector('#contents').querySelector('#head').getElementsByTagName('h4')[0].textContent;
		let short_url = boxes[i].querySelector('#contents').querySelector('#short_url').getElementsByTagName('a')[0].innerHTML;
		
		if(getVal.toUpperCase().indexOf(textBox.value.toUpperCase()) > -1 || short_url.toUpperCase().indexOf(textBox.value.toUpperCase()) > -1){
			boxes[i].style.display = '';
		}else{
			boxes[i].style.display = 'none';
		}
		// console.log(getVal);
	}
}
// filterDiv();
textBox.addEventListener('keyup',filterDiv);


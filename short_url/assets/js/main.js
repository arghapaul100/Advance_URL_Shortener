let text_box_icon_div = document.getElementById('url_link_image_for_textbox'),
text_box_text = document.getElementById('url'),
save_box_text = document.getElementById('txt_generated_url'),
qr_code = document.getElementById('qr_code'),
title_text_box = document.getElementById('url_title'),
copy_icon = document.getElementById('fa-copy'),
alert = document.getElementById('alert');


let domain = 'localhost/short_url/?u=';
let random = "";
let tl = gsap.timeline();

tl.from("#outer", {scale:1.5, opacity:0, duration: 0.5});

let popupIn = gsap.timeline({paused:true});
popupIn.from("#popup_modal",{scale:0, duration:0.2});


text_box_text.addEventListener('keyup',() => {
	let text_box_text_value = text_box_text.value;
	$.ajax({
		url : 'index.php/getFavicon',
		type : 'post',
		data : 'data='+text_box_text_value,
		success : function(data){
			if(data == 0){
				text_box_icon_div.innerHTML = null;
				text_box_icon_div.innerHTML = "<i class='fas fa-link link' id='fa-link'></i>";
			}else{
				$(qr_code).css('background-image',"url('https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl="+text_box_text.value+"&choe=UTF-8%22')");
				fetchUrl(data);

			}
		}
	})
})

const message = (type) => {
	if(type == 'error'){
		$(alert).removeClass('alert-success');
		$(alert).addClass('alert-danger');
		alert.innerHTML = null;
		alert.innerHTML = "<strong>Error : </strong>This URL is already exist. We highly recomend you to use our generated url.";
	}else{
		$(alert).removeClass('alert-danger');
		$(alert).addClass('alert-success');
		alert.innerHTML = null;
		alert.innerHTML = "<strong>Error : </strong>URL saved successfuly.";
	}
}


const fetchUrl = (data) => {
	text_box_icon_div.innerHTML = null;
	text_box_icon_div.innerHTML = "<div id='text_box_url_favicon' class='animate__animated animate__bounceIn'></div>";
	let favion_background = document.getElementById("text_box_url_favicon");
	let favicon_image = "https://www.google.com/s2/favicons?sz=64&domain_url="+data;
	console.log(favicon_image);
	$(favion_background).css('background-image',"url("+favicon_image+")");	
}

const getShortUrl = () => {
	$.ajax({
		url:'index.php/shortLink',
		type:'post',
		success:function(res){
			$(title_text_box).focus();
			save_box_text.value = domain + res;
			random = res;
		}
	})
}

const insertData = (full_url,short_url,title) => {
	let data = {
		original_url : full_url,
		dummy_url : short_url,
		url_title : title,
	}
	$.ajax({
		url : 'index.php/insert',
		type: 'post',
		data : {original_url : data.original_url, short_url : data.dummy_url, title : data.url_title},
		success:function(res){
			if(res == 0){
				message('error');
			}else{
				message('success');
				location.reload();
			}
		}
	})
}
$('form[name=myForm1]').on('submit',function(e){
	e.preventDefault();
	getShortUrl();
	$('#popup_modal').css('display','block');
	e.preventDefault();
	if(popupIn.play()){
		$('#outer').addClass('blur');
	}
})


$('form[name=myForm2]').on('submit',function(e){
	e.preventDefault();
	insertData(text_box_text.value, save_box_text.value ,title_text_box.value);
})

$(document).mouseup(function (e) {
    if ($(e.target).closest("#popup_modal").length=== 0) {
    	$('#popup_modal').css('display','none');
        $("#popup_modal").hide();
        $('#outer').removeClass('blur');
    }
});

$(copy_icon).click(function(){
	save_box_text.select();
	document.execCommand('copy');
	window.getSelection().removeAllRanges();
})









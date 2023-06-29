var i = 0;
var images =[];
var time = 3000;

/*image list*/
images[0] = 'homagama/homagama1.jpeg';
images[1] = 'kegalla/kegalla1.jpg';
images[2] = 'millaniya/millaniya3.jpg';
images[3] = 'elite destiny/destiny1.jpg';
images[4] = 'elite destiny/destiny6.jpg';
images[5] = 'homagama/homagama5.jpg';
images[6] = 'kegalla/kegalla5.jpg';

/*change image*/
function changeImg(){
	document.slide.src = images[i];

	if(i < images.length - 1)
	{
		i++;
	}
	else
	{
		i=0;
	}
	setTimeout("changeImg()" , time);
}

window.onload = changeImg;
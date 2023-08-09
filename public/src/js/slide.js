var img = [];
for(var i = 1; i <=6; i++){
    img[i] = new Image();
    img[i].src = "./src/slide/image/img"+i+".jpg";
}
var index = 0;
function before(){
    index--
    if(index < 0){
        index = img.length-1;
    }
    image.src = img[index].src
}
function after(){
    index++
    if(index > img.length-1){
        index = 1;
    }
    image.src = img[index].src
}

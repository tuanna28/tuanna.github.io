const qrElement = document.querySelector("#debit");
const showQR = function (){
    qrElement.checked = true;
    if (qrElement.checked){
        qrImg = document.querySelector("#qrcode");
        qrImg.style.display = "inline-block";
    }
}
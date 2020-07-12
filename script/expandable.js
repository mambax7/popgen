var ie4 = false;
var display = '[+]';
var hide    = '[-]';

if(document.all) { ie4 = true; }

function getObject(id)
 {
     if (ie4) { return document.all[id]; } else { return document.getElementById(id); }
 }

function toggle(link, divId) {
     var lText = link.innerHTML; var d = getObject(divId);
     if (lText == display) {
      link.innerHTML = hide;
      d.style.display = 'block';
     } else {
      link.innerHTML = display;
      d.style.display = 'none';
     } 
}

function SelectIt(Code){
  if (Code.value=="") {
     alert('There is nothing to copy, dude!')
   }else{
     Code.focus();
     Code.select();
     if (document.getElementById("1")){
        Code.createTextRange().execCommand("Copy");
     }
   }
}

function showImgSelected(imgId, selectId, imgDir, extra, xoopsUrl) {
	if (xoopsUrl == null) {
		xoopsUrl = "./";
	}
	imgDom = xoopsGetElementById(imgId);
	selectDom = xoopsGetElementById(selectId);
	imgDom.src = xoopsUrl + "/"+ imgDir + "/" + selectDom.options[selectDom.selectedIndex].value + extra;
}
/*
function checkUncheckAll(theElement) {
  var theForm = theElement.form, z = 0;
  for(z=0; z<theForm.length;z++){
    if(theForm[z].type == "checkbox" && theForm[z].name != "checkall"){
                       theForm[z].checked = theElement.checked;
    }
  }
}
*/

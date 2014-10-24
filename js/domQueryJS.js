// todo: get the main header element by id
var mainHeader = document.getElementById('main-header');
// todo: set inner html of mainHeader to "JavaScript is Cool"
var cool = function(event) {
       mainHeader.innerHTML = "JavaScript is Cool"; 
}
var btn1 = document.getElementById('btnCool');
btn1.addEventListener('click', cool, false);
// todo: get the sub header element by id
var subHeader = document.getElementById('sub-header');

// todo: set the text color of subHeader to blue
var blue = function(event) {
      subHeader.style['color'] = 'blue';  
}
var btnBlue = document.getElementById('btnHello');
btnBlue.addEventListener('click', blue, false);
// todo: get all list items
var listItems = document.getElementsByTagName('li');


// todo: set text color on every other list item to grey
// todo: set text color of li with dbid = 1 to blue
for(var i = 0; i < listItems.length; i++) {
        var dbId = listItems[i].attributes['data-dbid'].value;
        console.log(dbId);
        if(dbId == 1) {
                listItems[i].style['color'] = 'blue';
        }
        else {
                listItems[i].style['color'] = 'grey';
        }
}

var orange = function(event) {
        subHeader.style['color'] = 'orange';
}
var orangeButton = document.getElementById('btnOrange');
orangeButton.addEventListener('click', orange, false);

var subParagraph = document.getElementsByClassName('sub-paragraph');
// todo: get all elements with class name sub-paragraph
var mission = function(event) {
        subParagraph[0].innerHTML = "Mission Accomplished!";
}
var btnAccomp = document.getElementById('btnMission');
btnAccomp.addEventListener('click', mission, false);

// todo: change the text in the first sub paragraph to "Mission Accomplished!"

// todo: get the main header element by id
var mainHeader = document.getElementById('main-header');

// todo: set inner html of mainHeader to "JavaScript is Cool"
mainHeader.innerHTML = "JavaScript is Cool";
console.log(mainHeader.innerHTML);
// todo: get the sub header element by id
var subHeader = document.getElementById('sub-header');

// todo: set the text color of subHeader to blue
subHeader.style['color'] = 'blue';
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

        // var db1 = document.getElementsByTagName('li')[0];
        // db1.style['color'] = 'blue';

        // var dbList = document.getElementsByTagName('li')[1];
        // dbList.style['color'] = 'grey';

//         // var dbList = document.getElementsByTagName('li');
//         // console.log(dbList);
}


// todo: get all elements with class name sub-paragraph
var subParagraph = document.getElementsByClassName('sub-paragraph');

// todo: change the text in the first sub paragraph to "Mission Accomplished!"
subParagraph[0].innerHTML = "Mission Accomplished!";
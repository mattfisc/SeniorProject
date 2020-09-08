
// SEARCH WORD IN QUERY 
// INPUT VALIDATED BY REGULAR EXPRESSION

function searchforbook(){
    var text = '';
    var state = 1;// ERROR STATE

    // GET TITLE AND VALIDATE
    if(document.getElementById("title_input").value.length != ""){
        var word = document.getElementById("title_input").value.toLowerCase();
        if(!/[^a-z ]/.test(word))// ERROR TITLE... LETTERS ONLY
            text += 'title='.concat(word);
        else
            state = -1;
    }

    // GET AUTHOR AND VALIDATE
    if(document.getElementById("author_input").value != ""){
        var word = document.getElementById("author_input").value.toLowerCase();
        if(!/[^a-z ]/.test(word))// ERROR AUTHOR.. LETTERS ONLY
            text += '&author='.concat(word);
        else
            state = -2;
    }
    

    // GET ISBN AND VALIDATE
    if(document.getElementById("isbn_input").value.length != ""){
        var word = document.getElementById("isbn_input").value;
        if(!/[^0-9]/.test(word))// ERROR ISBN...NUMBERS ONLY
            text += '&isbn='.concat(word);
        else
            state = -3;
    }
 

    // GET LOCATION AND VALIDATE
    if(document.getElementById("location_input").value.length != ""){
        var word = document.getElementById("location_input").value.toLowerCase();
        if(!/[^a-z ]/.test(word))// ERRORS LOCATION.. LETTERS ONLY
            text += '&location='.concat(word);
        else
            state = -4;
    }

    
    // OUTPUTS DISPLAYED
    errorOuput(state);
    
    // SEARCH WITH INPUT
    if(text != ""){
        var xml_str = "booklist.php?".concat(text);

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            // NO ERRORS
            if(this.readyState == 4 && this.status == 200){
                // CREATE ARRAY of BOOK OBJECT
                createList(this.responseText);
                
            }
        }

        xhr.open("GET",xml_str, true); 
        xhr.send();
    }
    

}

// DISPLAY ERROR
function errorOuput(state){
    // ERROR
    switch(state){
        case -1:
            window.alert("ERROR Title... no numbers or symbols allowed");
            break;
        case -2:
            window.alert("ERROR Author name... no numbers or symbols allowed");
            break;
        case -3:
            window.alert("ERROR ISBN... numbers ONLY.  Do not include: dashes, spaces, or any symbols");
            break;
        case -4:
            window.alert("ERROR University name... no numbers or symbols allowed");
            break;
        default:
            // NO ERROR
    }
}




// working
// CREATING BOOK LIST
function createList1(s){
    // IF NO ERRORS
    //var jsonobj = JSON.parse(s);// single objects
    // PARSE STRING OF MULTIPLE JSON OBJECTS
    var res = JSON.parse('[' + str.replace(/}{/g, '},{') + ']');

    var table = document.getElementById("booklist");
    var row = document.createElement

    var strBuilder = [];


    for(key in jsonobj) {
        if (jsonobj.hasOwnProperty(key)) {
            strBuilder.push("Key is " + key + ", value is " + jsonobj[key] + "\n");
        }
    }
    
  
    console.log(strBuilder.join(""))

    
}
function createList(str){
    // PARSE STRING OF MULTIPLE JSON OBJECTS
    var res = JSON.parse('[' + str.replace(/}{/g, '},{') + ']');

    // GET ELEMENT
    var table = document.getElementById("booklist");

    // SEARCH JSONOBJECT ARRAY
    for (let i = 0; i < res.length; i++) {
        // CREATE TABLE ELEMENTS
        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);

        // SELECT JSON OBJECT
        const jsonObj = res[i];

        var leftstr = "";
        var rightstr = "<ul>";

        // SEARCH JSON OBJECT
        for(key in jsonObj) {
            
            if("".concat(key).valueOf == "picture_loc".valueOf){
                leftstr = jsonObj[key];
            }
            else{
                // rightstr.push("Key is " + key + ", value is " + jsonObj[key] + "\n");
                
                rightstr = rightstr.concat( "<li>");
                console.log(jsonObj.hasOwnProperty('title'));
                rightstr = rightstr.concat( jsonObj[key] );
                rightstr = rightstr.concat( "</li>");
            }
            
        }
        // ADD TEXT TO CELLS
        cell1.innerHTML = leftstr; 

        rightstr = rightstr.concat("</ul>");
        console.log(rightstr);
        cell2.innerHTML = rightstr;
    }
}


function createList2(str){
    //var jsonobj = JSON.parse(str);// single objects

    // PARSE STRING OF MULTIPLE JSON OBJECTS
    var res = JSON.parse('[' + str.replace(/}{/g, '},{') + ']');
    // GET ELEMENT
    var table = document.getElementById("booklist");
    // ARRAY OF JSON OBJECTS
    for (let i = 0; i < res.length; i++) {

        // CREATE TABLE ELEMENTS
        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);

        // SELECT JSON OBJECT
        const jsonObj = res[i];

        var leftstr = jsonObj[i]["picture_loc"];
        
        var rightstr = "<ul>".concat(
            "<li>", jsonObj[i]["title"],"</li>",
            "<li>", jsonObj[i]["author"],"</li>",
            "<li>", jsonObj[i]["isbn"],"</li>",
            "<li>", jsonObj[i]["location"],"</li>","</ul>");

        
        
        // Add some text to the new cells:
        cell1.innerHTML = leftstr; 
        
        
        console.log(rightstr);
        cell2.innerHTML = rightstr;
        
  
    }
    // rightstr.push("Key is " + key + ", value is " + jsonObj[key] + "\n");
    // console.log(strBuilder.join(""))  
}

//SESSION ID
var userId;
// CONVERSATION LISTS
var conversations_list = [];

/**
 * Conversation class
 */
class Conversation{

    constructor(user1,user2,bookId){
        this.user1 = user1;
        this.user2 = user2;
        this.bookId = bookId;
        this.picture = "";
        // ARRAY OF MESSAGE OBJECTS
        this.message_list = [];
    }

    
    
}


// FIND CONVERSATION
function findConversation(user1,user2,bookId){
    for (let index = 0; index < conversations_list.length; index++) {
        const element = conversations_list[index];
        // USER1 IS IN CONVERSATION
        if(element.user1 == user1 || element.user1 == user2){
            // USER2 IS IN CONVERSATION
            if(element.user2 == user1 || element.user2 == user2){
                if(element.bookId == bookId){
                    return element;
                }
            }
        }
    }
    return null;
}

window.onload = function get_conversations(){
    var xml_str = "../message_feature/requestConversations.php";

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        // NO ERRORS
        if(this.readyState == 4 && this.status == 200){
            // CREATE ARRAY of BOOK OBJECT
            set_buyer_list(this.response);
            
        }
    }

    xhr.open("GET",xml_str, true); 
    xhr.send();
}



function set_buyer_list(str){
    // EMPTY OLD SEARCH LIST
    emptyList();

    // PARSE JSON
    var res = JSON.parse('[' + str.replace(/}{/g, '},{') + ']');
    var array = res[0];

    // GET YOUR USERNAME
    userId = array[0];


    for (let i = 1; i < array.length; i++) {
        // GET ONE MESSAGE
        const elem = JSON.parse(array[i]);
   
        // CREATE MESSAGE OBJECT
        const message = new Message(elem.recieverId, elem.senderId, elem.message_text,
            elem.timestamp, elem.bookId, elem.id);

        const conv = findConversation(message.recieverId,message.senderId,message.bookId);
        if(conv == null){
            // CREATE NEW CONVERSATION
            const conversation = new Conversation(message.recieverId,message.senderId,message.bookId);
            // ADD MESSAGE TO MESSAGE ARRAY
            conversation.message_list.push(message);
            get_picure(conversation);
            // ADD TO LIST GLOBAL LIST
            conversations_list.push(conversation);
            
        }
        else{
            // ADD MESSAGE TO ALREADY CREATED CONVERSATION
            conv.message_list.push(message);
        }       
    }
}

function displayMessages(conversation_obj){
    // DISPLAY CONVERSATIONS
    var div = document.getElementById("output");



    var bookId = document.createElement('p');
    var senderId = document.createElement('h3');
    //var reciever = document.createElement('h3');
    var text_message = document.createElement('p');
    var time_stamp = document.createElement('p');

    const obj = conversation_obj.message_list;

    bookId.innerHTML = obj.bookId;
    senderId.innerHTML = obj.senderId;
    //reciever.innerHTML = obj.recieverId;
    text_message.innerHTML = obj.message;
    time_stamp.innerHTML = obj.time_stamp;
    

    //COL ONE

    // GET BOOK
    div.appendChild(bookId);


    // COL TWO

    div.appendChild(senderId);  
    //div.appendChild(reciever);  
    div.appendChild(text_message);  
    div.appendChild(time_stamp); 
    
    
        


        
    
}

function clear(){
    // EMPTY OBJECT LIST
    conversations_list = [];

    // EMPTY TABLE IN HTML
    var el = document.getElementById("output");
    el.innerHTML = "";
}

function displayConversations(){



    var div = document.getElementById('output');
    // CLEAR
    div.innerHTML = "";


    
    
    for (let index = 0; index < conversations_list.length; index++) {
        const element = conversations_list[index];


        // DIV DETAILS
        var row = document.createElement('div');
        row.className = "conversation text-center";
        row.className = "row";

        // CREATE DIV AND CLASS SIZE BOOTSTRAP

        // LEFT COL
        var leftcol = document.createElement('div');
        leftcol.className = "col-xs-12 col-sm-12 col-md-4 col-xl-4";
        leftcol.style = "text-shadow: 2px 2px black";

        // RIGHT COL
        var rightcol = document.createElement('div');
        rightcol.className = "col-xs-12 col-sm-12 col-md-4 col-xl-4";
        rightcol.style = "text-shadow: 2px 2px black";
        

        // CREATE IMAGE
        var img = document.createElement('img');
        var pic_loc = element.picture;
        var str =  "../upload/".concat( pic_loc );
        img.src = str;
        // LEFT COL
        leftcol.appendChild(img);
        row.appendChild(leftcol);
        

        // RIGHT COL
        // CONVERSATION INFORMATION
        var button = document.createElement('button');
        button.innerHTML = "CLICK CHAT";
        rightcol.appendChild(button);
        //button.onclick = displayMessages();
        
        row.appendChild(rightcol);
        div.appendChild(row);
    }

}


function get_picure(obj){
    var xml_str = "../message_feature/get_picture.php?bookId=".concat(obj.bookId);

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        // NO ERRORS
        if(this.readyState == 4 && this.status == 200){
            obj.picture = (this.responseText);
        }
    }

    xhr.open("GET",xml_str, true); 
    xhr.send();
}


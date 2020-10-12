
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
        
        // ARRAY OF MESSAGE OBJECTS
        this.message_list = [];
    }

    to_string(){
        var str = "";
        for (let i = 0; i < message_list.length; i++) {
            const el = array[i];
            str += "message: ".concat(el.senderId,el.recieverId,el.message_text,el.timestamp,"\n");
            
        }
        return str;
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

            // ADD TO LIST GLOBAL LIST
            conversations_list.push(conversation);
            
        }
        else{
            // ADD MESSAGE TO ALREADY CREATED CONVERSATION
            conv.message_list.push(message);
        }       
        
    }
    
}

function displayMessages(){
    // DISPLAY CONVERSATIONS
    var div = document.getElementById("output");

    for (let index = 0; index < conversations_list.length; index++) {

        const list = conversations_list[index].message_list;

        for (let i = 0; i < list.length; i++) {

            var bookId = document.createElement('p');
            var senderId = document.createElement('h3');
            //var reciever = document.createElement('h3');
            var text_message = document.createElement('p');
            var time_stamp = document.createElement('p');

            const m = list[i];

            bookId.innerHTML = m.bookId;
            senderId.innerHTML = m.senderId;
            //reciever.innerHTML = m.recieverId;
            text_message.innerHTML = m.message;
            time_stamp.innerHTML = m.time_stamp;
            

            //COL ONE

            // GET BOOK
            div.appendChild(bookId);


            // COL TWO

            div.appendChild(senderId);  
            //div.appendChild(reciever);  
            div.appendChild(text_message);  
            div.appendChild(time_stamp); 
            
        }
        


        
    }
}

function emptyList(){
    // EMPTY OBJECT LIST
    conversations_list = [];

    // EMPTY TABLE IN HTML
    var el = document.getElementById("display");
    el.innerHTML = "";
}

function displayConversations(){
    var div = document.getElementById('output');

    var list = document.createElement('ul');
    
    for (let index = 0; index < conversations_list.length; index++) {
        const element = conversations_list[index];

        
        
    }

}

//-----------------------------CONVERSATION------------------------
var userId;
// CONVERSATION LISTS
var conversations_list = [];

/**
 * Conversation class
 */
class Conversation{

    constructor(user,bookId){
        this.user = user;
        this.bookId = bookId;
        
        var message_list = [];
    }
    
}

function get_conversations(){
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


    for (let a = 1; a < array.length; a++) {
        const elem = JSON.parse(array[a]);
   
        const message = new Message(elem.recieverId, elem.senderId, elem.message_text,
            elem.timestamp, elem.bookId, elem.id);



    
        const conversation = new Conversation(message.senderId,message.bookId);
        
        // here --------------------------------
        
        
    }
    
    
    //DISPLAY
    displayList();
}

function displayList(){

    var el = document.getElementById("conversationList");
    for (let index = 0; index < your_conversations.length; index++) {
        var aTag = document.createElement('a');


        var linkText = document.createTextNode("your_conversations[index]");
        aTag.innerHTML(linkText);
        aTag.title = "my title text";
        aTag.href = "messageboard.php";

        el.appendChild(aTag);
        console.log(your_conversations[index]);
        
    }
}

function emptyList(){
    // EMPTY OBJECT LIST
    your_conversations = new Array();

    // EMPTY TABLE IN HTML
    var el = document.getElementById("conversationList");
    el.innerHTML = "";
}

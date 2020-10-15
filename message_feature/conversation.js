
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
    div.className = "";
    // CLEAR
    div.innerHTML = "";

    // NEW ROW
    var row = document.createElement('div');


    // GET IMAGE
    var img = document.createElement('img');
    var pic_loc = conversation_obj.picture;
    var str =  "../upload/".concat( pic_loc );
    img.src = str;
    row.appendChild(img);
    div.appendChild(row);

    // SECOND ROW
    var row1 = document.createElement('div');

    // LEFT COL
    var leftcol = document.createElement('div');
    leftcol.className = "col-xs-12 col-sm-8 col-md-4 col-xl-4";

    // RIGHT COL
    var rightcol = document.createElement("div");
    rightcol.className = "col-xs-12 col-sm-8 col-md-4 col-xl-4 text-right text-light ";

    // CREATE TITLE
    var sender = document.createElement('h3');
    var reciever = document.createElement('h3');

    // RIGHT SIDE USERID IS SENDER
    if(conversation_obj.user1 == userId){
        sender.innerHTML = "YOU";
        reciever.innerHTML = "BOOK OWNER";
        leftcol.appendChild(reciever);
        rightcol.appendChild(sender);
    }
    else{
        sender.innerHTML = "BOOK OWNER";
        reciever.innerHTML = "YOU";
        leftcol.appendChild(sender);
        rightcol.appendChild(reciever);
    }
    
    
    

    // ADD TITLES
    row1.appendChild(leftcol);
    row1.appendChild(rightcol);
    div.appendChild(row1);


    // GET MESSAGE LIST FROM CONVERSATION
    const m_list = conversation_obj.message_list;

    for (let i = 0; i < m_list.length; i++) {
        // CREATE HTML ELEMENTS
        var row3 = document.createElement('div');
        row3.className = "col-xs-12 col-sm-12 col-md-4 col-xl-4";
    

        // if you are sender right align
        if(m_list[i].senderId == userId){
            row3.className = "col-xs-12 col-sm-12 col-md-8 col-xl-8 bg-info text-right text-light";
        }
        else{
            row3.className = "col-xs-12 col-sm-12 col-md-8 col-xl-8  bg-secondary";
        }

        var text = document.createElement('h3');
        var date = document.createElement('p');

   
        // SET TO ROW
        text.innerHTML = m_list[i].text_message;
        date.innerHTML = m_list[i].time_stamp;
        

        //COL ONE
        // GET BOOK
        row3.appendChild(text);   
        row3.appendChild(date);  
        // ADD ROW
        div.appendChild(row3);   

    }

    // MESSAGE DIV----------------------------
    var div_form = document.createElement('div');
    div_form.className = "text-center";
    div_form.setAttribute("id", "focus");

    // CREATE MESSAGE FORM
    var form = document.createElement("form");

    form.method = "POST";
    form.action = "../message_feature/create_message.php";

    var message = document.createElement("input");  
    message.name = "message";
    form.appendChild(message);

    // SEND RECIEVER ID
    var r = document.createElement('input');
    r.type = 'hidden';
    r.setAttribute("name", "reciever");
    if(conversation_obj.user1 == userId)
        r.value = conversation_obj.user2;
    else
        r.value = conversation_obj.user1;
    form.appendChild(r);

    // SEND BOOK ID
    var bookId = document.createElement('input');
    bookId.type = 'hidden';
    bookId.setAttribute("name", "bookId");
    bookId.value = conversation_obj.bookId;
    form.appendChild(bookId);

    // ADD SUBMIT BUTTON
    var btnsubmit = document.createElement("button"); 
    btnsubmit.innerHTML = "submit message";
    btnsubmit.name = "submit-message";
    form.appendChild(btnsubmit);

    // ADD TO FORM
    div_form.appendChild(form);
    div.appendChild(div_form);


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
        var btn = document.createElement('button');
        var a = document.createElement('a');
        a.href = "member.php#focus";
        a.innerHTML = "CLICK CHAT";
        btn.appendChild(a);
        btn.onclick = function(){
            displayMessages(element);
            
        };
        rightcol.appendChild(btn);
        
        
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


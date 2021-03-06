// GLOBAL USER
var userId;

// CONVERSATION LISTS
var conversations_list = [];

/**
 * Conversation class
 */
class Conversation{

    constructor(user1,user2,bookId){

        this.user1 = user1;
        this.username1 = "";

        this.user2 = user2;
        this.username2 = "";

        this.bookId = bookId;
        this.picture = "";
        this.booktitle = "";
        // ARRAY OF MESSAGE OBJECTS
        this.message_list = [];

        this.bookTrue = true;
    }
}


// FIND CONVERSATION
function findConversation(user1,user2,bookId){
    console.log(bookId);
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
    var xml_str = "../message_feature/request_conversations.inc.php";

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        // NO ERRORS
        if(this.readyState == 4 && this.status == 200){
            // CREATE ARRAY of BOOK OBJECT

            var str = this.responseText;
            if(str == 0)
                document.getElementById('title').innerHTML = "You do not have any Conversations";
            else
                set_buyer_list(str);
            
            
        }
    }

    xhr.open("GET",xml_str, true); 
    xhr.send();
}



function set_buyer_list(str){
    // CLEAR LIST
    conversations_list = [];

    // PARSE JSON
    var res = JSON.parse('[' + str.replace(/}{/g, '},{') + ']');
    var array = res[0];

    // GET YOUR GLOBAL USERNAME
    userId = array[0];

    // LIST OF MESSAGES
    for (let i = 1; i < array.length; i++) {
        // GET ONE MESSAGE
        const elem = JSON.parse(array[i]);
   
        // TEMP MESSAGE OBJECT
        const message = new Message(elem.recieverId, elem.senderId, elem.message_text,
            elem.timestamp, elem.bookId, elem.id);
        
        const conv = findConversation(message.recieverId,message.senderId,message.bookId);
        if(conv == null){
            // CREATE NEW CONVERSATION
            const conversation = new Conversation(message.recieverId,message.senderId,message.bookId);
            
            // SET CONVERSATION NAMES
            get_username_by_id(conversation);

            // ADD MESSAGE TO MESSAGE ARRAY
            conversation.message_list.push(message);

            // ADD PICTURE TO CONVERSATION
            get_picure(conversation);

            // ADD TO LIST GLOBAL LIST
            conversations_list.push(conversation);

            // BOOK IS NULL CHECK : NULL = 0
            is_book_null(conversation);

            get_book_title(conversation);
        }
        else{
            // ADD MESSAGE TO ALREADY CREATED CONVERSATION
            conv.message_list.push(message);
        }       

     
    }
}

function displayMessages(conversation_obj){
    console.log(conversation_obj.user1);
    console.log(conversation_obj.username1);
    console.log(conversation_obj.user2);
    console.log(conversation_obj.username2);

    console.log(conversation_obj.bookId);
    console.log(conversation_obj.booktitle);

    clear();
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
    img.id = "img";

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
        reciever.innerHTML = conversation_obj.user2;
        leftcol.appendChild(reciever);
        rightcol.appendChild(sender);// USER
    }
    else{
        sender.innerHTML = conversation_obj.user2;
        reciever.innerHTML = "YOU";
        leftcol.appendChild(sender);
        rightcol.appendChild(reciever);// USER
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
    form.action = "../message_feature/create_message.inc.php";

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
    
    console.log(conversation_obj.bookId);
   
    bookId.setAttribute("name", "bookId");
    bookId.value = conversation_obj.bookId;
    //console.log(conversation_obj.bookId);
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
    // EMPTY TITLE
    var title = document.getElementById("title");
    title.innerHTML = "";
    // EMPTY TABLE IN HTML
    var table = document.getElementById("myTable");
    table.innerHTML = "";
    // EMPTY DIV
    var div = document.getElementById("output");
    div.innerHTML = "";
}

function displayConversations(){
    // CLEAR
    clear();

    var div = document.getElementById('output');

    for (let index = 0; index < conversations_list.length; index++) {
        const element = conversations_list[index];

        
        // DIV DETAILS
        var row = document.createElement('div');
        row.className = "conversation text-center";
        row.className = "row";

        // CREATE DIV AND CLASS SIZE BOOTSTRAP

        // LEFT COL
        var leftcol = document.createElement('div');
        leftcol.className = "col-xs-12 col-sm-6 col-md-6 col-xl-6 bg-light text-dark";

        // RIGHT COL
        var rightcol = document.createElement('div');
        rightcol.className = "col-xs-12 col-sm-6 col-md-4 col-xl-4 ";
        
        // TITLE STRING
        var node = document.createTextNode(element.booktitle);
        node.className = "";
        // CREATE IMAGE
        var img = document.createElement('img');
        var pic_loc = element.picture;
        var str =  "../upload/".concat( pic_loc );
        img.src = str;
        img.id = "img";

        // LEFT COL
        leftcol.appendChild(img);
        leftcol.appendChild(node);
        row.appendChild(leftcol);
        

        // RIGHT COL
        // CONVERSATION INFORMATION
        var btn = document.createElement('button');
        btn.className = "bg-dark ";
        var a = document.createElement('a');
        a.className = "text-light";
        a.href = "member.php#focus";
        a.innerHTML = "Click Chat";
       
        btn.appendChild(a);
       
        // BOOK IS NULL
        if(element.bookId == 0){
            a.innerHTML = "Book is Deleted";
        }
        else{
            btn.onclick = function(){
                
                
                displayMessages(element);
                
            };
        }
        btn.appendChild(a);
        rightcol.appendChild(btn);

        // DELETE CONVERSATION BUTTON
        var del = document.createElement('button');
        del.className = "bg-dark text-light";

        del.innerHTML = "Delete Conversation";
        del.onclick = function(){
            delete_conversation(element);
        }
        rightcol.appendChild(del);
        
        // ADD RIGHT
        row.appendChild(rightcol);
        div.appendChild(row);
    }
}


function get_picure(obj){
    var xml_str = "../message_feature/get_picture.inc.php?bookId=".concat(obj.bookId);

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

function is_book_null(book){
    
    var xml_str = "../message_feature/get_book_by_bookId.inc.php?bookId=".concat(book.bookId);

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        // NO ERRORS
        if(this.readyState == 4 && this.status == 200){
            book.bookTrue = (this.responseText);
        }
    }

    xhr.open("GET",xml_str, true); 
    xhr.send();
}

function delete_conversation1(element){
    
    var xml_str = "../message_feature/delete_conversation.inc.php?".concat(
        "user1=",element.user1,
        ",user2=",element.user2,
        ",bookId=",element.bookId);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        // NO ERRORS
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
        }
    }

    xhr.open("GET",xml_str, true); 
    xhr.send();
}

function delete_conversation(convList){
    var mess_list = [];

    // GET ALL MESSAGE ID'S
    for (let index = 0; index < convList.message_list.length; index++) {
        const element = convList.message_list[index];
        mess_list.push(element.messageId);
    }

    var json = JSON.stringify(mess_list);

    var xml_str = "../message_feature/delete_conversation.inc.php?".concat("data=",json);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        // NO ERRORS
        if(this.readyState == 4 && this.status == 200){
            window.location.replace("../member_feature/member.php?success=conversationdeleted");
        }
    }

    xhr.open("GET",xml_str, true); 
    xhr.send();
}

function get_book_title(conversation){
    var xml_str = "../message_feature/get_book_title.inc.php?bookId=".concat(conversation.bookId);

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        // NO ERRORS
        if(this.readyState == 4 && this.status == 200){
            conversation.booktitle = this.responseText;
        }
    }

    xhr.open("GET",xml_str, true); 
    xhr.send();
}

function get_username_by_id(conversation){
    var xml_str = "../message_feature/get_user_by_id.php?id=".concat(conversation.user1);

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        // NO ERRORS
        if(this.readyState == 4 && this.status == 200){
            var str = this.responseText;
            // console.log( typeof str);
            // console.log(str);
            conversation.username1 = this.responseText;
        }
    }

    xhr.open("GET",xml_str, true); 
    xhr.send();

    var xml_str = "../message_feature/get_user_by_id.php?id=".concat(conversation.user2);

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        // NO ERRORS
        if(this.readyState == 4 && this.status == 200){
            // console.log(this.responseText);
            conversation.username2 = this.responseText;
        }
    }

    xhr.open("GET",xml_str, true); 
    xhr.send();
}
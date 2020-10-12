class Message {
  
    constructor(recieverId,senderId,text_message,time_stamp,bookId,messageId){

        //id
        this.recieverId = recieverId;
        this.senderId = senderId;

        // array
        this.text_message = text_message;

        // timestamp
        this.time_stamp = time_stamp;
        // book id
        this.bookId = bookId;

        this.messageId = messageId;
    }

    get_message(){
        return this.message;
    }

    set_message(message){
        this.message = message;
    }
}



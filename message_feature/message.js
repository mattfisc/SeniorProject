class Message {
  
    constructor(recieverId,senderId,message,time_stamp,bookId,messageId){

        //id
        this.recieverId = recieverId;
        this.senderId = senderId;

        // array
        this.message = message;

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



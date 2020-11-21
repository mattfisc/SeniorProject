window.onload = function(){
    // IMAGE
    var left = document.getElementById('leftcol');
    var img = document.createElement('img');
    img.id = 'img';
    img.src = "../upload/".concat(localStorage['picture']);
    left.appendChild(img);

    var list = [localStorage['title'],localStorage['author'],localStorage['isbn'],localStorage['location'],localStorage['description']];

    for (let index = 0; index < list.length; index++) {
        const element = list[index];
        var node = document.createElement("li");                
        var textnode = document.createTextNode(element);         
        node.appendChild(textnode);                              
        document.getElementById("myList").appendChild(node);   
    }  

    document.getElementById('reciever').value = localStorage['bookowner'];
    document.getElementById('bookId').value = localStorage['id'];

}
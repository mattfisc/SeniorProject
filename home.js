window.onload = function(){

    const profile = new User_Member();
    // SET NAME TO NAV BAR
    var element = document.getElementById("pName").innerHTML = "Guest";
}


class User_Member{

    constructor(name){
        if(name = null)
            this.name = "Guest";
        else
            this.name = name;
    }
    // 

    // Getter profile
    getProfileName(){
        return this.name;
    }

    // setter profile
    setProfileName(name){
        this.name = name;
    }

}
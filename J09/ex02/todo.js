window.onload = function () {
    const ft_list = document.getElementById("ft_list");
    document.getElementById("new").addEventListener("click", newClick);
    var tmp = document.cookie;
    if (tmp) {
        cookie = JSON.parse(tmp);
        cookie.forEach(function (e) {
            addTodo(e);
        });
    }   
};

window.onunload = function () {
       saveCook(); 
}

function saveCook () {
    var tab = ft_list.childNodes;
    var Cookie = [];
    for (var i = 0; i < tab.length; i++) {
        console.log(tab[i]);
        Cookie.unshift(tab[i].innerHTML);
    }
    document.cookie = JSON.stringify(Cookie.reverse());
}

function newClick () {
    const userToDo = prompt("What ToDoom ?", "Write what Tout Doux");
    addTodo(userToDo);
}

function addTodo (userToDo) {
    const newDiv = document.createElement("div");
    const newContent = document.createTextNode(userToDo);
    newDiv.appendChild(newContent);
    if (newDiv.innerHTML) {
        ft_list.insertBefore(newDiv, ft_list[0]);
    }
    newDiv.addEventListener("click", deleteToDo);
}

function deleteToDo () {
    if (confirm ("Supprimer de la toux d'où ?") ) {
        this.parentNode.removeChild(this);
    }
}
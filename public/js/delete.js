function del(id) {
    var form = document.getElementById(id + "-form");
    form.addEventListener('submit', function(e) {
        e.preventDefault();
    });

    var data = new FormData(form);
    //data.append( "_token", Laravel.csrfToken );  ???
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/admin/images/" + id + "/delete");
    //xhr.onload = function () { console.log(this.response); };
    xhr.send(data);
    alert('Successfully deleted!');

    return false;
}



  



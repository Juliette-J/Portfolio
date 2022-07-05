function post(url) {
    var form = document.getElementById("form");
    form.addEventListener('submit', function(e) {
        e.preventDefault();
    });

    var data = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", url);
    //xhr.onload = function () { console.log(this.response); };
    xhr.send(data);
    alert('Successfully sent!');

    return false;
}



  



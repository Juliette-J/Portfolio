function post_add(url) {
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

function post_update() {
    var form = document.getElementById("form");
    form.addEventListener('submit', function(e) {
        e.preventDefault();
    });

    var data = new FormData(form);
    var xhr = new XMLHttpRequest();
    var img = document.getElementsByClassName('small_img')[0];
    xhr.open("POST", "/admin/images/" + img.id + "/edit");
    //xhr.onload = function () { console.log(this.response); };
    xhr.send(data);
    alert('Successfully sent!');

    return false;
}

function post_delete(id) {
    var form = document.getElementById(id + "-form");
    form.addEventListener('submit', function(e) {
        e.preventDefault();
    });

    var data = new FormData(form);
    console.log(data);
    document.querySelector('meta[name="csrf-token"]')['content'];
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/admin/images/" + id + "/delete");
    //xhr.onload = function () { console.log(this.response); };
    xhr.send(data);
    alert('Successfully deleted!');

    return false;
}
  



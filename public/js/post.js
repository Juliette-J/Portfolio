function post_add(url) {
    $('form').on('submit', function(e) {
        e.preventDefault();
    });
    var data = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", url);
    xhr.send(data);
    alert('Successfully sent!');
    return false;
}

function post_update() {
    $('form').on('submit', function(e) {
        e.preventDefault();
    });
    var data = new FormData(form);
    var xhr = new XMLHttpRequest();
    var img = $(".small_img")[0];
    xhr.open("POST", "/api/admin/images/" + img.id + "/edit");
    xhr.send(data);
    alert('Successfully sent!');
    return false;
}

function post_delete(id, category) {
    var $form = $('#' + id + '-form');
    $form.on('submit', function(e) {
        e.preventDefault();
    });
    var data = new FormData($form[0]);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/api/admin/" + category + "/" + id + "/delete");
    $('#' + id + '-all-container').replaceWith("");
    xhr.send(data);
    return false;
}
  



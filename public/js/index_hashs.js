function createElmt(tag,attributes) {
    var el = document.createElement(tag);
    for(var key in attributes)
    {
      el.setAttribute(key,attributes[key]);
    }
    return el;
}

function createImageFieldset(hash, images) {
    // Parent fieldset
    var new_fieldset = createElmt('fieldset', {id: hash.id + '-all-container', class: 'miniature'});
    $('#index').append(new_fieldset);
        // Child form
        var new_form = createElmt('form', {id: hash.id + '-form', class: 'form'});
        new_form.onsubmit = function() {return post_delete(hash.id, "hashs")};
        $('#' + new_fieldset.id).append(new_form);
            // Second child button
            var new_btn = createElmt('button', {class: 'submit', type: 'submit'});
            new_btn.innerHTML = 'Delete';
            $('#' + new_form.id).append(new_btn);
        // Child h2
        var new_h2 = createElmt('h2', {});
        new_h2.innerHTML = hash.label;
        $('#' + new_fieldset.id).append(new_h2);
        // Child p
        var new_p = createElmt('p', {});
        new_p.innerHTML = "Linked images:";
        $('#' + new_fieldset.id).append(new_p);
        // Child div
        var new_div = createElmt('div', {id: hash.id + '-buttons-container', class: 'flex'});
        $('#' + new_fieldset.id).append(new_div);
        // Second child images
        images.forEach((img) => {
            if(img.id_hashtag == hash.id) {
                var new_img = createElmt('img', {id: img.id, class: 'image', src: img.path});
                $('#' + new_div.id).append(new_img);
            }
        })
}

/* Fetch galery */
function fetchOnURL(url) {
    fetch(url)
        .then(response => {
            if(response.ok) {
                response.json()
                .then(data => {
                    console.log(data);
                    data[0].forEach((hash) => {
                        createImageFieldset(hash, data[1]);
                    })
                })
            } else {
                console.log("ERREUR");
            }
        })
}

fetchOnURL('/api/admin/hashs');
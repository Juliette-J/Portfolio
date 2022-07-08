function createImageFieldset(hash, images) {
    // Parent fieldset
    var new_fieldset = document.createElement('fieldset');
    new_fieldset.id = hash.id + '-all-container';
    new_fieldset.className = 'miniature';
    $('#index').append(new_fieldset);
        // Child form
        var new_form = document.createElement('form');
        new_form.id = hash.id + '-form';
        new_form.className = "form";
        new_form.onsubmit = function() {return post_delete(hash.id, "hashs")};
        $('#' + new_fieldset.id).append(new_form);
            // Second child button
            var new_btn = document.createElement('button');
            new_btn.type = 'submit';
            new_btn.className = 'submit';
            new_btn.textContent = 'Delete';
            $('#' + new_form.id).append(new_btn);
        // Child h2
        var new_h2 = document.createElement('h2');
        new_h2.textContent = hash.label;
        $('#' + new_fieldset.id).append(new_h2);
        // Child p
        var new_p = document.createElement('p');
        new_p.textContent = "Linked images:";
        $('#' + new_fieldset.id).append(new_p);
        // Child div
        var new_div = document.createElement('div');
        new_div.id = hash.id + '-buttons-container';
        new_div.className = "flex";
        $('#' + new_fieldset.id).append(new_div);
        // Second child images
        images.forEach((img) => {
            if(img.id_hashtag == hash.id) {
                var new_img = document.createElement('img');
                new_img.src = img.path;
                new_img.id = img.id;
                new_img.className = 'image';
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
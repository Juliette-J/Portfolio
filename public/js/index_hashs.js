function createImageFieldset(hash, images) {
    // Parent fieldset
    var new_fieldset = document.createElement('fieldset');
    new_fieldset.id = hash.id + '-all-container';
    new_fieldset.className = 'miniature';
    document.getElementById('index').appendChild(new_fieldset);
        // Child form
        var new_form = document.createElement('form');
        new_form.id = hash.id + '-form';
        new_form.className = "form";
        new_form.onsubmit = function() {return post_delete(hash.id, "hashs")};
        document.getElementById(new_fieldset.id).appendChild(new_form);
            // Second child button
            var new_btn = document.createElement('button');
            new_btn.type = 'submit';
            new_btn.className = 'submit';
            new_btn.textContent = 'Delete';
            document.getElementById(new_form.id).appendChild(new_btn);
        // Child h2
        var new_h2 = document.createElement('h2');
        new_h2.textContent = hash.label;
        document.getElementById(new_fieldset.id).appendChild(new_h2);
        // Child p
        var new_p = document.createElement('p');
        new_p.textContent = "Linked images:";
        document.getElementById(new_fieldset.id).appendChild(new_p);
        // Child div
        var new_div = document.createElement('div');
        new_div.id = hash.id + '-buttons-container';
        new_div.className = "flex";
        document.getElementById(new_fieldset.id).appendChild(new_div);
        // Second child images
        images.forEach((img) => {
            if(img.id_hashtag == hash.id) {
                var new_img = document.createElement('img');
                new_img.src = img.path;
                new_img.id = img.id;
                new_img.className = 'image';
                document.getElementById(new_div.id).appendChild(new_img);
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
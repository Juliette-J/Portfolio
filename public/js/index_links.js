function createImageFieldset(img, links) {
    // Parent fieldset
    var new_fieldset = document.createElement('fieldset');
    new_fieldset.id = img.id + '-container';
    new_fieldset.className = 'miniature';
    document.getElementById('index').appendChild(new_fieldset);
        // Child image
        var new_img = document.createElement('img');
        new_img.src = img.path;
        new_img.id = img.id;
        new_img.className = 'image';
        document.getElementById(new_fieldset.id).appendChild(new_img);
        // Child p
        var new_p = document.createElement('p');
        new_p.textContent = "Link.s:";
        document.getElementById(new_fieldset.id).appendChild(new_p);
        // Link second children
        links.forEach((link) => {
            if(link.id_image == img.id) {
            // Child div
            var new_div = document.createElement('div');
            new_div.id = link.id + '-all-container';
            document.getElementById(new_fieldset.id).appendChild(new_div);
                // Second child h2
                var new_h2 = document.createElement('h2');
                new_h2.textContent = link.label;
                document.getElementById(new_div.id).appendChild(new_h2);
                // Second child form
                var new_form = document.createElement('form');
                new_form.id = link.id + '-form';
                new_form.className = "form";
                new_form.onsubmit = function() {return post_delete(link.id, "links")};
                document.getElementById(new_div.id).appendChild(new_form);
                    // Third child button
                    var new_btn = document.createElement('button');
                    new_btn.type = 'submit';
                    new_btn.className = 'submit';
                    new_btn.textContent = 'Delete';
                    document.getElementById(new_form.id).appendChild(new_btn);
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
                    data[0].forEach((img) => {
                        createImageFieldset(img, data[1]);
                    })
                })
            } else {
                console.log("ERREUR");
            }
        })
}

fetchOnURL('/api/admin/links');
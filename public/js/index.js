function createImageFieldset(img) {
    // Parent fieldset
    var new_fieldset = document.createElement('fieldset');
    new_fieldset.id = img.id + '-all-container';
    new_fieldset.className = 'miniature';
    document.getElementById('index').appendChild(new_fieldset);
        // Child div (1)
        var new_div = document.createElement('div');
        new_div.id = img.id + '-image-container';
        document.getElementById(new_fieldset.id).appendChild(new_div);
            // Second child image
            var new_img = document.createElement('img');
            new_img.src = img.path;
            new_img.id = img.id;
            new_img.className = 'image';
            document.getElementById(new_div.id).appendChild(new_img);
        // Child div (2)
        var new_div2 = document.createElement('div');
        new_div2.id = img.id + '-buttons-container';
        new_div2.className = "flex";
        document.getElementById(new_fieldset.id).appendChild(new_div2);
            // Second child link
            var new_link = document.createElement('a');
            new_link.href = '/admin/images/' + new_img.id + '/edit';
            new_link.textContent = 'Edit';
            document.getElementById(new_div2.id).appendChild(new_link);
            // Second child form
            var new_form = document.createElement('form');
            new_form.id = new_img.id + '-form';
            new_form.className = "form";
            //new_form.onsubmit = 'return post("/admin/images/" +  )';
            new_form.action= "/admin/images/" + new_img.id + "/delete";
            new_form.method= 'POST';
            document.getElementById(new_div2.id).appendChild(new_form);
                // Third child button
                var new_btn = document.createElement('button');
                new_btn.type = 'submit';
                new_btn.id = img.id + '-button';
                new_btn.className = 'submit';
                new_btn.textContent = 'Delete';
                document.getElementById(new_form.id).appendChild(new_btn);
}

/* Galery */
function fetchOnURL(url) {
    fetch(url)
        .then(response => {
            if(response.ok) {
                response.json()
                .then(data => {
                    console.log(data);
                    data.forEach((img) => {
                        createImageFieldset(img);
                    })
                })
            } else {
                console.log("ERREUR");
            }
        })
}

fetchOnURL('/api/admin/images');
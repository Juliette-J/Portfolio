function createImageFieldset(img) {
    // Parent fieldset
    var new_fieldset = document.createElement('fieldset');
    new_fieldset.id = img.id + '-all-container';
    new_fieldset.className = 'miniature';
    $('#index').append(new_fieldset);
        // Child div (1)
        var new_div = document.createElement('div');
        new_div.id = img.id + '-image-container';
        $('#' + new_fieldset.id).append(new_div);
            // Second child image
            var new_img = document.createElement('img');
            new_img.src = img.path;
            new_img.id = img.id;
            new_img.className = 'image';
            $('#' + new_div.id).append(new_img);
        // Child div (2)
        var new_div2 = document.createElement('div');
        new_div2.id = img.id + '-buttons-container';
        new_div2.className = "flex";
        $('#' + new_fieldset.id).append(new_div2);
            // Second child link
            var new_link = document.createElement('a');
            new_link.href = '/admin/images/' + new_img.id + '/edit';
            new_link.textContent = 'Edit';
            $('#' + new_div2.id).append(new_link);
            // Second child form
            var new_form = document.createElement('form');
            new_form.id = new_img.id + '-form';
            new_form.className = "form";
            new_form.onsubmit = function() {return post_delete(new_img.id, 'images')};
            $('#' + new_div2.id).append(new_form);
                // Third child button
                var new_btn = document.createElement('button');
                new_btn.type = 'submit';
                new_btn.className = 'submit';
                new_btn.textContent = 'Delete';
                $('#' + new_form.id).append(new_btn);
}

/* Fetch galery */
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
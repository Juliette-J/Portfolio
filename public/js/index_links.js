function createElmt(tag,attributes) {
    var el = document.createElement(tag);
    for(var key in attributes)
    {
      el.setAttribute(key,attributes[key]);
    }
    return el;
}

function createImageFieldset(img, links) {
    // Parent fieldset
    var new_fieldset = createElmt('fieldset', {id: img.id + '-container', class: 'miniature' });
    $('#index').append(new_fieldset);
        // Child image
        var new_img = createElmt('img', {id: img.id, class: 'image', src: img.path });
        $('#' + new_fieldset.id).append(new_img);
        // Child p
        var new_p = createElmt('p', {});
        new_p.innerHTML = "Link.s:";
        $('#' + new_fieldset.id).append(new_p);
        
        links.forEach((link) => {
            if(link.id_image == img.id) {
            // Child div
            var new_div = createElmt('div', {id: link.id + '-all-container'});
            $('#' + new_fieldset.id).append(new_div);
                // Second child h2
                var new_h2 = createElmt('h2', {});
                new_h2.innerHTML = link.label;
                $('#' + new_div.id).append(new_h2);
                // Second child form
                var new_form = createElmt('form', {id: link.id + '-form', class: 'form'});
                new_form.onsubmit = function() {return post_delete(link.id, "links")};
                $('#' + new_div.id).append(new_form);
                    // Third child button
                    var new_btn = createElmt('button', {class: 'submit', type: 'submit'});
                    new_btn.innerHTML = 'Delete';
                    $('#' + new_form.id).append(new_btn);
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
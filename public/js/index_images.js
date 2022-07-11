function createElmt(tag,attributes) {
  var el = document.createElement(tag);
  for(var key in attributes)
  {
    el.setAttribute(key,attributes[key]);
  }
  return el;
}

function createImageFieldset(img) {
    // Parent fieldset
    var new_fieldset = createElmt('fieldset', {id: img.id + "-all-container", class: "miniature"});
    $('#index').append(new_fieldset);
        // Child div (1)
        var new_div = createElmt('div', {id: img.id + "-image-container"});
        $('#' + new_fieldset.id).append(new_div);
            // Second child image
            var new_img = createElmt('img', {id: img.id, class: "image", src: img.path});
            $('#' + new_div.id).append(new_img);
        // Child div (2)
        var new_div2 = createElmt('div', {id: img.id + '-buttons-container', class: "flex"});
        $('#' + new_fieldset.id).append(new_div2);
            // Second child link
            var new_link = createElmt('a', {href: '/admin/images/' + new_img.id + '/edit'});
            new_link.innerHTML = "Edit";
            $('#' + new_div2.id).append(new_link);
            // Second child form
            var new_form = createElmt('form', {id: new_img.id + '-form', class: "form"});
            new_form.onsubmit = function() {return post_delete(new_img.id, 'images')};
            $('#' + new_div2.id).append(new_form);
                // Third child button
                var new_btn = createElmt('button', {type: "submit", class: "submit"});
                new_btn.innerHTML = "Delete";
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
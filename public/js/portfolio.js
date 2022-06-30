function createImageDiv(img) {
    // Parent div
    var new_div = document.createElement('div');
    new_div.id = img.id + '-container';
    new_div.className = 'miniature';
    document.getElementById('galery').appendChild(new_div);
    // Child image
    var new_img = document.createElement('img');
    new_img.src = img.path;
    new_img.id = img.id;
    new_img.className = 'image';
    document.getElementById(new_div.id).appendChild(new_img);
    // Child button
    var new_btn = document.createElement('button');
    new_btn.type = 'button';
    new_btn.id = img.id + '-button';
    new_btn.className = 'button-desc';
    new_btn.textContent = '+';
    document.getElementById(new_div.id).appendChild(new_btn);
}

function createModalImageDiv(img) {
    // Parent div
    var new_div = document.createElement('div');
    new_div.id = img.id + '-modal-img';
    new_div.className = 'modal-img';
    document.getElementById('galery').appendChild(new_div);
        // Child span
        var new_span = document.createElement('span');
        new_span.id = img.id + '-close-img';
        new_span.className = 'close-img';
        new_span.textContent = 'x';
        document.getElementById(new_div.id).appendChild(new_span);
        // Child image
        var new_img = document.createElement('img');
        new_img.id = img.id + '-fullsize';
        new_img.className = 'modal-content-img';
        document.getElementById(new_div.id).appendChild(new_img);
}

function createModalDescDiv(img) {
    // Parent div
    var new_div = document.createElement('div');
    new_div.id = img.id + '-button-modal-desc';
    new_div.className = 'modal-desc';
    document.getElementById('galery').appendChild(new_div);
        // Child span
        var new_span = document.createElement('span');
        new_span.id = img.id + '-button-close-desc';
        new_span.className = 'close-desc';
        new_span.textContent = 'x';
        document.getElementById(new_div.id).appendChild(new_span);
        // Child div
        var new_child_div = document.createElement('div');
        new_child_div.id = img.id + '-button-desc';
        new_child_div.className = 'modal-content-desc';
        document.getElementById(new_div.id).appendChild(new_child_div);
            // Second child image
            var new_img = document.createElement('img');
            new_img.src = img.path;
            new_img.id = img.id + '-in-desc';
            new_img.className = 'img-desc';
            document.getElementById(new_child_div.id).appendChild(new_img);
            // Second child h2
            var new_h2 = document.createElement('h2');
            new_h2.textContent = img.title;
            document.getElementById(new_child_div.id).appendChild(new_h2);
            // Second child p
            var new_p = document.createElement('p');
            new_p.textContent = img.date;
            document.getElementById(new_child_div.id).appendChild(new_p);
            // Second child h3 (1)
            var new_h3_1 = document.createElement('h3');
            new_h3_1.textContent = img.desc;
            document.getElementById(new_child_div.id).appendChild(new_h3_1);
            // Second child h3 (2)
            var new_h3_2 = document.createElement('h3');
            new_h3_2.textContent = img.desc_fr;
            document.getElementById(new_child_div.id).appendChild(new_h3_2);
}

/* Modale Image */
function onClickModalImage() {
    var images = document.getElementsByClassName("image");
    for(var j=0; j < images.length; j++) {
        const image = images.item(j);
        var modal_1;
        var span_1;

        image.addEventListener('click', function() {
            modal_1 = document.getElementById(this.id + "-modal-img");
            modal_1.style.display="block";
            document.getElementById(this.id + "-fullsize").src = this.src;

            span_1 = document.getElementById(this.id + "-close-img");
            span_1.addEventListener('click',function() {
                modal_1.style.display = "none";
            });
        });
    }
}

/* Modale Encadré */
function onClickModalDesc() {
    var buttons = document.getElementsByClassName("button-desc");
    for(var i = 0; i < buttons.length; i++){
        const button = buttons.item(i);
        var modal_2;
        var span_2;

        button.addEventListener('click', function() {
            modal_2 = document.getElementById(this.id + "-modal-desc");
            modal_2.style.display="block";
            document.getElementById(this.id + "-desc").src = this.src;

            span_2 = document.getElementById(this.id + "-close-desc");
            span_2.addEventListener('click', function() {
                modal_2.style.display = "none";
            });
        });
    }
}

/* Galery */
function fetchOnURL(url) {
    var image;
    fetch(url)
        .then(response => {
            if(response.ok) {
                response.json()
                .then(data => {
                    data.forEach((img) => {
                        //console.log(img)
                        createImageDiv(img);
                        createModalImageDiv(img);
                        onClickModalImage();
                        createModalDescDiv(img);
                        onClickModalDesc();
                    })
                })
            } else {
                console.log("ERREUR");
            }
        })
}

fetchOnURL('/api/portfolio/');

/*
var type_links = document.getElementsByClassName("type_link");
for(var i = 0; i < type_links.length; i++){
    const type_link = type_links.item(i);
    if (type_link.addEventListener('click')) {
       fetchOnURL('/api/portfolio/' + type_link.id);
    };
    else {
        fetchOnURL('/api/portfolio/');
    }
}
*/
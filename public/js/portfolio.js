function createElmt(tag,attributes) {
    var el = document.createElement(tag);
    for(var key in attributes){
      el.setAttribute(key,attributes[key]);
    }
    return el;
}

/* Nav */
function createBtn(hash, $lang) {
    var new_btn = createElmt('button', {id: hash.label, class: 'hash_btn', type: 'button'});
    new_btn.dataset.type = hash.label;
    if($lang=='en') {
        new_btn.innerHTML = '#' + hash.label;
    }
    else {
        new_btn.innerHTML = '#' + hash.label_fr;
    }
    $('#nav_btns').append(new_btn);
}

/* Parent */
function createImageDiv(img) {
    // Parent div
    var new_div = createElmt('div', {id: img.id + '-container', class: 'miniature'});
    $('#galery').append(new_div);
        // Child image
        var new_img = createElmt('img', {id: img.id, class: 'image', src: img.path});
        $('#' + new_div.id).append(new_img);
        // Child div
        var new_div2 = createElmt('div', {id: img.id + '-flex', class: 'flex-btn'});
        $('#' + new_div.id).append(new_div2);
            // Sencond child button
            var new_btn = createElmt('button', {id: img.id + '-button', class: 'button-desc', type: 'button'});
            new_btn.innerHTML = 'i';
            $('#' + new_div2.id).append(new_btn);
}

/* Modale Image */
function createModalImageDiv(img) {
    // Parent div
    var new_div = createElmt('div', {id: img.id + '-modal-img', class: 'modal-img'});
    $('#galery').append(new_div);
        // Child span
        var new_span = createElmt('span', {id: img.id + '-close-img', class: 'close-img'});
        new_span.innerHTML = 'x';
        $('#' + new_div.id).append(new_span);
        // Child image
        var new_img = createElmt('img', {id: img.id + '-fullsize', class: 'modal-content-img'});
        $('#' + new_div.id).append(new_img);
}
function onClickModalImage() {
    var $images = $(".image");
    for(var j=0; j < $images.length; j++) {
        const image = $images.get(j);
        var $modal_1;
        var $span_1;
        image.addEventListener('click', function() {
            $modal_1 = $('#' + this.id + "-modal-img");
            $modal_1.show();
            document.getElementById(this.id + "-fullsize").src = this.src; // Test JQuery X : $('#' + this.id + "-fullsize").attr(src, this.src);
            
            $span_1 = $('#' + this.id + "-close-img");
            $span_1.on('click',function() {
                $modal_1.hide();
            });
        });
    }
}

/* Modale Encadré */
function createModalDescDiv(img, $lang) {
    // Parent div
    var new_div = createElmt('div', {id: img.id + '-button-modal-desc', class: 'modal-desc'});
    $('#galery').append(new_div);
        // Child span
        var new_span = createElmt('span', {id: img.id + '-button-close-desc', class: 'close-desc'});
        new_span.innerHTML = 'x';
        $('#' + new_div.id).append(new_span);
        // Child div
        var new_child_div = createElmt('div', {id: img.id + '-button-desc', class: 'modal-content-desc'});
        $('#' + new_div.id).append(new_child_div);
            // Second child image
            var new_img = createElmt('img', {id: img.id + '-in-desc', class: 'img-desc', src: img.path});
            $('#' + new_child_div.id).append(new_img);
            // Second child h2
            var new_h2 = createElmt('h2', {});
            new_h2.innerHTML = img.title;
            $('#' + new_child_div.id).append(new_h2);
            // Second child p
            var new_p = createElmt('p', {});
            new_p.innerHTML = img.date;
            $('#' + new_child_div.id).append(new_p);
            // Second child h3
            var new_h3 = createElmt('h3');
            if($lang=='en') {
                new_h3.innerHTML = img.desc;
            }
            else {
                new_h3.innerHTML = img.desc_fr;
            }
            $('#' + new_child_div.id).append(new_h3);
            
}
function onClickModalDesc() {
    var $buttons = $(".button-desc");
    for(var i = 0; i < $buttons.length; i++){
        const button = $buttons.get(i);
        var $modal_2;
        var $span_2;
        button.addEventListener('click', function() {
            $modal_2 = $('#' + this.id + "-modal-desc");
            $modal_2.show();
            document.getElementById(this.id + "-desc").src = this.src;

            $span_2 = $('#' + this.id + "-close-desc");
            $span_2.on('click', function() {
                $modal_2.hide();
            });
        });
    }
}

/* Fetch galery*/
function fetchOnURL(url) {
    fetch(url)
        .then(response => {
            if(response.ok) {
                response.json()
                .then(data => {
                    var $lang = $('html')[0].lang;
                    data[1].forEach((img) => {
                        if(!$('#' + img.id + '-container')[0]) {
                            createImageDiv(img);
                            createModalImageDiv(img);
                            onClickModalImage();
                            createModalDescDiv(img, $lang);
                            onClickModalDesc();
                        }
                    })
                })
            } else {
                console.log("ERREUR");
            }
        })
}
function fetchAllOnURL(requestArray) {
    Promise.all(requestArray.map(hashtag =>
        fetch(`/api/portfolio?hashtag=${hashtag}`)
        .then(response => {
            if(response.ok) {
                response.json()
                .then(data => {
                    var $lang = $('html')[0].lang;
                    data[1].forEach((img) => {
                        if(!$('#' + img.id + '-container')[0]) { //
                            createImageDiv(img);
                            createModalImageDiv(img);
                            onClickModalImage();
                            createModalDescDiv(img);
                            onClickModalDesc();
                        }
                    })
                })
            } else {
                console.log("ERREUR");
            }
    })))
}

var hashs_selected = [];
fetch('/api/portfolio')
    .then(response => {
        if(response.ok) {response.json()
            .then(data => {
                /* Hash buttons */
                var $lang = $('html')[0].lang;
                data[0].forEach((hash) => {
                    createBtn(hash, $lang);
                })
            
                /* Types */
                var $links = $(".type_link");
                for(var index = 0; index < $links.length; index++) {
                    const link = $links.get(index);
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        $('#galery').html("");
                        fetchOnURL('/api/portfolio?type=' + e.target.dataset.type)
                    })
                }
                
                /* Hashtags */
                const $hashs = $('.hash_btn');
                for (let index = 0; index < $hashs.length; index++) {
                    const element = $hashs.get(index);
                    element.addEventListener("click", function(e) {
                        e.preventDefault();
                        if(hashs_selected.includes(this.id)){
                            hashs_selected = hashs_selected.filter(hashtag => hashtag !== this.id);
                            this.className="hash_btn";
                        }else{
                            hashs_selected.push(this.id);
                            this.className="hash_btn_selected";
                        }
                        $('#galery').html("");
                        if(hashs_selected.length > 0) {
                            fetchAllOnURL(hashs_selected);
                        }
                        else {
                            fetchOnURL('/api/portfolio');
                        }
                    })
                } 
            })    
        }
    })

/* Default */
fetchOnURL('/api/portfolio');
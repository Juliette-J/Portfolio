/* Parent */
function createImageDiv(img) {
    // Parent div
    var new_div = document.createElement('div');
    new_div.id = img.id + '-container';
    new_div.className = 'miniature';
    $('#galery').append(new_div);
    // Child image
    var new_img = document.createElement('img');
    new_img.src = img.path;
    new_img.id = img.id;
    new_img.className = 'image';
    $('#' + new_div.id).append(new_img);
    // Child button
    var new_btn = document.createElement('button');
    new_btn.type = 'button';
    new_btn.id = img.id + '-button';
    new_btn.className = 'button-desc';
    new_btn.textContent = '+';
    $('#' + new_div.id).append(new_btn);
}

/* Modale Image */
function createModalImageDiv(img) {
    // Parent div
    var new_div = document.createElement('div');
    new_div.id = img.id + '-modal-img';
    new_div.className = 'modal-img';
    $('#galery').append(new_div);
        // Child span
        var new_span = document.createElement('span');
        new_span.id = img.id + '-close-img';
        new_span.className = 'close-img';
        new_span.textContent = 'x';
        $('#' + new_div.id).append(new_span);
        // Child image
        var new_img = document.createElement('img');
        new_img.id = img.id + '-fullsize';
        new_img.className = 'modal-content-img';
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
function createModalDescDiv(img) {
    // Parent div
    var new_div = document.createElement('div');
    new_div.id = img.id + '-button-modal-desc';
    new_div.className = 'modal-desc';
    $('#galery').append(new_div);
        // Child span
        var new_span = document.createElement('span');
        new_span.id = img.id + '-button-close-desc';
        new_span.className = 'close-desc';
        new_span.textContent = 'x';
        $('#' + new_div.id).append(new_span);
        // Child div
        var new_child_div = document.createElement('div');
        new_child_div.id = img.id + '-button-desc';
        new_child_div.className = 'modal-content-desc';
        $('#' + new_div.id).append(new_child_div);
            // Second child image
            var new_img = document.createElement('img');
            new_img.src = img.path;
            new_img.id = img.id + '-in-desc';
            new_img.className = 'img-desc';
            $('#' + new_child_div.id).append(new_img);
            // Second child h2
            var new_h2 = document.createElement('h2');
            new_h2.textContent = img.title;
            $('#' + new_child_div.id).append(new_h2);
            // Second child p
            var new_p = document.createElement('p');
            new_p.textContent = img.date;
            $('#' + new_child_div.id).append(new_p);
            // Second child h3 (1)
            var new_h3_1 = document.createElement('h3');
            new_h3_1.textContent = img.desc;
            $('#' + new_child_div.id).append(new_h3_1);
            // Second child h3 (2)
            var new_h3_2 = document.createElement('h3');
            new_h3_2.textContent = img.desc_fr;
            $('#' + new_child_div.id).append(new_h3_2);
}
function onClickModalDesc() {
    var $buttons = $(".button-desc");
    console.log($buttons);
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
                    data.forEach((img) => {
                        if(!$('#' + img.id + '-container')[0]) {
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
        })
}
function fetchAllOnURL(requestArray) {
    Promise.all(requestArray.map(hashtag =>
        fetch(`/api/portfolio?hashtag=${hashtag}`)
        .then(response => {
            if(response.ok) {
                response.json()
                .then(data => {
                    data.forEach((img) => {
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

/* Type */
/*const links = document.getElementsByClassName('type_link');
console.log(links);
for (let index = 0; index < links.length; index++) {
    const element = links[index];
    element.addEventListener("click", function(e) {
        e.preventDefault();
        document.getElementById('galery').innerHTML="";
        fetchOnURL('/api/portfolio?type='+e.target.dataset.type)
    })
}*/

var $links = $(".type_link");
console.log($links);
for(var index = 0; index < $links.length; index++) {
    const element = $links.get(index);
    element.addEventListener('click', function(e) {
        e.preventDefault();
        $('#galery').replaceWith("");
        fetchOnURL('/api/portfolio?type='+e.target.dataset.type)
    })
}

/* Hashtags */
 const hashs = document.getElementsByClassName('hash_btn');
var hashs_selected = [];
for (let index = 0; index < hashs.length; index++) {
    const element = hashs[index];
    element.addEventListener("click", function(e) {
        e.preventDefault();
        if(hashs_selected.includes(this.id)){
            hashs_selected = hashs_selected.filter(hashtag => hashtag !== this.id);
            this.className="hash_btn";
        }else{
            hashs_selected.push(this.id);
            this.className="hash_btn_selected";
        }

        document.getElementById('galery').innerHTML="";
        if(hashs_selected.length > 0) {
            fetchAllOnURL(hashs_selected);
        }
        else {
            fetchOnURL('/api/portfolio');
        }
    })
} 
/*const $hashs = $('.hash_btn');
var hashs_selected = [];
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
        $('#galery').replaceWith("");
        if(hashs_selected.length > 0) {
            fetchAllOnURL(hashs_selected);
        }
        else {
            fetchOnURL('/api/portfolio');
        }
    })
}*/

/* Default */
fetchOnURL('/api/portfolio');
/* Modale Image */

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

/* Modale Encadré */

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


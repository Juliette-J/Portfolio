var searchParams = new URLSearchParams(window.location.search);
var hash_buttons = document.getElementsByClassName("hash_btn");
var hash_tab = searchParams.getAll('hashtags[]');
var endpoint;

for(var i = 0; i < hash_buttons.length; i++){
    const hash_button = hash_buttons.item(i);

    hash_button.addEventListener('click', function() {
        if(hash_tab.includes(this.id)){
            hash_tab = hash_tab.filter(hash => hash !== this.id)
        }else{
            hash_tab.push(this.id);
        }
        
        endpoint = new URLSearchParams;
        hash_tab.forEach(hash => {
            endpoint.append('hashtags[]', hash);
        });
        window.location.href = window.location.href.split('?')[0] + '?' + endpoint;
    });
}

 




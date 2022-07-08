var h1 = document.querySelector('h1');
const textTitle = 'Portfolio';

let i = 0;
const interval = setInterval(() => {
    h1.innerHTML += textTitle[i];
    i++;
    if(i>= textTitle.length) {
        clearInterval(interval);
    }
}, 100)



const img = document.getElementById('img');

fetch('/portfolio')
  .then(response => {
      if(response.ok) {
          console.log(response)
          response.json().then(data => {
              img.src = data[0].path
          })
      } else {
          console.log("ERREUR");
      }
  })
  



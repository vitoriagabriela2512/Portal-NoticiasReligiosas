function toggleDarkMode(){
    document.body.classList.toggle("dark");
}
function buscarClima() {

  const apiKey = "02d0d12895641ac41faac3575d00f8d9"; // coloque sua chave aqui
  const cidade = document.getElementById("cidadeInput").value;

  if (cidade === "") {
    alert("Digite uma cidade!");
    return;
  }

  const url = `https://api.openweathermap.org/data/2.5/weather?q=${cidade}&appid=${apiKey}&units=metric&lang=pt_br`;

  fetch(url)
    .then(response => {
      if (!response.ok) {
        throw new Error("Cidade não encontrada");
      }
      return response.json();
    })
    .then(data => {

      const temp = data.main.temp;
      const clima = data.weather[0].description;
      const tipoClima = data.weather[0].main;

      let emoji = "☀️";

      if (tipoClima === "Clouds") emoji = "☁️";
      if (tipoClima === "Rain") emoji = "🌧";
      if (tipoClima === "Clear") emoji = "☀️";
      if (tipoClima === "Thunderstorm") emoji = "⛈";

      document.getElementById("temperatura").innerText =
        `🌡 ${temp}°C`;

      document.getElementById("descricao").innerText =
        `${emoji} ${clima}`;

    })
    .catch(error => {
      alert("Erro ao buscar clima. Verifique a cidade ou a API.");
      console.log(error);
    });
}
function buscarNoticias(){
    let busca = document.getElementById("busca").value.toLowerCase();

    let cards = document.querySelectorAll(".grid .card");

    cards.forEach(card => {
        let titulo = card.querySelector("h3").innerText.toLowerCase();
        let texto = card.querySelector("p").innerText.toLowerCase();

        if(titulo.includes(busca) || texto.includes(busca)){
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}
document.getElementById("btnVoltar").addEventListener("click", function() {
    
    // limpa o input
    let input = document.getElementById("busca");
    if (input) input.value = "";

    // pega TODOS os cards (não depende da div pai)
    let cards = document.querySelectorAll(".card");

    cards.forEach(function(card) {
        card.style.display = "block";
    });

});


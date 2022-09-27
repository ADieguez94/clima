// Imagen random al cargar la pagina
document.body.style.backgroundImage = "url('https://source.unsplash.com/1600x900/?landscape')";

//evento onclick para buscar por el boton de lupa(search)
document.querySelector(".search button").addEventListener("click", function () {
    clima.search();
    pronostico.search();
    insert(document.querySelector(".search-bar").value)
});

//evento keyup para buscar despues de escribir busqueda
document
    .querySelector(".search-bar")
    .addEventListener("keyup", function (event) {
        if (event.key == "Enter") {
            clima.search();
            pronostico.search();
            insert(document.querySelector(".search-bar").value)
        }
    });


// variables y sus funciones con la api
let clima = {
    apiKey: "6eee4a38fa835c11fec271ba5ca255c6",
    fetchClima: function (lugar) {
        fetch(
            "http://api.openweathermap.org/data/2.5/weather?q=" +
            lugar +
            "&lang=es&units=metric&appid=" +
            this.apiKey
        ).then((response) => {
            if (!response.ok) {
                M.toast({ html: 'Datos de clima no encontrados.', classes: 'rounded red' });
                throw new Error("Datos de clima no encontrados.");
            }
            return response.json();
        })
            .then((data) => this.display(data));
    },
    display: function (data) {
        const { name } = data;
        const { icon, description } = data.weather[0];
        const { temp, humidity } = data.main;
        const { speed } = data.wind;
        $(".ciudad").text("Clima en " + name);
        $(".icon").attr("src", "https://openweathermap.org/img/wn/" + icon + ".png");
        $(".descripcion").text(description);
        $(".temp").text(temp + "°C");
        $(".humedad").text("Humedad: " + humidity + "%");
        $(".viento").text("Vientos: " + speed + " km/h");
        $(".clima").removeClass("loading");
        let text = description;
        if (text.includes("nub")) {
            document.body.style.backgroundImage = "url('images/nubes.jpg')";
        } else if (text.includes("lluv")) {
            document.body.style.backgroundImage = "url('images/lluvia.jpg')";
        } else if (text.includes("claro")) {
            document.body.style.backgroundImage = "url('images/claro.jpg')";
        } else {
            document.body.style.backgroundImage =
                "url('https://source.unsplash.com/1600x900/?" + description + "')";
        }

    },
    search: function () {
        this.fetchClima(document.querySelector(".search-bar").value);
    },
};


let pronostico = {
    apiKey: "6eee4a38fa835c11fec271ba5ca255c6",
    fetchPronostico: function (lugar) {
        fetch(
            "http://api.openweathermap.org/data/2.5/forecast?q=" +
            lugar +
            "&lang=es&units=metric&appid=" +
            this.apiKey
        ).then((response) => {
            if (!response.ok) {
            }
            return response.json();
        })
            .then((data) => this.display(data));
    },
    display: function (data) {
        const { name } = data.city;
        let body = ""
        $.each(data.list, function (i, item) {
            body += "<tr>" +
                "<td>" + item.dt_txt + "</td>" +
                "<td>" + item.main.temp_max + " °C</td>" +
                "<td>" + item.main.temp_min + " °C</td>" +
                "<td>" + item.main.humidity + "%</td>" +
                "<td>" + item.wind.speed + " km/h</td>" +
                "<td>" + item.weather[0].description + "<img src='https://openweathermap.org/img/wn/" + item.weather[0].icon + ".png' class='icon' style='max-width:20px;position: relative; top: 4px; left: 5px; '/></td>" +
                "</tr>"
        });
        $("#tabla-body").html(body)
        $(".ciudad-pronostico").text("Pronóstico del clima en " + name);
    },
    search: function () {
        this.fetchPronostico(document.querySelector(".search-bar").value);
    },
};

// funcion insert para registrar las busquedas en BD
function insert(ciudad) {
    const user_id = $("#user_id").val();
    const user = $("#user").val();
    $.ajax({
        url: "funciones_php/funciones_clima.php?action=insert",
        type: 'POST',
        dataType: 'json',
        data: {
            'ciudad': ciudad,
            'user_id': user_id,
            'user': user
        },
        success: function (data, textStatus, jqXHR) {
            if (data.error == false) {
                console.log(data.message)
            } else if (data.error == true) {
                console.log(data.message)
            }
        },
        error: function (errorThrown) {
            alert(errorThrown.responseJSON['error']);
        }
    });
    console.log("entra");
}

ymaps.ready(function() {
    var map = new ymaps.Map("map", {
        center: [55.76268, 37.62359],
        zoom: 13,
        controls: ["zoomControl"],
    });
    objectManager = new ymaps.ObjectManager();
    map.controls.get("zoomControl").options.set({ size: "small" });
    // Загружаем GeoJSON файл, экспортированный из Конструктора карт.

    $.getJSON("geo.geojson").done(function(geoJson) {
        // Добавляем описание объектов в формате JSON в менеджер объектов.
        objectManager.add(geoJson);
        // Добавляем объекты на карту.
        map.geoObjects.add(objectManager);
    });

    let center = [
        [55.7468, 37.6166],
        [55.7143, 37.4669],
        [55.8026, 37.4387],
        [55.8219, 37.5266],
        [55.8478, 37.6241],
        [55.8246, 37.723],
        [55.6755, 37.7477],
        [55.6138, 37.6454],
        [55.6367, 37.5403],
        [55.9838, 37.1887],
        [55.5697, 37.3549],
        [55.34, 37.1733],
    ];
    let title2 = [
        "ЦАО",
        "ЗАО",
        "СЗАО",
        "САО",
        "СВАО",
        "ВАО",
        "ЮВАО",
        "ЮАО",
        "ЮЗАО",
        "ЗелАО",
        "Новомосковский",
        "Троицкий",
    ];
    let colorPoint = [
        "islands#nightStretchyIcon",
        "islands#darkOrangeStretchyIcon",
        "islands#redStretchyIcon",
        "islands#pinkStretchyIcon",
        "islands#lightBlueStretchyIcon",
        "islands#oliveStretchyIcon",
        "islands#redStretchyIcon",
        "islands#yellowStretchyIcon",
        "islands#darkGreenStretchyIcon",
        "islands#grayStretchyIcon",
        "islands#darkGreenStretchyIcon",
        "islands#violetStretchyIcon",
    ];

    for (let i = 0; i < center.length; i++) {
        var myPlacemark = new ymaps.Placemark(
            center[i], {
                iconContent: title2[i],
            }, {
                preset: colorPoint[i],
            }
        );
        map.geoObjects.add(myPlacemark);
    }

    // var file = {
    //     ID: 11529,
    //     Name: "АКЦИОНЕРНОЕ ОБЩЕСТВО «СТРОЙСЕРВИС»",
    //     INN: "7710034550",
    //     AdmArea: "Центральный административный округ",
    //     HousesQuantity: 2,
    //     HousesArea: 27872,
    //     TotalAmountOfScores: 84.17,
    //     FinalRating: 1,
    //     global_id: 2387463246,
    // };

    objectManager.objects.events.add("click", function(e) {
        // var title = objectManager.geoJson.features[1].options.description;
        // var eMap = e.get("target");
        // var title = map.geoObjects.get(0).features[0].getType;
        var objectId = e.get("objectId"),
            object = objectManager.objects.getById(objectId);
        var name_pol = object.options.description;

        // var title = file.features[0].options.description;
        // var title = file.AdmArea;
        // var title = geoJson.features[0].options.description;
        text_out(name_pol);
    });
});

function text_out(title) {
    var a = document.getElementById("text_title");
    a.innerHTML = title;
    // document.getElementById("text_title").value = title;
    data(title);
}

// objectManager.objects.events.add("click", function(e) {
//     text_out();
// });
// });

// function text_out() {
// var p = document.getElementById("text_change");
// p.innerHTML = "fdfdf";
// }
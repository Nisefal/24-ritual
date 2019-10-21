function init() {
    var myMap = new ymaps.Map('map', {
        center: [55.753994, 37.622093],
        zoom: 9
    });

    // Поиск координат из переменной "adres"
    ymaps.geocode(adres, {
        results: 1
    }).then(function (res) {

        // Выбираем первый результат геокодирования.
        var firstGeoObject = res.geoObjects.get(0),
        // Координаты геообъекта.
            coords = firstGeoObject.geometry.getCoordinates(),
        // Область видимости геообъекта.
            bounds = firstGeoObject.properties.get('boundedBy');


        firstGeoObject.options.set('preset', 'islands#darkBlueDotIconWithCaption');
        // Получаем строку с адресом и выводим в иконке геообъекта.
        firstGeoObject.properties.set('iconCaption', firstGeoObject.getAddressLine());

        // Добавляем первый найденный геообъект на карту.
        myMap.geoObjects.add(firstGeoObject);
        // Масштабируем карту на область видимости геообъекта.
        myMap.setBounds(bounds, {
            // Проверяем наличие тайлов на данном масштабе.
            checkZoomRange: true
        });

        //alert(coords);
        console.log('Государство: %s', coords);


    });
}



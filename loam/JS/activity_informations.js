
// Change cursor to pointer
map.on('mouseenter', 'pos', function () {
    map.getCanvas().style.cursor = 'pointer';
});
map.on('mouseleave', 'pos', function () {
    map.getCanvas().style.cursor = '';
});

// Set position informations when clicked on the pin
map.on('click', 'pos', function (e) {
    // Get properties
    const properties = e.features[0].properties;
    const coordinates = e.features[0].geometry.coordinates.slice();

    // Display informations
    const html = `
    <strong>${properties.name}</strong>
    <br>
    Description : ${properties.description}
    <br>
    Date : ${properties.date}
    `;

    let map_details = document.getElementById("map_details");
    map_details.innerHTML = html;
});
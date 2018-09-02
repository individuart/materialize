function createSlider(id, height, indicators) {
    var boolIndicators = (indicators === 0) ? false : true;
    $('#' + id).slider(
        {
            height: height,
            indicators: boolIndicators
        }
    );
}
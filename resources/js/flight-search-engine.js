import datepickerFactory from "jquery-datepicker";
import datepickerJAFactory from "jquery-datepicker";

datepickerFactory($);
datepickerJAFactory($);

window.fetchSourceAirports = async () => {
    try {
        const {data: airports} = await axios.get(`/api/source-airports`);
        return airports;
    } catch (e) {
        return [];
    }
}
window.fetchDestinationAirports = async () => {
    try {
        const {data: airports} = await axios.get(`/api/destination-airports`);
        return airports;
    } catch (e) {
        return [];
    }
}
window.fetchAirlines = async () => {
    try {
        const {data: airlines} = await axios.get(`/api/airlines`);
        return airlines;
    } catch (e) {
        return [];
    }
}

(async function () {

    window.departDatePicker = $('[name="departDate"]').datepicker({
        currentText: '+1D',
        showButtonPanel: false,
        minDate: '+1D',
        dateFormat: "dd-mm-yy",
        numberOfMonths: 1,
        maxDate: '+15M +1D',
        onSelect: () => {
            const date = $('[name="departDate"]').datepicker('getDate');
            date.setDate(date.getDate() + 7);
            $('[name="returnDate"]').datepicker('setDate', date);
        }
    }).datepicker('setDate', '+1D');

    window.returnDatePicker = $('[name="returnDate"]').datepicker({
        currentText: '+8D',
        showButtonPanel: false,
        minDate: '+2D',
        dateFormat: "dd-mm-yy",
        numberOfMonths: 1,
        maxDate: '+15M +8D',
        beforeShow: () => {
            const date = $('[name="departDate"]').datepicker('getDate');
            $('[name="returnDate"]').datepicker("option", "minDate", date);
        }
    }).datepicker('setDate', '+8D');

    const sourceAirports = await fetchSourceAirports();
    const destinationAirports = await fetchDestinationAirports();
    const airlines = await fetchAirlines();

    autocompleteAirport(document.querySelector('[name="source"]'), sourceAirports);
    autocompleteAirport(document.querySelector('[name="destination"]'), destinationAirports);
    autocompleteAirline(document.querySelector('[name="carrier"]'), airlines);
})();


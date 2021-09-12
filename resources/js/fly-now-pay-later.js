import datepickerFactory from "jquery-datepicker";
import datepickerJAFactory from "jquery-datepicker";

import {load} from 'recaptcha-v3';

let recaptcha;

datepickerFactory($);
datepickerJAFactory($);

window.fetchDestinationAirports = async () => {
    try {
        const {data: airports} = await axios.get(`/api/destination-airports`);
        return airports;
    } catch (e) {
        return [];
    }
}

$('#flyNowPayLater').on('submit', async (event) => {
    event.preventDefault();
    $(event.target).find('[type="submit"]').prop('disabled', true).text('Submitting ...');
    try {
        const recaptcha_token = await recaptcha.execute('submit');
        const formData = new FormData(event.target);
        formData.append('recaptcha_token', recaptcha_token);
        formData.append('enquiry_type', 'FLY_NOW_PAY_LATER_ENQUIRY');
        const {data: enquiryResponse} = await axios.post(`/api/enquiry`, formData);
        if (enquiryResponse && "success" in enquiryResponse && enquiryResponse.success) {
            window.location.href = `${HOST}/thank-you`;
        } else if (enquiryResponse && "errors" in enquiryResponse && enquiryResponse.errors.length > 0) {
            enquiryResponse.errors.forEach(error => {
                $('#captchaErrors').find('ul').append(`<li class="small text-danger">${error}</li>`);
            });
            $(event.target).find('[type="submit"]').prop('disabled', false).text('Submit');
        }
    } catch (e) {
        console.log(e);
    }
});

(async () => {
    window.departDatePicker = $('[name="departDate"]').datepicker({
        currentText: "Now",
        defaultDate: "Now",
        minDate: 'Now',
        dateFormat: "dd-mm-yy",
        showButtonPanel: false,
    }).datepicker('setDate', 'today');

    recaptcha = await load(GOOGLE_CAPTCHA_SITE_KEY);
    setInputFilter(document.querySelector('input[name="phone"]'), (value) => /^\d*\.?\d*$/.test(value));

    const destinationAirports = await fetchDestinationAirports();
    autocompleteAirport(document.querySelector('[name="destination"]'), destinationAirports);
})();

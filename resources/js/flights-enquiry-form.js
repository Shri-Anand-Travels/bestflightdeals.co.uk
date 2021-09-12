import {load} from 'recaptcha-v3';

let recaptcha;

(async () => {
    recaptcha = await load(GOOGLE_CAPTCHA_SITE_KEY);
    console.log(window.location.path);
    setInputFilter(document.querySelector('input[name="phone"]'), (value) => /^\d*\.?\d*$/.test(value));
})()

$('#flightsEnquiryForm').on('submit', async (event) => {
    event.preventDefault();
    $(event.target).find('[type="submit"]').prop('disabled', true).text('Submitting ...');
    try {
        const recaptcha_token = await recaptcha.execute('submit');
        const formData = new FormData(event.target);
        formData.append('recaptcha_token', recaptcha_token);
        formData.append('enquiry_type', window.location.pathname.includes('search')
            ? 'SEARCH_FLIGHT_ENQUIRY' : 'FLIGHT_ENQUIRY');
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

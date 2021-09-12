"use strict";

window.autocompleteAirport = (elm, data) => {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    let currentFocus;
    /*execute a function when someone writes in the text field:*/
    elm.addEventListener("input", function () {
        let a, //OUTER html: variable for listed content with html-content
            b, // INNER html: filled with array-Data and html
            i, //Counter
            val = this.value;

        /*close any already open lists of autocompleted values*/
        closeAllLists();

        if (!val) {
            return false;
        }

        currentFocus = -1;

        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");

        a.setAttribute("id", `${this.id}AutocompleteList`);
        a.setAttribute("class", "autocomplete-list list-group text-left");

        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);

        data.forEach(({iata, city, airport, country}) => {
            if (iata.substr(0, val.length).toUpperCase() === val.toUpperCase() ||
                city.substr(0, val.length).toUpperCase() === val.toUpperCase() ||
                airport.substr(0, val.length).toUpperCase() === val.toUpperCase()||
                country.substr(0, val.length).toUpperCase() === val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                b.setAttribute("class", "list-group-item list-group-item-action");
                /*make the matching letters bold:*/
                b.innerHTML = `<strong>${iata.substr(0, val.length)}</strong>`;
                b.innerHTML += iata.substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += `<input type='hidden' value="${iata}">`;
                b.innerHTML += `<span>&nbsp;(${airport})</span>`;
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function () {
                    /*insert the value for the autocomplete text field:*/
                    elm.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
            }
        })
    });

    /*execute a function presses a key on the keyboard:*/
    elm.addEventListener("keydown", function (e) {
        let x = document.getElementById(`${this.id}AutocompleteList`);
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode === 40) {
            /*If the arrow DOWN key is pressed,
              increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode === 38) {
            //up
            /*If the arrow UP key is pressed,
              decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode === 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
            }
        }
    });

    let addActive = (x) => {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = x.length - 1;
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("active");
    }

    let removeActive = (x) => {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (let i = 0; i < x.length; i++) {
            x[i].classList.remove("active");
        }
    }

    let closeAllLists = (element) => {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        const x = document.getElementsByClassName("autocomplete-list");
        for (let i = 0; i < x.length; i++) {
            if (element !== x[i] && element !== elm) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }

    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", (e) => closeAllLists(e.target));

};

window.autocompleteAirline = (elm, data) => {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    let currentFocus;
    /*execute a function when someone writes in the text field:*/
    elm.addEventListener("input", function () {
        let a, //OUTER html: variable for listed content with html-content
            b, // INNER html: filled with array-Data and html
            i, //Counter
            val = this.value;

        /*close any already open lists of autocompleted values*/
        closeAllLists();

        if (!val) {
            return false;
        }

        currentFocus = -1;

        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");

        a.setAttribute("id", `${this.id}AutocompleteList`);
        a.setAttribute("class", "autocomplete-list list-group text-left");

        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);

        data.forEach(({name, carrier_code, carrier_code_full}) => {
            if (name.substr(0, val.length).toUpperCase() === val.toUpperCase() ||
                carrier_code.substr(0, val.length).toUpperCase() === val.toUpperCase() ||
                carrier_code_full.substr(0, val.length).toUpperCase() === val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                b.setAttribute("class", "list-group-item list-group-item-action");
                /*make the matching letters bold:*/
                b.innerHTML = `<strong>${name.substr(0, val.length)}</strong>`;
                b.innerHTML += name.substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += `<input type='hidden' value="${carrier_code}">`;
                b.innerHTML += `<span>&nbsp;(${carrier_code_full})</span>`;
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function () {
                    /*insert the value for the autocomplete text field:*/
                    elm.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
            }
        })
    });

    /*execute a function presses a key on the keyboard:*/
    elm.addEventListener("keydown", function (e) {
        let x = document.getElementById(`${this.id}AutocompleteList`);
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode === 40) {
            /*If the arrow DOWN key is pressed,
              increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode === 38) {
            //up
            /*If the arrow UP key is pressed,
              decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode === 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
            }
        }
    });

    let addActive = (x) => {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = x.length - 1;
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("active");
    }

    let removeActive = (x) => {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (let i = 0; i < x.length; i++) {
            x[i].classList.remove("active");
        }
    }

    let closeAllLists = (element) => {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        const x = document.getElementsByClassName("autocomplete-list");
        for (let i = 0; i < x.length; i++) {
            if (element !== x[i] && element !== elm) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }

    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", (e) => closeAllLists(e.target));

};

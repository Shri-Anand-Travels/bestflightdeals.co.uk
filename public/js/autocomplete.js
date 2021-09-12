/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/autocomplete.js ***!
  \**************************************/


window.autocompleteAirport = function (elm, data) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/

  elm.addEventListener("input", function () {
    var a,
        //OUTER html: variable for listed content with html-content
    b,
        // INNER html: filled with array-Data and html
    i,
        //Counter
    val = this.value;
    /*close any already open lists of autocompleted values*/

    closeAllLists();

    if (!val) {
      return false;
    }

    currentFocus = -1;
    /*create a DIV element that will contain the items (values):*/

    a = document.createElement("DIV");
    a.setAttribute("id", "".concat(this.id, "AutocompleteList"));
    a.setAttribute("class", "autocomplete-list list-group text-left");
    /*append the DIV element as a child of the autocomplete container:*/

    this.parentNode.appendChild(a);
    data.forEach(function (_ref) {
      var iata = _ref.iata,
          city = _ref.city,
          airport = _ref.airport,
          country = _ref.country;

      if (iata.substr(0, val.length).toUpperCase() === val.toUpperCase() || city.substr(0, val.length).toUpperCase() === val.toUpperCase() || airport.substr(0, val.length).toUpperCase() === val.toUpperCase() || country.substr(0, val.length).toUpperCase() === val.toUpperCase()) {
        /*create a DIV element for each matching element:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "list-group-item list-group-item-action");
        /*make the matching letters bold:*/

        b.innerHTML = "<strong>".concat(iata.substr(0, val.length), "</strong>");
        b.innerHTML += iata.substr(val.length);
        /*insert a input field that will hold the current array item's value:*/

        b.innerHTML += "<input type='hidden' value=\"".concat(iata, "\">");
        b.innerHTML += "<span>&nbsp;(".concat(airport, ")</span>");
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
    });
  });
  /*execute a function presses a key on the keyboard:*/

  elm.addEventListener("keydown", function (e) {
    var x = document.getElementById("".concat(this.id, "AutocompleteList"));
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

  var addActive = function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/

    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = x.length - 1;
    /*add class "autocomplete-active":*/

    x[currentFocus].classList.add("active");
  };

  var removeActive = function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("active");
    }
  };

  var closeAllLists = function closeAllLists(element) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-list");

    for (var i = 0; i < x.length; i++) {
      if (element !== x[i] && element !== elm) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  };
  /*execute a function when someone clicks in the document:*/


  document.addEventListener("click", function (e) {
    return closeAllLists(e.target);
  });
};

window.autocompleteAirline = function (elm, data) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/

  elm.addEventListener("input", function () {
    var a,
        //OUTER html: variable for listed content with html-content
    b,
        // INNER html: filled with array-Data and html
    i,
        //Counter
    val = this.value;
    /*close any already open lists of autocompleted values*/

    closeAllLists();

    if (!val) {
      return false;
    }

    currentFocus = -1;
    /*create a DIV element that will contain the items (values):*/

    a = document.createElement("DIV");
    a.setAttribute("id", "".concat(this.id, "AutocompleteList"));
    a.setAttribute("class", "autocomplete-list list-group text-left");
    /*append the DIV element as a child of the autocomplete container:*/

    this.parentNode.appendChild(a);
    data.forEach(function (_ref2) {
      var name = _ref2.name,
          carrier_code = _ref2.carrier_code,
          carrier_code_full = _ref2.carrier_code_full;

      if (name.substr(0, val.length).toUpperCase() === val.toUpperCase() || carrier_code.substr(0, val.length).toUpperCase() === val.toUpperCase() || carrier_code_full.substr(0, val.length).toUpperCase() === val.toUpperCase()) {
        /*create a DIV element for each matching element:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "list-group-item list-group-item-action");
        /*make the matching letters bold:*/

        b.innerHTML = "<strong>".concat(name.substr(0, val.length), "</strong>");
        b.innerHTML += name.substr(val.length);
        /*insert a input field that will hold the current array item's value:*/

        b.innerHTML += "<input type='hidden' value=\"".concat(carrier_code, "\">");
        b.innerHTML += "<span>&nbsp;(".concat(carrier_code_full, ")</span>");
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
    });
  });
  /*execute a function presses a key on the keyboard:*/

  elm.addEventListener("keydown", function (e) {
    var x = document.getElementById("".concat(this.id, "AutocompleteList"));
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

  var addActive = function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/

    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = x.length - 1;
    /*add class "autocomplete-active":*/

    x[currentFocus].classList.add("active");
  };

  var removeActive = function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("active");
    }
  };

  var closeAllLists = function closeAllLists(element) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-list");

    for (var i = 0; i < x.length; i++) {
      if (element !== x[i] && element !== elm) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  };
  /*execute a function when someone clicks in the document:*/


  document.addEventListener("click", function (e) {
    return closeAllLists(e.target);
  });
};
/******/ })()
;
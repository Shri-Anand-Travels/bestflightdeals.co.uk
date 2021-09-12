window.setInputFilter = (input, inputFilter) => {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach((event) => {
        input.addEventListener(event, ({target}) => {
            if (inputFilter(target.value)) {
                target.oldValue = target.value;
                target.oldSelectionStart = target.selectionStart;
                target.oldSelectionEnd = target.selectionEnd;
            } else if (target.hasOwnProperty("oldValue")) {
                target.value = target.oldValue;
                target.setSelectionRange(target.oldSelectionStart, target.oldSelectionEnd);
            } else {
                target.value = "";
            }
        });
    });
}

let numberInput = document.querySelectorAll(".number-input");
    numberInput.forEach(element => {
        element.addEventListener("input", function() {
            // Remove non-numeric and non-decimal point characters using a regular expression
            var sanitizedValue = element.value.replace(/[^0-9.]/g, '');

            // Ensure there's only one decimal point
            var decimalCount = sanitizedValue.split('.').length - 1;
            if (decimalCount > 1) {
                sanitizedValue = sanitizedValue.substring(0, sanitizedValue.lastIndexOf('.'));
            }

            // Update the input field with the sanitized value
            element.value = sanitizedValue;
        });
    });
// Form Validation
function validateForm(form) {
    let valid = true;
    const inputs = form.querySelectorAll('input, textarea');
    inputs.forEach(input => {
        if (!input.checkValidity()) {
            valid = false;
            input.classList.add('invalid');
        } else {
            input.classList.remove('invalid');
        }
    });
    return valid;
}

// AJAX Call
function ajaxCall(url, method, data, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open(method, url);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            callback(null, JSON.parse(xhr.responseText));
        } else {
            callback(xhr.statusText);
        }
    };
    xhr.onerror = function() {
        callback(xhr.statusText);
    };
    xhr.send(JSON.stringify(data));
}

// Dynamic Content Loading
function loadContent(url, targetElement) {
    ajaxCall(url, 'GET', null, function(error, data) {
        if (error) {
            console.error('Error loading content:', error);
            return;
        }
        targetElement.innerHTML = data;
    });
}

// Example usage
// const form = document.querySelector('form');
// form.onsubmit = function(event) {
//     event.preventDefault();
//     if (validateForm(form)) {
//         ajaxCall('/submit', 'POST', { data: formData }, function(err, response) {
//             console.log(response);
//         });
//     }
// }
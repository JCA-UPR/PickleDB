function submitForm() {
    const brand = document.getElementById('brand').value;
    const estYear = document.getElementById('estYear').value;
    const based = document.getElementById('based').value;
    const CEO = document.getElementById('CEO').value;

    const insertFormData = {
        brand: brand,
        estYear: estYear,
        based: based,
        CEO: CEO
    };

    fetch('process_data.py', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(insertFormData)
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        // Handle response data
    })
    .catch(error => {
        console.error('Error:', error);
    });
    function insertBrand() {
        var formData = new FormData(document.getElementById("brandForm"));
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "insertBrand.php", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    document.getElementById("response").innerHTML = xhr.responseText;
                    // Clear the form after successful submission if needed
                    document.getElementById("brandForm").reset();
                } else {
                    console.error('Error:', xhr.status);
                }
            }
        };
        xhr.send(formData);
    }
}

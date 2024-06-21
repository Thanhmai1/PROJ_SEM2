        document.getElementById('bmi-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const weight = parseFloat(document.getElementById('weight').value);
            const height = parseFloat(document.getElementById('height').value);
            if (isNaN(weight) || isNaN(height) || weight <= 0 || height <= 0) {
                document.getElementById('bmi-result').innerText = 'Please enter valid weight and height values.';
                return;
            }
            const bmi = (weight / (height * height)).toFixed(2);
            document.getElementById('bmi-result').innerText = `Your BMI is ${bmi}`;
        });
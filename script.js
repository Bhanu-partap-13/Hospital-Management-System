function populateDistricts() {
    var divisionSelect = document.getElementById("division");
    var districtSelect = document.getElementById("district");

    // Clear previous options
    districtSelect.innerHTML = '<option value="" disabled selected>Select District</option>';

    // Get selected division
    var selectedDivision = divisionSelect.value;

    // District options based on the selected division
    var districts = {
        'Andhra Pradesh': ['Visakhapatnam', 'Vijayawada', 'Guntur', 'Tirupati', 'Nellore'],
        'Arunachal Pradesh': ['Itanagar', 'Tawang', 'Ziro', 'Pasighat', 'Bomdila'],
        'Assam': ['Guwahati', 'Silchar', 'Dibrugarh', 'Jorhat', 'Tezpur'],
        'Bihar': ['Patna', 'Gaya', 'Bhagalpur', 'Muzaffarpur', 'Purnia'],
        'Chhattisgarh': ['Raipur', 'Bilaspur', 'Durg', 'Korba', 'Rajnandgaon'],
        'Goa': ['Panaji', 'Margao', 'Vasco da Gama', 'Mapusa', 'Ponda'],
        'Gujarat': ['Ahmedabad', 'Surat', 'Vadodara', 'Rajkot', 'Bhavnagar'],
        'Haryana': ['Gurugram', 'Faridabad', 'Panipat', 'Ambala', 'Karnal'],
        'Himachal Pradesh': ['Shimla', 'Manali', 'Dharamshala', 'Solan', 'Mandi'],
        'Jharkhand': ['Ranchi', 'Jamshedpur', 'Dhanbad', 'Bokaro', 'Hazaribagh'],
        'Karnataka': ['Bengaluru', 'Mysuru', 'Mangaluru', 'Hubli', 'Belagavi'],
        'Kerala': ['Thiruvananthapuram', 'Kochi', 'Kozhikode', 'Thrissur', 'Kannur'],
        'Madhya Pradesh': ['Bhopal', 'Indore', 'Gwalior', 'Jabalpur', 'Ujjain'],
        'Maharashtra': ['Mumbai', 'Pune', 'Nagpur', 'Nashik', 'Aurangabad'],
        'Manipur': ['Imphal', 'Churachandpur', 'Thoubal', 'Bishnupur', 'Ukhrul'],
        'Meghalaya': ['Shillong', 'Tura', 'Jowai', 'Nongpoh', 'Baghmara'],
        'Mizoram': ['Aizawl', 'Lunglei', 'Saiha', 'Serchhip', 'Champhai'],
        'Nagaland': ['Kohima', 'Dimapur', 'Mokokchung', 'Wokha', 'Tuensang'],
        'Odisha': ['Bhubaneswar', 'Cuttack', 'Rourkela', 'Sambalpur', 'Berhampur'],
        'Punjab': ['Amritsar', 'Ludhiana', 'Jalandhar', 'Patiala', 'Bathinda'],
        'Rajasthan': ['Jaipur', 'Jodhpur', 'Udaipur', 'Kota', 'Ajmer'],
        'Sikkim': ['Gangtok', 'Namchi', 'Gyalshing', 'Mangan', 'Rangpo'],
        'Tamil Nadu': ['Chennai', 'Coimbatore', 'Madurai', 'Tiruchirappalli', 'Salem'],
        'Telangana': ['Hyderabad', 'Warangal', 'Nizamabad', 'Khammam', 'Karimnagar'],
        'Tripura': ['Agartala', 'Udaipur', 'Kailashahar', 'Dharmanagar', 'Belonia'],
        'Uttar Pradesh': ['Lucknow', 'Kanpur', 'Varanasi', 'Agra', 'Meerut'],
        'Uttarakhand': ['Dehradun', 'Haridwar', 'Haldwani', 'Roorkee', 'Rishikesh'],
        'West Bengal': ['Kolkata', 'Darjeeling', 'Siliguri', 'Howrah', 'Durgapur'],
        'Andaman and Nicobar Islands': ['Port Blair', 'Rangat', 'Diglipur', 'Car Nicobar', 'Mayabunder'],
        'Chandigarh': ['Chandigarh'],
        'Daman and Diu': ['Daman', 'Diu', 'Silvassa'],
        'Lakshadweep': ['Kavaratti', 'Agatti', 'Amini', 'Minicoy'],
        'Delhi': ['Delhi'],
        'Puducherry': ['Puducherry', 'Karaikal', 'Mahe', 'Yanam'],
        'Ladakh': ['Leh', 'Kargil'],
        'Jammu and Kashmir': ['Srinagar', 'Jammu', 'Anantnag', 'Baramulla', 'Udhampur']
    };

    if (districts[selectedDivision]) {
        addOptions(districtSelect, districts[selectedDivision]);
    }
}

// Add event listener for division select change
document.getElementById('division').addEventListener('change', populateDistricts);

// Helper function to add options to select element
function addOptions(selectElement, options) {
    options.forEach(function(optionText) {
        var option = document.createElement('option');
        option.text = optionText;
        option.value = optionText.toLowerCase(); // Adjust as needed
        selectElement.add(option);
    });
}




function populateDoctors() {
    var departmentSelect = document.getElementById('department');
    var doctorSelect = document.getElementById('doctor');

    // Clear previous options
    doctorSelect.innerHTML = '<option value="" disabled selected>Select Doctor</option>';

    // Get selected department
    var selectedDepartment = departmentSelect.value;

    // Send AJAX request to fetch doctors based on selected department
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "fetch_doctors.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        if (this.status === 200) {
            try {
                var doctors = JSON.parse(this.responseText);

                // Check if there are doctors returned
                if (doctors.length > 0) {
                    // Loop through the doctors and add options
                    doctors.forEach(function(doctor) {
                        var option = document.createElement('option');
                        option.text = doctor.full_name;
                        option.value = doctor.username;  // Use the doctor's username as the value
                        doctorSelect.add(option);
                    });
                } else {
                    doctorSelect.innerHTML = '<option value="" disabled>No doctors available</option>';
                }
            } catch (error) {
                console.error("Error parsing JSON: ", error);
            }
        } else {
            console.error("Failed to fetch doctors. Status: " + this.status);
        }
    };

    xhr.send("department=" + encodeURIComponent(selectedDepartment));
}

function populateDates() {
    var doctorSelect = document.getElementById('doctor');
    var dateSelect = document.getElementById('appointment_date');

    // Clear previous options
    dateSelect.innerHTML = '<option value="" disabled selected>Select Appointment Date</option>';

    var doctorUsername = doctorSelect.value;

    if (doctorUsername) {
        // Fetch available dates for the selected doctor using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "fetch_dates.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
            if (xhr.status === 200) {
                try {
                    var dates = JSON.parse(xhr.responseText);
                    if (dates.length > 0) {
                        dates.forEach(function(date) {
                            var option = document.createElement('option');
                            option.value = date;
                            option.textContent = date;
                            dateSelect.appendChild(option);
                        });
                        dateSelect.style.display = 'block'; // Show the date select
                    } else {
                        dateSelect.innerHTML = '<option value="" disabled>No available dates</option>';
                        dateSelect.style.display = 'block'; // Show the date select even if no dates are available
                    }
                } catch (error) {
                    console.error("Error parsing JSON: ", error);
                }
            } else {
                console.error("Failed to fetch dates. Status: " + xhr.status);
            }
        };
        xhr.send("doctor_username=" + encodeURIComponent(doctorUsername));
    } else {
        dateSelect.innerHTML = '<option value="" disabled>Select Appointment Date</option>';
        dateSelect.style.display = 'none'; // Hide the date select if no doctor is selected
    }
}



document.addEventListener('DOMContentLoaded', function() {
    const doctorSelect = document.getElementById('doctor');
    const dateSelect = document.getElementById('appointment_date');
    const timeSlotSelect = document.getElementById('time_slot');

    doctorSelect.addEventListener('change', function() {
        populateDates();
        // Hide time slot select until a date is chosen
        timeSlotSelect.style.display = 'none';
    });

    dateSelect.addEventListener('change', function() {
        const selectedDate = this.value;
        const doctorUsername = doctorSelect.value;

        if (selectedDate && doctorUsername) {
            // Fetch available time slots for the selected doctor and date using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'fetch_timeslots.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    try {
                        var timeSlots = JSON.parse(xhr.responseText);
                        timeSlotSelect.innerHTML = '<option value="" disabled selected>Select Time Slot</option>'; // Clear previous options
                        if (timeSlots.length > 0) {
                            timeSlots.forEach(function(slot) {
                                var option = document.createElement('option');
                                option.value = slot;
                                option.textContent = slot;
                                timeSlotSelect.appendChild(option);
                            });
                            // Show time slot select
                            timeSlotSelect.style.display = 'block';
                        } else {
                            timeSlotSelect.innerHTML = '<option value="" disabled>No available time slots</option>';
                            timeSlotSelect.style.display = 'block';
                        }
                    } catch (error) {
                        console.error("Error parsing JSON: ", error);
                    }
                } else {
                    console.error("Failed to fetch time slots. Status: " + xhr.status);
                }
            };
            xhr.send('doctor_username=' + encodeURIComponent(doctorUsername) + '&date=' + encodeURIComponent(selectedDate));
        }
    });

    // Initially hide date and time slot selects
    dateSelect.style.display = 'none';
    timeSlotSelect.style.display = 'none';
});

function populateDoctors() {
    var departmentSelect = document.getElementById('department');
    var doctorSelect = document.getElementById('doctor');
    var districtSelect = document.getElementById('district'); // Get the district select element

    // Clear previous options
    doctorSelect.innerHTML = '<option value="" disabled selected>Select Doctor</option>';

    // Get selected department and district
    var selectedDepartment = departmentSelect.value;
    var selectedDistrict = districtSelect.value; // Get the selected district

    // Send AJAX request to fetch doctors based on selected department and district
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "fetch_doctors.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        if (xhr.status === 200) {
            try {
                var doctors = JSON.parse(xhr.responseText);

                // Check if there are doctors returned
                if (doctors.length > 0) {
                    // Loop through the doctors and add options
                    doctors.forEach(function(doctor) {
                        var option = document.createElement('option');
                        option.text = doctor.full_name;
                        option.value = doctor.username;  // Use the doctor's username as the value
                        doctorSelect.add(option);
                    });
                } else {
                    doctorSelect.innerHTML = '<option value="" disabled>No doctors available</option>';
                }
            } catch (error) {
                console.error("Error parsing JSON: ", error);
            }
        } else {
            console.error("Failed to fetch doctors. Status: " + xhr.status);
        }
    };

    xhr.send("department=" + encodeURIComponent(selectedDepartment) + "&city=" + encodeURIComponent(selectedDistrict));
}



function populateTimeSlots() {
    var dateSelect = document.getElementById('appointment_date');
    var doctorSelect = document.getElementById('doctor');
    var timeSlotSelect = document.getElementById('time_slot');

    // Clear previous options
    timeSlotSelect.innerHTML = '<option value="" disabled selected>Select Time Slot</option>';

    var doctorUsername = doctorSelect.value;
    var selectedDate = dateSelect.value;

    if (doctorUsername && selectedDate) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "fetch_timeslots.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
            if (xhr.status === 200) {
                try {
                    var timeSlots = JSON.parse(xhr.responseText);
                    if (timeSlots.length > 0) {
                        timeSlots.forEach(function(slot) {
                            var option = document.createElement('option');
                            option.value = slot;
                            option.textContent = slot;
                            timeSlotSelect.appendChild(option);
                        });
                        timeSlotSelect.style.display = 'block';
                    } else {
                        timeSlotSelect.innerHTML = '<option value="" disabled>No available time slots</option>';
                        timeSlotSelect.style.display = 'block';
                    }
                } catch (error) {
                    console.error("Error parsing JSON: ", error);
                }
            } else {
                console.error("Failed to fetch time slots. Status: " + xhr.status);
            }
        };
        xhr.send('doctor_username=' + encodeURIComponent(doctorUsername) + '&date=' + encodeURIComponent(selectedDate));
    } else {
        timeSlotSelect.innerHTML = '<option value="" disabled>Select Time Slot</option>';
        timeSlotSelect.style.display = 'none'; // Hide time slot select if no date or doctor is selected
    }
}

var myModal;
var formDataList = [];
var imageList = [];

var display;
var modal2;
//open modal on screen load
document.addEventListener('DOMContentLoaded', function () {
    // Get the modal element by its ID
    
    display = document.getElementById('mainpage');
    
    // Open the modal
    formCreation();
});

function getSelectedRadioButton() {
    // Get all radio buttons with the specified name
    var radioButtons = document.getElementsByName('technology');

    // Loop through the radio buttons to find the selected one
    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked) {
            // Return the value of the selected radio button
            return radioButtons[i].value;
        }
    }

    // Return null if no radio button is selected
    return null;
}



//save data to local storage
function saveData(data) {
    localStorage.setItem('data', JSON.stringify(data));
}

function formCreation() {

    let formDiv = document.getElementById('formDiv');

    // Create a new form group div
    let formGroup = document.createElement('div');
    formGroup.classList.add('form-group', 'formDesign');

    // Create input elements and append them to the form group
    let placeholders = ['Features', 'Sub Features', 'Reference Website', 'Description'];
   
    for (let i = 1; i <= 4; i++) {
        // Create a div element to contain the label and input
        let containerDiv = document.createElement('div');
    
        // Create a label element
        let label = document.createElement('label');
        label.for = `i${i}`;
        label.textContent = placeholders[i - 1];
    
        // Create an input element
        let input = document.createElement('input');
        input.type = 'text';
        input.classList.add('form-control');
        input.placeholder = placeholders[i - 1];
        input.id = `i${i}`;
        input.name = `i${i}`
        // Append the label and input to the container div
        containerDiv.appendChild(label);
        containerDiv.appendChild(input);
    
        // Append the container div to the form group
        formGroup.appendChild(containerDiv);
    
        // Add a line break between each pair
        formGroup.appendChild(document.createElement('br'));
    }
    
    let imgDiv = document.createElement('div');
    // Create file input element for multiple image files
    let labels = document.createElement('label');
        labels.for = `fileInput`;
        labels.textContent = 'Reference Images';
    let fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = 'image/*'; // Accept only image files
    fileInput.classList.add('form-control-file');
    fileInput.id = 'fileInput';
    fileInput.name = 'fileInput';
    fileInput.setAttribute('multiple', 'multiple');

    // Add an event listener to trigger image display on file selection
    fileInput.addEventListener('change', function() {
        getFormData();
    });

    // Append the file input to the form group
    imgDiv.appendChild(labels);
    imgDiv.appendChild(fileInput);
    formGroup.append(imgDiv);
    // Append the form group to the formDiv
    formDiv.appendChild(formGroup);

    formGroup.appendChild(document.createElement('br'));

    // Update the formDataList after adding a new form
    getFormData();
}

// function previewImages() {
//     const input = document.getElementById('formsDiv');
//     const previewContainer = document.getElementById('imagediv1');

//     const files = input.files;
    
//     for (const file of files) {
//       const reader = new FileReader();
//       reader.onload = function (e) {
//         const img = document.createElement('img');
//         img.src = e.target.result;
//         img.classList.add('preview-image');
//         previewContainer.appendChild(img);
       


//       }
//     }
// }
function previewImages() {
    const input = document.getElementById('image-input');
    const previewContainer = document.getElementById('image-preview');

    const files = input.files;

    for(const file of files) {
        console.log('Selected file:', files);
        imageList.push(file)
        const reader = new FileReader();
        reader.onload = function (e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.classList.add('preview-image');
            previewContainer.appendChild(img);
        };

        reader.readAsDataURL(file);
    }
}

function getImages(files) {
    // Filter out non-image files
    let imgList = Array.from(files).filter(file => file.type.startsWith('image/'));
    
    // Return an array of file objects
    return imageFiles;
}

function addForm() {
    if (validateFields()) {
        formCreation();
        // Log the list of form data to the console
        console.log(formDataList);
    } else {
        alert("Please fill in all the fields before adding a new form.");
    }
}

function submitData() {
    if (validateFields() && validateRadioButtons()) {
        let technology = getSelectedRadioButton();
        getFormData();
        let data = {
            technology: technology,
            formDataList: formDataList
        };
        console.log(data);
        modal2.show();
        // localStorage.setItem('data', JSON.stringify(data));
        // window.location.href = 'submit.html';
    } else {
        alert("Please fill in all the fields before submitting data.");
    }
}

function validateFields() {
    let formElements = document.querySelectorAll('#formDiv .formDesign');

    for (let formElement of formElements) {
        let inputs = formElement.querySelectorAll('input[type="text"]');
        for (let input of inputs) {
            if (input.value.trim() === "") {
                return false; // Field is empty
            }
        }
    }

    return true; // All fields are filled
}

function validateRadioButtons() {
    let radioButtons = document.querySelectorAll('input[type="radio"]');
    for (let radioButton of radioButtons) {
        if (radioButton.checked) {
            return true; // At least one radio button is selected
        }
    }

    return false; // No radio button is selected
}

function getFormData() {
    formDataList = [];

    let formElements = document.querySelectorAll('#formDiv .formDesign');

    formElements.forEach((formElement) => {
        let formData = {
            features: formElement.querySelector('#i1').value,
            subFeatures: formElement.querySelector('#i2').value,
            website: formElement.querySelector('#i3').value,
            description: formElement.querySelector('#i4').value,
            images: getSelectedImages(formElement.querySelector('#fileInput').files)
        };
        
        formDataList.push(formData);
    });

    // Display selected images in the "imageDiv"
    displayImages();
}

function getSelectedImages(files) {
    // Filter out non-image files
    let imageFiles = Array.from(files).filter(file => file.type.startsWith('image/'));
    
    // Return an array of file objects
    return imageFiles;
}


function displayImages() {
    let imageDiv = document.getElementById('imageDiv');
    imageDiv.innerHTML = ''; // Clear existing content

    formDataList.forEach((formData, index) => {
        formData.images.forEach((image, i) => {
            let card = document.createElement('div');
            card.classList.add('card');
            card.classList.add('imgCard');

            let img = document.createElement('img');
            img.src = URL.createObjectURL(image);
            img.alt = `Image ${i + 1}`;

            // Set fixed height and width for the image
            img.style.width = '100px';
            img.style.height = '100px';

            card.appendChild(img);
            imageDiv.appendChild(card);
        });
    });
}

  function goBack() {
    // Use window.history to navigate back
    window.history.back();
  }

  function previewImages() {
    const input = document.getElementById('image-input');
    const previewContainer = document.getElementById('image-preview');

    const files = input.files;
     imageList.push(files);
    for (const file of files) {
      const reader = new FileReader();

      reader.onload = function (e) {
        const img = document.createElement('img');
        img.src = e.target.result;
        img.classList.add('preview-image');
        previewContainer.appendChild(img);
      };

      reader.readAsDataURL(file);
    }


  }


  function submitData() {
    if (validateFields() && validateRadioButtons()) {
        let technology = getSelectedRadioButton();
        let stData = JSON.parse(localStorage.getItem('data'));
        getFormData();
        let data = {
            
            technology: technology,
            formDataList: formDataList,
            imglist:imageList
        };
        console.log(data);
    

    
    } else {
        alert("Please fill in all the fields before adding a new form.");
    }
}



function toggleInput(showInput) {
    var inputElement = document.getElementById("thirdPartyInput");
    inputElement.style.display = showInput ? "block" : "none";
}


document.addEventListener('DOMContentLoaded', function () {
    flatpickr("#startDatePicker", {
      enableTime: false,
      dateFormat: "Y-m-d",
      minDate: "today",
      altInput: true,
      altFormat: "F j, Y",
      theme: "light",
      onChange: function(selectedDates, dateStr, instance) {
        console.log("Start Date Selected:", dateStr);
      },
    });

    flatpickr("#endDatePicker", {
      enableTime: false,
      dateFormat: "Y-m-d",
      minDate: "today",
      altInput: true,
      altFormat: "F j, Y",
      theme: "light",
      onChange: function(selectedDates, dateStr, instance) {
        console.log("End Date Selected:", dateStr);
      },
    });
  });
// js for showing the files in the image and feature box
// function displayImages(input, boxId) {
//     var container = document.getElementById(boxId);
//     var files = input.files;

//     for (var i = 0; i < files.length; i++) {
//         var file = files[i];

//         if (file) {
//             var reader = new FileReader();

//             reader.onload = function (e) {
//                 var img = document.createElement('img');
//                 img.src = e.target.result;

//                 if (boxId === 'imageBox') {
//                     // If it's the image box, append to the image box
//                     document.getElementById('imageBox').appendChild(img);
//                 } else if (boxId === 'featureBox') {
//                     // If it's the feature box, append to the feature box
//                     container.appendChild(img);
//                 }
//             };

//             reader.readAsDataURL(file);
//         }
//     }
// }

// js for cloning feature boxes
document.addEventListener("DOMContentLoaded", function() {
    
    var mainContainer = document.getElementById('mainContainer');

    
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('cloneButton')) {
            
            var clickedContainer = event.target.closest('.container');
            var clonedContainer = clickedContainer.cloneNode(true);
            mainContainer.appendChild(clonedContainer);

           
            clickedContainer.querySelector('.cloneButton').classList.add('hidden');

            
            clonedContainer.querySelector('.cloneButton').classList.remove('hidden');
        }
    });
});
// js for taking to the previous page

function goBack() {
    window.history.back();
}



function toggleInput(showInput) {
    var inputElement = document.getElementById("thirdPartyInput");
    inputElement.style.display = showInput ? "block" : "none";
}


    // js for datepicker

    
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
    function previewImages() {
      const input = document.getElementById('ibox');
      const previewContainer = document.getElementById('imageBox');
  
      const files = input.files;
  
      for (const file of files) {
        const reader = new FileReader();
  
        reader.onload = function (e) {
          const img = document.createElement('img');
          img.src = e.target.result;
          previewContainer.appendChild(img);
        };
  
        reader.readAsDataURL(file);
      }
      let imageList = files;
  
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
          input.classList.add('featurebox');
          input.placeholder = placeholders[i - 1];
          input.id = `i${i}`;
      
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
  
    


  





  

       












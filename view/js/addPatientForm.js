let noPatients = document.getElementById("no-patients");
noPatients.addEventListener("change", addForm);
let patientForm = document.getElementById("patient-forms");

function addForm(){
    numPatients = noPatients.value;
    if(numPatients >= 1 || numPatients <= 6 ){
        patientForm.classList.remove("hidden");
        let forms = '';
        for(let i = 0; i < numPatients; i++){
            forms += '<div class="col-12 col-md-6 col-lg-4"> ' +
                '<div class="form-group">\n' +
                '                    <label for="name" class="input-label">Full Name</label>\n' +
                '                    <input type="text" class="form-control input-field" placeholder="Enter Your Name" id="name" aria-describedby="">\n' +
                '                </div>'+
            '</div>';
        }

        patientForm.innerHTML = forms;
    } else {
        patientForm.classList.add("hidden");
    }

}
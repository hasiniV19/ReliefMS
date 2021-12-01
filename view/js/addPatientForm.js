let noPatients = document.getElementById("no-patients");
noPatients.addEventListener("change", addForm);
let patientForm = document.getElementById("patient-forms");

function addForm(){
    numPatients = noPatients.value;
    if(numPatients > 6){
        numPatients = 6;
    }
    if(numPatients >= 1 && numPatients <= 6){
        patientForm.classList.remove("hidden");
        let forms = '<h2 class="col-12 title" >Fill out Patients Details</h2>';
        for(let i = 0; i < numPatients; i++){
            let num = i+1;
            forms += '<div class="col-12 col-md-6 col-lg-4"> ' +
                '<h5 style="color: #ff6666; font-weight: lighter">Patient ' + num  +'</h5>'+
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
let noPatients = document.getElementById("no-patients");
noPatients.addEventListener("change", addForm);
let patientForm = document.getElementById("patient-forms");

function addForm(){
    let numPatients = noPatients.value;
    if(numPatients > 6){
        numPatients = 6;
    }
    if(numPatients >= 1 && numPatients <= 6){
        patientForm.classList.remove("hidden");
        let forms = '<h2 class="col-12 title" >Fill out Patients Details</h2>';
        for(let i = 0; i < numPatients; i++){
            let num = i+1;
            forms += '<div class="col-12 col-md-6 col-lg-4"> ' +
                '<div class="form-border p-3 mt-3 mb-3">\n'+
                '<h5 style="color: #ff6666; font-weight: lighter">Patient ' + num  +'</h5>'+
                '<div class="form-group">\n' +
                '                    <label for="name" class="input-label">Full Name</label>\n' +
                '                    <input name="nameOfPatient'+num+ '" type="text" class="form-control input-field" placeholder="Enter Your Name" id="name" aria-describedby="">\n' +
                '                </div>'+
                '<div class="form-group">\n'+
                    '<label for="age" class="input-label">Age</label>\n'+
                    '<input name="ageOfPatient' +num +'" type="number" class="form-control input-field" placeholder="Enter Age" id="age" min="1" max="99" aria-describedby="">\n'+
                '</div>'+
                '<div class="form-group">'+
                    '<label for="gender" class="input-label">Gender</label>'+
                    '<div class="form-control input-field">'+
                        '<div class="form-check form-check-inline">'+
                            '<input class="input-radio100" id="radio1" type="radio" name="gender'+num+'" value="male" checked>'+
                                '<label class="label-radio100" for="radio1"> Male</label>'+
                        '</div>'+
                        '<div class="form-check form-check-inline">'+
                            '<input class="input-radio100" id="radio2" type="radio" name="gender'+num+'" value="female">'+
                                '<label class="label-radio100" for="radio2"> Female</label>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="form-group">\n' +
                '                <label for="covid_status" class="input-label">Covid Status</label>\n' +
                '                <select name="covid_status'+num+'" id="inputState" class="form-control input-field">\n' +
                '                    <option value="positive" selected>Positive</option>\n' +
                '                    <option value="firstContact">First Contact</option>\n' +
                '                    <option value="secondContact">Second Contact</option>\n' +
                '                </select>\n' +
                '</div>'+
                '</div>'+
            '</div>';
        }

        patientForm.innerHTML = forms;
    } else {
        patientForm.classList.add("hidden");
    }

}
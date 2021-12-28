// let checkbox = document.querySelector("input[name=checkbox]");

let anyStudentYesCheckbox = document.getElementById("yes");
let anyStudentNoCheckbox = document.getElementById("no");
let studentDetails = document.getElementById("student-details");
let noStudents = document.getElementById("no-students");
anyStudentYesCheckbox.addEventListener('change', function() {
    if (this.checked) {
        studentDetails.classList.remove("hidden");
        noStudents.setAttribute("required", "");
    } else {
        studentDetails.classList.add("hidden");
        noStudents.removeAttribute("required");
    }
});

anyStudentNoCheckbox.addEventListener('change', function() {
    if (this.checked) {
        studentDetails.classList.add("hidden");
        noStudents.removeAttribute("required");
    } else {
        studentDetails.classList.remove("hidden");
        noStudents.setAttribute("required", "");
    }
});

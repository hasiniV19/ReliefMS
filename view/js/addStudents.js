// let checkbox = document.querySelector("input[name=checkbox]");

let anyStudentYesCheckbox = document.getElementById("yes");
let anyStudentNoCheckbox = document.getElementById("no");
let studentDetails = document.getElementById("student-details");
anyStudentYesCheckbox.addEventListener('change', function() {
    if (this.checked) {
        studentDetails.classList.remove("hidden");
    } else {
        studentDetails.classList.add("hidden");
    }
});

anyStudentNoCheckbox.addEventListener('change', function() {
    if (this.checked) {
        studentDetails.classList.add("hidden");
    } else {
        studentDetails.classList.remove("hidden");
    }
});

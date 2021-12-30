document.getElementById('edit').onclick = function() {
    document.getElementById('full-name').removeAttribute('readonly');
    document.getElementById('address').removeAttribute('readonly');
    document.getElementById('age').removeAttribute('readonly');
    document.getElementById('mobile').removeAttribute('readonly');
    document.getElementById('district').removeAttribute('readonly');
};
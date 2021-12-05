let collect_method = document.getElementById("collect-method");
collect_method.addEventListener('change', toggleStation);

document.getElementById('edit').onclick = function() {
    document.getElementById('address').removeAttribute('readonly');
};

function toggleStation()
{
    let station_part = document.getElementById("station-part");
    let address_part = document.getElementById("address-part");
    if(this.value === "station"){
        station_part.classList.remove("hidden");
        address_part.classList.add("hidden");
    } else if(this.value === "home"){
        station_part.classList.add("hidden");
        address_part.classList.remove("hidden");
    }
}
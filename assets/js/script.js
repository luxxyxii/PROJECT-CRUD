function openModal() {
    document.getElementById("modal").style.display = "block";
}

function closeModal() {
    document.getElementById("modal").style.display = "none";
}

function pilihData(id) {
    document.getElementById("selected_id").value = id;

    // highlight baris terpilih
    let rows = document.querySelectorAll("tr");
    rows.forEach(row => row.classList.remove("active"));
    event.currentTarget.classList.add("active");
}

function editData() {
    let id = document.getElementById("selected_id").value;
    if (!id) {
        alert("Pilih data dulu!");
        return;
    }
    window.location = "edit.php?id=" + id;
}

function hapusData() {
    let id = document.getElementById("selected_id").value;
    if (!id) {
        alert("Pilih data dulu!");
        return;
    }
    if (confirm("Yakin hapus data?")) {
        window.location = "hapus.php?id=" + id;
    }
}

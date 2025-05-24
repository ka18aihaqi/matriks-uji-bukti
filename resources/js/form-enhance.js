// Format NPWP dan Tahun Pajak
document.addEventListener("DOMContentLoaded", () => {
    const npwpInput = document.querySelector('input[name="npwp"]');
    if (npwpInput) {
        npwpInput.addEventListener("input", function () {
            let angka = this.value.replace(/\D/g, "");
            if (angka.length > 15) angka = angka.substring(0, 15);

            let format = "";
            if (angka.length > 0) format += angka.substring(0, 2);
            if (angka.length > 2) format += "." + angka.substring(2, 5);
            if (angka.length > 5) format += "." + angka.substring(5, 8);
            if (angka.length > 8) format += "." + angka.substring(8, 9);
            if (angka.length > 9) format += "-" + angka.substring(9, 12);
            if (angka.length > 12) format += "." + angka.substring(12, 15);

            this.value = format;
        });
    }

    const tahunInput = document.querySelector('input[name="tahun_pajak"]');
    if (tahunInput) {
        tahunInput.addEventListener("input", function () {
            this.value = this.value.replace(/\D/g, "").substring(0, 4);
        });
    }
});

// Select All
document.addEventListener('DOMContentLoaded', function () {
    const selectAllCheckbox = document.getElementById('selectAll');
    const rowCheckboxes = document.querySelectorAll('tbody input[type="checkbox"]');

    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function () {
            rowCheckboxes.forEach(cb => cb.checked = this.checked);
        });
    }
});

// Check All
document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.row-checkbox');
    const exportBtn = document.getElementById('exportBtn');
    const deleteBtn = document.getElementById('deleteBtn');

    function updateButtons() {
        const checked = Array.from(checkboxes).filter(cb => cb.checked);

        // Atur tombol Hapus
        deleteBtn.disabled = checked.length === 0;

        // Atur tombol Export
        if (checked.length === 0) {
            exportBtn.disabled = true;
            return;
        }

        const first = checked[0].dataset;
        const allSame = checked.every(cb =>
            cb.dataset.nama === first.nama &&
            cb.dataset.npwp === first.npwp &&
            cb.dataset.tahun === first.tahun &&
            cb.dataset.sp2 === first.sp2 &&
            cb.dataset.supervisor === first.supervisor
        );

        exportBtn.disabled = !allSame;
    }

    checkboxes.forEach(cb => cb.addEventListener('change', updateButtons));

    // Tambahkan juga handler untuk select all
    const selectAll = document.getElementById('selectAll');
    if (selectAll) {
        selectAll.addEventListener('change', function () {
            checkboxes.forEach(cb => cb.checked = this.checked);
            updateButtons();
        });
    }
});

// Delay Filter
let typingTimer;
const delay = 1000;
const filterInput = document.querySelector('#filterForm input[name="q"]');

if (filterInput) {
    filterInput.addEventListener('input', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(() => {
            document.getElementById('filterForm').submit();
        }, delay);
    });
}

// Only Number
document.addEventListener('DOMContentLoaded', function () {
    const usernameInput = document.getElementById('username');
    usernameInput.addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '').slice(0, 9); // hanya digit, maksimal 9 angka
    });
});
const config = {
    search: true, // Toggle search feature. Default: false
    creatable: false, // Creatable selection. Default: false
    clearable: true, // Clearable selection. Default: false
    // maxHeight: '360px', // Max height for showing scrollbar. Default: 360px
    size: '', // Can be "sm" or "lg". Default ''
}

let selectBox = document.querySelectorAll('.select-box');
selectBox.forEach(element => {
    dselect(element, config)
});
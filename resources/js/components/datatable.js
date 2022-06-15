$(document).ready(function () {
    if (document.getElementsByClassName('datatable')) {
        $('.datatable').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
            }
        });
    }
});
$(document).ready(function () {
    Biblioteca.validacionGeneral('form-general');
    $('#foto').fileinput({
        language: 'es',
        allowedFileExtensions: ['jpg', 'jpeg', 'png'],
        maxFileSize: 5000,
        showUpload: false,
        showClose: false,
        // Mostrar imagen previa guardada
        initialPreviewAsData: true,
        // Para arrastrar imagen
        dropZoneEnabled: true,
        // Íconos de fa, si se usan otros cambiar
        theme: "fa",
    });
});
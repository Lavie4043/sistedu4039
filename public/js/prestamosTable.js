function inicializarPrestamos() {
  const tabla = document.getElementById('examplePrestamos');
  if (!tabla) {
    console.warn("⚠️ La tabla #examplePrestamos no existe en el DOM.");
    return;
  }

  if ($.fn.DataTable.isDataTable('#examplePrestamos')) {
    $('#examplePrestamos').DataTable().destroy();
  }

  const dt = $('#examplePrestamos').DataTable({
    responsive: true,
    lengthChange: true,
    autoWidth: false,
    dom: 'Bfrtip',
    buttons: [
      {
        extend: 'collection',
        text: '📁 Reportes',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
      },
      {
        extend: 'colvis',
        text: '🧩 Visor de columnas'
      }
    ],
    language: {
      search: "🔍 Buscar:",
      paginate: {
        first: "Primero",
        last: "Último",
        next: "Siguiente",
        previous: "Anterior"
      },
      info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
      lengthMenu: "Mostrar _MENU_ registros",
      emptyTable: "⚠️ No hay información disponible",
      zeroRecords: "Sin resultados encontrados",
      loadingRecords: "Cargando...",
      processing: "Procesando..."
    }
  });

  // 🔧 Esta línea es clave para que los botones se muestren
  dt.buttons().container().appendTo('#examplePrestamos_wrapper .col-md-6:eq(0)');
}
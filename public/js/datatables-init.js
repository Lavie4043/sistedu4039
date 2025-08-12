function inicializarTabla(idTabla) {
  if ($.fn.DataTable.isDataTable(idTabla)) {
    $(idTabla).DataTable().clear().destroy();
  }

  const tabla = $(idTabla).DataTable({
    pageLength: 5,
    responsive: true,
    lengthChange: true,
    autoWidth: false,
    language: {
      url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
    },
    buttons: [
      {
        extend: 'collection',
        text: 'Reportes',
        orientation: 'landscape',
        buttons: ['copy', 'pdf', 'csv', 'excel', 'print']
      },
      {
        extend: 'colvis',
        text: 'Visor de columnas',
        collectionLayout: 'fixed three-column'
      }
    ]
  });

  tabla.buttons().container().appendTo(`${idTabla}_wrapper .col-md-6:eq(0)`);
}
const wrapperSelector = `${idTabla}_wrapper .col-md-6:eq(0)`;

setTimeout(() => {
  if ($(wrapperSelector).length && !$(wrapperSelector).find('.dt-buttons').length) {
    tabla.buttons().container().appendTo(wrapperSelector);
  } else {
    console.warn(`⚠️ Contenedor no encontrado o botones ya insertados para ${idTabla}`);
  }
}, 100);


(function validarTablaLavie() {
  const tabla = document.querySelector('#examplePrestamosHerramientas');
  if (!tabla) {
    console.warn("⚠️ La tabla #examplePrestamos no existe en el DOM.");
    return;
  }

  const filas = tabla.querySelectorAll('tbody tr');
  const columnasEsperadas = tabla.querySelectorAll('thead th').length;

  console.log(`🔍 Validando ${filas.length} filas contra ${columnasEsperadas} columnas...`);

  filas.forEach((tr, i) => {
    const celdas = tr.children.length;
    if (celdas === columnasEsperadas) {
      tr.style.border = '2px solid green';
      console.log(`✅ Fila ${i + 1} validada con éxito 🎉 (${celdas} celdas)`);
    } else {
      tr.style.border = '2px solid red';
      console.warn(`❌ Fila ${i + 1} tiene ${celdas} celdas, se esperaban ${columnasEsperadas}`);
    }
  });

  if (filas.length === 0) {
    console.warn("⚠️ No se encontraron filas en el <tbody>. ¿El foreach está ejecutándose?");
  }
})();
// script.js
const tabla = document.getElementById('mi-tabla');

// Obtener la fecha actual
const fechaActual = new Date();

// Obtener el primer día del mes actual
const primerDiaMes = new Date(fechaActual.getFullYear(), fechaActual.getMonth(), 1);

// Obtener el último día del mes actual
const ultimoDiaMes = new Date(fechaActual.getFullYear(), fechaActual.getMonth() + 1, 0);

function generarColumnas() {
    // Obtener la fila de encabezados
    const filaEncabezados = tabla.querySelector('thead tr');

    // Iterar sobre el rango de fechas
    let fechaActual = primerDiaMes;
    while (fechaActual <= ultimoDiaMes) {
        // Crear un nuevo encabezado <th>
        const encabezado = document.createElement('th');

        // Asignar el identificador único (fecha) al encabezado
        encabezado.setAttribute('id', `${fechaActual.getFullYear()}-${fechaActual.getMonth() + 1}-${fechaActual.getDate()}`);

        // Agregar el texto del encabezado (día del mes)
        encabezado.textContent = fechaActual.getDate();

        // Agregar el encabezado a la fila de encabezados
        filaEncabezados.appendChild(encabezado);

        // Avanzar al siguiente día
        fechaActual.setDate(fechaActual.getDate() + 1);
    }
}

// Llamar a la función para generar las columnas
generarColumnas();

////////////////fase 2
//<button id="cargarDatos">Cargar Datos</button>


    document.addEventListener('DOMContentLoaded', function() {
    // Obtener la fecha actual
    const fechaActual = new Date();

    // Función para obtener el número de días del mes actual
    function obtenerDiasMes(anio, mes) {
    return new Date(anio, mes + 1, 0).getDate();
}

    // Función para generar los encabezados de las columnas con variables únicas
    function generarEncabezadosColumnas() {
    const encabezadosColumnas = document.querySelector('#mi-tabla thead tr');
    const numDias = obtenerDiasMes(fechaActual.getFullYear(), fechaActual.getMonth());
    const year = fechaActual.getFullYear();
    const month = fechaActual.getMonth() + 1; // Los meses comienzan desde 0

    for (let i = 1; i <= numDias; i++) {
    const th = document.createElement('th');
    const dia = i.toString().padStart(2, '0'); // Agregar un cero inicial para días de un solo dígito
    const variable = `${dia}/${month}/${year}`; // Crear la variable única
    th.textContent = i;
    th.setAttribute('data-variable', variable); // Asignar la variable única al atributo data-variable
    encabezadosColumnas.appendChild(th);
}
}

    // Llamar a la función para generar los encabezados de las columnas
    generarEncabezadosColumnas();

    // Función para insertar una cantidad especificada de celdas vacías después de cada fila de datos
    function crearCeldas(cantidadCeldas) {
    const filas = document.querySelectorAll('#mi-tabla tbody tr');
    filas.forEach(fila => {
    for (let i = 0; i < cantidadCeldas; i++) {
    const celda = document.createElement('td');
    celda.classList.add('iz');
    fila.appendChild(celda);
}
});
}

    // Llama a la función para crear celdas vacías después de cada fila de datos
    const numDias = obtenerDiasMes(fechaActual.getFullYear(), fechaActual.getMonth());
    crearCeldas(numDias);

    // Función para obtener los datos de la tabla `consultas` del día actual y filtrarlos por rango de edad
    function obtenerDatosConsultas() {
    // Realizar una petición AJAX o llamada al backend para obtener los datos
    // Ejemplo con una petición AJAX:
    fetch('/obtener-datos-consultas')
    .then(response => response.json())
    .then(datos => {
    // Filtrar los datos por rango de edad
    const datosFiltrados = filtrarPorEdad(datos);
    // Contar los resultados por rango de edad
    const datosContados = contarResultados(datosFiltrados);
    // Mapear los datos contados a las celdas correspondientes
    mapearDatosAColumnas(datosContados);
})
    .catch(error => console.error('Error al obtener los datos:', error));
}

    // Función para filtrar los datos por rango de edad
    function filtrarPorEdad(datos) {
    // Lógica para filtrar los datos por rango de edad
    // ...
    // Devolver un arreglo de objetos con los datos filtrados por rango de edad
    return datosFiltrados;
}

    // Función para contar los resultados por rango de edad
    function contarResultados(datosFiltrados) {
    // Lógica para contar los resultados por rango de edad
    // ...
    // Devolver un arreglo de objetos con el conteo por rango de edad
    return datosContados;
}

    // Función para mapear los datos contados a las celdas correspondientes
    function mapearDatosAColumnas(datosContados) {
    const filas = document.querySelectorAll('#mi-tabla tbody tr');
    const encabezados = document.querySelectorAll('#mi-tabla thead tr th');

    datosContados.forEach(dato => {
    const rango = dato.rango; // Asumiendo que cada objeto tiene una propiedad 'rango'
    const conteo = dato.conteo; // Asumiendo que cada objeto tiene una propiedad 'conteo'

    const encabezadoCorrespondiente = Array.from(encabezados).find(encabezado => encabezado.textContent.includes(rango));

    if (encabezadoCorrespondiente) {
    const indiceColumna = Array.from(encabezados).indexOf(encabezadoCorrespondiente);
    const celdaCorrespondiente = filas[0].children[indiceColumna];
    celdaCorrespondiente.textContent = conteo; // Mostrar el conteo en la celda correspondiente
}
});
}

    // Función para marcar en gris las columnas de sábado y domingo
    function marcarColumnasFinDeSemana() {
    const encabezados = document.querySelectorAll('#mi-tabla thead tr th');

    encabezados.forEach(encabezado => {
    const variable = encabezado.getAttribute('data-variable');
    const diaSemana = new Date(variable).getDay(); // 0 = domingo, 6 = sábado

    if (diaSemana === 0 || diaSemana === 6) {
    encabezado.style.backgroundColor = 'gray';
}
});
}

    // Evento click del botón "Cargar Datos"
    document.getElementById('cargarDatos').addEventListener('click', () => {
    obtenerDatosConsultas();
    marcarColumnasFinDeSemana();
});
});

    /////////fase 2


    document.addEventListener('DOMContentLoaded', function() {
    // Obtener la fecha actual
    const fechaActual = new Date();

    // Función para obtener el número de días del mes actual
    function obtenerDiasMes(anio, mes) {
    return new Date(anio, mes + 1, 0).getDate();
}

    // Función para generar los encabezados de las columnas con variables únicas
    function generarEncabezadosColumnas() {
    const encabezadosColumnas = document.querySelector('#mi-tabla thead tr');
    const numDias = obtenerDiasMes(fechaActual.getFullYear(), fechaActual.getMonth());
    const year = fechaActual.getFullYear();
    const month = fechaActual.getMonth() + 1; // Los meses comienzan desde 0

    for (let i = 1; i <= numDias; i++) {
    const th = document.createElement('th');
    const dia = i.toString().padStart(2, '0'); // Agregar un cero inicial para días de un solo dígito
    const variable = `${dia}/${month}/${year}`; // Crear la variable única
    th.textContent = i;
    th.setAttribute('data-variable', variable); // Asignar la variable única al atributo data-variable
    encabezadosColumnas.appendChild(th);
}
}

    // Llamar a la función para generar los encabezados de las columnas
    generarEncabezadosColumnas();

    // Función para insertar una cantidad especificada de celdas vacías después de cada fila de datos
    function crearCeldas(cantidadCeldas) {
    const filas = document.querySelectorAll('#mi-tabla tbody tr');
    filas.forEach(fila => {
    for (let i = 0; i < cantidadCeldas; i++) {
    const celda = document.createElement('td');
    celda.classList.add('iz');
    fila.appendChild(celda);
}
});
}

    // Llama a la función para crear celdas vacías después de cada fila de datos
    const numDias = obtenerDiasMes(fechaActual.getFullYear(), fechaActual.getMonth());
    crearCeldas(numDias);

    // Función para colorear las columnas de sábado y domingo
    function esSabadoODomingo(fecha) {
    const diaSemana = fecha.getDay();
    return diaSemana === 0 || diaSemana === 6; // 0 = domingo, 6 = sábado
}

    function colorearColumnasFinDeSemana() {
    const encabezados = document.querySelectorAll('#mi-tabla thead tr th');
    const filas = document.querySelectorAll('#mi-tabla tbody tr');

    encabezados.forEach((encabezado, indiceColumna) => {
    const variableUnica = encabezado.getAttribute('data-variable');
    const [dia, mesActual, anioActual] = variableUnica.split('/');
    const fecha = new Date(anioActual, mesActual - 1, dia);

    if (esSabadoODomingo(fecha)) {
    encabezado.style.backgroundColor = 'red';
    filas.forEach(fila => {
    const celda = fila.children[indiceColumna];
    celda.style.backgroundColor = 'red';
});
} else {
    encabezado.style.backgroundColor = '';
    filas.forEach(fila => {
    const celda = fila.children[indiceColumna];
    celda.style.backgroundColor = '';
});
}
});
}

    // Llamar a la función para colorear las columnas de sábado y domingo
    colorearColumnasFinDeSemana();
});

    // Función para colorear las columnas de sábado y domingo
        function colorearColumnasFinDeSemana() {
            const encabezados = document.querySelectorAll('#mi-tabla thead tr th');
            const filas = document.querySelectorAll('#mi-tabla tbody tr');

            encabezados.forEach((encabezado, indiceColumna) => {
                const variableUnica = encabezado.getAttribute('data-variable');
                const fecha = new Date(variableUnica);
                const diaSemana = fecha.getDay(); // 0 = domingo, 6 = sábado

                if (diaSemana === 0 || diaSemana === 6) {
                    encabezado.style.backgroundColor = 'red'; // Colorear de rojo el encabezado

                    filas.forEach(fila => {
                        const celda = fila.children[indiceColumna];
                        celda.style.backgroundColor = 'red'; // Colorear de rojo la celda correspondiente
                    });
                } else {
                    encabezado.style.backgroundColor = ''; // Restablecer el color de fondo del encabezado

                    filas.forEach(fila => {
                        const celda = fila.children[indiceColumna];
                        celda.style.backgroundColor = ''; // Restablecer el color de fondo de la celda
                    });
                }
            });
        }

        // Llamar a la función para colorear las columnas de sábado y domingo
        colorearColumnasFinDeSemana();


////////////// fase 3

    function obtenerDiaActual() {
    const fechaActual = new Date();
    const diaActual = fechaActual.getDate();
    return diaActual;
}

    // Obtener el día actual
    const dia = obtenerDiaActual();

 /////////fase 4
/*obtener los datos de la base de datos
*
*
SELECT
    SUM(CASE WHEN edad < 1/12 THEN 1 ELSE 0 END) AS 'Menores de 1 Mes',
    SUM(CASE WHEN edad >= 1/12 AND edad < 1 THEN 1 ELSE 0 END) AS '1 Mes a 1 año',
    SUM(CASE WHEN edad >= 1 AND edad < 5 THEN 1 ELSE 0 END) AS '1 a 4 años',
    SUM(CASE WHEN edad >= 5 AND edad < 10 THEN 1 ELSE 0 END) AS '5 a 9 años',
    SUM(CASE WHEN edad >= 10 AND edad < 15 THEN 1 ELSE 0 END) AS '10 a 14 años',
    SUM(CASE WHEN edad >= 15 AND edad < 20 THEN 1 ELSE 0 END) AS '15 a 19 años',
    SUM(CASE WHEN edad >= 20 AND edad < 50 THEN 1 ELSE 0 END) AS '20 a 49 años',
    SUM(CASE WHEN edad >= 50 AND edad < 60 THEN 1 ELSE 0 END) AS '50 a 59 años',
    SUM(CASE WHEN edad >= 60 THEN 1 ELSE 0 END) AS '60 y + años'
FROM
    pacientes p
    JOIN consultas c ON p.id = c.paciente_id;

Y si necesitan calcular la edad a partir de la fecha_nacimiento, la consulta quedaría así:

SELECT
SUM(CASE WHEN TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) < 1/12 THEN 1 ELSE 0 END) AS 'Menores de 1 Mes',
    SUM(CASE WHEN TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) >= 1/12 AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) < 1 THEN 1 ELSE 0 END) AS '1 Mes a 1 año',
    SUM(CASE WHEN TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) >= 1 AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) < 5 THEN 1 ELSE 0 END) AS '1 a 4 años',
    SUM(CASE WHEN TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) >= 5 AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) < 10 THEN 1 ELSE 0 END) AS '5 a 9 años',
    SUM(CASE WHEN TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) >= 10 AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) < 15 THEN 1 ELSE 0 END) AS '10 a 14 años',
    SUM(CASE WHEN TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) >= 15 AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) < 20 THEN 1 ELSE 0 END) AS '15 a 19 años',
    SUM(CASE WHEN TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) >= 20 AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) < 50 THEN 1 ELSE 0 END) AS '20 a 49 años',
    SUM(CASE WHEN TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) >= 50 AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) < 60 THEN 1 ELSE 0 END) AS '50 a 59 años',
    SUM(CASE WHEN TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) >= 60 THEN 1 ELSE 0 END) AS '60 y + años'
FROM
pacientes p
JOIN consultas c ON p.id = c.paciente_id;

SELECT
SUM(CASE WHEN edad < 1/12 AND es_nuevo = 1 THEN 1 ELSE 0 END) AS 'Menores de 1 Mes Nuevos',
    SUM(CASE WHEN edad < 1/12 AND es_nuevo = 0 THEN 1 ELSE 0 END) AS 'Menores de 1 Mes Subsiguientes',
    SUM(CASE WHEN edad >= 1/12 AND edad < 1 AND es_nuevo = 1 THEN 1 ELSE 0 END) AS '1 Mes a 1 año Nuevos',
    SUM(CASE WHEN edad >= 1/12 AND edad < 1 AND es_nuevo = 0 THEN 1 ELSE 0 END) AS '1 Mes a 1 año Subsiguientes',
    SUM(CASE WHEN edad >= 1 AND edad < 5 AND es_nuevo = 1 THEN 1 ELSE 0 END) AS '1 a 4 años Nuevos',
    SUM(CASE WHEN edad >= 1 AND edad < 5 AND es_nuevo = 0 THEN 1 ELSE 0 END) AS '1 a 4 años Subsiguientes',
    SUM(CASE WHEN edad >= 5 AND edad < 10 AND es_nuevo = 1 THEN 1 ELSE 0 END) AS '5 a 9 años Nuevos',
    SUM(CASE WHEN edad >= 5 AND edad < 10 AND es_nuevo = 0 THEN 1 ELSE 0 END) AS '5 a 9 años Subsiguientes',
    SUM(CASE WHEN edad >= 10 AND edad < 15 AND es_nuevo = 1 THEN 1 ELSE 0 END) AS '10 a 14 años Nuevos',
    SUM(CASE WHEN edad >= 10 AND edad < 15 AND es_nuevo = 0 THEN 1 ELSE 0 END) AS '10 a 14 años Subsiguientes',
    SUM(CASE WHEN edad >= 15 AND edad < 20 AND es_nuevo = 1 THEN 1 ELSE 0 END) AS '15 a 19 años Nuevos',
    SUM(CASE WHEN edad >= 15 AND edad < 20 AND es_nuevo = 0 THEN 1 ELSE 0 END) AS '15 a 19 años Subsiguientes',
    SUM(CASE WHEN edad >= 20 AND edad < 50 AND es_nuevo = 1 THEN 1 ELSE 0 END) AS '20 a 49 años Nuevos',
    SUM(CASE WHEN edad >= 20 AND edad < 50 AND es_nuevo = 0 THEN 1 ELSE 0 END) AS '20 a 49 años Subsiguientes',
    SUM(CASE WHEN edad >= 50 AND edad < 60 AND es_nuevo = 1 THEN 1 ELSE 0 END) AS '50 a 59 años Nuevos',
    SUM(CASE WHEN edad >= 50 AND edad < 60 AND es_nuevo = 0 THEN 1 ELSE 0 END) AS '50 a 59 años Subsiguientes',
    SUM(CASE WHEN edad >= 60 AND es_nuevo = 1 THEN 1 ELSE 0 END) AS '60 y + años Nuevos',
    SUM(CASE WHEN edad >= 60 AND es_nuevo = 0 THEN 1 ELSE 0 END) AS '60 y + años Subsiguientes'
FROM
pacientes p
JOIN consultas c ON p.id = c.paciente_id;
*
* */

//agrupar los datos por fila
const datosPorFila = {};

datosDesdeBaseDeDatos.forEach(dato => {
    const fila = dato.variable.split('-')[0];
    if (!datosPorFila[fila]) {
        datosPorFila[fila] = [];
    }
    datosPorFila[fila].push(dato);
})

// llenar las celdas

Object.keys(datosPorFila).forEach(fila => {
    const datosFila = datosPorFila[fila];
    const filaTR = document.getElementById(fila);
    let celdaIndex = 0;

    datosFila.forEach(dato => {
        const variable = dato.variable.split('-')[1];
        const celda = filaTR.getElementsByTagName('td')[celdaIndex];
        celda.textContent = dato.valor;
        celdaIndex++;
    });
});

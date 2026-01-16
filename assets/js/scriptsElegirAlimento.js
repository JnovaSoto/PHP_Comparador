function fixImageUrl(url) {
    if (url && url.startsWith('../img/')) {
        return url.replace('../img/', 'assets/img/');
    }
    return url;
}

window.onload = function () {
    let chart0 = null;
    let chart1 = null;
    let chart2 = null;
    let chart3 = null;
    let chart4 = null;
    let chart5 = null;
    let chart6 = null;
    let chart7 = null;
    let urlParams = new URLSearchParams(window.location.search);
    let accion = urlParams.get('accion');
    if (accion == 'listarAlimento') {
        fetch('jsons.php?modo=todosAlimentos')
            .then(response => response.json())
            .then(data => {
                console.log(data);
                let tablaAlimentos = "";
                for (let x = 0; x < data.length; x++) {
                    tablaAlimentos += '<div>' + data[x].idAlimento + '</div>' +
                        '<div>' + data[x].nombre + '</div>' +
                        '<div>' + data[x].hidratosTotales + ' g</div>' +
                        '<div>' + data[x].azucares + ' g</div>' +
                        '<div>' + data[x].grasasTotales + ' g</div>' +
                        '<div>' + data[x].grasasSaturadas + ' g</div>' +
                        '<div>' + data[x].proteinas + ' g</div>' +
                        '<div>' + data[x].valorEnergetico + ' kcal</div>';

                    if (data[x].idTipo == 1) {
                        tablaAlimentos += '<div>🥛</div>';
                    } else if (data[x].idTipo == 2) {
                        tablaAlimentos += '<div>🥚</div>';
                    } else if (data[x].idTipo == 3) {
                        tablaAlimentos += '<div>🥩</div>';
                    } else if (data[x].idTipo == 4) {
                        tablaAlimentos += '<div>🦞🐊🐟</div>';
                    } else if (data[x].idTipo == 5) {
                        tablaAlimentos += '<div>🧈</div>';
                    } else if (data[x].idTipo == 6) {
                        tablaAlimentos += '<div>🥣</div>';
                    } else if (data[x].idTipo == 7) {
                        tablaAlimentos += '<div>🫘🌰🥜</div>';
                    } else if (data[x].idTipo == 8) {
                        tablaAlimentos += '<div>🫑🥬🥔</div>';
                    } else if (data[x].idTipo == 9) {
                        tablaAlimentos += '<div>🍉🍋🍎</div>';
                    } else if (data[x].idTipo == 10) {
                        tablaAlimentos += '<div>🍫🍬🍨</div>';
                    } else if (data[x].idTipo == 11) {
                        tablaAlimentos += '<div>🥤💧</div>';
                    } else if (data[x].idTipo == 12) {
                        tablaAlimentos += '<div>🥘🥙🍞</div>';
                    }
                    tablaAlimentos += "<div><a class='botonEditar' href='index.php?accion=editarAlimentos&idAlimento=" + data[x].idAlimento + "'>Editar</a></div>" +
                        "<div><a class='botonEliminar' href='index.php?accion=listarAlimento&idAlimento=" + data[x].idAlimento + "'>Eliminar</a></div>";
                }
                document.getElementsByClassName("gridAlimentos")[0].innerHTML += tablaAlimentos;
            });

    } else if (accion == "elegirAlimento" || accion == "registrarAlimento" || accion == "editarAlimentos") {
        fetch("jsons.php?modo=todosTipos")
            .then(respuesta => respuesta.json())
            .then(datos => {
                console.log(datos);
                let selectTipo = "";
                for (let x = 0; x < datos.length; x++) {
                    selectTipo += '<option value="' + datos[x].idTipo + '">' + datos[x].nombre + '</option>'
                }
                if (accion == 'registrarAlimento') {
                    document.getElementById("tipoAlimento1").innerHTML = selectTipo;
                } else {
                    document.getElementById("elegirTipo1").innerHTML += selectTipo;
                    document.getElementById("elegirTipo2").innerHTML += selectTipo;
                }
            })
        if (accion == "elegirAlimento") {
            const stats = document.getElementsByClassName("Estadisticas")[0];
            if (stats) stats.style.display = "none";

            const a1 = document.getElementsByClassName("alimento1")[0];
            if (a1) a1.style.display = 'none';

            const a2 = document.getElementsByClassName("alimento2")[0];
            if (a2) a2.style.display = 'none';

            console.log("Estas en elegirAlimento");

            let arrayTipo1 = [];
            let arrayTipo2 = [];

            // Event listener for first food type
            document.getElementById("elegirTipo1").addEventListener("change", function () {
                let idTipo = this.value;
                if (idTipo == 0) return;

                fetch(`jsons.php?modo=alimentoPorTipo&idTipo=${idTipo}`)
                    .then(respuesta => respuesta.json())
                    .then(datos => {
                        arrayTipo1 = datos;
                        let selectAlimentos = '<option value="0">Elegir alimento</option>';
                        for (let x = 0; x < arrayTipo1.length; x++) {
                            selectAlimentos += '<option>' + arrayTipo1[x].nombre + '</option>'
                        }
                        document.getElementById("elegirAlimento1").innerHTML = selectAlimentos;
                        document.getElementsByClassName("alimento1")[0].style.display = 'none';
                    });
            });

            // Event listener for first food selection
            document.getElementById("elegirAlimento1").addEventListener("change", function () {
                let nombre = this.value;
                let food = arrayTipo1.find(a => a.nombre === nombre);
                if (!food) return;

                document.getElementsByClassName("alimento1")[0].style.display = 'block';
                document.getElementById("imagenComida1").src = fixImageUrl(food.urlFoto);
                document.getElementById("tituloComida1").innerHTML = food.nombre;
                document.getElementById("hidratosTot1").innerHTML = food.hidratosTotales + 'g';
                document.getElementById("azucares1").innerHTML = food.azucares + 'g';
                document.getElementById("grasasTot1").innerHTML = food.grasasTotales + 'g';
                document.getElementById("grasasSat1").innerHTML = food.grasasSaturadas + 'g';
                document.getElementById("proteinas1").innerHTML = food.proteinas + 'g';
                document.getElementById("vEnergetico1").innerHTML = food.valorEnergetico + ' kcal';
            });

            // Event listener for second food type
            document.getElementById("elegirTipo2").addEventListener("change", function () {
                let idTipo = this.value;
                if (idTipo == 0) return;

                fetch(`jsons.php?modo=alimentoPorTipo&idTipo=${idTipo}`)
                    .then(respuesta => respuesta.json())
                    .then(datos => {
                        arrayTipo2 = datos;
                        let selectAlimentos = '<option value="0">Elegir alimento</option>';
                        for (let x = 0; x < arrayTipo2.length; x++) {
                            selectAlimentos += '<option>' + arrayTipo2[x].nombre + '</option>'
                        }
                        document.getElementById("elegirAlimento2").innerHTML = selectAlimentos;
                        document.getElementsByClassName("alimento2")[0].style.display = 'none';
                    });
            });

            // Event listener for second food selection
            document.getElementById("elegirAlimento2").addEventListener("change", function () {
                let nombre = this.value;
                let food = arrayTipo2.find(a => a.nombre === nombre);
                if (!food) return;

                document.getElementsByClassName("alimento2")[0].style.display = 'block';
                document.getElementById("imagenComida2").src = fixImageUrl(food.urlFoto);
                document.getElementById("tituloComida2").innerHTML = food.nombre;
                document.getElementById("hidratosTot2").innerHTML = food.hidratosTotales + 'g';
                document.getElementById("azucares2").innerHTML = food.azucares + 'g';
                document.getElementById("grasasTot2").innerHTML = food.grasasTotales + 'g';
                document.getElementById("grasasSat2").innerHTML = food.grasasSaturadas + 'g';
                document.getElementById("proteinas2").innerHTML = food.proteinas + 'g';
                document.getElementById("vEnergetico2").innerHTML = food.valorEnergetico + ' kcal';
            });
        }

        let formGrafica = document.getElementById("formAlimentos");
        formGrafica.addEventListener("submit", function (evento) {
            evento.preventDefault();

            // Validation: Check if both foods are selected
            const alimento1 = document.getElementById("elegirAlimento1").value;
            const alimento2 = document.getElementById("elegirAlimento2").value;
            const botonComparar = document.getElementById("botonComparar");

            if (!alimento1 || alimento1 === "Elige alimento" || alimento1 === "0") {
                alert("⚠️ Por favor, selecciona el primer alimento");
                return;
            }

            if (!alimento2 || alimento2 === "Elige alimento" || alimento2 === "0") {
                alert("⚠️ Por favor, selecciona el segundo alimento");
                return;
            }

            // Visual feedback - disable button and show loading state
            botonComparar.disabled = true;
            botonComparar.innerHTML = '<i class="fas fa-spinner fa-spin"></i> GENERANDO...';

            // Show statistics section with smooth scroll
            const statsSection = document.getElementsByClassName("Estadisticas")[0];
            statsSection.style.display = 'grid';

            // Smooth scroll to results
            setTimeout(() => {
                statsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 300);

            let formData1 = new FormData(evento.target);
            fetch('jsons.php?modo=comparacion&modo2=comparaciones', { method: "POST", body: formData1 })
                .then(respuesta => respuesta.json())
                .then(data => {
                    console.log(data);
                    //Hidratos

                    let PH = parseFloat(data[0].hidratosTotales) + parseFloat(data[1].hidratosTotales);
                    let H1 = parseFloat(data[0].hidratosTotales) * 100 / PH;
                    let H2 = parseFloat(data[1].hidratosTotales) * 100 / PH;

                    //Azucares

                    let PA = parseFloat(data[0].azucares) + parseFloat(data[1].azucares);
                    let A1 = parseFloat(data[0].azucares) * 100 / PA;
                    let A11 = parseFloat(data[0].azucares) * 100 / 100;
                    let A2 = parseFloat(data[1].azucares) * 100 / PA;

                    //Fibras

                    let FH1 = parseFloat(data[0].hidratosTotales) - parseFloat(data[0].azucares);
                    let FH2 = parseFloat(data[1].hidratosTotales) - parseFloat(data[1].azucares);
                    //console.log(FH1 + "   " + FH2);

                    //Grasas Totales

                    let PG = parseFloat(data[0].grasasTotales) + parseFloat(data[1].grasasTotales);
                    let G1 = parseFloat(data[0].grasasTotales) * 100 / PG;
                    let G2 = parseFloat(data[1].grasasTotales) * 100 / PG;

                    //Grasas Saturadas

                    let PGS = parseFloat(data[0].grasasSaturadas) + parseFloat(data[1].grasasSaturadas);
                    let GS1 = parseFloat(data[0].grasasSaturadas) * 100 / PGS;
                    let GS2 = parseFloat(data[1].grasasSaturadas) * 100 / PGS;

                    //Grasas No Saturadas

                    let GH1 = parseFloat(data[0].grasasTotales) - parseFloat(data[0].grasasSaturadas);
                    let GH2 = parseFloat(data[1].grasasTotales) - parseFloat(data[1].grasasSaturadas);
                    //console.log(GH1 + "   " + GH2);

                    //Proteinas

                    let PP = parseFloat(data[0].proteinas) + parseFloat(data[1].proteinas);
                    let P1 = parseFloat(data[0].proteinas) * 100 / PP;
                    let P2 = parseFloat(data[1].proteinas) * 100 / PP;

                    //Valor Energetico

                    let PVE = parseFloat(data[0].valorEnergetico) + parseFloat(data[1].valorEnergetico);
                    let VE1 = parseFloat(data[0].valorEnergetico) * 100 / PVE;
                    let VE2 = parseFloat(data[1].valorEnergetico) * 100 / PVE;


                    var ctx = document.getElementById('myChart');
                    if (chart0) {
                        chart0.destroy();
                    }
                    chart0 = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: [H1, H2],
                                backgroundColor: ['rgb(219, 56, 56)', 'rgb(78, 196, 84)'],
                                label: 'Comparacion de Platos'
                            }],
                            labels: [document.getElementById("tituloComida1").innerHTML, document.getElementById("tituloComida2").innerHTML]
                        },
                        options: { responsive: true }
                    });
                    var ctx1 = document.getElementById('myChart1');
                    if (chart1) {
                        chart1.destroy();
                    }
                    chart1 = new Chart(ctx1, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: [A1, A2],
                                backgroundColor: ['rgb(219, 56, 56)', 'rgb(78, 196, 84)'],
                                label: 'Comparacion de Platos'
                            }],
                            labels: [document.getElementById("tituloComida1").innerHTML, document.getElementById("tituloComida2").innerHTML]
                        },
                        options: { responsive: true }
                    });
                    let ctx2 = document.getElementById('myChart2');
                    if (chart2) {
                        chart2.destroy();
                    }
                    chart2 = new Chart(ctx2, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: [G1, G2],
                                backgroundColor: ['rgb(219, 56, 56)', 'rgb(78, 196, 84)'],
                                label: 'Comparacion de Platos'
                            }],
                            labels: [document.getElementById("tituloComida1").innerHTML, document.getElementById("tituloComida2").innerHTML]
                        },
                        options: { responsive: true }
                    });
                    let ctx3 = document.getElementById('myChart3');
                    if (chart3) {
                        chart3.destroy();
                    }
                    chart3 = new Chart(ctx3, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: [GS1, GS2],
                                backgroundColor: ['rgb(219, 56, 56)', 'rgb(78, 196, 84)'],
                                label: 'Comparacion de Platos'
                            }],
                            labels: [document.getElementById("tituloComida1").innerHTML, document.getElementById("tituloComida2").innerHTML]
                        },
                        options: { responsive: true }
                    });
                    let ctx4 = document.getElementById('myChart4');
                    if (chart4) {
                        chart4.destroy();
                    }
                    chart4 = new Chart(ctx4, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: [P1, P2],
                                backgroundColor: ['rgb(219, 56, 56)', 'rgb(78, 196, 84)'],
                                label: 'Comparacion de Platos'
                            }],
                            labels: [document.getElementById("tituloComida1").innerHTML, document.getElementById("tituloComida2").innerHTML]
                        },
                        options: { responsive: true }
                    });
                    let ctx5 = document.getElementById('myChart5');
                    if (chart5) {
                        chart5.destroy();
                    }
                    chart5 = new Chart(ctx5, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: [VE1, VE2],
                                backgroundColor: ['rgb(219, 56, 56)', 'rgb(78, 196, 84)'],
                                label: 'Comparacion de Platos'
                            }],
                            labels: [document.getElementById("tituloComida1").innerHTML, document.getElementById("tituloComida2").innerHTML]
                        },
                        options: { responsive: true }
                    });
                    let ctx6 = document.getElementById('myChart6');
                    if (chart6) {
                        chart6.destroy();
                    }
                    Totales = FH1 + A1 + GH1 + GS1 + P1
                    Total1 = FH1 * 100 / Totales
                    Total2 = A1 * 100 / Totales
                    Total3 = GH1 * 100 / Totales
                    Total4 = GS1 * 100 / Totales
                    Total5 = P1 * 100 / Totales
                    chart6 = new Chart(ctx6, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: [Total1, Total2, Total3, Total4, Total5],
                                backgroundColor: ['rgba(0, 255, 0, 1)', 'rgba(255, 153, 0, 1)', 'rgba(0, 153, 255, 1)', 'rgba(255, 0, 0, 1)', 'rgba(153, 0, 255, 1)'],
                                label: 'Comparación de Platos'
                            }],
                            labels: ['Fibras', 'Azúcares', 'Grasas No Saturadas', 'Grasas Saturadas', 'Proteinas']
                        },
                        options: { responsive: true }
                    });
                    let ctx7 = document.getElementById('myChart7');
                    if (chart7) {
                        chart7.destroy();
                    }
                    Totales2 = FH2 + A2 + GH2 + GS2 + P2
                    Total12 = FH2 * 100 / Totales2
                    Total22 = A2 * 100 / Totales2
                    Total32 = GH2 * 100 / Totales2
                    Total42 = GS2 * 100 / Totales2
                    Total52 = P2 * 100 / Totales2
                    chart7 = new Chart(ctx7, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: [Total12, Total22, Total32, Total42, Total52],
                                backgroundColor: ['rgba(0, 255, 0, 1)', 'rgba(255, 153, 0, 1)', 'rgba(0, 153, 255, 1)', 'rgba(255, 0, 0, 1)', 'rgba(153, 0, 255, 1)'],
                                label: 'Comparación de Platos'
                            }],
                            labels: ['Fibras', 'Azúcares', 'Grasas No Saturadas', 'Grasas Saturadas', 'Proteinas']
                        },
                        options: { responsive: true }
                    });

                    // Re-enable button after charts are generated
                    botonComparar.disabled = false;
                    botonComparar.innerHTML = '<i class="fas fa-balance-scale"></i> GENERAR COMPARATIVA';
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('❌ Error al generar la comparativa. Por favor, intenta de nuevo.');
                    botonComparar.disabled = false;
                    botonComparar.innerHTML = '<i class="fas fa-balance-scale"></i> GENERAR COMPARATIVA';
                })

        })
    }
}
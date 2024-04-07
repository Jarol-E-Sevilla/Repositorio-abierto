<!doctype html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ficha Familiar</title>
</head>

<body>

<div>
    <div class="container">
        <div class="left-image">
            <img src="https://www.salud.gob.hn/sshome/templates/saludhn2022t2/images/logo.png" alt="Logo Izquierda" style="width: 200px; height: auto; position: absolute; top: 10%; transform: translateY(-50%); left: 20px;">
        </div>

        <div class="right-image">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Gobierno_de_Honduras_%282022-%29.svg/2560px-Gobierno_de_Honduras_%282022-%29.svg.png" alt="Logo Derecha" style="width: 200px; height: auto; position: absolute; top: 10%; transform: translateY(-50%); right: 20px;">
        </div>
    </div>
    <div class="tituloff text-center" STYLE="text-align: center ">

        <div style="font-size: 24px; font-weight: bold;">
            <strong>SECRETARÍA DE SALUD</strong>
        </div>
        <div style="margin-top: 10px; font-size: 16px; font-weight: normal;">
            SUB SECRETARÍA DE REDES INTEGRADAS DE SERVICIOS DE SALUD
        </div>
        <div style="margin-top: 10px; font-size: 16px; font-weight: normal;">
            DIRECCIÓN GENERAL DE REDES INTEGRADAS DE SERVICIOS DE SALUD
        </div>
        <div style="margin-top: 10px; font-size: 16px; font-weight: normal;">
            DEPARTAMENTO DE SERVICIOS DEL PRIMER NIVEL DE ATENCIÓN
        </div>
        <div style="margin-top: 10px; font-size: 20px; font-weight: bold;">
            FICHA FAMILIAR
        </div><br>
        <hr class="m-2" style="border: 0.5px solid rgba(9,102,192,0.6)">

    </div>
</div>

<div class="page1">
    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: middle; width: 33.33%;">
            <strong style="font-size: 20px; margin-left: 40px;">Nombre del entrevistador: </strong>
            <span id="nombre_del_entrevistador">{{ $datos->nombre_del_entrevistador }}</span>
        </div>
        <div style="display: table-cell; text-align: center; vertical-align: middle; width: 33.33%;">
            <strong style="font-size: 20px;">Fecha de la entrevista: </strong>
            <span id="fecha_de_entrevista">{{ $datos->fecha_de_entrevista }}</span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: middle; width: 33.33%;">
            <strong style="font-size: 20px;">Codigo: </strong>
            <span id="codigo" style="margin-right: 60px;">{{ $datos->codigo }}</span>
        </div>
    </div>
    <br>

    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: middle; width: 25%;">
            <strong for="region_sanitaria" style="font-size: 20px; margin-left: 40px;">Región sanitaria: </strong>
            <span id="region_sanitaria">{{ $datos->region_sanitaria }} </span>
        </div>
        <div style="display: table-cell; text-align: center; vertical-align: top; width: 50%;">
            <strong for="establecimiento_de_salud_sede_del_equipo" style="font-size: 20px;">Establecimiento de salud sede del equipo: </strong>
            <span id="establecimiento_de_salud_sede_del_equipo">{{ $datos->establecimiento_de_salud_sede_del_equipo }}</span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: middle; width: 25%;">
            <strong for="sector" style="font-size: 20px;">Sector: </strong>
            <span id="sector" style="margin-right: 60px;">{{ $datos->sector }} </span>
        </div>
    </div>
    <br>
    <hr class="m-2" style="border: 0.5px solid rgba(9,102,192,0.6)">

    <!-- Datos Generales -->
    <h4 style="text-align: center; font-size: 20px;">Datos Generales</h4>

    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: middle; width: 50%;">
            <strong for="nombre_completo_del_jefe_de_la_familia" style="margin-left: 40px; font-size: 20px;">Nombre completo del jefe de la familia: </strong>
            <span id="nombre_completo_del_jefe_de_la_familia">{{ $datos->nombre_completo_del_jefe_de_la_familia }} </span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: middle; width: 50%;">
            <strong for="numero_de_identidad_del_jefe_de_la_casa" style="font-size: 20px;">Numero de identidad del jefe de la casa: </strong>
            <span id="numero_de_identidad_del_jefe_de_la_casa" style="margin-right: 60px;">{{ $datos->numero_de_identidad_del_jefe_de_la_casa }} </span>
        </div>
    </div>
    <br>

    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: middle; width: 25%;">
            <strong for="region_sanitaria" style="font-size: 20px; margin-left: 40px;">Región sanitaria: </strong>
            <span id="region_sanitaria">{{ $datos->region_sanitaria }} </span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: top; width: 50%;">
            <strong for="establecimiento_de_salud_sede_del_equipo" style="font-size: 20px">Establecimiento de salud sede del equipo: </strong>
            <span id="establecimiento_de_salud_sede_del_equipo" style="margin-right: 60px">{{ $datos->establecimiento_de_salud_sede_del_equipo }}</span>
        </div>
    </div>
    <br>

    <div class="font-robo form-group">
        <strong for="Aldea_Caserio_Barrio_Colonia" style="margin-left: 40px; font-size: 20px;">Aldea/Caserío/Barrio/Colonia: </strong>
        <span id="Aldea_Caserio_Barrio_Colonia" >{{ $datos->Aldea_Caserio_Barrio_Colonia }} </span>
    </div>
    <br>

    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: middle; width: 25%;">
            <strong for="sector" style="font-size: 20px; margin-left: 40px;">Sector: </strong>
            <span id="sector" >{{ $datos->sector }} </span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: top; width: 33.33%;">
            <strong for="area" style="font-size: 20px; margin-left: 0;">Aréa: </strong>
            <span id="area" style="margin-right: 60px">{{ $datos->area }} </span>
        </div>
    </div>
    <br>

    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 33.33%;">
            <strong for="referencia_vecinal" style="font-size: 20px; margin-left: 40px;">Referencia vecinal: </strong>
            <span id="referencia_vecinal">{{ $datos->referencia_vecinal }} </span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: top; width: 33.33%;">
            <strong for="municipio" style="font-size: 20px;">Municipio: </strong>
            <span id="municipio" style="margin-right: 60px;">{{ $datos->municipio }} </span>
        </div>
    </div>
    <br>
    <hr class="m-2" style="border: 0.5px solid rgba(9,102,192,0.6)">

    <!-- Distancia y tiempo para llegar al establecimiento de Salud más cercano -->
    <h4 style="text-align: center; font-size: 20px;">Distancia y tiempo para llegar al establecimiento de Salud más cercano</h4>

    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 33.33%;">
            <strong for="distancia_en_kilometros" style="font-size: 20px; margin-left: 40px;">Distancia en kilometros: </strong>
            <span id="distancia_en_kilometros">{{ $datos->distancia_en_kilometros }} </span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: top; width: 33.33%;">
            <strong for="horas" style="font-size: 20px;">Horas: </strong>
            <span id="horas" style="margin-right: 60px;">{{ $datos->horas }} </span>
        </div>
    </div>
    <br>

    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 33.33%;">
            <strong for="minutos" style="font-size: 20px; margin-left: 40px;">Minutos: </strong>
            <span id="minutos" style="margin-right: 60px;">{{ $datos->minutos }} </span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: top; width: 33.33%;">
            <strong for="nombre_del_establecimiento_mas_cercano" style=" font-size: 20px;">Nombre del establecimiento mas cercano: </strong>
            <span id="nombre_del_establecimiento_mas_cercano" style="margin-right: 60px;">{{ $datos->nombre_del_establecimiento_mas_cercano }} </span>
        </div>
    </div>

</div>


<div class="page2" style="page-break-before: always">
    <div>
        <div class="container">
            <div class="left-image">
                <img src="https://www.salud.gob.hn/sshome/templates/saludhn2022t2/images/logo.png" alt="Logo Izquierda" style="width: 200px; height: auto; position: absolute; top: 10%; transform: translateY(-50%); left: 20px;">
            </div>

            <div class="right-image">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Gobierno_de_Honduras_%282022-%29.svg/2560px-Gobierno_de_Honduras_%282022-%29.svg.png" alt="Logo Derecha" style="width: 200px; height: auto; position: absolute; top: 10%; transform: translateY(-50%); right: 20px;">
            </div>
        </div>
        <div class="tituloff text-center" STYLE="text-align: center ">

            <div style="font-size: 24px; font-weight: bold;">
                <strong>SECRETARÍA DE SALUD</strong>
            </div>
            <div style="margin-top: 10px; font-size: 16px; font-weight: normal;">
                SUB SECRETARÍA DE REDES INTEGRADAS DE SERVICIOS DE SALUD
            </div>
            <div style="margin-top: 10px; font-size: 16px; font-weight: normal;">
                DIRECCIÓN GENERAL DE REDES INTEGRADAS DE SERVICIOS DE SALUD
            </div>
            <div style="margin-top: 10px; font-size: 16px; font-weight: normal;">
                DEPARTAMENTO DE SERVICIOS DEL PRIMER NIVEL DE ATENCIÓN
            </div>
            <div style="margin-top: 10px; font-size: 20px; font-weight: bold;">
                FICHA FAMILIAR
            </div><br>
            <hr class="m-2" style="border: 0.5px solid rgba(9,102,192,0.6)">

        </div>
    </div>

    <p style="text-align: center;"><strong style=" font-size: 24px; ">Información del Hogar</strong></p>
    <h3 style="text-align: left; font-size: 20px;">Características de la vivienda:</h3>

    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 33.33%;">
            <strong for="techo_con_materiales_de_desecho" style="font-size: 20px; margin-left: 40px;">Techo con materiales de desecho: </strong>
            <span id="techo_con_materiales_de_desecho">{{ $datos->techo_con_materiales_de_desecho }}</span>
        </div>
        <div style="display: table-cell; text-align: center; vertical-align: top; width: 33.33%;">
            <strong for="paredes_con_meteriales_de_desechos" style="font-size: 20px;">Paredes con meteriales de desechos: </strong>
            <span id="paredes_con_meteriales_de_desechos">{{ $datos->paredes_con_meteriales_de_desechos }}</span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: top; width: 33.33%;">
            <strong for="piso_de_tierra" style="font-size: 20px;">Piso de tierra: </strong>
            <span id="piso_de_tierra" style="margin-right: 60px">{{ $datos->piso_de_tierra }}</span>
        </div>
    </div>
    <br>

    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 36%;">
            <strong style="font-size: 20px; margin-left: 40px;">Fogón sin chimenea dentro de la vivienda: </strong>
            <span id="fogon_sin_chimenea_dentro_de_la_vivienda">{{ $datos->fogon_sin_chimenea_dentro_de_la_vivienda }}</span>
        </div>
        <div style="display: table-cell; text-align: center; vertical-align: top; width: 32%;">
            <strong style="font-size: 20px; margin-left: 0px;">Criaderos de vectores: </strong>
            <span id="criaderos_de_vectores">{{ $datos->criaderos_de_vectores }}</span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: top; width: 32%;">
            <strong style="font-size: 20px;">Animales dentro de la vivienda: </strong>
            <span id="animales_dentro_de_la_vivienda" style="margin-right: 60px;">{{ $datos->animales_dentro_de_la_vivienda }}</span>
        </div>
    </div>
    <hr class="m-2" style="border: 0.5px solid rgba(9,102,192,0.6)">

    <h3 style="text-align: left; font-size: 20px;">(para tachar con una x)</h3>

    <div  class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 30%;">
            <strong style="font-size: 20px; margin-left: 40px;">Abastecimiento de agua: </strong>
            <span id="abastecimiento_de_agua">{{ $datos->abastecimiento_de_agua }}</span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: top; width: 30%;">
            <strong style="font-size: 20px;">Agua para consumo: </strong>
            <span id="agua_para_consumo" style="margin-right: 60px;">{{ $datos->agua_para_consumo }}</span>
        </div>
    </div>
    <br>
    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 40%;">
            <strong style="font-size: 20px; margin-left: 40px;">Eliminación de excretas: </strong>
            <span id="eliminacion_de_excretas">{{ $datos->eliminacion_de_excretas }}</span>
        </div>
        <div style="text-align: right">
            <strong style="font-size: 20px;">Eliminación de basura: </strong>
            <span id="eliminacion_de_basura" style="margin-right: 60px;">{{ $datos->eliminacion_de_basura }}</span>
        </div>
    </div>


    <hr class="m-2" style="border: 0.5px solid rgba(9,102,192,0.6)">

    <h3 style="text-align: left; font-size: 20px";>Economico</h3>

    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 33.33%;">
            <strong style="font-size: 20px; margin-left: 40px;">Energía eléctrica: </strong>
            <span id="energia_electrica">{{ $datos->energia_electrica }}</span>
        </div>
        <div style="display: table-cell; text-align: center; vertical-align: top; width: 33.33%;">
            <strong style="font-size: 20px; margin-left: 0px;">Hacinamiento: </strong>
            <span id="hacinamiento">{{ $datos->hacinamiento }}</span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: top; width: 33.33%;">
            <strong style="font-size: 20px;">Beneficiarios: </strong>
            <span id="beneficiarios" style="margin-right: 60px;">{{ $datos->beneficiarios }}</span>
        </div>
    </div>
    <br>

    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 100%;">
            <strong style="font-size: 18px; margin-left: 40px;">Observaciones: </strong>
            <span id="observaciones1">{{ $datos->observaciones1 }}</span>
        </div>
    </div>

</div>


<div class="page3" style="page-break-before: always">
    <div>
        <div class="container">
            <div class="left-image">
                <img src="https://www.salud.gob.hn/sshome/templates/saludhn2022t2/images/logo.png" alt="Logo Izquierda" style="width: 200px; height: auto; position: absolute; top: 10%; transform: translateY(-50%); left: 20px;">
            </div>

            <div class="right-image">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Gobierno_de_Honduras_%282022-%29.svg/2560px-Gobierno_de_Honduras_%282022-%29.svg.png" alt="Logo Derecha" style="width: 200px; height: auto; position: absolute; top: 10%; transform: translateY(-50%); right: 20px;">
            </div>
        </div>
        <div class="tituloff text-center" STYLE="text-align: center ">

            <div style="font-size: 24px; font-weight: bold;">
                <strong>SECRETARÍA DE SALUD</strong>
            </div>
            <div style="margin-top: 10px; font-size: 16px; font-weight: normal;">
                SUB SECRETARÍA DE REDES INTEGRADAS DE SERVICIOS DE SALUD
            </div>
            <div style="margin-top: 10px; font-size: 16px; font-weight: normal;">
                DIRECCIÓN GENERAL DE REDES INTEGRADAS DE SERVICIOS DE SALUD
            </div>
            <div style="margin-top: 10px; font-size: 16px; font-weight: normal;">
                DEPARTAMENTO DE SERVICIOS DEL PRIMER NIVEL DE ATENCIÓN
            </div>
            <div style="margin-top: 10px; font-size: 20px; font-weight: bold;">
                FICHA FAMILIAR
            </div><br>
            <hr class="m-2" style="border: 0.5px solid rgba(9,102,192,0.6)">

        </div>
    </div>


    <h3 style="text-align: center; font-size: 24px;">Información de Miembros de la Familia</h3>

    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 33.33%;">
            <strong style="font-size: 20px; margin-left: 40px;">Número: </strong>
            <span id="No">{{ $datos->No }}</span>
        </div>
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 33.33%;">
            <strong style="font-size: 20px; margin-left: 0px;">Nombres y apellidos: </strong>
            <span id="nombres_y_apellidos">{{ $datos->nombres_y_apellidos }}</span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: top; width: 33.33%;">
            <strong style="font-size: 20px;">Número de identidad: </strong>
            <span id="No_identidad" style="margin-right: 60px;">{{ $datos->No_identidad }}</span>
        </div>
    </div>
    <br>
    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 33.33%;">
            <strong style="font-size: 20px; margin-left: 40px;">Sexo: </strong>
            <span id="sexo">{{ $datos->sexo }}</span>
        </div>
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 33.33%;">
            <strong style="font-size: 20px; margin-left: 0px;">Parentesco: </strong>
            <span id="parentesco">{{ $datos->parentesco }}</span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: top; width: 33.33%;">
            <strong style="font-size: 20px;">Fecha de nacimiento: </strong>
            <span id="fecha_de_nacimiento" style="margin-right: 60px;">>{{ $datos->fecha_de_nacimiento }}</span>
        </div>
    </div>
    <br>
    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 20%;">
            <strong style="font-size: 20px; margin-left: 40px;">Edad: </strong>
            <span id="edad">{{ $datos->edad }}</span>
        </div>
        <div style="display: table-cell; margin-left: 30px; vertical-align: top; width: 35%;">
            <strong style="font-size: 20px; margin-left: 0px;">Etnia: </strong>
            <span id="etnia">{{ $datos->etnia }}</span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: top; width: 45%;">
            <strong style="font-size: 20px;">Escolaridad: </strong>
            <span id="escolaridad" style="margin-right: 60px;">{{ $datos->escolaridad }}</span>
        </div>
    </div>
    <br>
    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 33.33%;">
            <strong style="font-size: 20px; margin-left: 40px;">Trabaja actualmente: </strong>
            <span id="trabaja_actualmente">{{ $datos->trabaja_actualmente }}</span>
        </div>
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 33.33%;">
            <strong style="font-size: 20px; margin-left: 0px;">Ocupación: </strong>
            <span id="ocupacion">{{ $datos->ocupacion }}</span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: top; width: 33.33%;">
            <strong style="font-size: 20px;">Vacuna completa: </strong>
            <span id="vacuna_completa" style="margin-right: 60px;">{{ $datos->vacuna_completa }}</span>
        </div>
    </div>
    <br>
    <div class="font-robo form-group" style="text-align: left">
        <strong style="font-size: 20px; margin-left: 40px;">Riesgos: </strong>
        <span id="riesgos">{{ $datos->riesgos }} </span>
    </div>
    <br>
    <div class="font-robo form-group" style="text-align: left">
        <strong style="font-size: 20px; margin-left: 40px;">GR: </strong>
        <span id="GR">{{ $datos->GR }} </span>
    </div>
    <br>
    <div class="font-robo form-group" style="text-align: left">
        <strong style="font-size: 20px; margin-left: 40px;">PF: </strong>
        <span id="PF">{{ $datos->PF }} </span>
    </div>
    <br>
    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 50%;">
            <strong style="font-size: 20px; margin-left: 40px;">Tratamiento para enfermedad cronica: </strong>
            <span id="tratamiento_para_enf_cronica">{{ $datos->tratamiento_para_enf_cronica }} </span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: top; width: 50%;">
            <strong style="font-size: 20px;">Nombre del medicamento para enfermedad cronica: </strong>
            <span id="nombre_del_medicamento_para_enfermedad_cronica"style="margin-right: 60px;">{{ $datos->nombre_del_medicamento_para_enfermedad_cronica }} </span>
        </div>
    </div>
    <br>
    <div class="font-robo form-group" style="text-align: left">
        <strong style="font-size: 20px; margin-left: 40px;">Observaciones: </strong>
        <span id="observaciones2">{{ $datos->observaciones2 }} </span>
    </div>
    <br>
    <div class="font-robo form-group" style="text-align: left">
        <strong style="font-size: 20px; margin-left: 40px;">Numero de dependientes: </strong>
        <span id="No_dependientes">{{ $datos->No_dependientes }} </span>
    </div>
    <br>
    <div class="font-robo form-group" style="text-align: left">
        <strong style="font-size: 20px; margin-left: 40px;">Observaciones: </strong>
        <span id="observaciones3">{{ $datos->observaciones3 }} </span>
    </div>

</div>



<div class="page4" style="page-break-before: always">
    <div>
        <div class="container">
            <div class="left-image">
                <img src="https://www.salud.gob.hn/sshome/templates/saludhn2022t2/images/logo.png" alt="Logo Izquierda" style="width: 200px; height: auto; position: absolute; top: 10%; transform: translateY(-50%); left: 20px;">
            </div>

            <div class="right-image">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Gobierno_de_Honduras_%282022-%29.svg/2560px-Gobierno_de_Honduras_%282022-%29.svg.png" alt="Logo Derecha" style="width: 200px; height: auto; position: absolute; top: 10%; transform: translateY(-50%); right: 20px;">
            </div>
        </div>
        <div class="tituloff text-center" STYLE="text-align: center ">

            <div style="font-size: 24px; font-weight: bold;">
                <strong>SECRETARÍA DE SALUD</strong>
            </div>
            <div style="margin-top: 10px; font-size: 16px; font-weight: normal;">
                SUB SECRETARÍA DE REDES INTEGRADAS DE SERVICIOS DE SALUD
            </div>
            <div style="margin-top: 10px; font-size: 16px; font-weight: normal;">
                DIRECCIÓN GENERAL DE REDES INTEGRADAS DE SERVICIOS DE SALUD
            </div>
            <div style="margin-top: 10px; font-size: 16px; font-weight: normal;">
                DEPARTAMENTO DE SERVICIOS DEL PRIMER NIVEL DE ATENCIÓN
            </div>
            <div style="margin-top: 10px; font-size: 20px; font-weight: bold;">
                FICHA FAMILIAR
            </div><br>
            <hr class="m-2" style="border: 0.5px solid rgba(9,102,192,0.6)">

        </div>
    </div>

    <h3 style="text-align: center; font-size: 24px;">Mortalidad en el último año</h3>

    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 50%;">
            <strong style="font-size: 20px; margin-left: 40px;">Tratamiento para enfermedad cronica: </strong>
            <span id="tratamiento_para_enf_cronica">{{ $datos->tratamiento_para_enf_cronica }} </span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: top; width: 50%;">
            <strong style="font-size: 20px;">Nombre del medicamento para enfermedad cronica: </strong>
            <span id="nombre_del_medicamento_para_enfermedad_cronica"style="margin-right: 60px;">{{ $datos->nombre_del_medicamento_para_enfermedad_cronica }} </span>
        </div>
    </div>
    <br>
    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 33.33%;">
            <strong style="font-size: 20px; margin-left: 40px;">Numero de la mortalidad: </strong>
            <span id="no_mortalidad">{{ $datos->no_mortalidad }} </span>
        </div>
        <div style="display: table-cell; text-align: center; vertical-align: top; width: 33.33%;">
            <strong style="font-size: 20px; margin-left: 40px;">Nombre y apellido: </strong>
            <span id="nombre_y_apellido">{{ $datos->nombre_y_apellido }} </span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: top; width: 33.33%;">
            <strong >Edad de la mortalidad: </strong>
            <span id="edad_mortalidad" style="margin-right: 60px;">{{ $datos->edad_mortalidad }} </span>
        </div>
    </div>
    <br>
    <div class="font-robo form-group">
        <strong style="font-size: 20px; margin-left: 40px;">Causa: </strong>
        <span id="causa">{{ $datos->causa }} </span>
    </div>
    <br>
    <div class="font-robo form-group">
        <strong style="font-size: 20px; margin-left: 40px;">Observaciones: </strong>
        <span id="observaciones4">{{ $datos->observaciones4 }} </span>
    </div>

</div>



<div class="page5" style="page-break-before: always">
    <div>
        <div class="container">
            <div class="left-image">
                <img src="https://www.salud.gob.hn/sshome/templates/saludhn2022t2/images/logo.png" alt="Logo Izquierda" style="width: 200px; height: auto; position: absolute; top: 10%; transform: translateY(-50%); left: 20px;">
            </div>

            <div class="right-image">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Gobierno_de_Honduras_%282022-%29.svg/2560px-Gobierno_de_Honduras_%282022-%29.svg.png" alt="Logo Derecha" style="width: 200px; height: auto; position: absolute; top: 10%; transform: translateY(-50%); right: 20px;">
            </div>
        </div>
        <div class="tituloff text-center" STYLE="text-align: center ">

            <div style="font-size: 24px; font-weight: bold;">
                <strong>SECRETARÍA DE SALUD</strong>
            </div>
            <div style="margin-top: 10px; font-size: 16px; font-weight: normal;">
                SUB SECRETARÍA DE REDES INTEGRADAS DE SERVICIOS DE SALUD
            </div>
            <div style="margin-top: 10px; font-size: 16px; font-weight: normal;">
                DIRECCIÓN GENERAL DE REDES INTEGRADAS DE SERVICIOS DE SALUD
            </div>
            <div style="margin-top: 10px; font-size: 16px; font-weight: normal;">
                DEPARTAMENTO DE SERVICIOS DEL PRIMER NIVEL DE ATENCIÓN
            </div>
            <div style="margin-top: 10px; font-size: 20px; font-weight: bold;">
                FICHA FAMILIAR
            </div><br>
            <hr class="m-2" style="border: 0.5px solid rgba(9,102,192,0.6)">

        </div>
    </div>



    <h3>(para tachar con una x)</h3>



    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 33.33%;">
            <strong style="font-size: 20px; margin-left: 40px;">Evaluación del riesgo familiar: </strong>
            <span id="evaluacion_del_riesgo_familiar">{{ $datos->evaluacion_del_riesgo_familiar }}</span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: top; width: 33.33%;">
            <strong style="font-size: 20px; ">Higiénicos sanitarios: </strong>
            <span id="higienicos_sanitarios" style="margin-right: 60px;">{{ $datos->higienicos_sanitarios }}</span>
        </div>

    </div>
    <br>
    <div class="font-robo form-group" style="display: table; width: 100%; margin: 0 auto; table-layout: fixed;">
        <div style="display: table-cell; text-align: left; vertical-align: top; width: 50%;">
            <strong style="font-size: 20px; margin-left: 40px" >Socio económico: </strong>
            <span id="socio_economico" >{{ $datos->socio_economico }}</span>
        </div>
        <div style="display: table-cell; text-align: right; vertical-align: top; width: 50%;">
            <strong style="font-size: 20px; ;">Hogar: </strong>
            <span id="Hogar" style="margin-right: 60px">{{ $datos->Hogar }}</span>
        </div>
    </div>
    <br>
    <div class="font-robo form-group">
        <strong  style="font-size: 20px; margin-left: 40px;">Observaciones: </strong>
        <span id="observaciones5">{{ $datos->observaciones5 }} </span>
    </div>

</div>

</body>


</html>

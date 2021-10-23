<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte {{ $datosProducto[0]->nombre }}</title>
</head>

<style>
    @page {
        margin-bottom: 35px;
    }

    .header {
        text-align: justify;
        text-justify: inter-word;
        padding-left: 5%;
        padding-right: 5%;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 80%;
    }

    .title {
        border-style: solid;
        border-width: 1px;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
    }

    .negrita {
        font-weight: bold;
    }

    .t-letra {
        font-size: 92%;
    }

    .margen-estandar {
        margin-left: 5%;
        margin-right: 5%;
    }

    .arial {
        font-family: Arial, Helvetica, sans-serif;
    }

    .f-size {
        font-size: 87.2%;
    }

    .just {
        text-align: justify;
        text-justify: inter-word;
    }

    .tab {
        display: inline-block;
        margin-left: 43px;
    }

    .tab-2 {
        display: inline-block;
        margin-left: 21.5px;
    }

    .tab-3 {
        display: inline-block;
        margin-left: 10.75px;
    }

    .page-break {
        page-break-after: always;
    }

    .page-break-auto {
        page-break-after: auto;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

</style>

<body class="arial">
    <div class="page-break-auto" style="margin-left: 5%;">
        <div class="title">
            <b>{{ $datosProducto[0]->nombre }}</b>
        </div>
        <br>
        <table>
            <tr>
                <th>Información</th>
                <th>Detalle</th>
            </tr>
            <tr>
                <td>ID:</td>
                <td>{{ $datosProducto[0]->id }}</td>
            </tr>
            <tr>
                <td>Descripción:</td>
                <td>{{ $datosProducto[0]->descripcion }}</td>

            </tr>
            <tr>
                <td>Categoria:</td>
                <td>{{ $datosProducto[0]->nombre_categoria }}</td>
            </tr>
            <tr>
                <td>Sucursal:</td>
                <td>{{ $datosProducto[0]->nombre_sucursal }}</td>
            </tr>
            <tr>
                <td>Estado:</td>
                <td>{{ $datosProducto[0]->nombre_estado }}</td>
            </tr>

            <tr>
                <td>Precio:</td>
                <td>{{ $datosProducto[0]->precio }}</td>
            </tr>
            <tr>
                <td>Fecha de compra:</td>
                <td>{{ $datosProducto[0]->fecha_compra }}</td>
            </tr>
            <tr>
                <td>Comentarios:</td>
                <td>{{ $datosProducto[0]->comentarios }}</td>
            </tr>
            <tr>
                <td>Fecha de creación:</td>
                <td>{{ $datosProducto[0]->created_at }}</td>
            </tr>
            <tr>
                <td>Fecha de actualización:</td>
                <td>{{ $datosProducto[0]->updated_at }}</td>
            </tr>
        </table>
    </div>
</body>
</html>

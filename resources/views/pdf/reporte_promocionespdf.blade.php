<!DOCTYPE html>
<html>
<head>
    <title>Reporte Listado de Cotizaciones</title>
</head>
<style>
   
    <style>
        table {
            width: 95%;
            border-collapse: collapse;
            margin: 50px auto;
        }

        /* Zebra striping */
        tr:nth-of-type(odd) {
            background: #eee;
        }

        th {
            background: gray;
            color: white;
            font-weight: bold;
        }

        td,
        th {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 18px;
        }

        .tblreportecursos th
        {
            color: #fff !important;
        }


    </style>
</style>
<body>
   
    <div style="width: 100%; margin: 0 auto;">
        <div style="width: 10%; float:left; margin-right: 20px;">
            Prueba Técnica Creasoft
        </div>
        <div style="width: 68%; float: left; margin-right: 5px;">
            <center><h2>Reporte Listado de Promociones</h2></center>
        </div>
        <div style="width: 22%; float: left;">
            <p style="font-size:12px;">Fecha del Informe: @php echo date('m/d/Y'); @endphp</p>
        </div>
    </div>

    <table style="position: relative; top: 70px;  width: 100%; margin-bottom:20px;">
        <thead>
            <tr>
                <th style="font-size:14px">#</th>
                <th style="font-size:14px">DNI</th>
                <th style="font-size:14px">CELULAR</th>
                <th style="font-size:14px">FECHA ALTA</th>
            </tr>
        </thead>
        <tbody>
            @if(count($promociones) > 0)
                @php($i=1)      
                @foreach($promociones as $pro)
                    <tr>
                        <td style="font-size:13px">{{$i}}</td>
                        <td style="font-size:13px">{{$pro->dni}} </td>
                        <td style="font-size:13px">{{ $pro->celular }}</td>
                        <td style="font-size:13px">{{ $pro->created_at }}</td>
                    </tr>
                    @php($i++)
                @endforeach
            @else 
                <tr>
                    <td colspan="4" style="text-align:center; vertical-align:middle;">No se han encontrado Registros</td>
                </tr>

            @endif
        </tbody>
    </table>

</body>
</html>
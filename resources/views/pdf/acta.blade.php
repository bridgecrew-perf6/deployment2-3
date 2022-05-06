<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Acta de entrega</title>
        <link rel="shortcut icon" href="{{asset('assets/images/logo/development.svg')}}">
        <style>
        
        #contenido{
        width: 195px;
        }
        .fecha{
        font-size: 12px;
        font-family: Arial, Helvetica, sans-serif;
        position: relative;
        top: -56px; left: 600px;
        font-weight: bolder;
        }
        .hora{
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bolder;
        font-size: 12px;
        position: relative;
        top: -49px; left: 658px;
        }
        .titulo{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 15px;
        position: relative;
        top: 25px; left: 25px;
        }
        .parrafo{
             font-family: Arial, Helvetica, sans-serif;
        font-size: 15px;
        position: relative;
        top: 100px; left: 25px;

        }
        .p2{
             font-family: Arial, Helvetica, sans-serif;
        font-size: 15px;
        position: relative;
        top: 160px; left: 25px;

        }
         .firmas{
             font-family: Arial, Helvetica, sans-serif;
        font-size: 15px;
        position: relative;
        top: 300px; left: 25px;

        }
.tg  {border-collapse:collapse;border-color:#9ABAD9;border-spacing:0;position:relative;top:185px;left:60px;}
.tg td{background-color:#EBF5FF;border-color:#9ABAD9;border-style:solid;border-width:0px;color:#444;
  font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{background-color:#409cff;border-color:#9ABAD9;border-style:solid;border-width:0px;color:#fff;
  font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-phtq{background-color:#D2E4FC;border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-0o1a{background-color:#D2E4FC;border-color:inherit;font-family:Arial, Helvetica, sans-serif !important;text-align:left;
  vertical-align:top}
.tg .tg-9wq8{border-color:inherit;text-align:center;vertical-align:middle}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-svo0{background-color:#D2E4FC;border-color:inherit;text-align:center;vertical-align:top}

    
    </style>
    </head>
    <body>
        <div class="contenido">
            <img class="logo-fold" src="{{asset('assets/images/logo/bm.png')}}" alt="Icono M" id="contenido">
        </div>
        <div class="hora">
        <?php echo date("G:i:s");?>
        </div>
        <div class="fecha">
       <p id=fecha"><?php echo 'Bogotá '.date("Y/m/d"); ?></p>
       </div>
       <div class="titulo">
       @foreach ($usua->unique('nomb_usua') as $u)
       <p>{{$u->nomb_usua}}</p>
        <p>{{$u->nomb_cargo}}</p>
      @endforeach 
       </div>
       <div class="parrafo">
       <p>Acta de entrega de equipo</p>
       </div>
       <div class="p2">
       <p>Por medio de la presente se realiza el acto en calidad de entrega a {{$u->nomb_usua}}</p>
       <p>- {{$u->nomb_cargo}}, identificado con cedula {{$u->cedula}} del siguiente elemento</p>
       </div>
       <table class="tg" style="undefined;table-layout: fixed; width: 500px">
<colgroup>
<col style="width: 287px">
<col style="width: 256px">
<col style="width: 251px">
</colgroup>
<thead>
  <tr>
    <th class="tg-c3ow">Equipo</th>
    <th class="tg-c3ow">Placa</th>
    <th class="tg-9wq8">Serial</th>
  </tr>
</thead>
<tbody>
    @foreach ($usua as $u)
  <tr>
    <td class="tg-phtq">{{$u->nomb_equipo}}</td>
    <td class="tg-svo0">{{$u->placa}}</td>
    <td class="tg-0o1a">{{$u->serial}}</td>
  </tr>
      @endforeach 
</tbody>
</table>
       </div>
       <div class="firmas">
    <p>Recibe:_________________________________</p>
    <p>{{$u->nomb_usua}}</p>
    <p>{{$u->nomb_cargo}}</p>
    <br>
    <p>Entrega:_________________________________</p>
    <p>Danny Sanchez</p>
    <p>Cloud & Devops </p>

       </div>
       <div class="f2">
       <img src="{{asset('assets/images/logo/f.png')}}" style="position:relative;top:150px;left:145px;width:105px">
       </div>

    </body>
</html>
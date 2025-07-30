<?php

    include('../app/config.php');
    include('../admin/layout/parte1.php');
    include('../admin/layout/parte2.php');
    include('../admin/layout/mensajes.php');
    include('../app/controllers/roles/listado_de_roles.php');
    include('../app/controllers/usuarios/listado_de_usuarios.php');
    include('../app/controllers/niveles/listado_de_niveles.php');
    include('../app/controllers/grados/listado_de_grados.php');
    include('../app/controllers/materias/listado_de_materias.php');
    include('../app/controllers/administrativos/listado_de_administrativos.php');
    include('../app/controllers/docentes/listado_de_docentes.php');
    include('../app/controllers/estudiantes/listado_de_estudiantes.php');
    include('../app/controllers/estudiantes/listado_de_estudiantes.php');
    
    include('../app/controllers/calificaciones/listado_de_calificaciones.php');
    
    include('../app/controllers/estudiantes/reporte_estudiantes_por_grados.php');
    
    ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="container">
      <div class="container">
        <div class="row">
          <h1><?=APP_NAME;?></h1>
          
        </div>
        <br>

         <!-- vista para el estudiante-->
          <?php
         if($rol_sesion_usuario == "ESTUDIANTE"){
          foreach($estudiantes as $estudiante){
            if($email_sesion == $estudiante['email'] ){
            $id_estudiante= $estudiante['id_estudiante'];
             $turno= $estudiante['turno'];
             $curso= $estudiante['curso'];
             $paralelo= $estudiante['paralelo'];
            }
            

          }
        
          ?>

         <div class = "row>
         <div class = "col-md-6>
         <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos del estudiante</h3>
                            <div class="card-tools">
                                
                            </div>
                        </div>
                        <div class="card-body">
                        <table class = "table-sm table-hover table-striped table-border">
          <tr>
            <td><b>Nombres y Apellidos <b></td>
            <td><b><?=$nombres_sesion_usuario." ".$apellidos_sesion_usuario;?> <b></td>

         </tr>

         <tr>
            <td><b>DNI <b></td>
            <td><b><?=$ci_sesion_usuario;?> <b></td>

         </tr>
         <tr>
            <td><b>Turno <b></td>
            <td><b><?=$turno;?> <b></td>

         </tr>
         <tr>
            <td><b>Curso <b></td>
            <td><b><?=$curso;?> <b></td>

         </tr>

         <tr>
            <td><b>División <b></td>
            <td><b><?=$paralelo;?> <b></td>

         </tr>
         </table>
         
         </div>

         </div>
         </div>
         </div>
        </div>
      
      <hr>
      

        
          <br> <br>     
          <div class="row"></div>     
          <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-primary"> <i class="bi bi-exclamation-diamond"></i></span>
                <div class= "info-box-content">
                <span class="info-box-text"><b>Notificaciones Docentes</b></span>
                <a href="<?=APP_URL;?>/admin/kardex/reporte_estudiante.php?id_estudiante=<?=$id_estudiante;?>" class= "btn btn-primary">Ingresar</a>


  </div>
  </div>
  </div>
    
  
  

  <div class="row">
          <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-primary"> <i class="bi bi-exclamation-diamond"></i></span>
                <div class= "info-box-content">
                <span class="info-box-text"><b>Notificaciones Preceptor</b></span>
                <a href="<?=APP_URL;?>/admin/kardexprece/reporte_estudiante.php?id_estudiante=<?=$id_estudiante;?>" class= "btn btn-primary">Ingresar</a>


  </div>
  </div>
  </div>
  </div>

  <div class="row">
    <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"> <i class="bi bi-check2-square"></i></span>
                <div class= "info-box-content">
                <span class="info-box-text"><b>Calificaciones</b></span>
                <a href="<?=APP_URL;?>/admin/calificaciones/reporte_estudiante.php?id_estudiante=<?=$id_estudiante;?>" class= "btn btn-primary">Ingresar</a>

  </div>
  </div>
  </div>
  </div>

  </div><!-- /.container-fluid -->
    
    
    
    <!-- /.content -->
  </div>
        
         
<?php
         }else{
            if($rol_sesion_usuario == "DOCENTE"){
                foreach($docentes as $docente){
                  if($email_sesion == $docente['email'] ){
                   $nombre_rol = $docente['nombre_rol'];
                   $especialidad = $docente['especialidad'];
                   $profesion = $docente['profesion'];
                  }
                  
      
                }
              
                ?>
      
               <div class = "row>
               <div class = "col-md-6>
               <div class="card card-outline card-primary">
                              <div class="card-header">
                                  <h3 class="card-title">Datos del docente</h3>
                                  <div class="card-tools">
                                      
                                  </div>
                              </div>
                              <div class="card-body">
                              <table class = "table-sm table-hover table-striped table-border">
                <tr>
                  <td><b>Nombres y Apellidos <b></td>
                  <td><b><?=$nombres_sesion_usuario." ".$apellidos_sesion_usuario;?> <b></td>
      
               </tr>
      
               <tr>
                  <td><b>Rol <b></td>
                  <td><b><?=$nombre_rol;?> <b></td>
      
               </tr>
               <tr>
                  <td><b>Especialidad <b></td>
                  
                  <td><b><?=$especialidad;?> <b></td>
      
               </tr>
      
               <tr>
                  <td><b>Profesión <b></td>
                  <td><b><?=$profesion;?> <b></td>
      
               </tr>
               </table>
               
               </div>
      
               </div>
               </table>
                           
      
                              </div>
                          </div>
                      </div>
                  </div>
      
               <?php
               }else{
                $sql_datos = "SELECT * FROM usuarios as usu 
INNER JOIN roles as rol ON rol.id_rol = usu.rol_id 
INNER JOIN personas as per ON per.usuario_id = usu.id_usuario 

where usu.estado = '1' AND usu.email = '$email_sesion'";
$query_datos = $pdo->prepare($sql_datos);
$query_datos->execute();
$datos = $query_datos->fetchAll(PDO::FETCH_ASSOC);
foreach($datos as $dato){
$nombre = $dato['nombres'];
$nombre_rol = $dato['nombre_rol'];
}
?>
<div class = "row>
               <div class = "col-md-6>
               <div class="card card-outline card-primary">
                              <div class="card-header">
                                  <h3 class="card-title">Datos del Usuario</h3>
                                  <div class="card-tools">
                                      
                                  </div>
                              </div>
                              <div class="card-body">
                              <table class = "table-sm table-hover table-striped table-border">
                <tr>
                  <td><b>Nombres y Apellidos <b></td>
                  <td><b><?=$nombres_sesion_usuario." ".$apellidos_sesion_usuario;?> <b></td>
      
               </tr>
      
               <tr>
                  <td><b>Rol <b></td>
                  <td><b><?=$nombre_rol;?> <b></td>
      
               </tr>
             
                    
               </table>    
                           
      
                              </div>
                          </div>
                      </div>
                  </div>
<?php

               }
            }
               
                       
         ?>   

          <?php
        if(($rol_sesion_usuario=="ADMINISTRADOR") || ($rol_sesion_usuario=="SECRETARIA")|| ($rol_sesion_usuario=="DIRECTOR")){ ?>
<div class="row">
<div class="col-lg-3 col-6">
  <div class="small-box bg-primary" >
    <div class="inner">
      <?php
      $contador_roles = 0;
      foreach($roles as $role){
        $contador_roles = $contador_roles + 1;

      }

      ?>
      <h3><?=$contador_roles;?></h3>
      <p>Roles registrados</p>
    </div>

    <div class="icon">
        <i class="fas" style="color: white"><i class="bi bi-diagram-3"></i></i>

    </div>
    <a href = "<?=APP_URL;?>/admin/roles" class="small-box-footer">
      Mas información <i class="fas fa-arrow-circle-rigth"></i>
    </a>

  </div>
</div>


  <div class="col-lg-3 col-4">
  <div class="small-box bg-info">
    <div class="inner">
      <?php
      $contador_usuarios = 0;
      foreach($usuarios as $usuario){
        $contador_usuarios = $contador_usuarios + 1;
     }
      ?>
      <h3><?=$contador_usuarios;?></h3>
      <p>Usuarios registrados</p>
    </div>
  
    <div class="icon">
        <i class="fas" style="color: white"><i class="bi bi-people-fill"></i></i>

    </div>
    <a href = "<?=APP_URL;?>/admin/usuarios" class="small-box-footer">
      Mas información <i class="fas fa-arrow-circle-rigth"></i>
    </a>

</div>
  </div>

  <div class="col-lg-3 col-4">
  <div class="small-box bg-dark">
    <div class="inner">
      <?php
      $contador_niveles = 0;
      foreach($niveles as $nivele){
        $contador_niveles = $contador_niveles + 1;
     }
      ?>
      <h3><?=$contador_niveles;?></h3>
      <p>niveles registrados</p>
    </div>
  
    <div class="icon">
        <i class="fas" style="color: white"><i class="bi bi-bookshelf"></i></i>

    </div>
    <a href = "<?=APP_URL;?>/admin/niveles" class="small-box-footer">
      Mas información <i class="fas fa-arrow-circle-rigth"></i>
    </a>

</div>
  </div>


  <div class="col-lg-3 col-4">
  <div class="small-box bg-warning">
    <div class="inner">
      <?php
      $contador_grados = 0;
      foreach($grados as $grado){
        $contador_grados = $contador_grados + 1;
     }
      ?>
      <h3><?=$contador_grados;?></h3>
      <p>Grados registrados</p>
    </div>
  
    <div class="icon">
        <i class="fas" style="color: white"><i class="bi-bar-chart-steps"></i></i>

    </div>
    <a href = "<?=APP_URL;?>/admin/grados" class="small-box-footer">
      Mas información <i class="fas fa-arrow-circle-rigth"></i>
    </a>

</div>
  </div>

  <div class="col-lg-3 col-4">
  <div class="small-box bg-danger">
    <div class="inner">
      <?php
      $contador_materias = 0;
      foreach($materias as $materia){
        $contador_materias = $contador_materias + 1;
     }
      ?>
      <h3><?=$contador_materias;?></h3>
      <p>Materias registradas</p>
    </div>
  
    <div class="icon">
        <i class="fas" style="color: white"><i class="bi bi-book-half"></i></i>

    </div>
    <a href = "<?=APP_URL;?>/admin/materias" class="small-box-footer">
      Mas información <i class="fas fa-arrow-circle-rigth"></i>
    </a>

</div>
  </div>

  <div class="col-lg-3 col-4">
  <div class="small-box bg-default">
    <div class="inner">
      <?php
      $contador_administrativos = 0;
      foreach($administrativos as $administrativo){
        $contador_administrativos = $contador_administrativos + 1;
     }
      ?>
      <h3><?=$contador_administrativos;?></h3>
      <p>Administrativos registrados</p>
    </div>
  
    <div class="icon">
        <i class="fas" style="color: black"><i class="bi bi-person-lines-fill"></i></i>

    </div>
    <a href = "<?=APP_URL;?>/admin/administrativos" class="small-box-footer">
      Mas información <i class="fas fa-arrow-circle-rigth"></i>
    </a>

</div>
  </div>

  
  <div class="col-lg-3 col-4">
  <div class="small-box bg-success">
    <div class="inner">
      <?php
      $contador_docentes = 0;
      foreach($docentes as $docente){
        $contador_docentes = $contador_docentes + 1;
     }
      ?>
      <h3><?=$contador_docentes;?></h3>
      <p>Docentes registrados</p>
    </div>
  
    <div class="icon">
        <i class="fas" style="color: white"><i class="bi bi-person-video3"></i></i>

    </div>
    <a href = "<?=APP_URL;?>/admin/docentes" class="small-box-footer">
      Mas información <i class="fas fa-arrow-circle-rigth"></i>
    </a>

</div>
  </div>


  <div class="col-lg-3 col-4">
  <div class="small-box bg-primary">
    <div class="inner">
      <?php
      $contador_estudiantes = 0;
      foreach($estudiantes as $estudiante){
        $contador_estudiantes = $contador_estudiantes + 1;
     }
      ?>
      <h3><?=$contador_estudiantes;?></h3>
      <p>Estudiantes registrados</p>
    </div>
  
    <div class="icon">
        <i class="fas" style="color: white"><i class="bi bi-person-video"></i></i>

    </div>
    <a href = "<?=APP_URL;?>/admin/estudiantes" class="small-box-footer">
      Mas información <i class="fas fa-arrow-circle-rigth"></i>
    </a>

</div>
  </div>
</div>

<hr>


<div class="row">
  <div class="col-md-8">

    <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="card-title">Alumnos registrados</h3>
          </div>  
        <div class="card-body">
          <div>  
            <canvas id="myChart"> </canvas>
          </div> 
        </div>  
    </div>
    

    <?php
        $contador = 0;
        $contador11 = 0;
        $contador12 = 0;
        $contador14 = 0;
        $contador13 = 0;
        
        foreach($reportes_estudiantes as $reportes_estudiante){
          if($reportes_estudiante['grado_id']=="28") $contador11 = $contador11 + 1;
          if($reportes_estudiante['grado_id']=="2") $contador12 = $contador12 + 1;
         
          if($reportes_estudiante['grado_id']=="6") $contador14 = $contador14 + 1;
          if($reportes_estudiante['grado_id']=="22") $contador13 = $contador13 + 1;
          

        }
        $datos_reporte_estudiantes = $contador11.",".$contador12.",".$contador13.",".$contador14;
    ?>

    
<script>
  var grados = ['1- 1', '1- 2', '1- 3', '1-4'];
  var datos = [<?=$datos_reporte_estudiantes;?>];
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: grados,
      datasets: [{
        label: 'Estudiantes por grados',
        data: datos,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

<!-- /.SEGUNDO GRÁFICO -->



<div class="row">
  <div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="card-title">Alumnos por localidades</h3>
          </div>  
        <div class="card-body">
          <div>  
    <!-- Gráfico por grados -->
    <canvas id="myChart"></canvas>
  </div>
  
    <!-- Gráfico por localidades -->
    <canvas id="localidadesChart"></canvas>
  
</div>

<?php
$estudiantes_por_localidad = [];

foreach ($reportes_estudiantes as $estudiante) {
    $localidad = $estudiante['localidad'];

    if (!isset($estudiantes_por_localidad[$localidad])) {
        $estudiantes_por_localidad[$localidad] = 1;
    } else {
        $estudiantes_por_localidad[$localidad]++;
    }
}

$labels_localidades = json_encode(array_keys($estudiantes_por_localidad));
$datos_localidades = json_encode(array_values($estudiantes_por_localidad));
?>



<canvas id="localidadesChart" style="width:300%; height:400px;"></canvas>
<script>
  const ctx2 = document.getElementById('localidadesChart');
  const localidades = <?=$labels_localidades?>;
  const datosLocalidades = <?=$datos_localidades?>;

  new Chart(ctx2, {
    type: 'bar',
    data: {
      labels: localidades,
      datasets: [{
        label: 'Estudiantes por Localidad',
        data: datosLocalidades,
        backgroundColor: 'rgba(75, 192, 192, 0.5)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      }]
    },
    options: {
      indexAxis: 'y',
      scales: {
        x: {
          beginAtZero: true
        }
      }
    }
  });
</script>
        

    <!-- Gráfico por promedios localidad -->
    
  
<div class="row">
  <div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="card-title">Alumnos por localidades - Notas</h3>
          </div>  
        <div class="card-body">
          <div>  
            <canvas id="notasLocalidadChart"></canvas>
          </div>
  <?php
 $promedios_por_localidad = [];

foreach ($calificaciones as $fila) {
    $localidad = $fila['localidad'];
    $nota = floatval($fila['nota1']);

    if (!isset($promedios_por_localidad[$localidad])) {
        $promedios_por_localidad[$localidad] = ['suma' => 0, 'cantidad' => 0];
    }

    $promedios_por_localidad[$localidad]['suma'] += $nota;
    $promedios_por_localidad[$localidad]['cantidad']++;
}

// Ahora calculamos el promedio real
$promedios_finales = [];
foreach ($promedios_por_localidad as $localidad => $datos) {
    $promedios_finales[$localidad] = round($datos['suma'] / $datos['cantidad'], 2); // con 2 decimales
}

$labels_localidades = json_encode(array_keys($promedios_finales));
$datos_notas = json_encode(array_values($promedios_finales));
?>
<canvas id="notasLocalidadChart" style="height:400px;"></canvas>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('notasLocalidadChart');
    const localidades = <?=$labels_localidades?>;
    const notas = <?=$datos_notas?>;

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: localidades,
        datasets: [{
          label: 'Promedio nota1 por Localidad',
          data: notas,
          backgroundColor: 'rgba(255, 159, 64, 0.6)',
          borderColor: 'rgba(255, 159, 64, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            max: 10 // ajustalo si tus notas no llegan a 10
          }
        }
      }
    });
  });
</script>
        </div>

       
        
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  </div>
  <!-- /.content-wrapper -->


<?php
        }else{
          echo "<div class='alert alert-danger'>No tienes permiso para ver esta sección</div>";
        }
      ?>
<?php
include('../../app/config.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Consulta para traer egresados activos
$sql_egresados = "SELECT id_egresado, nombre_completo FROM egresados";
$query_egresados = $pdo->prepare($sql_egresados);
$query_egresados->execute();
$egresados = $query_egresados->fetchAll(PDO::FETCH_ASSOC);

// Incluye layout y otros componentes
include('../../admin/layout/parte1.php');
include('../../admin/layout/parte2.php');
include('../../layout/mensajes.php');


    ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h1>Creación materias pendientes</h1>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">LLene los datos</h3>
               
            </div>

            <div class="card-body">
            <form action="<?=APP_URL;?>/app/controllers/materias_pendientes/create_materias_pendientes.php" method="post">
                <div class="row">
                
                        

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Egresado</label>
                            <select name="egresado_id" class="form-control">
                  <?php foreach ($egresados as $egresado): ?> <option value="<?= $egresado['id_egresado'] ?>">
                    <?= $egresado['nombre_completo'] ?>
                    </option>

                  <?php endforeach; ?>
                </select>
                

                        </div>
                        </div>

                
                
                <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Materias pendientes</label>
                            <?php for ($i = 1; $i <= 10; $i++): ?>
  <div class="card card-outline card-secondary mb-3">
    <div class="card-header">
      <h5>Materia pendiente <?= $i ?></h5>
    </div>
    <div class="card-body">
      <div class="form-group">
        <label>Materia</label>
        <select name="materia<?= $i ?>" class="form-control">
          <option value="">Seleccione una materia</option>
          <option value="Matemática 1">Matemática 1</option>
          <option value="Matemática 4">Matemática 4</option>
          <option value="Matemática 5">Matemática 5</option>
          <option value="Lengua 3">Lengua 3</option>
          <option value="Lengua 5">Lengua 5</option>
           <option value="Procesos Productivos 4to">Procesos Productivos 4to</option>
          <option value="Procesos constructivos en madera III 5to">Procesos constructivos en madera III 5to</option>
          <option value="Estructura en madera I 5to">Estructura en madera I 5to</option>
          <option value="Comunicación 5">Comunicación 5</option>
          <option value="Inglés 5">Inglés 5</option>
          <option value="Diseño III 5to">"Diseño III 5to</option>
          <option value="FEC 5">FEC 5</option>
          <option value="Psicología Laboral 6to">Psicología Laboral 6to</option>
          <option value="Marco Jurídico 6to"> Marco Jurídico 6to</option>
          <option value="Procesos constructivos en madera IV 6to">Procesos constructivos en madera IV 6to</option>
          <option value="Estructura en madera II 6to">Estructura en madera II 6to</option>
          <option value="Industria de la madera II 6to">Industria de la madera II 6to</option>
          <option value="Diseño IV 6to">Diseño IV 6to</option>
          <option value="Seguridad e Higiene 6to">Seguridad e Higiene 6to</option>
          <option value="Computo y Presupuesto 6to">Computo y Presupuesto 6to</option>
          <option value="Pract. Profesionalizante 6to">Pract. Profesionalizante 6to</option>
          <option value="Microemprendimiento y Pymes 6to">Microemprendimiento y Pymes 6to</option>
          |          |
          <!-- etc -->
        </select>
      </div>
      <div class="form-group">
        <label>Docente asignado</label>
        <select name="docente_asignado<?= $i ?>" class="form-control">
          <option value="">Seleccione un docente</option>
          <option value="Prof. Paula García">Prof. Paula García</option>
          <option value="Prof. Erica ">Prof. Erica</option>
          <option value="Prof. Juan Pérez">Prof. Juan Pérez</option>
          <!-- etc -->
        </select>
      </div>
      <div class="form-group">
        <label>Horario de consulta</label>
        <input type="text" name="horario_consulta<?= $i ?>" class="form-control">
      </div>
      <div class="form-group">
        <label>Fecha de mesa</label>
        <input type="date" name="fecha_mesa<?= $i ?>" class="form-control">
      </div>
      <div class="form-group">
        <label>Estado</label>
        <select name="estado<?= $i ?>" class="form-control">
          <option value="pendiente">Pendiente</option>
          <option value="en desarrollo">En desarrollo</option>
          <option value="aprobada">Aprobada</option>
        </select>
      </div>
    </div>
  </div>
<?php endfor; ?>
                
                
        <hr>
        <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <a href="<?=APP_URL;?>/admin/materias_pendientes" class="btn btn-secondary">Cancelar</a>
           
                        </div> 
                    </div>
        </div>
            </form>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div> 


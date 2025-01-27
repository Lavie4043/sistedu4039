CREATE TABLE roles(

    id_rol     INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR (255) NOT NULL UNIQUE KEY,
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11)
)ENGINE=InnoDB;

 
INSERT INTO roles (nombre_rol,fyh_creacion,estado) 
VALUES ('ADMINISTRADOR','2024-05-06 16:13:20','1');



CREATE TABLE usuarios (

    id_usuario     INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rol_id         INT (11) NOT NULL,
    email          VARCHAR (255) NOT NULL UNIQUE KEY,
    password       TEXT NOT NULL,

    fyh_creacion      DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado          VARCHAR (11),
    FOREIGN KEY (rol_id) REFERENCES roles (id_rol) on delete no action on update cascade

)ENGINE=InnoDB;
INSERT INTO usuarios (rol_id,email,password,fyh_creacion,estado) 
VALUES('1','paulajgarcia68@gmail.com','$2y$10$NRLMiG.uB/UAEQVjRKPpKOlHH8xFFU1RGwXmvhZxh8EDaEXNckGmO','2024-05-01 13:56:10','1');

CREATE TABLE personas (

    id_persona        INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usuario_id        INT (11) NOT NULL,
    nombres           VARCHAR (50) NOT NULL,
    apellidos         VARCHAR (50) NOT NULL,
    ci                VARCHAR (20) NOT NULL,
    fecha_nacimiento  VARCHAR (20) NOT NULL,
    profesion         VARCHAR (50) NOT NULL,
    direccion         VARCHAR (255) NOT NULL,
    celular           VARCHAR (20) NOT NULL,
    
    fyh_creacion      DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado            VARCHAR (11),

    FOREIGN KEY (usuario_id) REFERENCES usuarios (id_usuario) on delete no action on update cascade
    
)ENGINE=InnoDB;
INSERT INTO personas (usuario_id,nombres,apellidos,ci,fecha_nacimiento,profesion,direccion,celular,fyh_creacion,estado) 
VALUES ('1','Paula','Garcia','20237396','12/07/1968','Lic en historia','Otero 421 Maipu','2615166581','2024-05-01 13:56:10','1');

CREATE TABLE administrativos (

    id_administrativo INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id        INT (11) NOT NULL,
        
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

    FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade
    
)ENGINE=InnoDB;


CREATE TABLE docentes (

    id_docente        INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id        INT (11) NOT NULL,
        
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),
    especialidad VARCHAR (255) NOT NULL,
    antiguedad VARCHAR (255) NOT NULL,

    FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade
    
)ENGINE=InnoDB;


CREATE TABLE preceptores (

    id_preceptore        INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id        INT (11) NOT NULL,
        
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),
    cargo  VARCHAR (255) NOT NULL,
    antiguedad VARCHAR (255) NOT NULL,

    FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade
    
)ENGINE=InnoDB;




CREATE TABLE estudiantes (

    id_estudiante     INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id        INT (11) NOT NULL,
    nivel_id          INT (11) NOT NULL, 
    grado_id          INT (11) NOT NULL,
    rude              VARCHAR (50) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

    FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade,
    FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) on delete no action on update cascade,
    FOREIGN KEY (grado_id) REFERENCES grados (id_grado) on delete no action on update cascade
    
)ENGINE=InnoDB;

CREATE TABLE ppffs (

    id_ppff INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    estudiante_id        INT (11) NOT NULL,
    nombres_apellidos_ppff  VARCHAR (50) NOT NULL,
    ci_ppff                 VARCHAR (20) NOT NULL,
    celular_ppff            VARCHAR (20) NOT NULL,
    ocupacion_ppff          VARCHAR (50) NOT NULL,
    ref_nombre              VARCHAR (50) NOT NULL,
    ref_parentezco          VARCHAR (50) NOT NULL,
    ref_celular             VARCHAR (50) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

    FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) on delete no action on update cascade
    
)ENGINE=InnoDB;




CREATE TABLE configuracion_instituciones (

    id_config_institucion INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_institucion  VARCHAR (255) NOT NULL,
    logo                VARCHAR (255) NULL,
    direccion           VARCHAR (255) NOT NULL,
    telefono            VARCHAR (100) NULL,
    celular             VARCHAR (100) NULL,
    correo              VARCHAR (100) NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11)
    
)ENGINE=InnoDB;
INSERT INTO configuracion_instituciones (nombre_institucion,logo,direccion,telefono,celular,correo,fyh_creacion,estado) 
VALUES('4039 Cruz de Piedra','logo.jpg','Videla Aranda 3251 Maipu','499-0480','2615166581','dge4039@mendoza.edu.ar','2024-6-4 15:39:09', '1');

CREATE TABLE gestiones (

    id_gestion INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gestion  VARCHAR (255) NOT NULL,
    
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11)
    
)ENGINE=InnoDB;
INSERT INTO gestiones (gestion,fyh_creacion,estado) 
VALUES('GESTION 2024','2024-6-4 15:39:09', '1');


CREATE TABLE niveles (

    id_nivel INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gestion_id INT (11) NOT NULL,
    nivel VARCHAR (255) NOT NULL,
    turno VARCHAR (255) NOT NULL,
    
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),
    FOREIGN KEY (gestion_id) REFERENCES gestiones (id_gestion) on delete no action on update cascade

)ENGINE=InnoDB;
INSERT INTO niveles (gestion_id,nivel,turno,fyh_creacion,estado) 
VALUES('1','INICIAL','MAÑANA','2024-05-01 13:56:10','1');


CREATE TABLE grados (

    id_grado INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nivel_id INT (11) NOT NULL,
    curso VARCHAR (255) NOT NULL,
    paralelo VARCHAR (255) NOT NULL,
    
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),
    FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) on delete no action on update cascade

)ENGINE=InnoDB;
INSERT INTO grados (nivel_id,curso,paralelo,fyh_creacion,estado) 
VALUES('1','INICIAL - 1','A','2024-05-01 13:56:10','1');


CREATE TABLE materias (

    id_materia INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_materia VARCHAR (255) NOT NULL,
        
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11)
    
)ENGINE=InnoDB;
INSERT INTO materias (nombre_materia,fyh_creacion,estado) 
VALUES('HISTORIA','2024-05-01 13:56:10','1');


CREATE TABLE pagos (

    id_pago        INT   (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    estudiante_id  INT   (11) NOT NULL,
    mes_pagado     VARCHAR (50) NOT NULL,
    monto_pagado     VARCHAR (10) NOT NULL,
    fecha_pagado     VARCHAR (20) NOT NULL,
        
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

 FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) on delete no action on update cascade     
)ENGINE=InnoDB;

CREATE TABLE asignaciones (

    id_asignacion        INT   (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    docente_id           INT   (11) NOT NULL,
    nivel_id             INT   (11) NOT NULL,
    grado_id             INT   (11) NOT NULL,
    materia_id           INT   (11) NOT NULL,

         
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

 FOREIGN KEY (docente_id) REFERENCES docentes (id_docente) on delete no action on update cascade, 
 FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) on delete no action on update cascade,
 FOREIGN KEY (materia_id) REFERENCES materias (id_materia) on delete no action on update cascade,
 FOREIGN KEY (grado_id) REFERENCES grados (id_grado) on delete no action on update cascade     
)ENGINE=InnoDB;

CREATE TABLE asignacionesprece (

    id_asignacionprece        INT   (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    preceptore_id           INT   (11) NOT NULL,
    nivel_id             INT   (11) NOT NULL,
    grado_id             INT   (11) NOT NULL,
             
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

 FOREIGN KEY (preceptore_id) REFERENCES preceptores (id_preceptore) on delete no action on update cascade, 
 FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) on delete no action on update cascade,
 
 FOREIGN KEY (grado_id) REFERENCES grados (id_grado) on delete no action on update cascade     
)ENGINE=InnoDB;

CREATE TABLE calificaciones (

    id_calificacion      INT   (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    docente_id           INT   (11) NOT NULL,
    estudiante_id        INT   (11) NOT NULL,
    materia_id           INT   (11) NOT NULL,
    nota1                VARCHAR (10) NOT NULL,
    nota2                VARCHAR (10) NOT NULL,
  

         
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

 FOREIGN KEY (docente_id) REFERENCES docentes (id_docente) on delete no action on update cascade,
 FOREIGN KEY (materia_id) REFERENCES materias (id_materia) on delete no action on update cascade, 
 FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) on delete no action on update cascade
     
)ENGINE=InnoDB;


CREATE TABLE kardexs (

    id_kardex            INT   (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    docente_id           INT   (11) NOT NULL,
    estudiante_id        INT   (11) NOT NULL,
    materia_id           INT   (11) NOT NULL,
    fecha                VARCHAR (50) NOT NULL,
    observacion          VARCHAR (255) NOT NULL,
    nota                 TEXT     NOT NULL,
    
  
      
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

 FOREIGN KEY (docente_id) REFERENCES docentes (id_docente) on delete no action on update cascade,
 FOREIGN KEY (materia_id) REFERENCES materias (id_materia) on delete no action on update cascade, 
 FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) on delete no action on update cascade
     
)ENGINE=InnoDB;

CREATE TABLE kardexsprece (

    id_kardexprece            INT   (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    preceptore_id           INT   (11) NOT NULL,
    estudiante_id        INT   (11) NOT NULL,
    fecha                VARCHAR (50) NOT NULL,
    observacion          VARCHAR (255) NOT NULL,
    nota                 TEXT     NOT NULL,
    documentoprece       VARCHAR (255) NULL,
    
  
      
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

 FOREIGN KEY (preceptore_id) REFERENCES preceptores (id_preceptore) on delete no action on update cascade,
 
 FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) on delete no action on update cascade
     
)ENGINE=InnoDB;

CREATE TABLE kardexsppff (

    id_kardexppff            INT   (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    preceptore_id           INT   (11) NOT NULL,
    ppff_id        INT   (11) NOT NULL,
    fecha                VARCHAR (50) NOT NULL,
    observacion          VARCHAR (255) NOT NULL,
    nota                 TEXT     NOT NULL,
    documentoppff       VARCHAR (255) NULL,
    
  
      
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

 FOREIGN KEY (preceptore_id) REFERENCES preceptores (id_preceptore) on delete no action on update cascade,
 
 FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) on delete no action on update cascade
     
)ENGINE=InnoDB;

CREATE TABLE permisos (

    id_permiso        INT   (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_url         VARCHAR (100) NOT NULL,
    url                text NOT NULL,
    
        
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11)

     
)ENGINE=InnoDB;

CREATE TABLE roles_permisos (

    id_rol_permiso        INT   (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rol_id                INT   (11) NOT NULL, 
    permiso_id                INT   (11) NOT NULL, 
  
    
        
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

FOREIGN KEY (rol_id) REFERENCES roles (id_rol) on delete no action on update cascade, 
 FOREIGN KEY (permiso_id) REFERENCES permisos (id_permiso) on delete no action on update cascade
)ENGINE=InnoDB;
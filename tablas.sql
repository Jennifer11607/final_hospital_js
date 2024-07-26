CREATE DATABASE final_jimenez_js;

create table clinicas(
    clinica_id serial primary key not null,
    clinica_nombre varchar(50) not null,
    clinica_situacion smallint not null default 1
);
select * from clinicas

create table especialidades(
    espec_id serial primary key not null,
    espec_nombre varchar(50) not null,
    espec_situacion smallint not null default 1
);

select * from especialidades

create table pacientes(
    paciente_id serial primary key not null,
    paciente_nombre varchar(50) not null,
    paciente_dpi varchar(15) not null,
    paciente_telefono varchar(15) not null,
    paciente_situacion smallint not null default 1
);

select * from pacientes
 
create table medicos(
    medico_id serial primary key not null,
    medico_nombre varchar(50) not null,
    medico_espec integer not null,
    medico_clinica integer not null,
    medico_situacion smallint not null default 1,
    foreign key (medico_espec) REFERENCES especialidades (espec_id),
    foreign key (medico_clinica) REFERENCES clinicas (clinica_id)
);

 select * from medicos
 
 
CREATE TABLE citas (
    cita_id SERIAL NOT NULL,
    cita_paciente INTEGER NOT NULL,
    cita_medico INTEGER NOT NULL,
    cita_fecha DATE ,
    cita_hora INTERVAL HOUR TO MINUTE NOT NULL,
    cita_referencia VARCHAR(5) NOT NULL,
    cita_situacion SMALLINT NOT NULL DEFAULT 1,
    PRIMARY KEY (cita_id),
    FOREIGN KEY (cita_paciente) REFERENCES pacientes (paciente_id),
    FOREIGN KEY (cita_medico) REFERENCES medicos (medico_id)
);

select * from citas
insert into citas (cita_id, cita_paciente, cita_medico, cita_fecha, cita_hora, cita_referencia)
values (2, 1, 1, 2024-07-14, "14:30", "si");

create table detalles(
    detalle_id serial not null,
    detalle_cita integer not null,
    detalle_paciente integer not null,
    detalle_medico integer not null,
    detalle_situacion smallint not null default 1,
    primary key (detalle_id),
    foreign key (detalle_cita) REFERENCES citas (cita_id),
    foreign key (detalle_paciente) REFERENCES pacientes (paciente_id),
    foreign key (detalle_medico) REFERENCES medicos (medico_id)
);

drop table citas
INSERT INTO citas(cita_paciente, cita_medico, cita_fecha, cita_hora, cita_referencia) values('2','2','2024-07-25','23:05','si')
select * from citas

INSERT INTO citas(cita_paciente, cita_medico, cita_fecha, cita_hora, cita_referencia) values('4','1','2024-07-25','23:11','si')
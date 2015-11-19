/*==============================================================*/
/* DBMS name:      PostgreSQL 8                                 */
/* Created on:     19/11/2015 11:13:48                          */
/*==============================================================*/

/*
drop table admins;

drop table autos;

drop table contratos;

drop table estados;

drop table forms_datos;

drop table paises;

drop table provincias;

drop table usuarios;

drop table ventas;

drop domain domain_1;

drop domain domain_2;
*/
/*==============================================================*/
/* Domain: domain_1                                             */
/*==============================================================*/
create domain domain_1 as VARCHAR(50);

/*==============================================================*/
/* Domain: domain_2                                             */
/*==============================================================*/
create domain domain_2 as VARCHAR(50);

/*==============================================================*/
/* Table: admins                                                */
/*==============================================================*/
create table admins (
   id                   INT4                 not null,
   nombre_admin         VARCHAR(50)          not null,
   contrasena           VARCHAR(75)          not null,
   nombre               VARCHAR(50)          not null,
   email                VARCHAR(50)          not null,
   fecha_registro       DATE                 not null,
   fecha_conexion       DATE                 not null,
   fecha_modif          DATE                 not null,
   id_estado            INT2                 not null,
   constraint PK_ADMINS primary key (id)
);

/*==============================================================*/
/* Table: autos                                                 */
/*==============================================================*/
create table autos (
   id                   INT4                 not null,
   marca                VARCHAR(50)          not null,
   modelo               VARCHAR(50)          not null,
   ano                  VARCHAR(4)           not null,
   color                VARCHAR(50)          not null,
   no_motor             VARCHAR(50)          not null,
   matricula_auto       VARCHAR(50)          not null,
   no_chassis           VARCHAR(50)          not null,
   observaciones        VARCHAR(50)          not null,
   kilometraje          VARCHAR(50)          not null,
   no_chapa             VARCHAR(50)          not null,
   precio               INT4                 not null,
   fecha_registro       DATE                 not null,
   id_estado            INT4                 not null,
   constraint PK_AUTOS primary key (id)
);

/*==============================================================*/
/* Table: contratos                                             */
/*==============================================================*/
create table contratos (
   id                   INT4                 not null,
   id_admin             INT4                 not null,
   id_usuario           INT4                 not null,
   id_auto              INT4                 not null,
   id_forms             INT4                 not null,
   fecha_inicio         DATE                 not null,
   fecha_final          DATE                 not null,
   fecha_registro       DATE                 not null,
   fecha_modif          DATE                 not null,
   id_estado            INT4                 not null,
   constraint PK_CONTRATOS primary key (id)
);

/*==============================================================*/
/* Table: estados                                               */
/*==============================================================*/
create table estados (
   id                   INT4                 not null,
   nombre_estado        VARCHAR(50)          not null,
   contexto             VARCHAR(50)          null,
   constraint PK_ESTADOS primary key (id)
);

/*==============================================================*/
/* Table: forms_datos                                           */
/*==============================================================*/
create table forms_datos (
   id                   INT4                 not null,
   datos                VARCHAR(5000)        not null,
   constraint PK_FORMS_DATOS primary key (id)
);

/*==============================================================*/
/* Table: paises                                                */
/*==============================================================*/
create table paises (
   id                   INT4                 not null,
   nombre_pais          VARCHAR(50)          not null,
   constraint PK_PAISES primary key (id)
);

/*==============================================================*/
/* Table: provincias                                            */
/*==============================================================*/
create table provincias (
   id                   INT4                 not null,
   nombre_provincia     VARCHAR(50)          not null,
   constraint PK_PROVINCIAS primary key (id)
);

/*==============================================================*/
/* Table: usuarios                                              */
/*==============================================================*/
create table usuarios (
   id                   INT4                 not null,
   nombre_usuario       VARCHAR(50)          not null,
   contrasena           VARCHAR(75)          not null,
   nombre               VARCHAR(50)          not null,
   email                VARCHAR(50)          not null,
   estado_civil         VARCHAR(50)          not null,
   direccion            VARCHAR(50)          not null,
   numero_oficina       VARCHAR(50)          null,
   ciudad               VARCHAR(50)          not null,
   provincia            VARCHAR(50)          null,
   id_provincia         INT4               not null,
   codigo_postal        VARCHAR(50)          not null,
   id_pais              INT4         	     not null,
   numero_casa          VARCHAR(20)          not null,
   numero_trabajo       VARCHAR(20)          null,
   numero_movil         VARCHAR(20)          null,
   cargo_trabajo        VARCHAR(50)          null,
   fecha_registro       DATE                 not null,
   fecha_conexion       DATE                 not null,
   fecha_modif          DATE                 not null,
   id_estado            INT2                 not null,
   constraint PK_USUARIOS primary key (id)
);

/*==============================================================*/
/* Table: ventas                                                */
/*==============================================================*/
create table ventas (
   id                   INT4                 not null,
   id_admin             INT4                 not null,
   id_usuario           INT4                 not null,
   id_auto              INT4                 not null,
   id_forms             INT4                 not null,
   tiene_consignacion   INT2                 not null,
   id_form_consignacion INT4                 not null,
   fecha_inicio         DATE                 not null,
   fecha_registro       DATE                 not null,
   fecha_modif          DATE                 not null,
   id_estado            INT4                 not null,
   constraint PK_VENTAS primary key (id)
);

alter table autos
   add constraint FK_AUTOS_REFERENCE_ESTADOS foreign key (id_estado)
      references estados (id)
      on delete restrict on update restrict;

alter table contratos
   add constraint FK_CONTRATO_REFERENCE_FORMS_DA foreign key (id_forms)
      references forms_datos (id)
      on delete restrict on update restrict;

alter table contratos
   add constraint FK_CONTRATO_REFERENCE_USUARIOS foreign key (id_usuario)
      references usuarios (id)
      on delete restrict on update restrict;

alter table contratos
   add constraint FK_CONTRATO_REFERENCE_AUTOS foreign key (id_auto)
      references autos (id)
      on delete restrict on update restrict;

alter table contratos
   add constraint FK_CONTRATO_REFERENCE_ESTADOS foreign key (id_estado)
      references estados (id)
      on delete restrict on update restrict;

alter table contratos
   add constraint FK_CONTRATO_REFERENCE_ADMINS foreign key (id_admin)
      references admins (id)
      on delete restrict on update restrict;

alter table usuarios
   add constraint FK_USUARIOS_REFERENCE_ESTADOS foreign key (id_estado)
      references estados (id)
      on delete restrict on update restrict;

alter table usuarios
   add constraint FK_USUARIOS_REFERENCE_PAISES foreign key (id_pais)
      references paises (id)
      on delete restrict on update restrict;

alter table usuarios
   add constraint FK_USUARIOS_REFERENCE_PROVINCI foreign key (id_provincia)
      references provincias (id)
      on delete restrict on update restrict;

alter table ventas
   add constraint FK_VENTAS_REFERENCE_AUTOS foreign key (id_auto)
      references autos (id)
      on delete restrict on update restrict;

alter table ventas
   add constraint FK_VENTAS_REFERENCE_ADMINS foreign key (id_admin)
      references admins (id)
      on delete restrict on update restrict;

alter table ventas
   add constraint FK_VENTAS_REFERENCE_FORMS_DA foreign key (id_forms)
      references forms_datos (id)
      on delete restrict on update restrict;

alter table ventas
   add constraint FK_VENTAS_REFERENCE_USUARIOS foreign key (id_usuario)
      references usuarios (id)
      on delete restrict on update restrict;


create table reservas(
    res_id int PRIMARY KEY AUTO_INCREMENT,
    res_nombre varchar(60),
    res_celular varchar(30), 
    res_correo varchar(60),
    res_presupuesto varchar(30),
    res_destino varchar(60), 
    res_observaciones varchar(250)
   );

alter table reservas add COLUMN res_fecha date;

create table usuarios(
    id integer PRIMARY KEY AUTO_INCREMENT,
    usuario varchar(20),
    clave varchar(20)
);

insert into usuarios(usuario,clave)values('admin','12345');
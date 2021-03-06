-- Creacion y asignacion de todos los permisos al usuario daw2_user para database daw2 en servidor localhost
GRANT ALL PRIVILEGES ON daw2.* TO 'daw2_user'@'localhost' IDENTIFIED BY 'daw2_user';

/** Creación de la tabla "daw2_mediateca" **/
use daw2;
drop table if exists daw2_mediateca;
create table daw2_mediateca
( id integer unsigned auto_increment not null primary key
, titulo varchar(100) not null
, edita varchar(100) not null
, anio_edicion int(4)
, pvp decimal(10,2) not null
, tamanio varchar(10)
, paginas int(4)
, color varchar(4) 
, disponible_desde date not null
)
engine = myisam;


 insert into daw2_mediateca values (default,'Revista 1','Editorial 1',2001,'10,50','100x100',200,'b&n','2012-01-01');
 insert into daw2_mediateca values (default,'Revista 2','Editorial 2',2001,'10,50','100x100',200,'b&n','2012-01-01');
 insert into daw2_mediateca values (default,'Revista 3','Editorial 3',2001,'10,50','100x100',200,'b&n','2012-01-01');
 insert into daw2_mediateca values (default,'Revista 4','Editorial 4',2001,'10,50','100x100',200,'b&n','2012-01-01');
 insert into daw2_mediateca values (default,'Revista 5','Editorial 5',2001,'10,50','100x100',200,'b&n','2012-01-01');
 
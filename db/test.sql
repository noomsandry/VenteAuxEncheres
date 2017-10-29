create table if not exists personne
 (
   numpers bigint(4) not null  auto_increment,
   numetab integer(2) null  ,
   nompers char(32) not null  ,
   prenompers char(32) not null  ,
   datenaispers date not null  ,
   adressepers char(32) null  
   , primary key (numpers) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table if not exists patient
 (
   numpat smallint(2) not null,
   datepat date not null  ,
   numpers bigint(4) not null  ,
   drprescri char(32) not null  ,
   renseigncli char(32) null  ,
   primary key (numpat)
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

alter table patient 
  add foreign key fk_patient_personne (numpers)
      references personne (numpers) ;
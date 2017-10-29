drop database if exists cds;

create database if not exists cds;
use cds;
# -----------------------------------------------------------------------------
#       table : reference_anal
# -----------------------------------------------------------------------------

create table if not exists reference_anal
 (
   numrefanal smallint(2) not null  auto_increment,
   libellerefanal char(32) null  
   , primary key (numrefanal) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       table : consommable
# -----------------------------------------------------------------------------

create table if not exists consommable
 (
   numconso bigint(4) not null  auto_increment,
   numprod bigint(4) not null  ,
   nomconso char(32) not null  ,
   designationprod char(32) not null  
   , primary key (numconso) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table consommable
# -----------------------------------------------------------------------------


create  index i_fk_consommable_produit
     on consommable (numprod asc);

# -----------------------------------------------------------------------------
#       table : personne
# -----------------------------------------------------------------------------

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

# -----------------------------------------------------------------------------
#       index de la table personne
# -----------------------------------------------------------------------------


create  index i_fk_personne_etablissement
     on personne (numetab asc);

# -----------------------------------------------------------------------------
#       table : resultat_anal
# -----------------------------------------------------------------------------

create table if not exists resultat_anal
 (
   numresultatanal integer(2) not null  auto_increment,
   dateresultatanal date null  
   , primary key (numresultatanal) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       table : element
# -----------------------------------------------------------------------------

create table if not exists element
 (
   numelem smallint(1) not null  auto_increment,
   numexam smallint(1) not null  ,
   nomelem char(32) not null  
   , primary key (numelem) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table element
# -----------------------------------------------------------------------------


create  index i_fk_element_examen
     on element (numexam asc);

# -----------------------------------------------------------------------------
#       table : etablissement
# -----------------------------------------------------------------------------

create table if not exists etablissement
 (
   numetab integer(2) not null  auto_increment,
   nometab char(32) not null  
   , primary key (numetab) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       table : examen
# -----------------------------------------------------------------------------

create table if not exists examen
 (
   numexam smallint(1) not null  auto_increment,
   nomexam char(32) not null  
   , primary key (numexam) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       table : sousproduit
# -----------------------------------------------------------------------------

create table if not exists sousproduit
 (
   numsousprod bigint(4) not null  auto_increment,
   numprod bigint(4) not null  ,
   dateperump date not null  ,
   pu bigint(4) not null  ,
   qtesousprod bigint(4) not null  
   , primary key (numsousprod) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table sousproduit
# -----------------------------------------------------------------------------


create  index i_fk_sousproduit_produit
     on sousproduit (numprod asc);

# -----------------------------------------------------------------------------
#       table : ligneentree
# -----------------------------------------------------------------------------

create table if not exists ligneentree
 (
   numlingeentree bigint(4) not null  auto_increment,
   numcmdfrs smallint(1) not null  ,
   numsousprod bigint(4) not null  ,
   qteentree bigint(4) not null  
   , primary key (numlingeentree) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table ligneentree
# -----------------------------------------------------------------------------


create  index i_fk_ligneentree_cmdfrs
     on ligneentree (numcmdfrs asc);

create  index i_fk_ligneentree_sousproduit
     on ligneentree (numsousprod asc);

# -----------------------------------------------------------------------------
#       table : patient
# -----------------------------------------------------------------------------

create table if not exists patient
 (
   numpat smallint(2) not null  auto_increment,
   numpers bigint(4) not null  ,
   drprescri char(32) not null  ,
   renseigncli char(32) null  ,
   primary key (numpat) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table patient
# -----------------------------------------------------------------------------


create  index i_fk_patient_personne
     on patient (numpers asc);

# -----------------------------------------------------------------------------
#       table : groupe_anal
# -----------------------------------------------------------------------------

create table if not exists groupe_anal
 (
   numgroupeanal smallint(1) not null  auto_increment,
   numanal bigint(4) not null  ,
   nomgroupeanal char(32) not null  ,
   nomanal char(32) not null  ,
   prixanal bigint(4) not null  
   , primary key (numgroupeanal) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table groupe_anal
# -----------------------------------------------------------------------------


create  index i_fk_groupe_anal_analyse
     on groupe_anal (numanal asc);

# -----------------------------------------------------------------------------
#       table : unite
# -----------------------------------------------------------------------------

create table if not exists unite
 (
   numunit smallint(1) not null  auto_increment,
   libelleunit char(10) not null  
   , primary key (numunit) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       table : categorie_pers
# -----------------------------------------------------------------------------

create table if not exists categorie_pers
 (
   numcategpers smallint(1) not null  auto_increment,
   nomcategpers char(32) not null  
   , primary key (numcategpers) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       table : produit
# -----------------------------------------------------------------------------

create table if not exists produit
 (
   numprod bigint(4) not null  auto_increment,
   designationprod char(32) not null  
   , primary key (numprod) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       table : categ_anal
# -----------------------------------------------------------------------------

create table if not exists categ_anal
 (
   numcateganal smallint(1) not null  auto_increment,
   nomcateganal char(32) not null  
   , primary key (numcateganal) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       table : cmdfrs
# -----------------------------------------------------------------------------

create table if not exists cmdfrs
 (
   numcmdfrs smallint(1) not null  auto_increment,
   datecmdfrs date not null  
   , primary key (numcmdfrs) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       table : analyse
# -----------------------------------------------------------------------------

create table if not exists analyse
 (
   numanal bigint(4) not null  auto_increment,
   numunit smallint(1) null  ,
   nomanal char(32) not null  ,
   prixanal bigint(4) not null  
   , primary key (numanal) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table analyse
# -----------------------------------------------------------------------------


create  index i_fk_analyse_unite
     on analyse (numunit asc);

# -----------------------------------------------------------------------------
#       table : prelevement
# -----------------------------------------------------------------------------

create table if not exists prelevement
 (
   numprelev bigint(4) not null  auto_increment,
   dateheureprelev datetime not null  ,
   dateheurearriv datetime null  
   , primary key (numprelev) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       table : reactif
# -----------------------------------------------------------------------------

create table if not exists reactif
 (
   numreact bigint(4) not null  auto_increment,
   numprod bigint(4) not null  ,
   nomreact char(32) not null  ,
   designationprod char(32) not null  
   , primary key (numreact) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table reactif
# -----------------------------------------------------------------------------


create  index i_fk_reactif_produit
     on reactif (numprod asc);

# -----------------------------------------------------------------------------
#       table : groupe_elem
# -----------------------------------------------------------------------------

create table if not exists groupe_elem
 (
   numgroupeelem smallint(1) not null  auto_increment,
   nomgroupeelem char(32) not null  
   , primary key (numgroupeelem) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       table : type_exam
# -----------------------------------------------------------------------------

create table if not exists type_exam
 (
   numtypeexam smallint(1) not null  auto_increment,
   nomtypeexam char(32) not null  
   , primary key (numtypeexam) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       table : exam_typexam
# -----------------------------------------------------------------------------

create table if not exists exam_typexam
 (
   numtypeexam smallint(1) not null  ,
   numexam smallint(1) not null  
   , primary key (numtypeexam,numexam) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table exam_typexam
# -----------------------------------------------------------------------------


create  index i_fk_exam_typexam_type_exam
     on exam_typexam (numtypeexam asc);

create  index i_fk_exam_typexam_examen
     on exam_typexam (numexam asc);

# -----------------------------------------------------------------------------
#       table : pat_elem_cal
# -----------------------------------------------------------------------------

create table if not exists pat_elem_cal
 (
   numpat smallint(2) not null  ,
   numelem smallint(1) not null  ,
   datepat date not null,
   resultatelem char(32) not null  
   , primary key (numpat,numelem,datepat) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table pat_elem_cal
# -----------------------------------------------------------------------------


create  index i_fk_pat_elem_cal_patient
     on pat_elem_cal (numpat asc);

create  index i_fk_pat_elem_cal_element
     on pat_elem_cal (numelem asc);

# -----------------------------------------------------------------------------
#       table : pers_categpers
# -----------------------------------------------------------------------------

create table if not exists pers_categpers
 (
   numpers bigint(4) not null  ,
   numcategpers smallint(1) not null  
   , primary key (numpers,numcategpers) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table pers_categpers
# -----------------------------------------------------------------------------


create  index i_fk_pers_categpers_personne
     on pers_categpers (numpers asc);

create  index i_fk_pers_categpers_categorie_pers
     on pers_categpers (numcategpers asc);

# -----------------------------------------------------------------------------
#       table : pat_categanal_cal
# -----------------------------------------------------------------------------

create table if not exists pat_categanal_cal
 (
   numpat smallint(2) not null  ,
   numcateganal smallint(1) not null  ,
   datepat date not null,
   interpretationcateganal char(32) null  ,
   numtempcateganal integer(2) not null  
   , primary key (numpat,numcateganal,datepat) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table pat_categanal_cal
# -----------------------------------------------------------------------------


create  index i_fk_pat_categanal_cal_patient
     on pat_categanal_cal (numpat asc);

create  index i_fk_pat_categanal_cal_categ_anal
     on pat_categanal_cal (numcateganal asc);

# -----------------------------------------------------------------------------
#       table : manipuler
# -----------------------------------------------------------------------------

create table if not exists manipuler
 (
   numpat smallint(2) not null  ,
   numconso bigint(4) not null  ,
   datepat date not null,
   qtesortieconso integer(2) not null  
   , primary key (numpat,numconso,datepat) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table manipuler
# -----------------------------------------------------------------------------


create  index i_fk_manipuler_patient
     on manipuler (numpat asc);

create  index i_fk_manipuler_consommable
     on manipuler (numconso asc);

# -----------------------------------------------------------------------------
#       table : elem_groupelem
# -----------------------------------------------------------------------------

create table if not exists elem_groupelem
 (
   numgroupeelem smallint(1) not null  ,
   numelem smallint(1) not null  
   , primary key (numgroupeelem,numelem) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table elem_groupelem
# -----------------------------------------------------------------------------


create  index i_fk_elem_groupelem_groupe_elem
     on elem_groupelem (numgroupeelem asc);

create  index i_fk_elem_groupelem_element
     on elem_groupelem (numelem asc);

# -----------------------------------------------------------------------------
#       table : utiliser
# -----------------------------------------------------------------------------

create table if not exists utiliser
 (
   numreact bigint(4) not null  ,
   numanal bigint(4) not null  ,
   qtesortiereact integer(2) not null  
   , primary key (numreact,numanal) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table utiliser
# -----------------------------------------------------------------------------


create  index i_fk_utiliser_reactif
     on utiliser (numreact asc);

create  index i_fk_utiliser_analyse
     on utiliser (numanal asc);

# -----------------------------------------------------------------------------
#       table : anal_refanal
# -----------------------------------------------------------------------------

create table if not exists anal_refanal
 (
   numanal bigint(4) not null  ,
   numrefanal smallint(2) not null  ,
   valeurrefanal varchar(20) null  
   , primary key (numanal,numrefanal) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table anal_refanal
# -----------------------------------------------------------------------------


create  index i_fk_anal_refanal_analyse
     on anal_refanal (numanal asc);

create  index i_fk_anal_refanal_reference_anal
     on anal_refanal (numrefanal asc);

# -----------------------------------------------------------------------------
#       table : pat_resanal
# -----------------------------------------------------------------------------

create table if not exists pat_resanal
 (
   numresultatanal integer(2) not null  ,
   numpat smallint(2) not null  
   , primary key (numresultatanal,numpat) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table pat_resanal
# -----------------------------------------------------------------------------


create  index i_fk_pat_resanal_resultat_anal
     on pat_resanal (numresultatanal asc);

create  index i_fk_pat_resanal_patient
     on pat_resanal (numpat asc);

# -----------------------------------------------------------------------------
#       table : exam_groupanal
# -----------------------------------------------------------------------------

create table if not exists exam_groupanal
 (
   numgroupeanal smallint(1) not null  ,
   numexam smallint(1) not null  
   , primary key (numgroupeanal,numexam) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table exam_groupanal
# -----------------------------------------------------------------------------


create  index i_fk_exam_groupanal_groupe_anal
     on exam_groupanal (numgroupeanal asc);

create  index i_fk_exam_groupanal_examen
     on exam_groupanal (numexam asc);

# -----------------------------------------------------------------------------
#       table : pat_anal_cal
# -----------------------------------------------------------------------------

create table if not exists pat_anal_cal
 (
   numpat smallint(2) not null  ,
   numanal bigint(4) not null  ,
   datepat date not null,
   interpretation char(32) null  ,
   germeidentifie char(32) null  ,
   etudeantibio char(32) null  ,
   resultatanal char(32) null  ,
   conclusionanal char(50) null  ,
   numtempanal integer(2) not null  
   , primary key (numpat,numanal,datepat) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table pat_anal_cal
# -----------------------------------------------------------------------------


create  index i_fk_pat_anal_cal_patient
     on pat_anal_cal (numpat asc);

create  index i_fk_pat_anal_cal_analyse
     on pat_anal_cal (numanal asc);

# -----------------------------------------------------------------------------
#       table : pat_prelev
# -----------------------------------------------------------------------------

create table if not exists pat_prelev
 (
   numprelev bigint(4) not null  ,
   numpat smallint(2) not null  
   , primary key (numprelev,numpat) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table pat_prelev
# -----------------------------------------------------------------------------


create  index i_fk_pat_prelev_prelevement
     on pat_prelev (numprelev asc);

create  index i_fk_pat_prelev_patient
     on pat_prelev (numpat asc);

# -----------------------------------------------------------------------------
#       table : prelev_groupanal
# -----------------------------------------------------------------------------

create table if not exists prelev_groupanal
 (
   numgroupeanal smallint(1) not null  ,
   numprelev bigint(4) not null  
   , primary key (numgroupeanal,numprelev) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table prelev_groupanal
# -----------------------------------------------------------------------------


create  index i_fk_prelev_groupanal_groupe_anal
     on prelev_groupanal (numgroupeanal asc);

create  index i_fk_prelev_groupanal_prelevement
     on prelev_groupanal (numprelev asc);

# -----------------------------------------------------------------------------
#       table : anal_categanal
# -----------------------------------------------------------------------------

create table if not exists anal_categanal
 (
   numanal bigint(4) not null  ,
   numcateganal smallint(1) not null  
   , primary key (numanal,numcateganal) 
 ) 
 ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# -----------------------------------------------------------------------------
#       index de la table anal_categanal
# -----------------------------------------------------------------------------


create  index i_fk_anal_categanal_analyse
     on anal_categanal (numanal asc);

create  index i_fk_anal_categanal_categ_anal
     on anal_categanal (numcateganal asc);


# -----------------------------------------------------------------------------
#       creation des references de table
# -----------------------------------------------------------------------------


alter table consommable 
  add foreign key fk_consommable_produit (numprod)
      references produit (numprod) ;


alter table personne 
  add foreign key fk_personne_etablissement (numetab)
      references etablissement (numetab) ;


alter table element 
  add foreign key fk_element_examen (numexam)
      references examen (numexam) ;


alter table sousproduit 
  add foreign key fk_sousproduit_produit (numprod)
      references produit (numprod) ;


alter table ligneentree 
  add foreign key fk_ligneentree_cmdfrs (numcmdfrs)
      references cmdfrs (numcmdfrs) ;


alter table ligneentree 
  add foreign key fk_ligneentree_sousproduit (numsousprod)
      references sousproduit (numsousprod) ;


alter table patient 
  add foreign key fk_patient_personne (numpers)
      references personne (numpers) ;


alter table groupe_anal 
  add foreign key fk_groupe_anal_analyse (numanal)
      references analyse (numanal) ;


alter table analyse 
  add foreign key fk_analyse_unite (numunit)
      references unite (numunit) ;


alter table reactif 
  add foreign key fk_reactif_produit (numprod)
      references produit (numprod) ;


alter table exam_typexam 
  add foreign key fk_exam_typexam_type_exam (numtypeexam)
      references type_exam (numtypeexam) ;


alter table exam_typexam 
  add foreign key fk_exam_typexam_examen (numexam)
      references examen (numexam) ;


alter table pat_elem_cal 
  add foreign key fk_pat_elem_cal_patient (numpat)
      references patient (numpat) ;


alter table pat_elem_cal 
  add foreign key fk_pat_elem_cal_element (numelem)
      references element (numelem) ;


alter table pers_categpers 
  add foreign key fk_pers_categpers_personne (numpers)
      references personne (numpers) ;


alter table pers_categpers 
  add foreign key fk_pers_categpers_categorie_pers (numcategpers)
      references categorie_pers (numcategpers) ;


alter table pat_categanal_cal 
  add foreign key fk_pat_categanal_cal_patient (numpat)
      references patient (numpat) ;


alter table pat_categanal_cal 
  add foreign key fk_pat_categanal_cal_categ_anal (numcateganal)
      references categ_anal (numcateganal) ;


alter table manipuler 
  add foreign key fk_manipuler_patient (numpat)
      references patient (numpat) ;


alter table manipuler 
  add foreign key fk_manipuler_consommable (numconso)
      references consommable (numconso) ;


alter table elem_groupelem 
  add foreign key fk_elem_groupelem_groupe_elem (numgroupeelem)
      references groupe_elem (numgroupeelem) ;


alter table elem_groupelem 
  add foreign key fk_elem_groupelem_element (numelem)
      references element (numelem) ;


alter table utiliser 
  add foreign key fk_utiliser_reactif (numreact)
      references reactif (numreact) ;


alter table utiliser 
  add foreign key fk_utiliser_analyse (numanal)
      references analyse (numanal) ;


alter table anal_refanal 
  add foreign key fk_anal_refanal_analyse (numanal)
      references analyse (numanal) ;


alter table anal_refanal 
  add foreign key fk_anal_refanal_reference_anal (numrefanal)
      references reference_anal (numrefanal) ;


alter table pat_resanal 
  add foreign key fk_pat_resanal_resultat_anal (numresultatanal)
      references resultat_anal (numresultatanal) ;


alter table pat_resanal 
  add foreign key fk_pat_resanal_patient (numpat)
      references patient (numpat) ;


alter table exam_groupanal 
  add foreign key fk_exam_groupanal_groupe_anal (numgroupeanal)
      references groupe_anal (numgroupeanal) ;


alter table exam_groupanal 
  add foreign key fk_exam_groupanal_examen (numexam)
      references examen (numexam) ;


alter table pat_anal_cal 
  add foreign key fk_pat_anal_cal_patient (numpat)
      references patient (numpat) ;


alter table pat_anal_cal 
  add foreign key fk_pat_anal_cal_analyse (numanal)
      references analyse (numanal) ;


alter table pat_prelev 
  add foreign key fk_pat_prelev_prelevement (numprelev)
      references prelevement (numprelev) ;


alter table pat_prelev 
  add foreign key fk_pat_prelev_patient (numpat)
      references patient (numpat) ;


alter table prelev_groupanal 
  add foreign key fk_prelev_groupanal_groupe_anal (numgroupeanal)
      references groupe_anal (numgroupeanal) ;


alter table prelev_groupanal 
  add foreign key fk_prelev_groupanal_prelevement (numprelev)
      references prelevement (numprelev) ;


alter table anal_categanal 
  add foreign key fk_anal_categanal_analyse (numanal)
      references analyse (numanal) ;


alter table anal_categanal 
  add foreign key fk_anal_categanal_categ_anal (numcateganal)
      references categ_anal (numcateganal) ;


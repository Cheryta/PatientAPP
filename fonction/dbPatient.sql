drop table if exists Patient;

/*==============================================================*/
/* Table: Patient                                               */
/*==============================================================*/
create table Patient
(
   id                   int not null,
   nom                  varchar(254),
   prenom               varchar(254),
   genre                varchar(254),
   addresse             varchar(254),
   telephone            int,
   age                  int,
   g_sanguin             varchar(254),
   antecedant           varchar(254),
   m_actuelle            varchar(254),
   primary key (id)
);

/*
Created		06/12/2011
Modified		18/10/2013
Project		
Model			
Company		
Author		
Version		
Database		PostgreSQL 8.0 
*/


/* Drop table if existss */
Drop table if exists metadataquality Cascade;
Drop table if exists download Cascade;
Drop table if exists deletedLO Cascade;
Drop table if exists Report Cascade;
Drop table if exists DataFROAc Cascade;
Drop table if exists LoadLO Cascade;
Drop table if exists Rating Cascade;
Drop table if exists CognitiveInformation Cascade;
Drop table if exists Pending Cascade;
Drop table if exists Grants Cascade;
Drop table if exists LO Cascade;
Drop table if exists Subcollection Cascade;
Drop table if exists Collection Cascade;
Drop table if exists Users Cascade;
Drop table if exists MetaMetadataContribute_entity Cascade;
Drop table if exists LifeCycleContribute_entity Cascade;
Drop table if exists Resource_description Cascade;
Drop table if exists Classification_keyword Cascade;
Drop table if exists TaxonPath_taxon Cascade;
Drop table if exists Resource_identifier Cascade;
Drop table if exists Relation_resource Cascade;
Drop table if exists Educational_description Cascade;
Drop table if exists Educational_intendedEndUserRole Cascade;
Drop table if exists Educational_learningResourceType Cascade;
Drop table if exists Requirements_orComposite Cascade;
Drop table if exists Technical_location Cascade;
Drop table if exists MetaMetadata_Identifier Cascade;
Drop table if exists General_Identifier Cascade;
Drop table if exists Classification_taxonPath Cascade;
Drop table if exists Educational_language Cascade;
Drop table if exists Educational_typicalAgeRange Cascade;
Drop table if exists Educational_context Cascade;
Drop table if exists Technical_requirements Cascade;
Drop table if exists Technical_format Cascade;
Drop table if exists MetaMetadata_metaDataSchema Cascade;
Drop table if exists MetaMetadata_contribute Cascade;
Drop table if exists LifeCycle_contribute Cascade;
Drop table if exists General_coverage Cascade;
Drop table if exists General_keyword Cascade;
Drop table if exists General_description Cascade;
Drop table if exists General_language Cascade;
Drop table if exists LOM Cascade;


/* Create Tables */


Create table LOM
(
	idLO Integer NOT NULL,
	general_title Varchar(1000),
	general_structure Varchar(1000),
	general_aggregationLevel Varchar(1000),
	lifecycle_version Varchar(50),
	lifecycle_status Varchar(50),
	metametadata_language Varchar(100),
	technical_size Varchar(30),
	technical_installationRemarks Varchar(1000),
	technical_otherPlatformRequirements Varchar(1000),
	technical_duration Varchar(20),
	educational_interactivityType Varchar(1000),
	educational_interactivityLevel Varchar(1000),
	educational_semanticDensity Varchar(1000),
	educational_difficulty Varchar(20),
	educational_typicalLearningTime Varchar(20),
	rights_cost Varchar(20),
	rights_copyRightAndOtherRestrictions Varchar(20),
	rights_description Varchar(1000),
	relation_kind Varchar(1000),
	annotation_entity Varchar(1000),
	annotation_date Varchar(100),
	annotation_description Varchar(1000),
	classification_purpose Varchar(100),
	classification_description Varchar(2000),
 primary key (idLO)
) Without Oids;


Create table General_language
(
	idGeneralLanguage Serial NOT NULL,
	idLO Integer NOT NULL,
	language Varchar(100),
 primary key (idGeneralLanguage)
) Without Oids;


Create table General_description
(
	idGeneralDescription Serial NOT NULL,
	idLO Integer NOT NULL,
	description Varchar(2000),
 primary key (idGeneralDescription)
) Without Oids;


Create table General_keyword
(
	idGeneralKeyword Serial NOT NULL,
	idLO Integer NOT NULL,
	keyword Varchar(1000),
 primary key (idGeneralKeyword)
) Without Oids;


Create table General_coverage
(
	idGeneralCoverage Serial NOT NULL,
	idLO Integer NOT NULL,
	coverage Varchar(1000),
 primary key (idGeneralCoverage)
) Without Oids;


Create table LifeCycle_contribute
(
	idLifeCycleContribute Serial NOT NULL,
	idLO Integer NOT NULL,
	role Varchar(1000),
	date Date,
 primary key (idLifeCycleContribute)
) Without Oids;


Create table MetaMetadata_contribute
(
	idMetaMetadataContribute Serial NOT NULL,
	idLO Integer NOT NULL,
	role Varchar(1000),
	date Date,
 primary key (idMetaMetadataContribute)
) Without Oids;


Create table MetaMetadata_metaDataSchema
(
	idMetaMetaDataMetaDataSchema Serial NOT NULL,
	idLO Integer NOT NULL,
	metaDataSchema Varchar(30),
 primary key (idMetaMetaDataMetaDataSchema)
) Without Oids;


Create table Technical_format
(
	idTechnicalFormat Serial NOT NULL,
	idLO Integer NOT NULL,
	format Varchar(500),
 primary key (idTechnicalFormat)
) Without Oids;


Create table Technical_requirements
(
	idTechnicalRequirements Serial NOT NULL,
	idLO Integer NOT NULL,
 primary key (idTechnicalRequirements)
) Without Oids;


Create table Educational_context
(
	idEducationalContext Serial NOT NULL,
	idLO Integer NOT NULL,
	context Varchar(1000),
 primary key (idEducationalContext)
) Without Oids;


Create table Educational_typicalAgeRange
(
	idEducationalTypicalAgeRange Serial NOT NULL,
	idLO Integer NOT NULL,
	typicalAgeRange Varchar(1000),
 primary key (idEducationalTypicalAgeRange)
) Without Oids;


Create table Educational_language
(
	idEducationalLanguage Serial NOT NULL,
	idLO Integer NOT NULL,
	language Varchar(100),
 primary key (idEducationalLanguage)
) Without Oids;


Create table Classification_taxonPath
(
	idClassificationTaxonPath Serial NOT NULL,
	idLO Integer NOT NULL,
	source Varchar(1000),
 primary key (idClassificationTaxonPath)
) Without Oids;


Create table General_Identifier
(
	idGeneralIdentifier Serial NOT NULL,
	idLO Integer NOT NULL,
	catalog Varchar(1000),
	entry Varchar(1000),
 primary key (idGeneralIdentifier)
) Without Oids;


Create table MetaMetadata_Identifier
(
	idMetaMetadataIdentifier Serial NOT NULL,
	idLO Integer NOT NULL,
	catalog Varchar(1000),
	entry Varchar(1000),
 primary key (idMetaMetadataIdentifier)
) Without Oids;


Create table Technical_location
(
	idTechnicalLocation Serial NOT NULL,
	idLO Integer NOT NULL,
	location Varchar(1000),
 primary key (idTechnicalLocation)
) With Oids;


Create table Requirements_orComposite
(
	idRequirementsOrComposite Serial NOT NULL,
	idTechnicalRequirements Integer NOT NULL,
	type Varchar(100),
	name Varchar(100),
	minimumVersion Varchar(30),
	maximumVersion Varchar(30),
 primary key (idRequirementsOrComposite)
) With Oids;


Create table Educational_learningResourceType
(
	idEducationalLearningResourceType Serial NOT NULL,
	idLO Integer NOT NULL,
	learningResourceType Varchar(1000),
 primary key (idEducationalLearningResourceType)
) With Oids;


Create table Educational_intendedEndUserRole
(
	idEducationalIntendedEndUserRole Serial NOT NULL,
	idLO Integer NOT NULL,
	intendedEndUserRole Varchar(100),
 primary key (idEducationalIntendedEndUserRole)
) With Oids;


Create table Educational_description
(
	idEducationalDescription Serial NOT NULL,
	idLO Integer NOT NULL,
	description Varchar(1000),
 primary key (idEducationalDescription)
) With Oids;


Create table Relation_resource
(
	idRelationResource Serial NOT NULL,
	idLO Integer NOT NULL,
 primary key (idRelationResource)
) With Oids;


Create table Resource_identifier
(
	idResourceIdentifier Serial NOT NULL,
	idRelationResource Integer NOT NULL,
	catalog Varchar(1000),
	entry Varchar(1000),
 primary key (idResourceIdentifier)
) With Oids;


Create table TaxonPath_taxon
(
	idTaxonPathTaxon Serial NOT NULL,
	idClassificationTaxonPath Integer NOT NULL,
	id Varchar,
	entry Varchar(500),
 primary key (idTaxonPathTaxon)
) With Oids;


Create table Classification_keyword
(
	idClassificationKeyword Serial NOT NULL,
	idLO Integer NOT NULL,
	keyword Varchar(1000),
 primary key (idClassificationKeyword)
) With Oids;


Create table Resource_description
(
	idResourceDescription Serial NOT NULL,
	idRelationResource Integer NOT NULL,
	description Varchar(1000),
 primary key (idResourceDescription)
) With Oids;


Create table LifeCycleContribute_entity
(
	idLifeCycleContributeEntity Serial NOT NULL,
	idLifeCycleContribute Integer NOT NULL,
	entity Varchar(1000),
 primary key (idLifeCycleContributeEntity)
) With Oids;


Create table MetaMetadataContribute_entity
(
	idMetaMetadataContributeEntity Serial NOT NULL,
	idMetaMetadataContribute Integer NOT NULL,
	entity Varchar(1000),
 primary key (idMetaMetadataContributeEntity)
) With Oids;


Create table Users
(
	idUser Serial NOT NULL,
	name Varchar(100) NOT NULL,
	lastName Varchar(100),
	password Varchar(1000) NOT NULL,
	logging Varchar(100) NOT NULL UNIQUE,
	email Varchar(100) NOT NULL UNIQUE,
	role Integer NOT NULL,
	valided Boolean NOT NULL Default false,
	lastloging Timestamp,
 primary key (idUser)
) With Oids;


Create table Collection
(
	idCollection Serial NOT NULL,
	name Varchar(100),
 primary key (idCollection)
) With Oids;


Create table Subcollection
(
	idSubcollection Serial NOT NULL,
	idCollection Integer NOT NULL,
	name Varchar(100),
 primary key (idSubcollection)
) With Oids;


Create table LO
(
	idLO Serial NOT NULL,
	idSubcollection Integer NOT NULL,
	idUser Integer NOT NULL,
	insertionDate Date NOT NULL,
	deleted Boolean NOT NULL Default false,
	lastModified Timestamp with time zone Default now(),
	xmlo Varchar,
 primary key (idLO)
) With Oids;


Create table Grants
(
	idUserFrom Integer NOT NULL,
	idUserTo Integer NOT NULL,
	idLO Integer NOT NULL,
	type Integer NOT NULL,
 primary key (idUserFrom,idUserTo,idLO,type)
) With Oids;


Create table Pending
(
	idUserFrom Integer NOT NULL,
	idUserTo Integer NOT NULL,
	idLO Integer NOT NULL,
	type Integer NOT NULL,
 primary key (idUserFrom,idUserTo,idLO,type)
) With Oids;


Create table CognitiveInformation
(
	idLO Integer NOT NULL,
	idModel Integer NOT NULL,
	idDimension Integer NOT NULL,
	value Numeric,
 primary key (idLO,idModel,idDimension)
) With Oids;


Create table Rating
(
	idLO Integer NOT NULL,
	idUser Integer NOT NULL,
	valoration Integer,
	comment Varchar,
	date Timestamp,
	anonymus Boolean,
 primary key (idLO,idUser)
) With Oids;


Create table LoadLO
(
	idlo Numeric NOT NULL,
	type Integer NOT NULL,
	insertionDate Timestamp,
 primary key (idlo,type)
) With Oids;


Create table DataFROAc
(
	host Varchar(100) NOT NULL,
	myID Integer NOT NULL,
	path Varchar,
	valided Integer Default 0,
 primary key (host)
) With Oids;


Create table Report
(
	idreport Serial NOT NULL,
	idUser Integer NOT NULL,
	idLO Integer NOT NULL,
	date Timestamp NOT NULL Default now(),
	description Varchar NOT NULL,
	valided Boolean NOT NULL,
	action Varchar,
	dateAction Timestamp,
 primary key (idreport)
) With Oids;


Create table deletedLO
(
	idlo Integer NOT NULL,
	iduserOwner Varchar NOT NULL,
	iduserDeleted Varchar NOT NULL,
	title Varchar NOT NULL,
	date Date,
 primary key (idlo)
) With Oids;


Create table download
(
	iddownload Serial NOT NULL,
	idUser Integer,
	idLO Integer NOT NULL,
	date Timestamp,
	ip Text,
	pais Text,
 primary key (iddownload)
) With Oids;


Create table metadataquality
(
	idLO Integer NOT NULL,
	completeness Double precision,
	consistence Double precision,
	coherence Double precision,
 primary key (idLO)
) With Oids;
CREATE TABLE "envio_email" (
"smtp" text,
"email" text,
"password" text,
"remitente" text,
"puerto" int4
)
WITH (OIDS=FALSE)

INSERT INTO "envio_email" VALUES ('smtp.gmail.com', 'roap_med@unal.edu.co', 'r8160400', 'ROAp - UNALmed', '465');

Create table idioma
(
idIdioma Serial NOT NULL,
nombre Varchar(100),
activo Boolean,
primary key (idIdioma)
) Without Oids;

INSERT INTO "idioma" VALUES ('1', 'Español',TRUE);
INSERT INTO "idioma" VALUES ('1', 'Português',FALSE);


/* Create Foreign Keys */

Alter table General_language add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table General_description add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table General_keyword add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table General_coverage add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table LifeCycle_contribute add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table Technical_requirements add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table Technical_format add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table MetaMetadata_metaDataSchema add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table MetaMetadata_contribute add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table Educational_context add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table Educational_typicalAgeRange add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table Educational_language add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table Classification_taxonPath add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table MetaMetadata_Identifier add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table General_Identifier add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table Technical_location add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table Educational_learningResourceType add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table Educational_intendedEndUserRole add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table Educational_description add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table Relation_resource add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table Classification_keyword add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table CognitiveInformation add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table metadataquality add  foreign key (idLO) references LOM (idLO) on update cascade on delete cascade;

Alter table LifeCycleContribute_entity add  foreign key (idLifeCycleContribute) references LifeCycle_contribute (idLifeCycleContribute) on update cascade on delete cascade;

Alter table MetaMetadataContribute_entity add  foreign key (idMetaMetadataContribute) references MetaMetadata_contribute (idMetaMetadataContribute) on update cascade on delete cascade;

Alter table Requirements_orComposite add  foreign key (idTechnicalRequirements) references Technical_requirements (idTechnicalRequirements) on update cascade on delete cascade;

Alter table TaxonPath_taxon add  foreign key (idClassificationTaxonPath) references Classification_taxonPath (idClassificationTaxonPath) on update cascade on delete cascade;

Alter table Resource_identifier add  foreign key (idRelationResource) references Relation_resource (idRelationResource) on update cascade on delete cascade;

Alter table Resource_description add  foreign key (idRelationResource) references Relation_resource (idRelationResource) on update cascade on delete cascade;

Alter table LO add  foreign key (idUser) references Users (idUser) on update cascade on delete cascade;

Alter table Grants add  foreign key (idUserFrom) references Users (idUser) on update cascade on delete cascade;

Alter table Pending add  foreign key (idUserFrom) references Users (idUser) on update cascade on delete cascade;

Alter table Pending add  foreign key (idUserTo) references Users (idUser) on update cascade on delete cascade;

Alter table Grants add  foreign key (idUserTo) references Users (idUser) on update cascade on delete cascade;

Alter table Report add  foreign key (idUser) references Users (idUser) on update cascade on delete cascade;

Alter table Rating add  foreign key (idUser) references Users (idUser) on update cascade on delete cascade;

Alter table download add  foreign key (idUser) references Users (idUser) on update cascade on delete cascade;

Alter table Subcollection add  foreign key (idCollection) references Collection (idCollection) on update cascade on delete cascade;

Alter table LO add  foreign key (idSubcollection) references Subcollection (idSubcollection) on update cascade on delete cascade;

Alter table LOM add  foreign key (idLO) references LO (idLO) on update cascade on delete cascade;

Alter table Grants add  foreign key (idLO) references LO (idLO) on update cascade on delete cascade;

Alter table Pending add  foreign key (idLO) references LO (idLO) on update cascade on delete cascade;

Alter table Rating add  foreign key (idLO) references LO (idLO) on update cascade on delete cascade;

Alter table Report add  foreign key (idLO) references LO (idLO) on update cascade on delete cascade;

Alter table download add  foreign key (idLO) references LO (idLO) on update cascade on delete cascade;



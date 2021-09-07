DROP DATABASE IF EXISTS Eshoes;
CREATE DATABASE Eshoes;
USE Eshoes;

CREATE TABLE Categories (
    idC INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nom VARCHAR(50) );
CREATE TABLE Produits (
    idP INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	img VARCHAR(50)  ,
    noirNom VARCHAR(50) ,
    redDesc VARCHAR(50) ,
    noirPrix FLOAT ,
    categorie VARCHAR(50) ,
    stock INT );
CREATE TABLE Clients (
    idcl INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nom VARCHAR(50) ,
    prenom VARCHAR(50) ,
    ddn VARCHAR(50) ,
    adresse VARCHAR(50) ,
    ville VARCHAR(50) ,
    codePostal VARCHAR(50) ,
    mail VARCHAR(50) ,
    mdp VARCHAR(500) );
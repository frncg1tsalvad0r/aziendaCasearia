DROP DATABASE IF EXISTS aziendaCasearia ;
CREATE DATABASE aziendaCasearia;
USE aziendaCasearia;

CREATE TABLE clienti (
	codice INT,
	denominazione CHAR(50),
	indirizzo CHAR(50),
	regione CHAR(50),
	PRIMARY KEY (codice)
);

CREATE TABLE ordini (
	codice INT,
	codice_cliente INT,
	data DATE, 
	importo INT,
	PRIMARY KEY (codice),
	FOREIGN KEY(codice_cliente) REFERENCES clienti(codice)
	
);

CREATE TABLE prodotti (
	codice INT,
	descrizione CHAR(50),
	prezzo INT,
	tipo CHAR(20),
	PRIMARY KEY(codice)
);

CREATE TABLE righeOrdine (
	codice_ordine INT,
	codice_prodotto INT,
	quantita INT,
	dataScadenza DATE,
	FOREIGN KEY (codice_ordine) REFERENCES ordini(codice),
	FOREIGN KEY (codice_prodotto) REFERENCES prodotti(codice),
	PRIMARY KEY (codice_ordine, codice_prodotto)
);
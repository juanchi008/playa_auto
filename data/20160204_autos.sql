--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5beta2
-- Dumped by pg_dump version 9.5beta2

-- Started on 2016-02-04 22:58:01

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 196 (class 1259 OID 16553)
-- Name: autos; Type: TABLE; Schema: public; Owner: root
--
DROP TABLE IF EXISTS autos;
CREATE TABLE autos (
    id integer NOT NULL,
    marca character varying(50) NOT NULL,
    modelo character varying(50) NOT NULL,
    ano character varying(4) NOT NULL,
    color character varying(50) NOT NULL,
    no_motor character varying(50) NOT NULL,
    matricula_auto character varying(50) NOT NULL,
    no_chassis character varying(50) NOT NULL,
    observaciones character varying(50) NOT NULL,
    kilometraje character varying(50) NOT NULL,
    no_chapa character varying(50) NOT NULL,
    precio integer NOT NULL,
    fecha_registro date NOT NULL,
    id_estado integer NOT NULL,
    id_admin integer DEFAULT 1 NOT NULL,
    img character varying(255)
);


ALTER TABLE autos OWNER TO root;

--
-- TOC entry 197 (class 1259 OID 16557)
-- Name: autos_id_seq; Type: SEQUENCE; Schema: public; Owner: root
--

CREATE SEQUENCE autos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE autos_id_seq OWNER TO root;

--
-- TOC entry 2152 (class 0 OID 0)
-- Dependencies: 197
-- Name: autos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: root
--

ALTER SEQUENCE autos_id_seq OWNED BY autos.id;


--
-- TOC entry 2028 (class 2604 OID 16560)
-- Name: id; Type: DEFAULT; Schema: public; Owner: root
--

ALTER TABLE ONLY autos ALTER COLUMN id SET DEFAULT nextval('autos_id_seq'::regclass);


--
-- TOC entry 2145 (class 0 OID 16553)
-- Dependencies: 196
-- Data for Name: autos; Type: TABLE DATA; Schema: public; Owner: root
--

INSERT INTO autos VALUES (7, 'toyota', 'runx', '2004', 'gris', 'sd12345', '1235', 'FE136A1538', 'ninguno', '2000', 'lok689', 30000000, '2015-11-21', 1, 5, NULL);
INSERT INTO autos VALUES (10, 'toyota', 'axion', '2010', 'blanco', 'asf456', '7813', 'XDHFSGH4654', 'ninguna', '5600', 'dsa652', 50000000, '2015-02-03', 1, 5, NULL);
INSERT INTO autos VALUES (6, 'Volvo', 'xc90', '2010', 'negro', 'g4d5f6s4', '7894', '136A1538', 'ninguna', '1000', 'nmn564', 60000000, '2015-09-21', 1, 5, NULL);
INSERT INTO autos VALUES (8, 'Nissan', 'Patrol', '2010', 'negro', 'ijuhas4869', '4568', 'SD46S64F', 'ninguna', '1500', 'pop789', 70000000, '2015-11-03', 1, 5, NULL);
INSERT INTO autos VALUES (14, 'Nissan', 'Sunny', '2001', 'Gris', 'sdgf465', '5476', 'YSGG4SGHS', 'Ninguna', '7813', 'lim454', 22000000, '2016-02-03', 1, 5, '/files/autos/14/vga_20130321_112820.jpg');
INSERT INTO autos VALUES (15, 'Porsche', '911 Carrera 4S', '2016', 'Gris', 'ASDF65', '5476', 'YSGG4SGHS', 'Ninguna', '39.000', 'LIM454', 40000000, '2016-02-04', 1, 5, '/files/autos/15/big5.jpg');
INSERT INTO autos VALUES (5, 'toyota', 'corolla', '2005', 'rojo', 'f5f4g6s', '1234', 'YV1CZ7136A153850', 'ninguna', '32000', 'beb654', 45000000, '2015-08-20', 1, 5, NULL);


--
-- TOC entry 2153 (class 0 OID 0)
-- Dependencies: 197
-- Name: autos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: root
--

SELECT pg_catalog.setval('autos_id_seq', 15, true);


--
-- TOC entry 2030 (class 2606 OID 16569)
-- Name: pk_autos; Type: CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY autos
    ADD CONSTRAINT pk_autos PRIMARY KEY (id);


--
-- TOC entry 2151 (class 0 OID 0)
-- Dependencies: 196
-- Name: autos; Type: ACL; Schema: public; Owner: root
--

REVOKE ALL ON TABLE autos FROM PUBLIC;
REVOKE ALL ON TABLE autos FROM root;
GRANT ALL ON TABLE autos TO root;
GRANT ALL ON TABLE autos TO PUBLIC;


-- Completed on 2016-02-04 22:58:01

--
-- PostgreSQL database dump complete
--


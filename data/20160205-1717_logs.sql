--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5beta2
-- Dumped by pg_dump version 9.5beta2

-- Started on 2016-02-05 15:18:25

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
-- TOC entry 198 (class 1259 OID 24761)
-- Name: logs; Type: TABLE; Schema: public; Owner: root
--

DROP TABLE IF EXISTS logs;
CREATE TABLE logs (
    id integer NOT NULL,
    module character varying(100) NOT NULL,
    info character varying(255),
    ip_address character varying(20) NOT NULL,
    fecha_registro date NOT NULL,
    hora_registro time without time zone NOT NULL,
    result character varying(100),
    submodule character varying(100),
    nombre character varying(100),
    role character varying(100)
);


ALTER TABLE logs OWNER TO root;

--
-- TOC entry 199 (class 1259 OID 24767)
-- Name: logs_id_seq; Type: SEQUENCE; Schema: public; Owner: root
--

CREATE SEQUENCE logs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE logs_id_seq OWNER TO root;

--
-- TOC entry 2157 (class 0 OID 0)
-- Dependencies: 199
-- Name: logs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: root
--

ALTER SEQUENCE logs_id_seq OWNED BY logs.id;


--
-- TOC entry 2033 (class 2604 OID 24769)
-- Name: id; Type: DEFAULT; Schema: public; Owner: root
--

ALTER TABLE ONLY logs ALTER COLUMN id SET DEFAULT nextval('logs_id_seq'::regclass);


--
-- TOC entry 2150 (class 0 OID 24761)
-- Dependencies: 198
-- Data for Name: logs; Type: TABLE DATA; Schema: public; Owner: root
--

INSERT INTO logs VALUES (1, 'login', 'login via login form page', '184.110.123.15', '2016-02-05', '11:30:00', 'Success', 'page', 'Super Admin | 1', 'Super Admin');
INSERT INTO logs VALUES (2, 'autos', 'Exito', '10.1.1.2', '1970-01-01', '03:02:00', 'exito', 'crear', 'Super Admin | 5', 'Super Admin');


--
-- TOC entry 2158 (class 0 OID 0)
-- Dependencies: 199
-- Name: logs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: root
--

SELECT pg_catalog.setval('logs_id_seq', 2, true);


--
-- TOC entry 2035 (class 2606 OID 24771)
-- Name: pk_logs; Type: CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY logs
    ADD CONSTRAINT pk_logs PRIMARY KEY (id);


--
-- TOC entry 2156 (class 0 OID 0)
-- Dependencies: 198
-- Name: logs; Type: ACL; Schema: public; Owner: root
--

REVOKE ALL ON TABLE logs FROM PUBLIC;
REVOKE ALL ON TABLE logs FROM root;
GRANT ALL ON TABLE logs TO root;
GRANT ALL ON TABLE logs TO PUBLIC;


-- Completed on 2016-02-05 15:18:25

--
-- PostgreSQL database dump complete
--


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
-- Name: logs; Type: TABLE; Schema: public; Owner: root
--
DROP TABLE IF EXISTS logs;
CREATE TABLE logs (
    id integer NOT NULL,
    id_user integer NOT NULL,
    id_role integer NOT NULL,
    action_type character varying(255) NOT NULL,
    action character varying(255) NOT NULL,
    ip_address  character varying(20) NOT NULL,
    fecha_registro date NOT NULL
);


ALTER TABLE logs OWNER TO root;

--
-- TOC entry 197 (class 1259 OID 16557)
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
-- TOC entry 2152 (class 0 OID 0)
-- Dependencies: 197
-- Name: logs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: root
--

ALTER SEQUENCE logs_id_seq OWNED BY logs.id;


--
-- TOC entry 2028 (class 2604 OID 16560)
-- Name: id; Type: DEFAULT; Schema: public; Owner: root
--

ALTER TABLE ONLY logs ALTER COLUMN id SET DEFAULT nextval('logs_id_seq'::regclass);


--
-- TOC entry 2145 (class 0 OID 16553)
-- Dependencies: 196
-- Data for Name: logs; Type: TABLE DATA; Schema: public; Owner: root
--

-- INSERT INTO logs VALUES (7, 'toyota', 'runx', '2004', 'gris', 'sd12345', '1235', 'FE136A1538', 'ninguno', '2000', 'lok689', 30000000, '2015-11-21', 1, 5, NULL);


--
-- TOC entry 2153 (class 0 OID 0)
-- Dependencies: 197
-- Name: logs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: root
--

-- SELECT pg_catalog.setval('logs_id_seq', 15, true);


--
-- TOC entry 2030 (class 2606 OID 16569)
-- Name: pk_logs; Type: CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY logs
    ADD CONSTRAINT pk_logs PRIMARY KEY (id);


--
-- TOC entry 2151 (class 0 OID 0)
-- Dependencies: 196
-- Name: logs; Type: ACL; Schema: public; Owner: root
--

REVOKE ALL ON TABLE logs FROM PUBLIC;
REVOKE ALL ON TABLE logs FROM root;
GRANT ALL ON TABLE logs TO root;
GRANT ALL ON TABLE logs TO PUBLIC;


-- Completed on 2016-02-04 22:58:01

--
-- PostgreSQL database dump complete
--


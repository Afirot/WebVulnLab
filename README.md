# WebVulnLab

**WebVulnLab** es un laboratorio de pruebas intencionadamente vulnerable a **inyección SQL (SQLi)** y **cross-site scripting (XSS)**, desarrollado en **PHP** y diseñado para ser desplegado fácilmente mediante **Docker Compose**. Está pensado para fines educativos, de investigación en ciberseguridad o pruebas de herramientas automatizadas.

---

## Características

- Aplicación web vulnerable en PHP.
- Ideal para practicar técnicas de SQLi y XSS.
- Fácil despliegue con Docker y Docker Compose.
- Entorno contenido y replicable.

---

## ⚠️⚠️ Advertencia ⚠️⚠️

Este laboratorio **contiene vulnerabilidades reales** y debe ser utilizado **únicamente en entornos controlados**. No lo expongas a internet ni lo uses en sistemas de producción.

---

## Requisitos

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

---

## Instalación y ejecución

#### Clonamos el repositorio

```git clone https://github.com/Afirot/WebVulnLab.git```

#### Nos movemos dentro del repositorio

```cd WebVulnLab```

#### Levantamos los contenedores

```docker-compose up -d --build```

#### Abre tu navegador y accede

```http://localhost```

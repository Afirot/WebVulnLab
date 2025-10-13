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

Este laboratorio incluye **vulnerabilidades reales** con fines didacticos o de experimentacion.  
**Debe utilizarse únicamente en entornos controlados y aislados.**

Se recomienda encarecidamente utilizar una **máquina virtual dedicada**, creada específicamente para este propósito.

🚫 **NUNCA lo expongas a internet**.  
🚫 **NUNCA lo ejecutes en sistemas de producción o entornos compartidos**.

El uso indebido puede comprometer la seguridad de otros sistemas y redes.

Actúa con responsabilidad y bajo tu propio riesgo.

---

## Requisitos

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

---

## Instalación y ejecución

#### Clonamos el repositorio

```bash
git clone https://github.com/Afirot/WebVulnLab.git
```

#### Nos movemos dentro del repositorio

```bash
cd WebVulnLab
```

#### Levantamos los contenedores

```bash
docker-compose up -d --build
```

#### Abre tu navegador y accede

```http://<IP host>```

Reemplaza <IP host> con la dirección IP local de tu máquina.

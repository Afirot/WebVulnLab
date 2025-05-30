# WebVulnLab
Este es un laboratorio vulnerable a SQLI y XSS escrito en PHP y listo para ser desplegado en docker-compose.

La instalacion y ejecucion del laboratorio es muy sencilla.

⚠️ Advertencia
Este laboratorio contiene vulnerabilidades reales y debe ser utilizado únicamente en entornos controlados. No lo expongas a internet ni lo uses en sistemas de producción.

Clonamos el repositorio

`git clone https://github.com/Afirot/WebVulnLab.git`

Nos movemos dentro del repositorio

```cd WebVulnLab```

Y levantamos los contenedores

`docker-compose up -d --build`

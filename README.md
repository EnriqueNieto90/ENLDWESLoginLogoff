# ENLDWESLoginLogoff

## Descripción del Proyecto

Sistema avanzado de autenticación web desarrollado con arquitectura MVC (Modelo-Vista-Controlador) y Programación Orientada a Objetos en PHP. Este proyecto representa una evolución profesional del sistema básico de login/logoff, implementando patrones de diseño, separación de capas y código reutilizable mediante clases e interfaces.

La aplicación proporciona una arquitectura multicapa robusta con separación clara entre lógica de negocio (Modelo), presentación (Vista) y flujo de control (Controlador). Implementa zona pública accesible sin autenticación y zona privada protegida, con gestión completa de sesiones y acceso a datos mediante PDO con interfaces estandarizadas.

**Tecnologías principales:** PHP 8.3 POO, MySQL/MariaDB, PDO, Apache, MVC, Sessions, Interfaces

## Requisitos Técnicos

- **Servidor Web:** Apache 2.4+
- **PHP:** 8.3 o superior con soporte POO
- **Base de Datos:** MySQL 8.0+ / MariaDB 10.5+
- **Motor de BD:** InnoDB
- **Entorno:** LAMP (Linux, Apache, MySQL, PHP)
- **Extensiones PHP requeridas:**
  - PDO
  - session
  - DateTime

## Instalación

### 1. Clonar el repositorio
```bash
git clone https://github.com/EnriqueNieto90/ENLDWESLoginLogoff.git
```

### 2. Configurar en servidor local
Copiar el proyecto al directorio de publicación de Apache:
```bash
cp -r ENLDWESLoginLogoff /var/www/html/httpdocs/
```

### 3. Configurar la base de datos
Ejecutar los scripts SQL en el siguiente orden:

**a) Crear base de datos y usuario:**
```bash
mysql -u adminsql -p < scriptDB/CreaDBENLDWESLoginLogoff.sql
```

**b) Carga inicial de datos:**
```bash
mysql -u UserENLDWESLoginLogoff -p DBENLDWESLoginLogoff < scriptDB/CargaInicialDBENLDWESLoginLogoff.sql
```

### 4. Configurar credenciales
Editar archivo de configuración:
```php
// config/confDB.php
define('DB_HOST', 'localhost');
define('DB_NAME', 'DBENLDWESLoginLogoff');
define('DB_USER', 'UserENLDWESLoginLogoff');
define('DB_PASS', 'paso');
```

### 5. Configurar permisos
```bash
chmod -R 755 /var/www/html/httpdocs/ENLDWESLoginLogoff
chmod -R 777 /var/www/html/httpdocs/ENLDWESLoginLogoff/tmp
```

### 6. Acceder a la aplicación
Abrir navegador web y acceder a:
```
http://localhost/httpdocs/ENLDWESLoginLogoff/index.php
```

## Arquitectura del Proyecto

### Patrón MVC (Modelo-Vista-Controlador)
```
┌─────────────────────────────────────────────────┐
│                   USUARIO                        │
└─────────────────┬───────────────────────────────┘
                  │
                  ▼
         ┌────────────────┐
         │  CONTROLADOR   │ ◄── Gestiona flujo aplicación
         │   (Controller) │     Procesa peticiones
         └───┬────────┬───┘     Coordina Modelo-Vista
             │        │
      ┌──────▼──┐  ┌─▼──────┐
      │  MODELO │  │  VISTA │
      │ (Model) │  │ (View) │
      └────┬────┘  └────────┘
           │
           ▼
    ┌──────────────┐
    │ BASE DE DATOS│
    └──────────────┘
```

## Estructura del Proyecto
```
ENLDWESLoginLogoff/
├── index.php                   # Controlador frontal (Front Controller)
├── .htaccess                   # Configuración Apache
│
├── /config/                    # Configuración
│   ├── confDB.php              # Credenciales base de datos
│   └── confAPP.php             # Configuración aplicación
│
├── /controller/                # CONTROLADORES (Capa de Control)
│   ├── cLogin.php              # Controlador de login
│   ├── cInicioPublico.php      # Controlador zona pública
│   └── cInicioPrivado.php      # Controlador zona privada
│
├── /model/                     # MODELOS (Capa de Negocio)
│   ├── Usuario.php             # Clase entidad Usuario
│   ├── UsuarioPDO.php          # Clase acceso datos Usuario
│   ├── DBPDO.php               # Clase conexión PDO
│   ├── DB.php                  # Interface BD
│   └── UsuarioDB.php           # Interface Usuario BD
│
├── /view/                      # VISTAS (Capa de Presentación)
│   ├── Layout.php              # Plantilla base (herencia)
│   ├── vLogin.php              # Vista formulario login
│   ├── vInicioPublico.php      # Vista zona pública
│   └── vInicioPrivado.php      # Vista zona privada (protegida)
│
├── /core/                      # Librerías y utilidades
│   └── lValidacionFormularios.php
│
├── /doc/                       # Documentación técnica
│   ├── DiagramaClases.pdf      # Diagrama de clases UML
│   ├── ArbolNavegacion.pdf     # Árbol de navegación
│   └── EsquemaAlmacenamiento.pdf
│
├── /webroot/                   # Recursos públicos
│   └── /css/
│       └── estilos.css
│
├── /scriptDB/                  # Scripts SQL
    ├── CreaDBENLDWESLoginLogoff.sql
    ├── CargaInicialDBENLDWESLoginLogoff.sql
    └── BorraDBENLDWESLoginLogoff.sql
```

## Modelo de Datos

### Tabla: T01_Usuario

| Campo | Tipo | Descripción |
|-------|------|-------------|
| **T01_CodUsuario** (PK) | VARCHAR(8) | Código de usuario (4-8 caracteres) |
| T01_Password | VARCHAR(255) | Contraseña (hash recomendado) |
| T01_DescUsuario | VARCHAR(255) | Nombre completo del usuario |
| T01_NumConexiones | INT | Contador de accesos al sistema |
| T01_FechaHoraUltimaConexion | DATETIME | Última conexión (automática) |
| T01_Perfil | VARCHAR(20) | Perfil del usuario ("usuario") |
| T01_ImagenUsuario | VARCHAR(255) | Ruta imagen perfil (opcional) |

### Credenciales de Base de Datos

- **Base de datos:** DBENLDWESLoginLogoff
- **Usuario aplicación:** userENLDWESLoginLogoff
- **Contraseña:** paso
- **Usuario administrador:** adminsql / paso

## Componentes de la Aplicación

### 1. Controlador Frontal (index.php)

**Responsabilidades:**
- Punto único de entrada a la aplicación
- Enrutamiento de peticiones
- Determinación del controlador a ejecutar
- Gestión de sesiones globales
- Manejo de errores generales

### 2. Capa de Modelo

#### Clase Usuario (model/Usuario.php)
**Entidad de dominio**
- Propiedades: codUsuario, password, descUsuario, numConexiones, fechaHoraUltimaConexion, perfil
- Métodos: getters, setters, constructor
- Representa un usuario del sistema

#### Clase UsuarioPDO (model/UsuarioPDO.php)
**Capa de acceso a datos**
- Métodos estáticos para operaciones CRUD
- `validarUsuario($cod, $pass)`: Autenticación
- Usa DBPDO para ejecutar consultas

#### Clase DBPDO (model/DBPDO.php)
**Gestión de conexión a BD**
- Patrón Singleton para conexión única
- Método estático `ejecutarConsulta($sql, $params)`
- Manejo de excepciones PDO
- Prepared statements automáticos
- Implementa interface DB

### 3. Capa de Controlador

#### Controlador de Login (controller/cLogin.php)
**Funcionalidades:**
- Procesar formulario de autenticación
- Validar credenciales con UsuarioPDO
- Crear sesión de usuario autenticado
- Actualizar contador conexiones y fecha/hora
- Almacenar datos usuario en `$_SESSION`
- Redirigir a zona privada si login exitoso

#### Controlador Inicio Público (controller/cInicioPublico.php)
**Funcionalidades:**
- Mostrar información pública de la aplicación
- Accesible sin autenticación
- Cargar vista vInicioPublico
- Mostrar enlace a login

#### Controlador Inicio Privado (controller/cInicioPrivado.php)
**Funcionalidades:**
- Verificar sesión activa (redirección si no existe)
- Mostrar información del usuario logueado
- Cargar vista vInicioPrivado
- Proporcionar botón de logoff
- Acceso a funcionalidad protegida

### 4. Capa de Vista

#### Layout (view/Layout.php)
**Plantilla base abstracta**
- Define estructura HTML común
- Secciones: doctype, cabecera, menú, contenido, pie

#### Vista Login (view/vLogin.php)
**Elementos:**
- Formulario usuario/password
- Validación de campos obligatorios
- Mensajes de error
- Estilos para campos obligatorios
- Botón "Entrar"

#### Vista Inicio Público (view/vInicioPublico.php)
**Elementos:**
- Página de bienvenida sin autenticación
- Información general de la aplicación
- Enlaces a login
- Contenido público

#### Vista Inicio Privado (view/vInicioPrivado.php)
**Elementos:**
- Bienvenida personalizada con nombre usuario
- Información de sesión activa
- Datos del usuario: código, conexiones, última conexión
- Botón "Salir" (logoff)
- Contenido protegido

## URLs de Acceso

### Aplicación en Producción
```
https://enriquenielor.ieslossauces.es/ENLDWESLoginLogoff/
```

### Páginas principales
```
https://enriquenielor.ieslossauces.es/ENLDWESLoginLogoff/index.php
```

## Características Destacadas

### Arquitectura y Diseño
- **Patrón MVC:** Separación completa de capas Modelo-Vista-Controlador
- **POO pura:** Todo el código desarrollado con clases y objetos
- **Herencia:** Layout como clase base abstracta para todas las vistas
- **Front Controller:** Punto único de entrada (index.php)

### Programación Orientada a Objetos
- **Clases de entidad:** Usuario (POJO)
- **Clases de acceso a datos:** UsuarioPDO, DBPDO
- **Clases de vista:** Layout, vLogin, vInicioPublico, vInicioPrivado
- **Métodos estáticos:** Para acceso a datos sin instanciar objetos

### Seguridad
- **Prepared Statements:** Todas las consultas parametrizadas
- **Interfaces estandarizadas:** Contratos para acceso a datos
- **Validación en capas:** Controlador y Modelo
- **Gestión segura de sesiones:** Verificación en controladores

## Gestión de Base de Datos

### Crear la base de datos
```bash
mysql -u adminsql -p < scriptDB/CreaDBENLDWESLoginLogoff.sql
```

### Cargar usuarios de prueba
```bash
mysql -u UserENLDWESLoginLogoff -p DBENLDWESLoginLogoff < scriptDB/CargaInicialDBENLDWESLoginLogoff.sql
```

### Eliminar base de datos
```bash
mysql -u adminsql -p < scriptDB/BorraDBENLDWESLoginLogoff.sql
```

## Tecnologías Utilizadas

- **Backend:** PHP 8.3 POO con arquitectura MVC
- **Base de Datos:** MySQL 8.0 / MariaDB (Motor InnoDB)
- **Acceso a Datos:** PDO con Prepared Statements
- **Frontend:** HTML5, CSS3
- **Servidor:** Apache 2.4
- **Patrones:** MVC, Front Controller, DAO
- **Gestión de estado:** PHP Sessions
- **Control de versiones:** Git/GitHub

## Documentación Incluida

### Diagramas UML
- **Diagrama de Clases:** Muestra todas las clases, interfaces, relaciones y herencias
- **Árbol de Navegación:** Flujo completo de la aplicación y enlaces entre páginas

## Autor

**Enrique Nieto Lorenzo**

Estudiante de DAW2 (Desarrollo de Aplicaciones Web)  
IES Los Sauces - Curso 2025/2026  
Módulo: DWES (Desarrollo Web en Entorno Servidor)

GitHub: EnriqueNieto90  
Repositorio: ENLDWESLoginLogoff
```

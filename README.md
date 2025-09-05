# PrivBlog 

PrivBlog es una aplicación web desarrollada como parte del CFGS en Desarrollo de Aplicaciones Web. Su objetivo es ofrecer a los usuarios un espacio privado para escribir y gestionar su propio blog, combinando la intimidad de un diario personal con las ventajas de un sistema de gestión de contenidos.

## Funcionalidades principales

- Registro e inicio de sesión de usuarios y administradores
- Publicación, edición y borrado de entradas
- Gestión de categorías asociadas a entradas
- Archivo de entradas por fecha y categorías
- Panel de estadísticas para administradores
- Perfil de usuario con opciones de edición y eliminación

##  Tecnologías utilizadas

- PHP (PDO)
- MySQL
- HTML, CSS, Bootstrap
- JavaScript, JQuery
- Patrón MVC

## Estructura del proyecto

- `modelo/` · Clases y lógica de negocio
- `vista/` · Interfaces de usuario
- `controlador/` · Conexión entre modelo y vista
- `css/`, `js/`, `fotos/` · Recursos estáticos

## Cómo ejecutar la aplicación

## 🧪 Cómo ejecutar la aplicación

PrivBlog es una aplicación web que funciona en entorno local. Para probarla:

1. Instala XAMPP o similar (Apache + MySQL)
2. Copia el proyecto en la carpeta `htdocs`
3. Crea una base de datos en phpMyAdmin e importa el archivo `.sql` desde `base_privblog/`
4. Accede desde el navegador a `http://localhost/PrivBlog/index.php`
 

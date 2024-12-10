# Kong Store: Tienda Online de Indumentaria y Equipamiento Policial (Aún en Desarrollo)

El proyecto consiste en el desarrollo de una tienda online diseñada para la comercialización de indumentaria y equipamiento policial. La solución combina tecnologías modernas para garantizar una experiencia de usuario intuitiva, segura y funcional, tanto para los compradores como para los administradores del sistema

![image](https://github.com/user-attachments/assets/ca95fda4-ba01-45ae-aa0b-b998ab151dda)

# Tecnologías principales
- Frontend: HTML, Tailwind CSS y JavaScript. <br>
- Backend: PHP con Laravel y Livewire para la actualización dinámica de componentes.<br>
- Base de Datos: MySQL.<br>
- Arquitectura: Modelo - Vista - Controlador (MVC)


# Estructura del Sistema
El proyecto se divide en dos grandes módulos: el área de usuario y el área administrativa, diseñados para satisfacer necesidades específicas y diferenciadas.

# 1. Zona de Usuario
Funcionalidades principales:

•	Exploración de Productos: Los usuarios pueden navegar por el catálogo general o visualizar productos por categorías específicas. La página principal muestra nuevos lanzamientos, los más vendidos y recomendaciones.

![image](https://github.com/user-attachments/assets/b45b6c51-26db-4ecb-aaa8-87fcf8687340)
![image](https://github.com/user-attachments/assets/47f6a5c8-735e-469f-a98c-484018a6f363)

•	Detalles del Producto: Cada producto cuenta con una página de detalle que incluye información completa, como nombre, descripción, precio, imágenes y disponibilidad. De acuerdo a la cantidad de Stock se visualizan las etiquetas “Stock alto”, “ultimas unidades” o en caso de no existir stock se visualizara una etiqueta “Sin Stock” (desapareciendo el boton de Añadir al carro).

![image](https://github.com/user-attachments/assets/b01bc608-8b40-4e10-a646-c5c16c17b455)

•	Gestión del Carrito de Compras: Los usuarios registrados pueden añadir productos al carrito, con persistencia entre sesiones. Esto asegura que no se pierdan los datos del carrito incluso si el usuario cierra sesión. Además, dentro del carrito se puede modificar la cantidad de productos a comprar, quitarlos de allí, o vaciar el carrito por completo. Tambien se tiene un control respecto a la cantidad que se desea comprar y el stock existente.

![image](https://github.com/user-attachments/assets/c0ad08d1-bc24-4348-9c05-b7b2c6154f60)

•	Procesamiento de Compras: El sistema utiliza Stripe para procesar los pagos. Las compras son seguras y garantizan la confidencialidad de los datos. Cuando la compra finaliza con éxito, se crea una orden de compra con todos los detalles necesarios, se modifica el stock y ventas en la base de datos, y se notifica al comprador via email.

![image](https://github.com/user-attachments/assets/cff3267a-852f-443a-8ef7-c9bfffc344a5)

![image](https://github.com/user-attachments/assets/4669f27d-bea0-49e7-94f6-24a3111c2591)

•	Historial de Compras: Una sección dedicada permite a los usuarios visualizar todas sus compras anteriores. Además, pueden generar reportes en PDF de cada compra, los cuales incluyen el listado de productos adquiridos, precios, fechas y estados de las órdenes.

![image](https://github.com/user-attachments/assets/35bf8df9-5061-4fdf-9042-3ba01166bac2)

•	Notificaciones por Correo Electrónico: Al completar una compra, el usuario recibe un correo electrónico con la confirmación y los detalles de la transacción.

![image](https://github.com/user-attachments/assets/c78a0faf-c877-44a5-b4c7-6962cbd6121d)

# 2. Zona Administrativa

![image](https://github.com/user-attachments/assets/918394a9-0996-41a1-be83-309c6db96eae)

Funcionalidades principales:

•	Gestión de Usuarios: El administrador puede visualizar los usuarios registrados, asignar roles (User o Admin) y cambiar roles si es necesario. Esto se gestiona mediante la librería Spatie Laravel-permission, que garantiza un control granular sobre los accesos y permisos.

![image](https://github.com/user-attachments/assets/de6553db-6acf-41e8-87da-e5cc95395f3b)

•	Gestión de Productos: Los administradores tienen la capacidad de:<br>
- Añadir nuevos productos con imágenes y detalles relevantes.<br>
- Editar información de productos existentes.<br>
- Eliminar productos (esto se modificara por una opción de habilitar/deshabilitar producto).

![image](https://github.com/user-attachments/assets/8b1d5855-93a7-40b0-80ae-87b469eeed2a)

•	Gestión de Categorías: Similar a los productos, las categorías pueden ser creadas, editadas, y eliminadas para mantener un catálogo bien organizado.

![image](https://github.com/user-attachments/assets/44ba3199-46d9-4a90-87ad-228c2a8eb3c0)

•	Gestión de Órdenes: Los administradores pueden revisar las órdenes de compra realizadas por los usuarios, verificando su estado (pendiente, completada, cancelada).

![image](https://github.com/user-attachments/assets/fbe12350-2bc8-4ba7-9694-6c58dfc36ef0)

•	Generación de Reportes Personalizados: Los administradores pueden filtrar y ordenar datos de usuarios, productos, categorías y compras para generar reportes PDF. Los filtros incluyen campos específicos, criterios de ordenación y límites de registros.

![image](https://github.com/user-attachments/assets/56989d5e-b959-40e6-9e8a-d8e3c529a5c0)

![image](https://github.com/user-attachments/assets/787b24ae-7776-4077-964e-ff3dd28b3641)

•	Estadísticas: Se incluye un panel de estadísticas que muestra gráficos y resúmenes relacionados con: Número de usuarios registrados, Productos en inventario, Cantidad de ventas, Ingresos por ventas.

![image](https://github.com/user-attachments/assets/4f70c275-e055-460f-a9f9-a8f6ef009013)

# Gestión de Seguridad
El sistema implementa varias capas de seguridad para proteger los datos de los usuarios y garantizar el acceso autorizado:
1.	Autenticación y Recuperación de Contraseña: Utilizando Laravel Breeze, los usuarios pueden registrarse, iniciar sesión y recuperar sus contraseñas mediante un flujo seguro.

![image](https://github.com/user-attachments/assets/d0a9f6f0-b2cf-485b-9844-4017f991178e)

![image](https://github.com/user-attachments/assets/0d82e655-dbcf-4470-a7f7-f6f4c74a413c)

2.	Roles y Permisos: Las rutas y acciones están protegidas según los roles asignados:
o	Visitante: Puede explorar productos, pero no interactuar con el carrito ni realizar compras.
o	Usuario Registrado: Tiene acceso al carrito y al flujo completo de compra.
o	Administrador: Accede a todas las funcionalidades, incluyendo la gestión de usuarios, productos y órdenes.

Aquellos que intenten acceder a rutas que no le corresponen, seran informados mediante el respectivo mensaje de error:

![image](https://github.com/user-attachments/assets/ddc04804-829b-4a52-8891-8d1254e18980)


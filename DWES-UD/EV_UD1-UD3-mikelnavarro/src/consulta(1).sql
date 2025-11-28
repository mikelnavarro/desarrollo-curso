
RESPONSABLE => "id";
MASCOTA => "id_persona";
Consulta SQL:

SELECT r.nombre, m.nombre, m.tipo
FROM mascotas m, personas r
WHERE m.id_persona = r.id;
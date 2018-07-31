DELIMITER //
CREATE PROCEDURE sp_insert_delegacion
(

IN Pnombre VARCHAR(40),
IN PSegundoNombre VARCHAR(40),
IN PApellido VARCHAR(40),
IN PApellidoMaterno VARCHAR(40),
IN PCedula VARCHAR(20),
IN Psexo CHAR(1),
IN PFechaDeNacimiento DATE,
IN PAlergias VARCHAR(1000), 
IN PTipoDeSangre VARCHAR(3), 
IN PPadecimientoEnfermedad VARCHAR(250), 
IN PBautizo INT(1), 
IN PComunion INT(1), 
IN PConfirmacion INT(1), 
IN PMatrimonio INT(1), 
IN PTelefono VARCHAR(8), 
IN PCelular VARCHAR(9), 
IN PCorreo VARCHAR(100), 
IN PDireccion VARCHAR(350), 
IN PCodigoCapilla INT, 
IN PCodigoPastoral INT, 
IN PCasoEmergencia VARCHAR(150),
IN PTelefonoEmergencia VARCHAR(9),
IN PPorqueperegrino VARCHAR(500), 
IN PAcudiente VARCHAR(80), 
IN PCodigoParentesco INT(11), 
IN PTelefonoAcudiente VARCHAR(8), 
IN PCelularAcudiente VARCHAR(9)
)
BEGIN
	
    -- declaracion de variables
     DECLARE PVarcodigo varchar(50) DEFAULT '';
     DECLARE Pvarproxid     int ;
     DECLARE PCodigo         int;
     
     SELECT Nemonico into PVarcodigo
	 FROM   capilla
     WHERE  Codigo_Capilla = PCodigoCapilla;
           
	 SELECT count(*)+1 into Pvarproxid
	 FROM delegacion
	 where  DATE_FORMAT(fecha_registro, "%d-%m") = DATE_FORMAT(now(), "%d-%m");
     
     
	INSERT INTO delegacion(Nombre, Segundo_Nombre, Apellido, Apellido_Materno, Cedula, Sexo, Fecha_De_Nacimiento, Alergia, Tipo_De_Sangre, Padecimiento_enfermedad, Bautizo, Comunion, Confirmacion, Matrimonio, Telefono, Celular, Correo_Electronico, Direccion, Codigo_Capilla, Codigo_Pastoral, Caso_Emerg_Llamar, Telefono_Emergencia, Por_Que_Ser_Peregrino, Acudiente, Codigo_Parentesco, Telefono_Acudiente, Celular_Acudiente)
	VALUES(Pnombre,PSegundoNombre,PApellido,PApellidoMaterno,PCedula,Psexo,PFechaDeNacimiento,PAlergias,PTipoDeSangre,
	 PPadecimientoEnfermedad,PBautizo,PComunion,PConfirmacion,PMatrimonio,PTelefono,PCelular,PCorreo,PDireccion,
	 PCodigoCapilla,PCodigoPastoral,PCasoEmergencia,PTelefonoEmergencia,PPorqueperegrino,PAcudiente, PCodigoParentesco,PTelefonoAcudiente,PCelularAcudiente);
     
	 select count(*) into PCodigo
     from delegacion;
     
     UPDATE delegacion
     SET Codigo_Alterno = CONCAT('DEL-',PVarcodigo,'-',DATE_FORMAT(now(), "%d-%m"),'-',Pvarproxid)
     where codigo_alojamiento = PCodigo;
     
END //
DELIMITER ;




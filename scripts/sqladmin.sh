#!/bin/bash

if [ $UID != 0 ]; then
	echo -----------------------------------------------------------------
	echo "No tienes los privilegios necesarios para ejecutar este script."
	echo "Debes ingresar como root, escribe \"su root\" sin las comillas."
	echo ----------------------------------------------------------------
exit 1 
fi     

echo
echo "Administración básica de red en linux"
echo

while [ "$option" != "0" ]; do
clear
  echo "----------------------------------------------"
  echo "| Eres un catetazo para los comandos? USAME! |"
  echo "----------------------------------------------"
	echo
  echo
  echo "##   ##  ###  ### #####    ######              ###    #####    ##   ##   ######  ##   ##   ######   #####   ########   ###    ########  #####    ######"
  echo "##   ##   ##  ##   ## ##    ##  ##            ## ##    ## ##   ### ###     ##    ###  ##     ##    ##   ##  ## ## ##  ## ##   ## ## ## ### ###   ##  ##"
  echo "##   ##    ####    ##  ##   ##  ##           ##   ##   ##  ##  #######     ##    #### ##     ##    ##          ##    ##   ##     ##    ##   ##   ##  ##"
  echo "## # ##     ##     ##  ##   #####            ##   ##   ##  ##  ## # ##     ##    #######     ##     #####      ##    ##   ##     ##    ##   ##   #####"
  echo "#######     ##     ##  ##   ##  ##           #######   ##  ##  ##   ##     ##    ## ####     ##         ##     ##    #######     ##    ##   ##   ## ##"
  echo "### ###     ##     ## ##    ##  ##           ##   ##   ## ##   ##   ##     ##    ##  ###     ##    ##   ##     ##    ##   ##     ##    ### ###   ## ##"
  echo "##   ##    ####   #####    ######            ##   ##  #####    ### ###   ######  ##   ##   ######   #####     ####   ##   ##    ####    #####   #### ##"
  
  echo
  echo "Opciones:"
	echo "---------"
	echo " 1. Ver estado de MySQL."
	echo " 2. Activar MySQL."
	echo " 3. Desactivar MySQL."
	echo " 4. Reiniciar MySQL."
	echo " 5. Revisar Logs de errores."
  echo " 6. Revisar Logs de querys (actividad)."
  echo " 0. Salir."
	echo
	echo -n " Ejecutar: "
	read option


 case $option in

	  1 ) # 1. Ver estado de MySQL
     sqlstate=$(systemctl status mysql | grep active |awk '{print $2}')
     echo "comprobando estado de servicio: MySQL"
     echo "Estado: $sqlstate"
     echo
     echo "intro para menu:"
     read
    ;;



	  2 ) # 2. Activar MySQL
     echo "Activando servicio MySQL..."
     systemctl start mysql
     sqlstate=$(systemctl status mysql | grep active |awk '{print $2}')
     
     if [ "$sqlstate" = "active" ]; then
     
       echo "Servicio MySQL activado correctamente..."
       echo "estado actual: $sqlstate"
       echo
       echo "Intro para menu:"
      read
      else       
       echo "####################################"
       echo "#ERROR AL ACTIVAR EL SERVICIO MYSQL#"
       echo "####################################"
       echo
       echo "Ha ocurrido un problema al activar el servicio MySQL, revise el log de errores para más información."
       ulterror=$(tail -1 /var/log/mysql/error.log)
       echo
       echo "Último registro del log de errores:"
       echo "########################################################################"
       echo
       echo "$ulterror"
       echo
       echo "########################################################################"
       echo
       echo "Para mas información vuelva al menu y despliegue el log de errores (opc.5)"
       echo "intro para menu:"
      read
      
     fi
    ;;
    
    
    
    3 ) # 3. Desactivar MySQL
     echo "Desactivando servicio MySQL..."
     systemctl stop mysql
     sqlstate=$(systemctl status mysql | grep active | awk '{print $2}')
     
     if [ "$sqlstate" = "inactive" ]; then
     
       echo "Servicio MySQL desactivado correctamente..."
       echo "estado actual: $sqlstate"
       echo
       echo "Intro para menu:"
      read
      else       
       echo "#######################################"
       echo "#ERROR AL DESACTIVAR EL SERVICIO MYSQL#"
       echo "#######################################"
       echo
       echo "Ha ocurrido un problema al desactivar el servicio MySQL, revise el log de errores para más información."
       ulterror=$(tail -1 /var/log/mysql/error.log)
       echo
       echo "Último registro del log de errores:"
       echo "########################################################################"
       echo
       echo "$ulterror"
       echo
       echo "########################################################################"
       echo
       echo "Para mas información vuelva al menu y despliegue el log de errores (opc.5)"
       echo "intro para menu:"
      read
      
     fi 
    ;;
    
    
    
    4 ) # 4. Reiniciar MySQL
      echo "reiniciando servicio MySQL..."
      systemctl restart mysql
      sqlstate=$(systemctl status mysql | grep active | awk '{print $2}')
      
      if [ "$sqlstate" = "active" ]; then
     
       echo "Servicio MySQL activado correctamente..."
       echo "estado actual: $sqlstate"
       echo
       echo "Intro para menu:"
      read
      else       
       echo "######################################"
       echo "#ERROR AL REINICIAR EL SERVICIO MYSQL#"
       echo "####################################"
       echo
       echo "Ha ocurrido un problema al reiniciar el servicio MySQL, revise el log de errores para más información."
       ulterror=$(tail -1 /var/log/mysql/error.log)
       echo
       echo "Último registro del log de errores:"
       echo "########################################################################"
       echo
       echo "$ulterror"
       echo
       echo "########################################################################"
       echo
       echo "Para mas información vuelva al menu y despliegue el log de errores (opc.5)"
       echo "intro para menu:"
      read
      
     fi
    ;;
    
    
    
    5 ) # 5. Revisar Logs de errores
     echo
     echo "Mostrando logs de errores:"
     echo "----------------------------------------"
     echo
     tail -20 /var/log/mysql/error.log
     echo
     echo "----------------------------------------"
     echo
     echo "Intro para menu:"
     read
    ;;



    6 ) # 6. Revisar Logs de errores
     echo
     echo "Mostrando logs de actividad:"
     echo "----------------------------------------"
     echo
     tail -20 /var/log/mysql/query.log
     echo
     echo "----------------------------------------"
     echo
     echo "Intro para menu:"
     read
    ;;

	 * );;
   
 esac
done
echo
echo "GRACIAS POR USARME!"
echo "Saliendo..."
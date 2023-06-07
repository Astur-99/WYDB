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
	echo " 1. Ver estado de Apache2."
	echo " 2. Activar Apache2."
	echo " 3. Desactivar Apache2."
	echo " 4. Reiniciar Apache2."
	echo " 5. Revisar Logs."
  echo " 0. Salir."
	echo
	echo -n " Ejecutar: "
	read option


 case $option in

	  1 )
    apachestat=$(systemctl status apache2 | grep active | awk '{print $2}');
    echo "Estado actual: $apachestat"
    echo "Apache2 se ha iniciado Satisfactoriamente."
    echo "Intro para volver al menu..."
    read
	  ;;



	  2 )
    echo "Iniciando servicio..."
    systemctl start apache2
    
    apachestat=$(systemctl status apache2 | grep active | awk '{print $2}')
    
    if [ "$apachestat" = "active" ]; then 
      echo
      echo "Estado actual: $apachestat"
      echo "Apache2 se ha INICIADO Satisfactoriamente."
      echo
      echo "Intro para volver al menu..."
      read
    else
      clear
      echo "####################"
      echo "# ERROR AL INICIAR #"
      echo "####################"
      echo
      echo "Se ha producido un error al detener el servicio." 
      read -p "¿Quiere revisar los logs de Apache? (s/n): " $sn
      
      if [ "$sn" = "s" ]; then
        clear
        echo "############################################"
        echo "Mostrando las ultimas 20 entradas del log..."
        echo "############################################"
        echo
        tail -n 20 /var/log/apache2/error.log
        echo
        echo
        echo "intro para volver al menú..."
        read
      else
        echo "intro para volver al menú..."
        read
      fi
    fi
	  ;;



    3 )
    echo "Deteniendo servicio..."
    systemctl stop apache2
    
    apachestat=$(systemctl status apache2 | grep active | awk '{print $2}')
    
    if [ "$apachestat" = "inactive" ]; then 
      echo
      echo "Estado actual: $apachestat"
      echo "Apache2 se ha DETENIDO Satisfactoriamente."
      echo
      echo "Intro para volver al menu..."
      read
    else
      clear
      echo "####################"
      echo "# ERROR AL DETENER #"
      echo "####################"
      echo
      echo "Se ha producido un error al detener el servicio." 
      read -p "¿Quiere revisar los logs de Apache? (s/n): " $sn
      
      if [ "$sn" = "s" ]; then
        clear
        echo "############################################"
        echo "Mostrando las ultimas 20 entradas del log..."
        echo "############################################"
        echo
        tail -n 20 /var/log/apache2/error.log
        echo
        echo
        echo "intro para volver al menu..."
        read
      else
        echo "intro para volver al menu..."
        read
      fi
    fi
    ;;
  
  
    4 )
    echo "Reiniciando servicio..."
    systemctl restart apache2
    
    apachestat=$(systemctl status apache2 | grep active | awk '{print $2}')
    
    if [ "$apachestat" = "active" ]; then 
      echo
      echo "Estado actual: $apachestat"
      echo "Apache2 se ha REINICIADO Satisfactoriamente."
      echo
      echo "Intro para volver al menu..."
      read
    else
      clear
      echo "####################"
      echo "# ERROR AL REINICIAR #"
      echo "####################"
      echo
      echo "Se ha producido un error al detener el servicio." 
      read -p "¿Quiere revisar los logs de Apache? (s/n): " $sn
      
      if [ "$sn" = "s" ]; then
        clear
        echo "############################################"
        echo "Mostrando las ultimas 20 entradas del log..."
        echo "############################################"
        echo
        tail -n 20 /var/log/apache2/error.log
        echo
        echo
        echo "intro para volver al menu..."
        read
      else
        echo "intro para volver al menu..."
        read
      fi
    fi
    ;;
    
    
    
    5 )
    echo "############################################"
    echo "Mostrando las ultimas 20 entradas del log..."
    echo "############################################"
    echo
    tail -n 20 /var/log/apache2/error.log
    echo
    echo
    echo "intro para volver al menu..."
    read
    ;;
    
	 * );;
   
 esac
done
echo
echo "GRACIAS POR USARME!"
echo "Saliendo..."
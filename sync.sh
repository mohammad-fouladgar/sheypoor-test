#!/bin/bash


CYAN='\033[0;36m'
RED='\033[0;31m'
GREEN='\033[0;32m'
NC='\033[0m' # No Color

# prints colored text
print_style () {

    if [ "$2" == "info" ] ; then
        COLOR="96m"
    elif [ "$2" == "success" ] ; then
        COLOR="92m"
    elif [ "$2" == "warning" ] ; then
        COLOR="93m"
    elif [ "$2" == "danger" ] ; then
        COLOR="91m"
    else #default color
        COLOR="0m"
    fi

    STARTCOLOR="\e[$COLOR"
    ENDCOLOR="\e[0m"

    printf "$STARTCOLOR%b$ENDCOLOR" "$1"
}

display_options () {
    printf "Available options:\n";
    print_style "   up " "success"; 
    printf "\t\t\t Runs docker compose with ${RED}mysql,nginx and phpmyadmin${NC}.\n";
    print_style "   stop" "success"; 
    printf "\t\t\t Stops containers.\n";
    print_style "   restart" "success"; 
    printf "\t\t Restart containers.\n";
    print_style "   bash" "success"; 
    printf "\t Opens backend bash on the workspace.\n";
  }

if [[ $# -eq 0 ]] ; then
    print_style "Missing arguments.\n" "danger"
    display_options
    exit 1
fi


cd motordocker/

if [ "$1" == "up" ] ; then
   
    print_style "May take a long time (15min+) on the first run\n" "info"

    print_style "Initializing Docker Compose\n" "info"
    
    docker-compose up -d mysql nginx phpmyadmin

    echo -e "${GREEN}Done!${NC}" 
    echo -e "For use app visit:        ${GREEN}http://localhost:8080${NC}"
    echo -e "For use phpmyadmin visit: ${GREEN}http://localhost:8183${NC}"

elif [ "$1" == "stop" ]; then
    print_style "Stopping Docker Compose\n" "info"
    
    docker-compose stop

elif [ "$1" == "restart" ]; then
    print_style "Restart Docker Compose\n" "info"
    
    docker-compose restart

   
elif [ "$1" == "bash" ]; then
    docker-compose exec workspace bash

else
    print_style "Invalid arguments.\n" "danger"
    display_options
    exit 1
fi

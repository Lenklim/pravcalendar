#!/bin/bash

# Путь к файлу со списком доменов
DOMAINS_FILE="domains.txt"

# Путь к файлу /etc/hosts
HOSTS_FILE="/etc/hosts"

# Проверяем, существует ли файл со списком доменов
if [ -f "$DOMAINS_FILE" ]; then
    # Читаем список доменов из файла
    readarray -t domains < "$DOMAINS_FILE"

    # Перебираем каждый домен из списка
    for domain in "${domains[@]}"; do
        # Проверяем, есть ли домен в файле /etc/hosts
        if grep -q "$domain" "$HOSTS_FILE"; then
            # Удаляем все строки, содержащие этот домен из файла /etc/hosts
            sed -i "/$domain/d" "$HOSTS_FILE"
            echo "Домен $domain удален из файла /etc/hosts"
        else
            echo "Домена $domain нет в файле /etc/hosts"
        fi
    done
else
    echo "Файл со списком доменов не найден"
fi
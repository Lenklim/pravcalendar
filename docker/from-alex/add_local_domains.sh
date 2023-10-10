#!/bin/bash

domains_file="domains.txt"
hosts_file="/etc/hosts"
temp_file="temp_hosts"

# Проверяем наличие файла domains.txt
if [ -f "$domains_file" ]; then
  # Перебираем каждую строку в файле domains.txt
  while IFS= read -r domain; do
    # Проверяем, содержится ли домен в файле /etc/hosts
    grep -q "\\b${domain}\\b" "$hosts_file"
    if [ $? -ne 0 ]; then
      # Если домена нет в файле, добавляем его во временный файл
      echo "127.0.0.1 ${domain}" >> "$temp_file"
    fi
  done < "$domains_file"

  # Проверяем, есть ли записи для добавления во временном файле
  if [ -s "$temp_file" ]; then
    # Добавляем записи из временного файла в файл /etc/hosts
    cat "$temp_file" >> "$hosts_file"
    echo "Добавлены новые записи в файл /etc/hosts."
  else
    echo "Нет новых записей для добавления в файл /etc/hosts."
  fi

  # Удаляем временный файл
  rm "$temp_file"
else
  echo "Файл domains.txt не найден."
fi
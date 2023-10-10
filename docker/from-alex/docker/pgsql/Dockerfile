FROM  postgres:13.3
RUN ln -snf /usr/share/zoneinfo/Europe/Moscow /etc/localtime && dpkg-reconfigure -f noninteractive tzdata
RUN echo 'Europe/Moscow' > /etc/timezone
#ALTER SYSTEM SET timezone TO 'Europe/Moscow'

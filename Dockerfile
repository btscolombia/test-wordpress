FROM wordpress:latest

# Copiar archivos personalizados
COPY wp-content/ /var/www/html/wp-content/
COPY wp-config.php /var/www/html/

# Establecer permisos
RUN chown -R www-data:www-data /var/www/html
RUN find /var/www/html -type d -exec chmod 755 {} \;
RUN find /var/www/html -type f -exec chmod 644 {} \;

EXPOSE 80

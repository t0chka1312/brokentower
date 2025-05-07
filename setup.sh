#!/bin/bash

echo "[+] Actualizando repositorios..."
apt update -y

echo "[+] Instalando Apache, PHP, MariaDB, OpenSSH y LXD..."
apt install apache2 php libapache2-mod-php mariadb-server php-mysql unzip wget openssh-server gcc lxd lxd-client -y

echo "[+] Habilitando servicios Apache, MariaDB y SSH..."
systemctl enable apache2
systemctl enable mariadb
systemctl enable ssh
systemctl start apache2
systemctl start mariadb
systemctl start ssh

echo "[+] Inicializando LXD..."
lxd init --auto

echo "[+] Configurando la base de datos..."
mysql -e "CREATE DATABASE towercms;"
mysql -e "CREATE USER 'r3g4l1z'@'localhost' IDENTIFIED BY 'Qz9pL4x82sV7';"
mysql -e "GRANT ALL PRIVILEGES ON towercms.* TO 'r3g4l1z'@'localhost';"
mysql -e "FLUSH PRIVILEGES;"

echo "[+] Creando tablas y datos..."
mysql -u r3g4l1z -pQz9pL4x82sV7 towercms <<EOF
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);
INSERT INTO users (username, password) VALUES ('faleka', 'nK8pX2vM5rG9');

CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(50) NOT NULL,
    description VARCHAR(300) NOT NULL
);
INSERT INTO services (service_name, description) VALUES 
('network', 'Análisis exhaustivo de infraestructura de red.'),
('forensics', 'Análisis forense de incidentes de seguridad.'),
('hardening', 'Endurecimiento de sistemas operativos y servidores.'),
('pentest', 'Pruebas de penetración internas y externas.');
EOF

echo "[+] Creando usuario del sistema para SSH (r3g4l1z)..."
useradd -m -s /bin/bash r3g4l1z
echo "r3g4l1z:Qz9pL4x82sV7" | chpasswd
usermod -aG lxd r3g4l1z

echo "[+] Creando estructura web..."
mkdir -p /var/www/html/antifuzzing/uploads
mkdir -p /var/www/html/assets/css
mkdir -p /var/www/html/assets/img
mkdir -p /var/www/html/srcbrokentower

echo "[+] Moviendo archivos del proyecto..."
cp antifuzzing/index.php /var/www/html/antifuzzing/
cp antifuzzing/upload.php /var/www/html/antifuzzing/
cp assets/css/style.css /var/www/html/assets/css/
# img/ está vacío según la imagen, no se copian archivos
cp contacto.php /var/www/html/
cp dashboard.php /var/www/html/
cp index.php /var/www/html/
cp login.php /var/www/html/
cp servicios.php /var/www/html/
cp srcbrokentower/db_connect.php /var/www/html/srcbrokentower/

echo "[+] Asignando permisos según estructura..."
chown -R root:root /var/www/html
chmod -R 755 /var/www/html

chown -R www-data:www-data /var/www/html/antifuzzing/uploads
chmod -R 755 /var/www/html/antifuzzing/uploads

echo "[+] Creando flags..."
echo "r3g4l1z{1n1t14l_4cc3ss_SQL1}" > /var/www/html/antifuzzing/uploads/flag1.txt
echo "r3g4l1z{pr1v1l3g3_3sc4l4t10n_0k}" > /home/r3g4l1z/flag2.txt
echo "r3g4lz{lxd_1s_d4ng3r0us}" > /root/root.txt

chmod 644 /var/www/html/antifuzzing/uploads/flag1.txt
chmod 644 /home/r3g4l1z/flag2.txt
chmod 600 /root/root.txt

echo "[+] Configuración completada. El sistema está listo para el CTF."
